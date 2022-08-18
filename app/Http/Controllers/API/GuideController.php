<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function buku_panduan()
    {
        $guide = Guide::where('tipe', 'Buku Panduan')->get();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $guide
        ], 200);
    }

    public function view($id)
    {
        $guide = Guide::find($id)->where('tipe', 'Buku Panduan')->first();
        $lst = explode('/', $guide->file);
        $txt = 'api/view/'.$lst[2];
        return redirect($txt);
    }

    public function video_panduan(Request $request)
    {
        $host = $request->getSchemeAndHttpHost();
        $guide = Guide::where('tipe', 'Video Panduan')->get();
        $thumbnail = Guide::select('thumbnail')->get();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $guide,
            "thumbnail" =>$host.'/'.$thumbnail,
        ], 200);
    }

    public function kamus_kg()
    {
        $guide = Guide::where('tipe', 'Kamus KG')->get();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $guide
        ], 200);
    }
}
