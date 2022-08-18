<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserExamPG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserExamPGController extends Controller
{
    public function store(Request $request)
    {
        // $user = Auth::user();
        $user = User::where('id', $request->user_id)->first();
        $data = UserExamPG::create([
            'user_id' => $user->id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'exam_id' => $request->exam_id,
            'soal' => $request->soal,
            'jawaban' => $request->jawaban,
        ]);

        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $data
        ]);
    }
}
