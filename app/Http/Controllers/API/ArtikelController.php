<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $artikel = Artikel::all();
        return response()->json([
            "error" => false,
            "message" => "Success",
            "data" => $artikel
        ], 200);
        // return ResponseFormatter::success($artikel, "Daftar artikel!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = 'storage/images/'. $file_name;
            $request->gambar->storeAs('public/images', $file_name);
        } else {
            $file_name = null;
        }

        $artikel = artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $txt,
        ]);


        return response()->json([
            "error" => false,
            "success" => true,
            "message" => "Artikel berhasil ditambahkan!",
            "data" => $artikel,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Artikel::find($id);
        // return ResponseFormatter::success($artikel, "Detail artikel!");
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
        $artikel = Artikel::find($id);
        $artikel->update($request->all());
        
        return $artikel;
        // return ResponseFormatter::success($artikel, "Artikel berhasil diperbarui!");
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
        Artikel::destroy($id);
        return response()->json([
            "error" => false,
            "message" => "Artikel berhasil dihapus!",
        ], 200);
        // return ResponseFormatter::success(null, "Artikel berhasil dihapus!");
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($judul)
    {
        return Artikel::where(strtolower('judul'), 'like', '%'.$judul.'%')->get();
        // return ResponseFormatter::success($artikel, "Hasil pencarian artikel");
    }
    public function latest_article()
    {
        $new_article = Artikel::latest()->take(4)->get();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $new_article
        ], 200);

        // return ResponseFormatter::success($new_article, "Artikel terbaru!");
    }
}
