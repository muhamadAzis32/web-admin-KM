<?php

namespace App\Http\Controllers\API;

use App\Helpers\Helper;
use App\Models\Nilai;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\MataKuliah;
use App\Models\NilaiQuiz;
use App\Models\Quiz;
use App\Models\UserAssignment;
use App\Models\UserExam;
use App\Models\UserQuiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NilaiController extends Controller
{

    public function gradeAssignment($id)
    {
        $user = Auth::user();
        $matkul = MataKuliah::find($id);
        $count = UserAssignment::where('user_id', $user->id)->where('mata_kuliah_id',$id)->count();
        $grade = UserAssignment::where('user_id', $user->id)->where('mata_kuliah_id',$id)->sum('grade');
        if ($count != NULL){
            $total = $grade / $count;
        }
        else {
            $total = NULL;
        }
        
        $data = [
            'mata_kuliah' => $matkul->judul,
            'total' => $total
        ];

        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $data
        ], 200);
    }

    public function gradeQuiz($id)
    {
        $user = Auth::user();
        $matkul = MataKuliah::find($id);
        $count = NilaiQuiz::where('user_id', $user->id)->where('mata_kuliah_id',$id)->count();
        $grade = NilaiQuiz::where('user_id', $user->id)->where('mata_kuliah_id',$id)->sum('grade');
        if ($count != NULL){
            $total = $grade / $count;
        }
        else {
            $total = NULL;
        }
        $data = [
            'mata_kuliah' => $matkul->judul,
            'total' => $total
        ];
        
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $data
        ], 200);
    }

    public function nilaiQuiz(Request $request)
    {
        $user = Auth::user();
        $nilai = NilaiQuiz::create([
            'user_id' => $user->id,
            'grade' => $request->grade,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'quiz_id' => $request->quiz_id,
            'isComplete' => 1
        ]);

        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $nilai
        ]);

    }

    public function gradeUts($id)
    {
        $user = Auth::user();
        $uts = UserExam::select('mata_kuliah.id','mata_kuliah.judul','user_exam.*')->join('mata_kuliah','user_exam.mata_kuliah_id','mata_kuliah.id')->where('user_id', $user->id)->where('tipe', 'uts')->where('mata_kuliah_id',$id)->get();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $uts
        ], 200);
    }

    public function gradeUas($id)
    {
        $user = Auth::user();
        $uas = UserExam::select('mata_kuliah.id','mata_kuliah.judul','user_exam.*')->join('mata_kuliah','user_exam.mata_kuliah_id','mata_kuliah.id')->where('user_id', $user->id)->where('tipe', 'uas')->where('mata_kuliah_id',$id)->get();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $uas
        ], 200);
    }

    public function nilaiAkhir($matkul)
    {
        $user = Auth::user();
        $matakuliah = MataKuliah::find($matkul);
        $UserAssignment = UserAssignment::where('user_id',$user->id)->where('mata_kuliah_id',$matkul)->get();
        $UserExam = UserExam::where('user_id',$user->id)->where('mata_kuliah_id',$matkul)->get();
        $NilaiQuiz = NilaiQuiz::where('user_id',$user->id)->where('mata_kuliah_id',$matkul)->get();

        $nilaiuts = $UserExam->where('tipe','uts')->first();
        $nilaiuas = $UserExam->where('tipe','uas')->first();

        $dataquiz = Quiz::where('mata_kuliah_id',$matkul)->count();
        $jumlahquiz = $NilaiQuiz->sum('grade');
        $avgquiz = $jumlahquiz/$dataquiz;

        $dataassignment = Assignment::where('mata_kuliah_id',$matkul)->count();
        $jumlahassignment = $UserAssignment->sum('grade');
        $avgassignment = $jumlahassignment/$dataassignment;  

        $avgtugas1 = $avgassignment * 25 / 100;
        $avgquiz1 = $avgquiz * 10 / 100;
        if ($nilaiuts->grade != NULL){
            $avguts1 = $nilaiuts->grade * 30 / 100;
        }
        else{
            $avguts1 = 0;
        }
        if ($nilaiuas->grade != NULL){
            $avguas1 = $nilaiuas->grade * 35 / 100;
        }
        else{
            $avguas1 = 0;
        }

        $nilaiakhir = $avgtugas1 + $avgquiz1 + $avguts1 + $avguas1;
        
        $variabel = Helper::variabel_nilai($nilaiakhir);

        return response()->json([
            "error" => false,
            "message" => "success",
            "nilai" => $nilaiakhir,
            "grade" => $variabel
        ], 200);
    }
}
