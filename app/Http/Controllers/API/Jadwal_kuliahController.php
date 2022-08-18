<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jadwal_kuliah;
use App\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Jadwal_kuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $jadwal = null;
        if($request->has('dosen')){
            $jadwal = Jadwal_kuliah::with(['matkul', 'dosen', 'kelas'])->where('dosen_id', $request->dosen)->get();
        }else if($request->has('kelas')){
            $jadwal = Jadwal_kuliah::with(['matkul', 'dosen', 'kelas'])->where('kelas_id', $request->kelas)->get();
        }else{
            $jadwal = Jadwal_kuliah::with(['matkul', 'dosen', 'kelas'])->get();
        }

        $collection = new Collection($jadwal);

        $filtered = $collection->map(function ($item) {
            return [
                'id' => $item->id,
                'hari' => $item->hari,
                'jam_kuliah' => $item->jam_kuliah,
                'mata_kuliah' => $item->matkul->judul,
                'dosen' => $item->dosen->nama_lengkap,
                'kelas' => $item->kelas->nama,
            ];
        });

        return response()->json($filtered);
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
                'hari' => 'required',
                'jam_kuliah' => 'required',
                'matkul_id' => 'required',
                'dosen_id' => 'required',
                'kelas_id' => 'required',
            ]);
            
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $jadwal = new Jadwal_kuliah();
        $jadwal->hari = $request->hari;
        $jadwal->jam_kuliah = $request->jam_kuliah;
        $jadwal->matkul_id = $request->matkul_id;
        $jadwal->dosen_id = $request->dosen_id;
        $jadwal->kelas_id = $request->kelas_id;
        $jadwal->save();

        return response()->json([
            'success'=>'Data berhasil ditambahkan',
            'data'=>$jadwal,
        ]);
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
        $jadwal = Jadwal_kuliah::with(['matkul', 'dosen', 'kelas'])->find($id);
        return response()->json($jadwal);
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
        $validator = Validator::make($request->all(),
            [
                'hari' => 'required',
                'jam_kuliah' => 'required',
                'matkul_id' => 'required',
                'dosen_id' => 'required',
                'kelas_id' => 'required',
            ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $jadwal = Jadwal_kuliah::find($id);
        if(!$jadwal){
            return response()->json([
                'error'=>'Data tidak ditemukan',
            ]);
        }

        $jadwal->hari = $request->hari;
        $jadwal->jam_kuliah = $request->jam_kuliah;
        $jadwal->matkul_id = $request->matkul_id;
        $jadwal->dosen_id = $request->dosen_id;
        $jadwal->kelas_id = $request->kelas_id;
        $jadwal->save();

        return response()->json([
            'success'=>'Data berhasil diubah',
            'data'=>$jadwal,
        ]);
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
        $jadwal = Jadwal_kuliah::find($id);

        if(!$jadwal){
            return response()->json([
                'error'=>'Data tidak ditemukan',
            ]);
        }

        $jadwal->delete();

        return response()->json([
            'success'=>'Data berhasil dihapus',
        ]);
    }
}
