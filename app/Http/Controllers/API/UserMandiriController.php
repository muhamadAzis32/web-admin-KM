<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserMandiri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMandiriController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        if (isset($request->tugas_mandiri)) {
            $extention = $request->tugas_mandiri->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/userMandiri/". $file_name;
            $request->tugas_mandiri->storeAs('public/userMandiri', $file_name);
            $data = UserMandiri::create([
                'tugas_mandiri' => $txt,
                'user_id' => $user->id,
                'mata_kuliah_id' => $request->mata_kuliah_id,
                'pertemuan_id' => $request->pertemuan_id,
                'isComplete' => true,
            ]);
        }
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $data
        ]);
    
    }
}
