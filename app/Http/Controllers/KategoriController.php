<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\KontenDokumen;
use App\Models\KontenVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\AksesKelas;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
            // 'kategori' => 'required',
        ]);
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            // 'kategori' => $request->kategori,
        ]);
        //notify()->success('Kategori berhasil ditambahkan!');
        return redirect()->route('kategori.index')
            ->with('success', 'Skill Level Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $Kategori = Kategori::where('id', $id)->first();
        $kontenDokumen = kontenDokumen::where('Kategori_id', $id)->get();
        $kontenVideo = kontenVideo::where('Kategori_id', $id)->get();
        $Kategoriselect = Kategori::all();
        // dd($kontenVideo);
        return view('admin.kategori.show', compact('kategori','kontenDokumen','kontenVideo','Kategoriselect'));
    }


    public function edit($id)
    {
        $kategori = Kategori::find($id);
 
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $Kategori = Kategori::findOrFail($id);
        $Kategori->nama_kategori = $request->nama_kategori;
        $Kategori->deskripsi = $request->deskripsi;
        // $Kategori->kategori = $request->kategori;
        $Kategori->save();
        //notify()->success('Kategori berhasil diedit!');
        return redirect()->route('kategori.index')
        ->with('edit', 'Kategori Berhasil Diedit');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id)->delete();
        // dd($kategori);
        //notify()->success('Kategori berhasil dihapus!');
        return redirect()->route('kategori.index')
            ->with('delete', 'Skill Level Berhasil Dihapus');
    }
}
