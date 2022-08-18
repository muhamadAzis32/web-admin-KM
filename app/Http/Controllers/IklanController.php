<?php

namespace App\Http\Controllers;
use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Akses;
use App\Models\AksesKelas;

class IklanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        $iklan = Iklan::all();
        return view('admin.iklan.index', compact('iklan'));
    }

    public function create()
    {
     
        return view('admin.iklan.tambah');
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

        iklan::create([
            'gambar' => $txt,
        ]);
        //notify()->success('Iklan berhasil ditambahkan!');
        return redirect()->route('iklan.index')
            ->with('success', 'Iklan Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $iklans = iklan::where('id', $id)->first();
        return view('admin.iklan.show', compact('iklan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $iklan = iklan::find($id);

        return view('admin.iklan.edit', compact('iklan'));
    }

    public function update(Request $request, $id)
    {


        $iklan = iklan::findOrFail($id);
        if (isset($request->gambar)){
            $extention = $request->gambar->extension();
            $file_name = time().'.'.$extention;
            $txt = "storage/images/". $file_name;
            $request->gambar->storeAs('public/images', $file_name);
            $iklan->gambar = $txt;
        }else{}

        $iklan->save();
        //notify()->success('Iklan berhasil diedit!');
        return redirect()->route('iklan.index')
        ->with('edit', 'Iklan Berhasil Diedit');
    }

    public function destroy($id)
    {
        iklan::where('id', $id)->delete();
        //notify()->success('Iklan berhasil dihapus');
        return redirect()->route('iklan.index')
        ->with('delete', 'Iklan Berhasil Dihapus');
    }
}
