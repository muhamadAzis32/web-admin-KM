<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Leaderboard;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        //
        $leaderboard = Leaderboard::all();
        return response()->json([
            "error" => false,
            "message" => "Success",
            "data" => $leaderboard
        ], 200);
        // return ResponseFormatter::success($artikel, "Daftar artikel!");
    }
}
