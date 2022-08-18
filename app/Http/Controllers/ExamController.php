<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Exam;
use App\Models\MataKuliah;
use App\Models\AksesKelas;
use App\Models\UserExam;
use App\Models\Kalender;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }

    public function index()
    {
        return view('admin.mata_kuliah.show');
    }

    public function create($id)
    {
        $mataKuliah = MataKuliah::where('id', $id)->first();
        // $matakuliahselect = MataKuliah::where('id', $id)->get();
        return view('admin.ujian.tambah',compact('mataKuliah'));

    }

    public function store(Request $request)
    {
        // $mataKuliah = MataKuliah::where('id', $id)->get();
        $request->validate([
            'judul' => 'required',
            'mata_kuliah_id' => 'required',
            'file' => 'nullable',
            'deskripsi' => 'required',
            'jenis'     => 'required',
            'deadline' => 'required'
        ]);

        if (isset($request->file)) {
            $extention = $request->file->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/exam/". $file_name;
            $request->file->storeAs('public/exam', $file_name);
            
        } else {
               $txt = NULL;
        }
        Exam::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
            'file' => $txt,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'deadline' => $request->deadline,
            // 'user_id' => $request->user_id,
        ]);
        Kalender::create([
            'judul' => $request->judul,
            'deadline' => $request->deadline,
            'user_id' => Auth::user()->id,
            'tipe' => 'ujian',
            'color' => 'bg-gradient-primary',
        ]);

        return redirect()->route('mataKuliah.show',$request->mata_kuliah_id)
                ->with('success', 'Ujian Berhasil Ditambah');
    }
 
        public function show($id)
        {
            $ujian = Exam::where('id', $id)->first();
            $user = UserExam::all();
            $remed = UserExam::where('exam_id', $id)->where('tipe', 'remed')->get();
            // $user = UserExam::where('exam_id', $id);
            return view('admin.ujian.show', compact('ujian', 'user', 'remed'));
        }

        public function destroy($id)
        {
            Exam::where('id', $id)->delete();
            
            return redirect()->back()
                ->with('delete', 'Ujian Berhasil Dihapus');
        }

        public function isremed(Request $request, $id)
        {
            UserExam::where('exam_id', $id)->where('grade', '<', 55)->update(['isremed'=>true]);

            return redirect()->back()
            ->with('success', 'Berhasil memberi akses remedial');
        }

        public function storeExam(Request $request, $id)
        {
            $userExam = UserExam::findOrFail($id);
            $userExam->grade = $request->grade;
            $userExam->feedback_1 = $request->feedback_1;
            $userExam->feedback_2 = $request->feedback_2;
            $userExam->feedback_3 = $request->feedback_3;
            $userExam->grade_1 = $request->grade_1;
            $userExam->grade_2 = $request->grade_2;
            $userExam->grade_3 = $request->grade_3;
            $userExam->isComplete = true;
            $userExam->save();
            // dd($assignment);
            return redirect()->back()
            ->with('success', 'Berhasil memberi Nilai');
        }

        public function showUserExam($id)
        { 
            $userExam = UserExam::find($id);
            // dd($userExam);
            return view('admin.ujian.show-UserExam', compact('userExam'));
        }
}
