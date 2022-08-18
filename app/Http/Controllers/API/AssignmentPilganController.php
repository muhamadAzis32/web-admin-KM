<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentPilganSoal;
use Illuminate\Http\Request;

class AssignmentPilganController extends Controller
{
    public function index()
    {
        $assignmentPilgan = Assignment::all();
        return response()->json([
            "message" => "success",
            "data" => $assignmentPilgan,
        ], 200);
    }
    public function show($mata_kuliah,$pertemuan)
    {
        $assignmentPilgan = Assignment::where('mata_kuliah_id',$mata_kuliah)->where('pertemuan_id',$pertemuan)->get();
        return response()->json([
            "message" => "success",
            "data" => $assignmentPilgan,
        ], 200);
    }
}
