<?php

namespace App\Http\Controllers\API;

use App\Models\KontenVideo;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserDokumen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\UserVideo;

class UserVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return KontenVideo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'judul' => 'required',
    //         'deskripsi' => 'required',
    //         'link' => 'required',
    //         'bab' => 'required',
    //         'kelas_id' => 'required',
    //     ]);
    //     return KontenVideo::create($request->all());
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return KontenVideo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user       =       Auth::user();
        $validator      =            Validator::make($request->all(),
            [
                'id' =>         'required',
                'progress' =>         'required',
                'isComplete' =>         'required',
            ]
        );
        $inputData      =       array(
            'progress'        =>      $request->progress,
            'isComplete'      =>      $request->isComplete,  
        );

        $video      =   UserVideo::where('id', $id)->where('user_id', $user->id)->update($inputData);
        
        if($video == 1) {
            $success['error']      =       false;
            $success['message']     =       "Progres video telah diperbaharui menjadi ". $request->progress ."%";
        }

        else {
            $success['error']      =       true;
            $success['message']     =       "Failed to update the task please try again";
        }
        
        return response()->json($success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return KontenVideo::destroy($id);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return KontenVideo::where(strtolower('judul'), 'like', '%'.$name.'%')->get();
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'kategori',
            'link' => 'required',
            'bab' => 'required',
        ]);
        $kelas = Kelas::find($id);
        $video = new KontenVideo();
        $video->judul = $request->judul;
        $video->deskripsi = $request->deskripsi;
        $video->kategori = $request->kategori;
        $video->link = $request->link;
        $video->bab = $request->bab;
        $kelas->get_video()->save($video);

        return response()->json([
            "success" => true,
            "message" => "Video is successfully added",
        ]);
    }

    public function jumlah_video($id){

        return KontenVideo::where('kelas_id',$id)->count();
    }
}

