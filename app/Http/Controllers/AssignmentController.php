<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;
use App\Models\Kelas;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\Storage;
use App\Models\Pertemuan;
use App\Imports\AssignmentPilganImport;
use App\Models\Kalender;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;
use App\Models\Akses;
use App\Models\AksesKelas;

// class AssignmentController extends Controller
// {
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }

//     public function index()
//     {
//         //$assignment = Assignment::all();
//         //$kelas = Kelas::all();
//         $assignmentFile = AssignmentFile::all();
//         $assignmentPilgan = AssignmentPilgan::all();
//         $assignmentText = AssignmentText::all();
//         return view('dosen.assignment.index', compact('assignmentFile','assignmentPilgan', 'assignmentText'));
//     }

//     public function create()
//     {
//         return view('dosen.assignment.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'nama' => 'required',
//             'deskripsi' => 'required',
//         ]);
//         Assignment::create([
//             'nama' => $request->nama,
//             'deskripsi' => $request->deskripsi,
//         ]);
//         
//         return redirect()->route('assignment.index')
//             ->with('success', 'Assignment Berhasil Ditambahkan');
//     }

//     public function show($id)
//     {
//         $assignment = Assignment::where('id', $id)->first();
//         $assignmentFile = AssignmentFile::where('assignment_id', $id)->get();
//         $assignmentPilgan = AssignmentPilgan::where('assignment_id', $id)->get();
//         $assignmentText = AssignmentText::where('assignment_id', $id)->get();
//         $assignmentselect = Assignment::all();
//         return view('dosen.assignment.show', compact('assignment','assignmentFile','assignmentPilgan','assignmentText','assignmentselect'));
//     }

//     public function edit($id)
//     {
//         $assignment = Assignment::find($id);
//         return view('dosen.assignment.edit', compact('assignment'));
//     }

//     public function update(Request $request, $id)
//     {
//         $assignment= Assignment::findOrFail($id);
//         $assignment->nama = $request->nama;
//         $assignment->deskripsi = $request->deskripsi;
//         $assignment->save();
//         
//         return redirect()->route('assignment.index')
//         ->with('edit', 'Assignment Berhasil Diedit');
//     }

//     public function destroy($id)
//     {
//         Assignment::where('id', $id)->delete();
//         
//         return redirect()->route('assignment.index')
//             ->with('delete', 'Assignment Berhasil Dihapus');
//     }
// }

class AssignmentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        $assignment = Assignment::all();
        
        //$kelas = kelas::get();
        //$assignment = Assignment::get();
        
    }

    public function create($id)
    {
        $MataKuliah = MataKuliah::all();
        $pertemuan = Pertemuan::where('matkul_id', $id)->get();
        return view('dosen.assignment.file.create',compact('mataKuliah', 'pertemuan'));
    }


    public function viewstoreFile($id)
    {
        $kelas = Kelas::find($id);
        $assignment = Assignment::all();
        $mata_kuliah = MataKuliah::where('id', $id)->first();
        $pertemuan = Pertemuan::where('mata_kuliah_id', $id)->get();
        return view('admin.assignment.create_file',compact('kelas', 'assignment', 'pertemuan', 'mata_kuliah'));
    }

    public function tambahAssignmentText($id)
    {
        $kelas = Kelas::find($id);
        $assignment = Assignment::all();
        $mata_kuliah = MataKuliah::where('id', $id)->first();
        $pertemuan = Pertemuan::where('mata_kuliah_id', $id)->get();
        return view('admin.assignment.create_text',compact('kelas', 'assignment', 'pertemuan', 'mata_kuliah'));
    }



    public function tambahKuis($id)
    {
        $kelas = Kelas::find($id);
        $assignment = Assignment::all();
        return view('admin.assignment.create_kuis',compact('kelas', 'assignment'));
    }

    public function store(Request $request) 
    {
        // $upload = $request->file;
        $request->validate([
            'file' => 'nullable'
        ]);
        
        if (isset($request->file)) {
            $extention = $request->file->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/assignments/". $file_name;
            $request->file->storeAs('public/assignments', $file_name);
            Assignment::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'deadline' => $request->deadline,
                'jenis' => $request->jenis,
                'pertemuan_id' => $request->pertemuan_id,
                'file' => $txt,
                'mata_kuliah_id' => $request->mata_kuliah_id,
                'user_id' => Auth::user()->id, 
            ]);
            
        return redirect()->back()
        ->with('success', 'assignment File Berhasil Ditambah');

        } else {
            Assignment::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'deadline' => $request->deadline,
                'jenis' => $request->jenis,
                'pertemuan_id' => $request->pertemuan_id,
                'mata_kuliah_id' => $request->mata_kuliah_id,
                'user_id' => Auth::user()->id,
            ]);

            Kalender::create([
                'judul' => $request->judul,
                'deadline' => $request->deadline,
                'user_id' => Auth::user()->id,
                'tipe' => 'assignment',
                'color' => 'bg-gradient-primary',
            ]);
        }


        return redirect()->back()
        ->with('success', 'assignment Text Berhasil Ditambah');
    }

    public function storeAssignmentText(Request $request) 
    {
        Assignment::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'pertemuan_id' => $request->pertemuan_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('kelas.show',$request->kelas_id)
        ->with('success', 'assignment Text Berhasil Ditambah');
    }

    public function storeAssignmentPilgan(Request $request, $id) 
    {
        Assignment::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'pertemuan_id' => $request->pertemuan_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('showPilgan',$id)
        ->with('success', 'assignment Pilihan ganda Berhasil Ditambah');
    }

    public function tambahAssignmentPilgan($id)
    {
        $MataKuliah = MataKuliah::find($id);
        $assignment = Assignment::all();
        $mata_kuliah = MataKuliah::where('id', $id)->first();
        $pertemuan = Pertemuan::where('mata_kuliah_id', $id)->get();
        return view('admin.assignment.create_pilgan',compact('MataKuliah', 'assignment', 'pertemuan', 'mata_kuliah'));
    }

    // public function importAssignmentPilgan(Request $request)
    // {

    //     //$assignmentPilgan = AssignmentPilgan::all();
    //     $this->validate($request, [
    //         'file' => 'required|mimes:csv,xls,xlsx',
    //     ]);

    //     //$assignmentPilgan = new AssignmentPilgan();
    //     $file = $request->file('file');
    //     $judul = $request->judul;
    //     $deskripsi = $request->deskripsi;
    //     $deadline = $request->deadline;
    //     $pertemuan_id = $request->pertemuan_id;
    //     $mata_kuliah_id = $request->mata_kuliah_id;
    //     $file_name = rand() . $file->getClientOriginalName();
    //     $file->storeAs('public/AssignmentPilgan', $file_name);
    //     // dd($pertemuan_id, $mata_kuliah_id, $file);
    //     Excel::import(new AssignmentPilganImport($judul, $deskripsi, $deadline, $pertemuan_id, $mata_kuliah_id), public_path('/storage/AssignmentPilgan/' . $file_name));
    //     Storage::delete("public/AssignmentPilgan/$file_name");
    //     // dd($soal_id);

    //     return redirect()->back()
    //         ->with('success', 'assignment Pilgan Berhasil diimport');
    // }

    public function destroy($id)
    {
        Assignment::where('id', $id)->delete();
        
        return redirect()->back()
            ->with('delete', 'Assignment Berhasil Dihapus');
    }

}


