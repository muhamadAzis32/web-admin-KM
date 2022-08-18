<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UjianKuliah;
use App\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UjiankuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $ujian = null;
        if(request()->has('dosen')){
            $ujian = UjianKuliah::with(['matkul', 'dosen', 'kelas', 'mahasiswa'])->where('dosen_id', $request->dosen)->get();
        }else if(request()->has('kelas')){
            $ujian = UjianKuliah::with(['matkul', 'dosen', 'kelas', 'mahasiswa'])->where('kelas_id', $request->kelas)->get();
        }else{
            $ujian = UjianKuliah::with(['matkul', 'dosen', 'kelas', 'mahasiswa'])->get();
        }

        $collection = new Collection($ujian);

        $filtered = $collection->map(function ($item) {
            return [
                'id' => $item->id,
                'deadline' => $item->deadline,
                'mahasiswa' => $item->mahasiswa->nama_lengkap,
                'tanggal_ujian' => $item->tanggal_ujian,
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
                'deadline' => 'required',
                'tanggal_ujian' => 'required',
                'matkul_id' => 'required',
                'dosen_id' => 'required',
                'kelas_id' => 'required',
                'mahasiswa_id' => 'required',
            ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $ujian = UjianKuliah::create([
            'deadline' => $request->deadline,
            'tanggal_ujian' => $request->tanggal_ujian,
            'matkul_id' => $request->matkul_id,
            'dosen_id' => $request->dosen_id,
            'kelas_id' => $request->kelas_id,
            'mahasiswa_id' => $request->mahasiswa_id,
        ]);

        return response()->json($ujian);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ujian = UjianKuliah::with(['matkul', 'dosen', 'kelas', 'mahasiswa'])->find($id);

        return response()->json($ujian);
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
        $ujian = UjianKuliah::find($id);

        $ujian->update($request->all());

        return response()->json($ujian);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ujian = UjianKuliah::find($id);

        $ujian->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'error' => false
        ]);
    }
}
