<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserExam;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserExamController extends Controller
{
    public function index()
    {
        $userexam = UserExam::all();
        // dd($userassignment);
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $userexam
        ], 200);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        // $input = new UserExam();
        // $input->grade = $request->grade;
        // $input->feedback_1 = $request->feedback1_;
        // $input->user_id = $user->id;

        // $input->save();
        if (isset($request->exam)) {
            $extention = $request->exam->extension();
            $file_exam = time() . '.' . $extention;
            $upload_exam = 'storage/exam/' . $file_exam;
            $request->exam->storeAs('public/exam', $file_exam);
            // $input_exam = $upload_exam;
        }
        else{
            $upload_exam = null;
        }

        UserExam::create([
            'exam' => $upload_exam,
            'grade' => '0',
            'user_id' => $user->id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'exam_id' => $request->exam_id,
            'isComplete' => '0',
        ]);

        return response()->json([
            "error" => false,
            "message" => "success"
        ]);
    }

    public function show($id)
    {
        return UserExam::where('id',$id)->first();
    }
}
