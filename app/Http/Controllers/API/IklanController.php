<?php

namespace App\Http\Controllers\API;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() 
    {
        //return IklanResource::collection(Iklan::all());
        $iklan = Iklan::all();
        return response()->json([
            "error" => false,
            "message" => "Success",
            "data" => $iklan
        ], 200);
        // return ResponseFormatter::success($iklan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
              [
                'gambar' => 'required|mimes:jpeg,png,jpg',
             ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($request->file('gambar')) {

            //store file into document folder
            $extention = $request->gambar->extension();
            $file_name = time().'.'.$extention;
            $path = 'storage/iklan/'.$file_name;
            $request->gambar->storeAs('public/iklan', $file_name);

            //store your file into database
            $iklan = new Iklan();
            $iklan->gambar = $path;
            $iklan->save();

            return response()->json([
                "error" => false,
                "success" => true,
                'id' => $iklan->id,
                "message" => "Images successfully uploaded",
                "file" => URL::to('/') . $path
            ]);
            // return ResponseFormatter::success(["file" => $txt], "Iklan berhasil ditambahkan!");

        }
        return Iklan::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iklan = Iklan::find($id);

        if(!$iklan) {
            return response()->json([
                "error" => true,
                "message" => "Iklan tidak ditemukan!"
            ], 404);
        }

        if(!File::exists($iklan->gambar)) {
            return response()->json([
                "error" => true,
                "message" => "Gambar iklan tidak ditemukan!"
            ], 404);
        }

        $url = URL::to('/').'/'.$iklan->gambar;
        return redirect($url);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iklan = Iklan::find($id);
        if(!$iklan) {
            return response()->json([
                "error" => true,
                "message" => "Iklan tidak ditemukan!"
            ], 404);
        }

        if(File::exists($iklan->gambar)) {
            File::delete(public_path($iklan->gambar));
        }
        $iklan->delete();
        return response()->json([
            "error" => false,
            "success" => true,
            "message" => "Iklan berhasil dihapus!"
        ]);
    }
}