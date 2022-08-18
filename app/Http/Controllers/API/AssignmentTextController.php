<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignmentText;

class AssignmentTextController extends Controller
{
    public function index()
    {
        $assignmentText = AssignmentText::all();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $assignmentText
        ], 200);
    }
}
