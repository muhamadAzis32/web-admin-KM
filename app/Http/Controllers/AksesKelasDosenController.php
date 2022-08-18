<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\AksesKelas;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Akses;

class AksesKelasDosenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        // $AksesKelas = MataKuliah::all();
        $AksesKelas = AksesKelas::all();
        $User = User::all();
        $Userselect = User::has('akseskelas')->get();
        // dd($AksesKelas);
        return view('admin.aksesKelas.dosen.index', compact('AksesKelas','AksesKelas','User', 'Userselect'));
    }

    public function create()
    {
        $matkul = MataKuliah::all();
        $user = user::all();
        return view('admin.aksesKelas.dosen.tambah',compact('matkul','user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah_id' => 'required',
            'user_id' => 'required',
            // 'kategori' => 'required',
        ]);
        AksesKelas::create([
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'user_id' => $request->user_id,
            // 'kategori' => $request->kategori,
        ]);
        
        return redirect()->route('akseskelasDosen.index')
            ->with('success', 'Hak Akses Kelas Dosen Berhasil Ditambahkan');
    }

    // public function show($id)
    // {
    //     $AksesKelas = AksesKelas::where('id', $id)->first();
    //     // $kontenDokumen = kontenDokumen::where('kelas_id', $id)->get();
    //     // $kontenVideo = kontenVideo::where('kelas_id', $id)->get();
    //     $matkulselect = MataKuliah::all();
    //     // dd($kontenVideo);
    //     return view('admin.aksesKelas.dosen.show', compact('AksesKelas','kontenDokumen','kontenVideo','kelasselect'));
    // }


    public function edit($id)
    {
        $AksesKelas = AksesKelas::find($id);
        $matkul = MataKuliah::all();
        $user = User::all();
        return view('admin.aksesKelas.dosen.edit', compact('AksesKelas', 'matkul', 'user'));
    }

    public function update(Request $request, $id)
    {
        $AksesKelas = AksesKelas::findOrFail($id);
        $AksesKelas->user_id = $request->user_id;
        $AksesKelas->mata_kuliah_id = $request->mata_kuliah_id;
        // $kelas->kategori = $request->kategori;
        $AksesKelas->save();
        
        return redirect()->route('akseskelasDosen.index')
        ->with('edit', 'Hak Akses Kelas Dosen Berhasil Diedit');
    }

    public function destroy($id)
    {
        AksesKelas::where('id', $id)->delete();
        
        return redirect()->route('akseskelasDosen.index')
            ->with('delete', 'Hak Akses Kelas Dosen Berhasil Dihapus');
    }
}
