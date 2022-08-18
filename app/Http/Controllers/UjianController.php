<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\AksesKelas;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        $ujian = Ujian::all();
        $nama = Assignment::get();
        return view('dosen.ujian.index', ['nama'=>$nama], compact('ujian', 'nama'));
    }

    public function create()
    {
        $assignment = Assignment::all();
        return view('dosen.ujian.create',compact('assignment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'bab' => 'required',
            'pengantar' => 'required',
            'soal' => 'required',
            'status' => 'required',
            'assignment_id' => 'required',
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

        Ujian::create([
            'jenis' => $request->jenis,
            'bab' => $request->bab,
            'pengantar' => $request->pengantar,
            'soal' => $txt,
            'status' => $request->status,
            'kelas_id' => $request->kelas_id,
        ]);
        return redirect()->route('assignment.show', $request->assignment_id)
            ->with('success', 'Ujian Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $ujian = Ujian::where('id', $id)->first();
        return view('dosen.ujian.show', compact('ujian'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $assignment = Assignment::all();
        $ujian = Ujian::find($id);

        return view('dosen.ujian.edit', compact('ujian','assignment'));
    }

    public function update(Request $request, $id)
    {

        $ujian = Ujian::findOrFail($id);
        $ujian->jenis = $request->jenis;
        $ujian->bab = $request->bab;  
        $ujian->pengantar = $request->pengantar;
        $ujian->status = $request->status;
        $ujian->assignment_id = $request->assignment_id;

        $ujian->save();
        return redirect()->route('ujian.index')
        ->with('edit', 'Konten Dokumen Berhasil Diedit');
    }

    public function destroy($id)
    {
        Ujian::where('id', $id)->delete();
        return redirect()->route('ujian.index')
            ->with('delete', 'Ujian Berhasil Dihapus');
    }
}
