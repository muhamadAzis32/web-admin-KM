<?php

namespace App\Http\Controllers;

use App\Imports\ExamPilganImport;
use App\Models\MataKuliah;
use App\Models\ExamPilgan;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\AksesKelas;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use App\Models\Kalender;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class ExamPilganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }

    public function create()
    {
        $matakuliah = MataKuliah::all();
        return view('dosen.exam.pilgan.create',compact('matakuliah'));

    }

    public function ExamPilganImport(Request $request)
    {

        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        $file = $request->file('file');

        $input      =       array(
            'judul'    =>      $request->judul,
            'deskripsi'     =>      $request->deskripsi,
            'jenis'         => $request->jenis,
            'mata_kuliah_id'    =>      $request->mata_kuliah_id,
            'deadline'  =>     $request->deadline,
            // 'user_id'    =>      Auth::user()->id,
        );
        Kalender::create([
            'judul' => $request->judul,
            'deadline' => $request->deadline,
            'user_id' => Auth::user()->id,
            'tipe' => 'assignment',
            'color' => 'bg-gradient-danger',
        ]);
        $examPilgan = ExamPilgan::create($input);

        $file_name = rand() . $file->getClientOriginalName();
        $file->storeAs('public/ExamPIlgan', $file_name);
        Excel::import(new ExamPilganImport($examPilgan->id), public_path('/storage/ExamPilgan/' . $file_name));
        Storage::delete("public/ExamPilgan/$file_name");
        return redirect()->route('mataKuliah.show', $request->mata_kuliah_id)
            ->with('success', 'Exam Pilgan Berhasil diimport');
    }

        public function destroy($id)
        {
            ExamPilgan::where('id', $id)->delete();
            
            return redirect()->back()
                ->with('delete', 'Exam Pilgan Berhasil Dihapus');
        }
}
