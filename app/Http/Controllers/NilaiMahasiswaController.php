<?php

namespace App\Http\Controllers;

use App\Models\AksesKelas;
use Illuminate\Http\Request;

class NilaiMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        $NilaiMahasiswa = NilaiMahasiswa::all();
        return view('admin.NilaiMahasiswa.index', compact('NilaiMahasiswa'));
    }

    public function create()
    {
     
        return view('admin.NilaiMahasiswa.tambah');
    }

    public function store(Request $request)
    {

        $request->validate([
            'gambar' => 'required',
        ]);

        $upload = $request->gambar;
        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/images/". $file_name;
            $request->gambar->storeAs('public/images', $file_name);
        } else {
            $file_name = null;
        }

        NilaiMahasiswa::create([
            'gambar' => $txt,
        ]);
        //notify()->success('NilaiMahasiswa berhasil ditambahkan!');
        return redirect()->route('NilaiMahasiswa.index')
            ->with('success', 'NilaiMahasiswa Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $NilaiMahasiswas = NilaiMahasiswa::where('id', $id)->first();
        return view('admin.NilaiMahasiswa.show', compact('NilaiMahasiswa'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $NilaiMahasiswa = NilaiMahasiswa::find($id);

        return view('admin.NilaiMahasiswa.edit', compact('NilaiMahasiswa'));
    }

    public function update(Request $request, $id)
    {


        $NilaiMahasiswa = NilaiMahasiswa::findOrFail($id);
        if (isset($request->gambar)){
            $extention = $request->gambar->extension();
            $file_name = time().'.'.$extention;
            $txt = "storage/images/". $file_name;
            $request->gambar->storeAs('public/images', $file_name);
            $NilaiMahasiswa->gambar = $txt;
        }else{}

        $NilaiMahasiswa->save();
        //notify()->success('NilaiMahasiswa berhasil diedit!');
        return redirect()->route('NilaiMahasiswa.index')
        ->with('edit', 'NilaiMahasiswa Berhasil Diedit');
    }

    public function destroy($id)
    {
        NilaiMahasiswa::where('id', $id)->delete();
        //notify()->success('NilaiMahasiswa berhasil dihapus');
        return redirect()->route('NilaiMahasiswa.index')
        ->with('delete', 'NilaiMahasiswa Berhasil Dihapus');
    }
}
