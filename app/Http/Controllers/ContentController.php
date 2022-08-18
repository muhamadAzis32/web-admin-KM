<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\AksesKelas;
use Illuminate\Support\Facades\View;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        $kontenDokumen = Content::all();
        $nama = Kelas::get();
        return view('admin.kontenDokumen.index', ['nama'=>$nama], compact('kontenDokumen', 'nama'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.kontenDokumen.tambah',compact('kelas'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'tipe' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'required',
            'bab' => 'required',
            'kelas_id' => 'required',
            'kategori' => 'required',
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

        Content::create([
            'tipe' => $request->tipe,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $txt,
            'bab' => $request->bab,
            'kelas_id' => $request->kelas_id,
            'kategori' => $request->kategori,
        ]);
        //notify()->success('Konten Dokumen berhasil ditambahkan!');
        return redirect()->route('kelas.show', $request->kelas_id)
            ->with('success', 'Konten Dokumen Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $kontenDokumens = Content::where('id', $id)->first();
        return view('admin.kontenDokumen.show', compact('kontenDokumen'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $kelas = Kelas::all();
        $kontenDokumen = Content::find($id);

        return view('admin.kontenDokumen.edit', compact('kontenDokumen','kelas'));
    }

    public function update(Request $request, $id)
    {


        $kontenDokumen = Content::findOrFail($id);
        $kontenDokumen->tipe = $request->tipe;
        $kontenDokumen->judul = $request->judul;
        $kontenDokumen->deskripsi = $request->deskripsi;  
        $kontenDokumen->bab = $request->bab;
        $kontenDokumen->kelas_id = $request->kelas_id;
        $kontenDokumen->kategori = $request->kategori;

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
        Content::where('id', $id)->delete();
        //notify()->success('Konten Dokumen berhasil dihapus!');
        return redirect()->route('kontenDokumen.index')
            ->with('delete', 'Konten Dokumen Berhasil Dihapus');
    }
}