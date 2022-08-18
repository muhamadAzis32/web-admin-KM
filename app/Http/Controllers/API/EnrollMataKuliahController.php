<?php

namespace App\Http\Controllers\API;

use App\Models\EnrollMataKuliah;
use App\Models\UserDokumen;
use App\Models\UserVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserVideoResource;
use App\Http\Resources\UserDokumenResource;
use App\Http\Resources\EnrollMataKuliahResource;
use App\Http\Resources\EnrollMataKuliahCollection;
use App\Http\Resources\UserDokumenCollection;
use App\Http\Resources\UserVideoCollection;
use App\Models\EnrollStudi;
use App\Models\MataKuliah;

class EnrollMataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user       =   Auth::user();
        $enrolls       =  EnrollMataKuliah::where('user_id', $user->id)->get();
        $matchThese = [
            ['user_id', '=', $user->id],
            ['kelas_id', '=', $request->kelas],
        ];
        try{
            $enroll_kelas       =  EnrollStudi::where($matchThese)->get()->first();
            if($request->kelas){
                $mata_kuliah = $enrolls->where('enroll_studi_id', $enroll_kelas->id);
            }else{
                $mata_kuliah =  $enrolls;
            }
            return new EnrollMataKuliahCollection($mata_kuliah);
        }catch(\Exception $e){
            $success['error']  =   true;
            $success['message'] =   $e->getMessage();
            //$success['data']    =   new EnrollsResource(Enrolls::where(['kelas_id' => $kelas->id, 'user_id' => $user->id])->get());

            return response()->json($success);
        }
    }

    public function enroll($id)
    {
        $enrolls = EnrollMataKuliah::where('mata_kuliah_id', $id)->count();
        // $enrolls = EnrollStudi::all();
        return response()->json([
            "error" => false,
            "success" => true,
            "data" => $enrolls
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user   =   Auth::user();
        $validator = Validator::make($request->all(),
            [
                'mata_kuliah_id' => 'required',
            ]
        );

        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }
        $kelas = MataKuliah::find($request->mata_kuliah_id);
        if(is_null($kelas)) {
            $success['status']  =   "failed";
            $success['message'] =   "id mata kuliah tidak ditemukan";

            return response()->json($success);
        }

        $taskInput      =       array(
            'user_id'     =>      $user->id,
            'mata_kuliah_id'   =>  $kelas->id,
            'isComplete'     =>   false,
        );
        try{
            $enrolls   =  EnrollMataKuliah::create($taskInput);
        }
        catch (QueryException $e){
            $success['error']  =   true;
            $success['message'] =   $e;
            //$success['data']    =   new EnrollsResource(Enrolls::where(['kelas_id' => $kelas->id, 'user_id' => $user->id])->get());

            return response()->json($success);
        }
        
        $kontendokumen = MataKuliah::find($kelas->id)->get_dokumen;
        $kontenvideo = MataKuliah::find($kelas->id)->get_video;

        foreach ($kontendokumen as $kdokumen){
            $Input      =       array(
                'progress'     => 0,
                'user_id' => $user->id,
                //'enroll_id'    => $enrolls->id,
                'konten_dokumen_id' => $kdokumen->id,
            );
            $dokumen = new UserDokumen($Input);    
            //UserDokumen::create($Input);
            $enrolls->get_dokumen()->save($dokumen);
        }

        foreach ($kontenvideo as $kvideo){
            $Input      =       array(
                'progress'     => 0,
                'user_id' => $user->id,
                //'enroll_id'    => $enrolls->id,
                'konten_video_id' => $kvideo->id,
            );
            $video = new UserVideo($Input);  
            //UserVideo::create($Input);
            $enrolls->get_video()->save($video);
        }

        if(!is_null($enrolls)) {
            $success['error']  =   false;
            $success['status']  =   "success";
            $success['data']    =   new EnrollMataKuliahResource($enrolls);
        }
        else {
            $success['error']  =   true;
            $success['status']  =   "failed";
            $success['message'] =   "Whoops! no detail found";

            return response()->json($success);
        }

        return response()->json($success);
    }

    public function findbyid($id){
        $user       =   Auth::user();
        $enrolls       =  EnrollMataKuliah::find($id);
        $my_array1      =       array(
            'user_video' => UserVideoResource::collection($enrolls->video),
            'user_dokumen' => UserDokumenResource::collection($enrolls->dokumen),
        );
        $my_array2 = new EnrollMataKuliahResource($enrolls);
        //$res = array_merge($my_array1, $my_array2);
        return $my_array2;
    }

    // ---------------------- [ Delete Task ] --------------------------
    public function unenrolls($id) {

        $user       =       Auth::user();
        $enrolls       =    EnrollMataKuliah::findOrFail($id);
    
        if(!is_null($enrolls)) {
            if($user->id == $enrolls->user_id) {
                $response   =   EnrollMataKuliah::where('id', $id)->delete();
                $kelas = MataKuliah::find($enrolls->mata_kuliah_id);
            }
            else {
                $success['error']  =   true;
                $success['status']  =   "failed";
                $success['message'] =   "Akses ditolak";
                return response()->json($success);
            }
            if($response == 1) {
                $success['error']  =   false;
                $success['status']  =   'success';
                $success['message'] =   'Berhasil unenrolls dari course ' . $kelas->nama;
                return response()->json($success);
            }
        }
    }

    public function enrolled_dokumen()
    {
        $user       =   Auth::user();
        $enrolls       =  UserDokumen::where('user_id', $user->id)->get();
        return new UserDokumenCollection($enrolls);
    }

    public function enrolled_video()
    {
        $user       =   Auth::user();
        $enrolls       =  UserVideo::where('user_id', $user->id)->get();
        return new UserVideoCollection($enrolls);
    }
}