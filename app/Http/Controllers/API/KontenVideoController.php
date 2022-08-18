<?php

namespace App\Http\Controllers\API;

use App\Models\KontenVideo;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KontenVideoCollection;
use App\Helpers\ResponseFormatter;

class KontenVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //$video =  KontenVideo::find(1);
        if($request->mata_kuliah){
            $mata_kuliah = KontenVideo::where('mata_kuliah_id', $request->mata_kuliah)->get();
        }else{
            $mata_kuliah =  KontenVideo::all();
        }
        return new KontenVideoCollection($mata_kuliah);
        // return ResponseFormatter::success($video);
        // return new ItemResource($video);

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
        // return ResponseFormatter::success($video);
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
        //
        $video = KontenVideo::find($id);
        $video ->update($request->all());
        return $video;
        // return ResponseFormatter::success($video, "Konten video berhasil diedit!");
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
        // return ResponseFormatter::success(null, "Konten video berhasil dihapus");

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
        // return ResponseFormatter::success($video, "Hasil pencarian konten video");
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
            "error" => false,
            "success" => true,
            "message" => "File successfully uploaded"
        ]);
        // return ResponseFormatter::success(null, "Konten video berhasil ditambahkan");
    }

    public function jumlah_video($id){

        return KontenVideo::where('kelas_id',$id)->count();
        // return ResponseFormatter::success($video);
    }
}

