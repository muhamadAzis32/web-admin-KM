<?php

namespace App\Http\Controllers\API;

use App\Models\Pertemuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PertemuanResource;
use App\Http\Resources\PertemuanCollection;

class PertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->mata_kuliah){
            $meet = Pertemuan::where('mata_kuliah_id', $request->mata_kuliah)->get();
        }else{
            $meet =  Pertemuan::all();
        }
        return new PertemuanCollection($meet);
    }

    public function pertemuan_matkul($id)
    {
        $pertemuan = Pertemuan::where($id, 'mata_kuliah_id')->get();
        return new PertemuanCollection($pertemuan);
    }

    public function findbyid($id)
    {
        $meet = Pertemuan::find($id);
        return new PertemuanResource($meet);
    }

}
