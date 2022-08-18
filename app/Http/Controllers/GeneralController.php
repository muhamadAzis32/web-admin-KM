<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserStudy;
use App\Models\MataKuliah;
use App\Models\Pertemuan;
use App\Models\UserDokumen;
use App\Models\UserVideo;
use App\Support\Collection;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function testApi(){
        $id = 1;
        $user_id = 7;
        $meet = Pertemuan::with('mataKuliah')->where('mata_kuliah_id', $id)->first();
        $video = $meet->kontenVideo_id;
        $dokumen = $meet->kontenDokumen_id;
        $user_video = UserVideo::where('user_id', $user_id)->where('enroll_mata_kuliah_id', 1)->get();
        $user_dokumen = UserDokumen::where('user_id', $user_id)->where('enroll_mata_kuliah_id', 1)->get();

        $data = new Collection([
            $meet, $video, $dokumen, $user_video, $user_dokumen
        ]);
        dd($data);
    }
}
