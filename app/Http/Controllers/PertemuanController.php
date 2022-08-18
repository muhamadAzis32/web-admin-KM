<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertemuan;
use App\Models\KontenDokumen;
use App\Models\KontenVideo;
use App\Models\AssignmentPilganSoal;
use App\Models\Quiz;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuizImport;
use App\Imports\AssignmentPilganImport;
use App\Models\Kelas;
use Illuminate\Support\Facades\View;
use App\Models\Akses;
use App\Models\AksesKelas;

class PertemuanController extends Controller
{
    // public function index() 
    // {
    //     $pertemuan = Pertemuan::all();
    //     $kelas = Kelas::get();

    //     return view('' ,compact('pertemuan', 'kelas'));
    // }

    // public function create()
    // {
    //     $kontenVideo = KontenVideo::all();
    //     $kontenDokumen = KontenDokumen::all();

    //     return view('', compact('kontenVideo', 'kontenDokumen'));
    // }
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }

    public function detail($id)
    {
        $pertemuan = Pertemuan::find($id);
        // dd($pertemuan);
        $kelas = Kelas::find($id);
        $kontenDokumen = KontenDokumen::get();
        $kontenVideo = KontenVideo::get();
        $pertemuanselect = Pertemuan::all();
        $totalVideo = KontenVideo::count();
        $totalDokumen = KontenDokumen::count();
        // dd($kontenVideo);
        return view('admin.pertemuan.index', compact('totalVideo', 'totalDokumen', 'pertemuan', 'kontenDokumen', 'kontenVideo', 'kelas', 'pertemuanselect'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertemuan' => 'required',
            'deskripsi' => 'required',
        ]);

        // dd($request);
        $kontenVideo_id = $request->kontenVideo_id;
        $kontenDokumen_id = $request->kontenDokumen_id;

        if($kontenVideo_id){
        $i = 0;
        foreach ($kontenVideo_id as $item) {
            // dd($item);
            $dataa[$i] = ([
                'id' => (int) $item,
            ]);
            $i++;
        }
    } else {
        $dataa = [];
    }

    if($kontenDokumen_id){
        $i = 0;
        foreach ($kontenDokumen_id as $item) {
            // dd($item);
            $dataaa[$i] = ([
                'id' => (int) $item,
            ]);
            $i++;
        }
    } else {
        $dataaa = [];
    }

        // foreach ($kontenVideo_id as $objectItem) {
        //     $name = Name::firstOrNew(['name' => $objectItem]);
        // }

        // dd($request->all(), $kontenDokumen_id, $kontenVideo_id, $dataa);
        if($request->mandiri != null){
            $mandiri =  true;
        }
        else{
            $mandiri = false;
        }
        $ar = 1;


        Pertemuan::create([
            'pertemuan' => $request->pertemuan,
            'deskripsi' => $request->deskripsi,
            'judul' => $request->judul,
            'kontenVideo_id' => $dataa,
            'kontenDokumen_id' => $dataaa,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'tugas_mandiri' => $request->mandiri,
            'tipe' => $request->tipe,
            'isMandiri' => $mandiri,
        ]);

 


        // foreach ($kontenVideo_id as $item) {
        //     $video = KontenVideo::find((int) $item)->get();
        //     $video->update(['pertemuan_id' => $pertemuan->id]);
        //     $i++;
        // }
        // foreach ($kontenDokumen_id as $item) {
        //     $dok = KontenDokumen::find((int) $item)->get();
        //     $dok->update(['pertemuan_id' => $pertemuan->id]);
        //     $i++;
        // }
        return back()
            ->with('success', 'Pertemuan Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        Pertemuan::where('id', $id)->delete();
        // $kelas = Kelas::find($id);
        return back()            
        ->with('delete', 'Pertemuan berhasil dihapus!');
    }


    public function import_quiz(Request $request)
    {

        //$assignmentPilgan = AssignmentPilgan::all();
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);
        //$assignmentPilgan = new AssignmentPilgan();
        $file = $request->file('file');
        $pertemuan_id = $request->pertemuan_id;
        $file_name = rand() . $file->getClientOriginalName();
        $file->move('Quiz', $file_name);
        Excel::import(new QuizImport($pertemuan_id), public_path('/Quiz/' . $file_name));


        return redirect()->route('pertemuan', $request->kelas_id)
            ->with('success', 'Quiz berhasil diimport!');
    }

    // public function ImportPilgan(Request $request)
    // {

    //     //$assignmentPilgan = AssignmentPilgan::all();
    //     $this->validate($request, [
    //         'file' => 'required|mimes:csv,xls,xlsx',
    //     ]);

    //     //$assignmentPilgan = new AssignmentPilgan();
    //     $file = $request->file('file');
    //     // $soal_id = $request->relasi_id;
    //     // $kategori = $request->kategori;
    //     $file_name = rand() . $file->getClientOriginalName();
    //     $file->move('AssignmentPilgan', $file_name);
    //     // dd($soal_id, $kategori, $file);
    //     Excel::import(new AssignmentPilganImport, public_path('/AssignmentPilgan/' . $file_name));
    //     // dd($soal_id);

    //     return redirect()->route('pertemuan', $request->kelas_id)
    //         ->with('success', 'assignment File Berhasil diimport');
    // }
}
