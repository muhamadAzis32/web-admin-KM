<?php

namespace App\Http\Controllers\API;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MataKuliahResource;
use App\Http\Resources\MataKuliahCollection;
use App\Http\Resources\UserStudy;
use App\Models\Pertemuan;
use App\Models\UserDokumen;
use App\Models\UserVideo;
use App\Support\Collection;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->kelas){
            $mata_kuliah = MataKuliah::where('kelas_id', $request->kelas)->get();
        }else{
            $mata_kuliah =  MataKuliah::all();
        }
        return new MataKuliahCollection($mata_kuliah);
        
        // return response()->json([
        //     "status" => "success",
        //     "data" => $mata_kuliah
        // ], 200);
    }

    public function show($id)
    {
        $meet = MataKuliah::find($id);
        return new MataKuliahResource($meet);
    }

    public function userModule($id){
        $id = 1;
        $user_id = 7;
        $meet = Pertemuan::with('mataKuliah')->where('mata_kuliah_id', $id)->first();
        $video = $meet->kontenVideo_id;
        $dokumen = $meet->kontenDokumen_id;
        $user_video = UserVideo::where('user_id', $user_id)->where('enroll_mata_kuliah_id', 1)->get();
        $user_dokumen = UserDokumen::where('user_id', $user_id)->where('enroll_mata_kuliah_id', 1)->get();

        // $data = new Collection([
        //     $meet, $video, $dokumen, $user_video, $user_dokumen
        // ]);

        return new UserStudy($meet);
    }
}
