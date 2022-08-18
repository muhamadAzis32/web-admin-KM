<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DiscussionForum;
use App\Models\DiscussionReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class DiscussionReplyController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index($id)
    {
        $reply = DiscussionReply::where('discussion_id', $id)->get();
        // dd(Auth::user()->id);
        return response()->json([
            "error" => false,
            "status" => "success",
            "data" => $reply
        ], 200);
        // return ResponseFormatter::success($reply);
    }

    public function store(Request $request)
    {

        $input = new DiscussionReply();
        $user       =   Auth::user();
        $input->discussion_id = $request->discussion_id;
        $input->isi = $request->isi;
        $input->user_id = $user->id;

        $input->save();

        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $input
        ], 200);
        // return ResponseFormatter::success(null, "Komentar berhasil ditambahkan!");
    }

    public function update(Request $request, $id)
    {
        $DiscussionReply = DiscussionReply::findOrFail($id);
        $DiscussionReply->isi = $request->isi;

        $DiscussionReply->save();

        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $DiscussionReply
        ]);
        // return ResponseFormatter::success(null, "Komentar berhasil diedit!");
    }

    public function destroy($id)
    {
        DiscussionReply::where('id', $id)->delete();
        return response()->json([
            "error" => false,
            "message" => "success"
        ], 200);
        // return ResponseFormatter::success(null, "Komentar berhasil dihapus!");
    }
}
