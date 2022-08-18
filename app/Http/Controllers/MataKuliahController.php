<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Kategori;
use App\Models\Kelas;
use App\Models\KontenDokumen;
use App\Models\KontenVideo;
use App\Models\MataKuliah;
use App\Models\Pertemuan;
use App\Models\Quiz;
use App\Models\Exam;
use App\Models\AksesKelas;
use App\Models\EnrollMataKuliah;
use App\Models\Enrolls;
use App\Models\ExamPilgan;
use App\Models\Nilai;
use App\Models\NilaiQuiz;
use App\Models\User;
use App\Models\UserAssignment;
use App\Models\UserExam;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\Helper;
use App\Models\UserMandiri;

class MataKuliahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }

    public function index()
    {
        $mataKuliah = MataKuliah::all();
        $pertemuan = Pertemuan::get();
        $kategori = kategori::all();
        return view('admin.mata_kuliah.show', ['pertemuan' => $pertemuan], compact('mataKuliah', 'kategori', 'pertemuan'));
    }

    public function create()
    {
        $mataKuliah = MataKuliah::all();
        $kategori = kategori::all();
        $kelas = Kelas::all();
        return view('admin.mata_kuliah.tambah', compact('mataKuliah', 'kategori', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'sks' => 'required',
            'kategori_id' => 'required',
            'kelas_id' => 'required',
            'kode' => 'required',
            'semester' => 'required',
        ]);
        $matkul = MataKuliah::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'sks' => $request->sks,
            'semester' => $request->semester,
            'kategori_id' => $request->kategori_id,
            'kelas_id' => $request->kelas_id,
            'kode' => $request->kode,
        ]);

        // dd($matkul);
        
        return back()
            ->with('success', 'Mata kuliah Berhasil Ditambahkan');
    }

    
    public function show($id)
    {
        $mataKuliah = MataKuliah::where('id', $id)->first();
        $kategori = Kategori::all();
        $kontenDokumen = kontenDokumen::where('mata_kuliah_id', $id)->get();
        $kontenVideo = kontenVideo::where('mata_kuliah_id', $id)->get();
        $mataKuliahselect = MataKuliah::all();
        $assignment = Assignment::where('mata_kuliah_id', $id)->get();
        $quiz = Quiz::where('mata_kuliah_id', $id)->get();
        $pertemuan = Pertemuan::all();
        $pertemuanselect = Pertemuan::where('mata_kuliah_id', $id)->get();
        $ujian = Exam::where('mata_kuliah_id', $id)->get();
        $ujianpilgan = ExamPilgan::where('mata_kuliah_id', $id)->get();
        $enrolls = EnrollMataKuliah::where('mata_kuliah_id', $id)->get();

        //BLOM BISA NULL
        // dd($nilaimahasiswa); 
        return view('admin.mata_kuliah.show', compact('enrolls', 'kategori', 'mataKuliahselect', 'kontenDokumen', 'kontenVideo', 'assignment', 'pertemuan', 'mataKuliah', 'quiz', 'pertemuanselect', 'ujian', 'ujianpilgan'));
    }


    public function edit($id)
    {
        $kategori = kategori::all();
        $matakuliah = MataKuliah::find($id);
        return view('admin.mata_kuliah.edit', compact('matakuliah', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $mata_kuliah = MataKuliah::findOrFail($id);
        $mata_kuliah->kategori_id = $request->kategori_id;
        $mata_kuliah->judul = $request->judul;
        $mata_kuliah->deskripsi = $request->deskripsi;
        $mata_kuliah->sks = $request->sks;
        $mata_kuliah->semester = $request->semester;
        $mata_kuliah->kelas_id = $request->kelas_id;
        $mata_kuliah->kode = $request->kode;
        $mata_kuliah->save();
        
        return redirect()->route('kelas.show', $request->kelas_id)
            ->with('edit', 'mata_kuliah Berhasil Diedit');
    }

    public function destroy($id)
    {
        MataKuliah::where('id', $id)->delete();
        
        return redirect()->back()
            ->with('delete', 'Mata Kuliah Berhasil Dihapus');
    }

    public function mahasiswa($id)
    {
        $assignment = Assignment::where('mata_kuliah_id', $id)->get();
        $enrolls = EnrollMataKuliah::where('mata_kuliah_id', $id)->get();
        $matkul = MataKuliah::find($id);
        //Total + AVG Assignment 25%
        $dataassignment = UserAssignment::where('mata_kuliah_id', $id)->get();
        //User Exam Uas UTS 30% UAS 35%
        $dataujian = UserExam::where('mata_kuliah_id', $id)->get();
        //Total + AVG Nilai Quiz 10%
        $dataquiz = NilaiQuiz::where('mata_kuliah_id', $id)->get();

        $datapertemuan = Pertemuan::where('mata_kuliah_id',$id)->get();
        // dd($enrolls);
        $nilaimahasiswa = [];
        foreach ($enrolls as $item) {

            $user = User::find($item->user_id);
            $uts = $dataujian->where('tipe', 'uts')->where('user_id', $item->user_id)->first();
            $uas = $dataujian->where('tipe', 'uas')->where('user_id', $item->user_id)->first();

            // Tugas Mandiri
            $tmandiri = UserMandiri::where('user_id',$item->user_id)->get()->SUM('isComplete');
            $scoretmandiri = (int)$datapertemuan->sum('isMandiri')-$tmandiri;

            $totalassignment = $dataassignment->where('user_id', $item->user_id);
            $countassignment = $assignment->count();  //Keseluruhan Assignment di mata kuliah tersebut
            $tambahassignment = $totalassignment->sum('grade');

            $totalquiz = $dataquiz->where('user_id', $item->user_id);
            $countquiz = $totalquiz->count();
            $tambahquiz = $totalquiz->sum('grade');


            // Assignment
            if ($countassignment != null) {
                $tobat1 = $tambahassignment / $countassignment;
            } else {
                $tobat1 = null;
            }
            // Quiz 
            if ($countquiz != null) {
                $tobat2 = ($tambahquiz / $countquiz)-$scoretmandiri; //msh gw kurangin langsung tmandiri
            } else {
                $tobat2 = null;
            }
            // UAS 
            if ($uas != null) {
                $tobat4 = $uas->grade;
            } else {
                $tobat4 = null;
            }
            // UTS 
            if ($uts != null) {
                $tobat3 = $uts->grade;
            } else {
                $tobat3 = null;
            }

            $avgtugas = $tobat1 * 25 / 100;
            $avgquiz = $tobat2 * 10 / 100; 
            $avguts = $tobat3 * 30 / 100;
            $avguas = $tobat4 * 35 / 100;

            $nilaimahasiswa[] = [
                'nama' => $user->name,
                'id' => $item->user_id,
                'assignment' => $tobat1,    //Total Assignment/Jumlah Assignment -> Grade
                'quiz' => $tobat2,
                'uts' => $tobat3,
                'uas' => $tobat4,
                'nilai' => $avgquiz + $avgtugas + $avguts + $avguas,
            ];
        }
        // dd($nilaimahasiswa);
        return view('admin.mata_kuliah.mahasiswa', compact('nilaimahasiswa','matkul'));
    }

    public function detailNilai($id, $matkul)
    {
        $user = User::find($id);
        $matakuliah = MataKuliah::find($matkul);
        $UserAssignment = UserAssignment::where('user_id',$id)->where('mata_kuliah_id',$matkul)->get();
        $UserExam = UserExam::where('user_id',$id)->where('mata_kuliah_id',$matkul)->get();
        $NilaiQuiz = NilaiQuiz::where('user_id',$id)->where('mata_kuliah_id',$matkul)->get();

        $nilaiuts = $UserExam->where('tipe','uts')->first();
        $nilaiuas = $UserExam->where('tipe','uas')->first();

        $dataquiz = Quiz::where('mata_kuliah_id',$matkul)->count();
        $jumlahquiz = $NilaiQuiz->sum('grade');
        $avgquiz = $jumlahquiz/$dataquiz;

        $dataassignment = Assignment::where('mata_kuliah_id',$matkul)->count();
        $jumlahassignment = $UserAssignment->sum('grade');
        $avgassignment = $jumlahassignment/$dataassignment;  

        $avgtugas1 = $avgassignment * 25 / 100;
        $avgquiz1 = $avgquiz * 10 / 100;
        if ($nilaiuts->grade != NULL){
            $avguts1 = $nilaiuts->grade * 30 / 100;
        }
        else{
            $avguts1 = 0;
        }
        
        // dd($nilaiuas);
        if ($nilaiuas== NULL){
            $avguas1 = 0;
        }

        if ($nilaiuas->grade != NULL){
            $avguas1 = 0;
        }
        else{
            $avguas1 = $nilaiuas->grade * 35 / 100;
        }

        $nilaiakhir = $avgtugas1 + $avgquiz1 + $avguts1 + $avguas1;
        
        $variabel = Helper::variabel_nilai($nilaiakhir);
        // dd($variabel);

        return view('admin.mata_kuliah.nilai', compact('variabel','nilaiakhir','user','matakuliah','UserAssignment','UserExam','NilaiQuiz','nilaiuts','nilaiuas','avgquiz','avgassignment'));
    }

    public function konfirmasiNilai(Request $request, $matkul, $id)
    {
        $nilaiAkhir = EnrollMataKuliah::where('user_id', $id)->where('mata_kuliah_id', $matkul)->first();
        $nilaiAkhir->nilai_akhir = $request->nilai_akhir;
        $nilaiAkhir->save();
        
        
        return back()
            ->with('success', 'Sukses Melakukan Konfirmasi Nilai Akhir');
    }
}
