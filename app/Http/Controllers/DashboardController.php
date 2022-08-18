<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kelas;
use App\Models\AksesKelas;
use App\Models\Assignment;
use App\Models\AssignmentText;
use App\Models\AssignmentPilgan;
use App\Models\EnrollMataKuliah;
use App\Models\Kalender;
use App\Models\UserDokumen;
use App\Models\Dosen;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Akses;
use App\Models\MataKuliah;
use App\Models\UserPertemuan;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }

    public function Dashboard()
    {
        if(Auth::user()->role == 'dosen'){
            $Kalender = Kalender::where('user_id',Auth::user()->id)->get();
            $user = User::has('AksesKelas')->get();
            $mahasiswa = User::where('role', 'mahasiswa')->count();
            $dosen = User::where('role', 'dosen')->count();
            return view('dosen.index', compact('user','Kalender', 'mahasiswa', 'dosen'));
        }
        elseif(Auth::user()->role == 'admin'){
            $mahasiswa = User::where('role', 'mahasiswa')->count();
            $dosen = User::where('role', 'dosen')->count();
            $prodi = Kelas::count();
            $matakuliah = MataKuliah::count();
            $pertemuan_selesai = UserPertemuan::where('isComplete', '1')->count();
            $mahasiswa_lulus = Administration::where('isComplete', '1')->count();
            $mahasiswa_belum_lulus = Administration::where('isComplete', '0')->count();
            $materi_selesai = UserDokumen::where('isComplete', '1')->count();
            $enroll_jumlah = MataKuliah::withcount('enroll')->with('enroll')->get();
            return view('admin.index', compact('mahasiswa', 'dosen', 'prodi', 'matakuliah', 'pertemuan_selesai', 'mahasiswa_lulus', 'mahasiswa_belum_lulus', 'materi_selesai', 'enroll_jumlah'));
        }
        else{

        }



    }

    public function dataDosen()
    {
        $user = User::where('role','dosen')->get();
        return view('admin.dataKelas.dosen.index', compact('user'));
    }

    public function showDataDosen($id)
    {
        $user = User::where('id',$id)->with(['data_dosen'])->first();
        $detail = Dosen::where('user_id', $id)->get();
        $akseskelas = AksesKelas::where('user_id',$id)->with(['matkul','matkul.kelas'])->get();
        // dd($user->data_dosen);
        return view('admin.dataKelas.dosen.show', compact('user', 'detail','akseskelas'));
    }
    
    public function tambahDataDosen()
    {
        return view('admin.dataKelas.dosen.tambah');
    }

    public function storeDataDosen(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'firebaseUID' => 'required'
        ]);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => bcrypt(($request->input('password'))),
            'firebaseUID' => $request->input('firebaseUID'),
        ]);

        return redirect()->route('dataDosen')
        ->with('success', 'Data Dosen berhasil ditambahkan!');
    }

    public function editDataDosen($id)
    {
        $user = User::find($id);
        return view('admin.dataKelas.dosen.edit', compact('user'));
    }

    public function updateDataDosen(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->firebaseUID = $request->firebaseUID;

        $user->save();
        return redirect()->route('dataDosen')
        ->with('success', 'Data Dosen berhasil diedit!');
    }

    public function deleteDataDosen($id)
    {
        User::find($id)->delete();
        return redirect()->route('dataDosen')
        ->with('success', 'Data Dosen berhasil dihapus!');
    }

    public function dataMahasiswa()
    {
        $user = User::where('role','mahasiswa')->get();
        return view('admin.dataKelas.mahasiswa.index', compact('user'));
    } 

    public function editDataMahasiswa($id)
    {
        $user = User::find($id);
        $dosen = User::where('role', 'dosen')->get();
        return view('admin.dataKelas.mahasiswa.edit', compact('user', 'dosen'));
    }

    public function updateDataMahasiswa(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $user->password;
        $user->role = $request->role;
        $user->firebaseUID = $request->firebaseUID;
        $user->dosen_akademik = $request->dosen_akademik;

        $user->save();
        return redirect()->route('dataMahasiswa')
        ->with('success', 'Data Mahasiswa berhasil diedit!');
    }

    public function deleteDataMahasiswa($id)
    {
        User::find($id)->delete();
        return redirect()->route('dataMahasiswa')
        ->with('success', 'Data Mahasiswa berhasil dihapus!');
    }

    public function assignment($id)
    {
        $kelas = AksesKelas::find($id);
        // $AssignmentFile = AssignmentFile::where('kelas_id',$id)->get();
        // $AssignmentText = AssignmentText::where('kelas_id',$id)->get();
        // $AssignmentPilgan = AssignmentPilgan::where('kelas_id',$id)->get();
        // dd($kelas->kelas_id);
        // dd($kelas->kelas_id,$kelas,$AssignmentFile->judul);
        return view('dosen.assignment.index', compact('kelas','AssignmentFile','AssignmentText','AssignmentPilgan'));
    }

    // public function pilganDetail()
    // {
    //     $assignmentPilgan = AssignmentPilgan::all();
    //     return view('dosen.assignment.pilgan.index', compact('assignmentPilgan'));
    // }

    // public function fileDetail()
    // {
    //     $assignmentFile = AssignmentFile::all();
    //     return view('dosen.assignment.file.index', compact('assignmentFile'));
    // }

    // public function textDetail()
    // {
    //     $assignmentText = AssignmentText::all();
    //     return view('dosen.assignment.text.index', compact('assignmentText'));
    // }

    public function gantiWarnaKalender(Request $request)
    {
        // $komen = Kalender::where('tipe',$id)->where('user_id',Auth::user()->id);
        // $komen->isi = $request->isi;
    
        if($request->kuis != NULL){
            $komen1 = Kalender::where('tipe','kuis')->where('user_id',Auth::user()->id)->update(['color'=>$request->kuis]);
            // dd($komen1);
            // $komen1->color = $request->kuis;
            // $komen1->save();
        }
        if($request->assignment != NULL){
            $komen2 = Kalender::where('tipe','assignment')->where('user_id',Auth::user()->id)->update(['color'=>$request->assignment]);
            // $komen2->color = $request->assignment;
            // $komen2->save();
        }
        if($request->ujian != NULL){
            $komen3 = Kalender::where('tipe','ujian')->where('user_id',Auth::user()->id)->update(['color'=>$request->ujian]);
            // $komen3->color = $request->uts;
            // $komen3->save();
        }
       
        return back()
            ->with('edit', 'Warna Kalender Berhasil Diedit');
    }

    public function coba()
    {
        
        $semester = Administration::where('user_id', 6)->first()->semester;
        $listMkuliah = MataKuliah::where('kelas_id',1)->where('semester', $semester)->get();

        dd($listMkuliah);
    }
}
