<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Pertemuan;
use App\Http\Resources\QuizResource;
use App\Http\Resources\QuizCollection;


class QuizController extends Controller
{
    public function index(Request $request)
    {
        //
        if($request->mata_kuliah){
            $quiz = Quiz::where('mata_kuliah_id', $request->mata_kuliah)->get();
        }else if($request->pertemuan){
            $quiz = Quiz::where('pertemuan_id', $request->pertemuan)->get();
        }
        else{
            $quiz = Quiz::all();
        }
        return new QuizCollection($quiz);
    }

    public function Pertemuan()
    {
        //
        $Pertemuan = Pertemuan::all();
        // dd($quiz);
        return response()->json([
            "error" => false,
            "message" => "Success",
            "data" => $Pertemuan
        ], 200);
    }

    public function show($id)
    {
        $quiz = Quiz::find($id);
        if (!$quiz) {
            return response()->json([
                "error" => false,
                "message" => "404 Not Found"
            ], 400);
            return response()->json($quiz, 200);
        }
        return new QuizResource($quiz);
    }
}
