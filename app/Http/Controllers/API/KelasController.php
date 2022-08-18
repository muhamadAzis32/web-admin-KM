<?php

namespace App\Http\Controllers\API;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KelasCollection;
use App\Helpers\ResponseFormatter;
use App\Http\Resources\KelasResource;
use App\Http\Resources\KelasDetailsResource;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $que = $request->search;
        if ($que) {
            $kelas =  Kelas::where(strtolower('nama'), 'like', '%' . $que . '%')
                ->orWhere(strtolower('deskripsi'), 'LIKE', '%' . $que . '%')->all();
        } else {
            $kelas =  Kelas::all();
        }
        // return $kelas;
        return new KelasCollection($kelas->paginate(18));
    }

    public function program_kelas($id)
    {
        $kelas = Kelas::where('program_id', $id)->get();
        return new KelasCollection($kelas->paginate(18));
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
            'nama' => 'required',
            'deskripsi' => 'required',
            //'kategori' => 'required',
        ]);
        return Kelas::create($request->all());
        // return ResponseFormatter::success(null, "Program studi berhasil ditambahkan!");
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
        $kelas = Kelas::find($id);
        return new KelasDetailsResource($kelas);
        // return ResponseFormatter::success($kelas);
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
        $kelas = Kelas::find($id);
        $kelas->update($request->all());
        return $kelas;
        // return ResponseFormatter::success(null, "Program studi berhasil diedit!");
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
        return Kelas::destroy($id);
        // return ResponseFormatter::success("Program studi berhasil dihapus!");
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Kelas::where(strtolower('nama'), 'like', '%' . $name . '%')->get();
        // return ResponseFormatter::success($kelas, "Hasil pencarian program studi");
    }

    public function kelas_dokumen($id)
    {
        return Kelas::find($id)->get_dokumen;
        // return ResponseFormatter::success($kelas, "Hasil pencarian dokumen");
    }


    public function kelas_video($id)
    {
        return Kelas::find($id)->with('get_video')->get();
        // return ResponseFormatter::success($kelas, "Hasil pencarian video");
    }
}
