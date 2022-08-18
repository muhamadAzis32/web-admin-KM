<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DiscussionForum;
use App\Models\DiscussionReply;
use App\Models\DiscussionReply2;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class DiscussionReply2Controller extends Controller
{
    public function index($id)
    {
        $reply = DiscussionReply2::where('discussion_reply_id', $id)->get();
        return response()->json([
            "error" => false,
            "status" => "success",
            "data" => $reply
        ],200);
        // return ResponseFormatter::success($reply);
    }

    public function store(Request $request)
    {

        $input = new DiscussionReply2();
        $user = Auth::user();
        $input->discussion_reply_id = $request->discussion_reply_id;
        $input->isi = $request->isi;
        $input->user_id = $user->id;

        $input->save();
        
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $input
        ],200);
        // return ResponseFormatter::success(null, "Komentar berhasil ditambahkan!");
    }

    public function update(Request $request, $id) 
    {
        $DiscussionReply2 = DiscussionReply2::findOrFail($id);
        $DiscussionReply2->isi = $request->isi;
        $DiscussionReply2->save();

        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $DiscussionReply2
        ]);
        // return ResponseFormatter::success(null, "Komentar berhasil diedit!");
    }

    public function destroy($id) 
    {
        DiscussionReply2::where('id', $id)->delete();
        return response()->json([
            "error" => false,
            "message" => "success"
        ],200);
        // return ResponseFormatter::success(null, "Komentar berhasil dihapus!");
    }

}
