<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Kategori;
use App\Models\Kelas;
use App\Models\KontenDokumen;
use App\Models\KontenVideo;
use App\Models\MataKuliah;
use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\AksesKelas;
use App\Models\Program;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        $kelas = Kelas::all();
        $kategori = kategori::all();
        return view('admin.kelas.index', compact('kelas', 'kategori'));
    }

    public function create()
    {
        $kategori = kategori::all();
        $kelas = Kelas::all();
        $program = Program::all();
        return view('admin.kelas.tambah',compact('kategori', 'kelas','program'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'program_id' => 'required',
            'sebelum' => 'required',
        ]);
        Kelas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'program_id' => $request->program_id,
            'sebelum' => $request->sebelum,
        ]);
        
        return redirect()->route('kelas.index')
            ->with('success', 'Program Studi Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        //$kontenDokumen = kontenDokumen::where('kelas_id', $id)->get();
        //$kontenVideo = kontenVideo::where('kelas_id', $id)->get();
        $kelasselect = Kelas::all();
        $kategori = Kategori::all();
        $assignment = Assignment::all();
        $mataKuliah = MataKuliah::with(['pertemuan','kategori','kelas'])->get();
        $pertemuan = Pertemuan::all();
        return view('admin.kelas.show', compact('kelas','kategori', 'mataKuliah','kelasselect', 'assignment','pertemuan'));
    }


    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $program = Program::all();
        //$kategori = kategori::all();
        return view('admin.kelas.edit', compact('kelas','program'));
    }

    public function update(Request $request, $id)
    { 
        $kelas = Kelas::findOrFail($id);
        $kelas->nama = $request->nama;
        $kelas->deskripsi = $request->deskripsi;
        $kelas->program_id = $request->program_id;
        $kelas->sebelum = $request->sebelum;
        $kelas->save();
        
        return redirect()->route('kelas.index')
        ->with('edit', 'Program Studi Berhasil Diedit');
    }

    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();
        
        return redirect()->route('kelas.index')
            ->with('delete', 'Program Studi Berhasil Dihapus');
    }
}
