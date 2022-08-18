<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DiscussionLike2;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class DiscussionLike2Controller extends Controller
{
    public function index($id)
    {
        $like = DiscussionLike2::where('discussion_reply_id', $id)->get();
        return response()->json([
            "error" => false,
            "status" => "success",
            "data" => $like
        ],200);
        // return ResponseFormatter::success($like);
    }

    public function store(Request $request)
    {

        $user = Auth::user();
        $input = new DiscussionLike2();
        $input->discussion_reply_id = $request->discussion_reply_id;
        $input->isLike = $request->isLike;
        $input->user_id = $user->id;

        $input->save();
        
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $input
        ],200);
    }

    public function update(Request $request, $id) 
    {
        $DiscussionLike2 = DiscussionLike2::findOrFail($id);
        $DiscussionLike2->isLike = $request->isLike;
        $DiscussionLike2->save();

        
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $DiscussionLike2
        ],200);
        // return ResponseFormatter::success(null, "Like berhasil diedit!");
    }

    public function destroy($id) 
    {
        DiscussionLike2::where('id', $id)->delete();
        return response()->json([
            "error" => false,
            "message" => "success"
        ],200);
        // return ResponseFormatter::success(null, "Like berhasil dihapus!");
    }
}

