<?php

namespace App\Http\Controllers;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Akses;
use Illuminate\Support\Facades\Auth;
use App\Models\AksesKelas;
use Illuminate\Foundation\Auth\User;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        $profil = User::all();
        return view ('admin.profil.index', compact ('profil'));
    }

    public function create()
    {
        return view ('admin.profil.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'gambar' => 'required',
        ]);
        $upload = $request->gambar;
        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = 'storage/images/'. $file_name;
            $request->gambar->storeAs('public/images', $file_name);
        } else {
            $file_name = null;
        }

        User::create([
            'name' => $request->nama,
            'no_hp' => $request->no_hp,
            'gambar' => $txt,
        ]);
        //notify()->success('Profil berhasil ditambahkan!');
        return redirect()->route('profil.index')
            ->with('success', 'Data Pengguna Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $profil = User::find($id);

        return view('admin.profil.edit', compact('profil'));
    }

    public function show($id)
    {
        return view('dosen.show');
    }

    public function update(Request $request, $id)
    {


        $profil = User::findOrFail($id);
        $profil->name = $request->name;
        $profil->no_hp = $request->no_hp;  

        if (isset($request->gambar)){
            $extention = $request->gambar->extension();
            $file_name = time().'.'.$extention;
            $request->gambar->move(public_path('assets/foto/profil'),$file_name);
            $profil->gambar = $file_name;
        }else{}

        $profil->save();
        //notify()->success('Profil berhasil diedit!');
        return redirect()->route('profil.index')
        ->with('edit', 'Profil Berhasil Diedit');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        //notify()->success('Profil berhasil dihapus!');
        return redirect()->route('profil.index')
            ->with('delete', 'Profil Berhasil Dihapus');
    }
}
