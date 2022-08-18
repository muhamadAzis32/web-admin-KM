<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\AksesKelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Akses;
use App\Models\Enrolls;

class AksesKelasMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        $kelas = Kelas::all();
        $AksesKelas = AksesKelas::all();
        $User = User::all();
        $Userselect = User::has('akseskelas')->get();
        $enrolls = Enrolls::all();
        return view('admin.akseskelas.mahasiswa.index', compact('AksesKelas','kelas','User','Userselect', 'enrolls'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $user = user::all();
        return view('admin.aksesKelas.mahasiswa.tambah',compact('kelas','user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'user_id' => 'required',
            // 'kategori' => 'required',
        ]);
        AksesKelas::create([
            'kelas_id' => $request->kelas_id,
            'user_id' => $request->user_id,
            // 'kategori' => $request->kategori,
        ]);
        
        return redirect()->route('akseskelasMahasiswa.index')
            ->with('success', 'Kelas Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        $kontenDokumen = kontenDokumen::where('kelas_id', $id)->get();
        $kontenVideo = kontenVideo::where('kelas_id', $id)->get();
        $kelasselect = Kelas::all();
        // dd($kontenVideo);
        return view('admin.aksesKelas.mahasiswa.show', compact('kelas','kontenDokumen','kontenVideo','kelasselect'));
    }


    public function edit($id)
    {
        $kelas = Kelas::find($id);
 
        return view('admin.aksesKelas.mahasiswa.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->nama = $request->nama;
        $kelas->deskripsi = $request->deskripsi;
        // $kelas->kategori = $request->kategori;
        $kelas->save();
        
        return redirect()->route('akseskelasMahasiswa.index')
        ->with('edit', 'Kelas Berhasil Diedit');
    }

    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();
        
        return redirect()->route('akseskelasMahasiswa.index')
            ->with('delete', 'Kelas Berhasil Dihapus');
    }
}
