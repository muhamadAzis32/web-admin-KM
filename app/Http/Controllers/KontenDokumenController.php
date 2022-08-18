<?php

namespace App\Http\Controllers;
use App\Models\KontenDokumen;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Kategori;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\View;
use App\Models\Akses;
use App\Models\AksesKelas;

class KontenDokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        $kontenDokumen = KontenDokumen::all();
        $judul = MataKuliah::get();
        
        return view('admin.kontenDokumen.index', ['judul'=>$judul], compact('kontenDokumen', 'judul'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $kategori = Kategori::all();
        return view('admin.kontenDokumen.tambah',compact('kelas','kategori'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'required',
            'mata_kuliah_id' => 'required',
            'kategori_id' => 'required',
        ]);

        $upload = $request->file;
        if (isset($request->file)) {
            $extention = $request->file->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/documents/". $file_name;
            $request->file->storeAs('public/documents', $file_name);
        } else {
            $file_name = null;
        }

        KontenDokumen::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $txt,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'kategori_id' => $request->kategori_id,
        ]);
        //notify()->success('Konten Dokumen berhasil ditambahkan!');
        return redirect()->route('mataKuliah.show', $request->mata_kuliah_id)
            ->with('success', 'Konten Dokumen Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $kontenDokumens = KontenDokumen::where('id', $id)->first();
        return view('admin.kontenDokumen.show', compact('kontenDokumen'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $matakuliah = MataKuliah::all();
        $kontenDokumen = KontenDokumen::find($id);
        $kategori = Kategori::all();
        return view('admin.kontenDokumen.edit', compact('kontenDokumen','matakuliah','kategori'));
    }

    public function update(Request $request, $id)
    {


        $kontenDokumen = KontenDokumen::findOrFail($id);
        $kontenDokumen->judul = $request->judul;
        $kontenDokumen->deskripsi = $request->deskripsi;  
        $kontenDokumen->mata_kuliah_id = $request->mata_kuliah_id;
        $kontenDokumen->kategori_id = $request->kategori_id;

        if (isset($request->file)){
            $extention = $request->file->extension();
            $file_name = time().'.'.$extention;
            $txt = "storage/documents/". $file_name;
            $request->file->storeAs('public/documents', $file_name);
            $kontenDokumen->file = $txt;
        }else{}

        $kontenDokumen->save();
        //notify()->success('Konten Dokumen berhasil diedit!');
        return redirect()->route('kontenDokumen.index')
        ->with('edit', 'Konten Dokumen Berhasil Diedit');
    }

    public function destroy($id)
    {
        KontenDokumen::where('id', $id)->delete();
        //notify()->success('Konten Dokumen berhasil dihapus!');
        return redirect()->route('kontenDokumen.index')
            ->with('delete', 'Konten Dokumen Berhasil Dihapus');
    }
}