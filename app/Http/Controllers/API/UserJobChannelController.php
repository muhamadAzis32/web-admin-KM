<?php

namespace App\Http\Controllers\API;
use App\Models\UserJobChannel;
USE Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserJobChannelController extends Controller
{
    public function store(Request $request)
    {
        $user   =   Auth::user();
        $input = new UserJobChannel();
        if ($files = $request->file('cv')) {

            //store file into document folder
            $extention = $request->cv->extension();
            $file_name = time() . '.' . $extention;
            $txt = 'storage/cv/' . $file_name;
            $request->cv->storeAs('public/cv', $file_name);
            $input->cv = $txt;
        }

        $input->job_id = $request->job_id;
        $input->no_telp = $request->no_telp;
        $input->user_id = $user->id;
        $input->approve = false;

        $input->save();
        return response()->json([
            "error" => false,
            "message" => "success"
        ]);
    }
}
