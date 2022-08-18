<?php

namespace App\Http\Controllers;
use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index()
    {
    $guide = Guide::all();
    return view('admin.guide.index', compact('guide'));
    }

    public function create()
    {
        return view('admin.guide.create');
    }

    public function store(Request $request)
    {
        if (isset($request->file)) {
            $extention = $request->file->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/buku_panduan/". $file_name;
            $request->file->storeAs('public/buku_panduan', $file_name);
            Guide::create([
                'judul' => $request->judul,
                'tipe' => $request->tipe,
                'file' => $txt,
    
            ]);
        }
        elseif (isset($request->thumbnail)){
            $extention = $request->thumbnail->extension();
            $file_name = time().'.'.$extention;
            $txt2 = "storage/thumbnail/". $file_name;
            $request->thumbnail->storeAs('public/thumbnail', $file_name);
            Guide::create([
                'judul' => $request->judul,
                'link' => $request->link,
                'deskripsi' => $request->deskripsi,
                'thumbnail' => $txt2,
                'tipe' => $request->tipe,
            ]);
        }
         else {
            $file_name = null;
            Guide::create([
                'judul' => $request->judul,
                'link' => $request->link,
                'deskripsi' => $request->deskripsi,
                'tipe' => $request->tipe,
            ]);
        }
        //notify()->success('Job Channel berhasil ditambahkan!');
        return redirect()->route('guide.index')
            ->with('success', 'E-Guide Berhasil Ditambahkan');

    }

    public function edit($id)
    {
        $guide = Guide::find($id);
        return view('admin.guide.edit', compact('guide'));
    }

    public function update(Request $request, $id)
    {
        $guide = Guide::findOrFail($id);
        if (isset($request->file)){
            $extention = $request->file->extension();
            $file_name = time().'.'.$extention;
            $txt = "storage/buku_panduan/". $file_name;
            $request->file->storeAs('public/buku_panduan', $file_name);
            $guide->file = $txt;
            $guide->judul = $request->judul;
            $guide->tipe = $request->tipe;
        }
        elseif (isset($request->thumbnail)){
            $extention = $request->thumbnail->extension();
            $file_name = time().'.'.$extention;
            $txt2 = "storage/thumbnail/". $file_name;
            $request->thumbnail->storeAs('public/thumbnail', $file_name);
            $guide->thumbnail = $txt2;
            $guide->judul = $request->judul;
            $guide->link = $request->link;
            $guide->deskripsi = $request->deskripsi;
            $guide->tipe = $request->tipe;
        }
        else{
            $guide->judul = $request->judul;
            $guide->deskripsi = $request->deskripsi;
            $guide->tipe = $request->tipe;
        }
        $guide->save();
        //notify()->success('Job Channel berhasil diedit!');
        return redirect()->route('guide.index')
        ->with('success', 'E-Guide Berhasil Diedit');
    }

    public function destroy($id)
    {
        Guide::where('id', $id)->delete();
        return redirect()->route('guide.index')
        ->with('success', 'E-Guide berhasil dihapus!');
    }
}
