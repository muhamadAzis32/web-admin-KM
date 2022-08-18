<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataDosen;
use Illuminate\Http\Request;

class DataDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DataDosen::all('id', 'nama_lengkap',  'no_hp', 'alamat', 'nidn');
        //return DataDosen::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $result = DataDosen::create([
            'tipe' => $request->tipe,
            'detail_dosen' => $request->detail_dosen,
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'nidn' => $request->nidn,
            'ktp' => $request->ktp,
            'user_id' => $request->user_id,
            'isVerified' => $request->isVerified,
        ]);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan',
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'Data gagal ditambahkan'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataDosen  $dataDosen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = DataDosen::find($id);
        if ($result) {
            return $result;
        } else {
            return response()->json(['success' => false, 'message' => 'Data gagal ditemukan'], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataDosen  $dataDosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataDosen $dataDosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataDosen  $dataDosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = DataDosen::destroy($id);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'Data gagal dihapus'], 400);
        }
    }
}
