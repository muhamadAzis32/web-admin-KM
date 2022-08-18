<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profil = User::get(['id', 'name', 'gambar', 'no_hp']);
        return response()->json([
            "error" => false,
            "message" => "Success",
            "data" => $profil
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        return User::find($id);
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
        $artikel = Profil::find($id);
        $artikel ->update($request->all());
        return $artikel;
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
        return Profil::destroy($id);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($nama)
    {
        return Profil::where(strtolower('nama'), 'like', '%'.$nama.'%')->get();
    }
    public function latest_article()
    {
        $new_profil = Profil::latest()->take(4)->get();
        return response()->json([
            "error" => false,
            "message" => "Success",
            "data" => $new_profil
        ], 200);
    }
}
