<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $program = Program::all();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $program
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required',
            'detail' => 'required',
            //'kategori' => 'required',
        ]);
        $program = Program::create($request->all());

        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $program
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
        return Program::find($id);
        // return ResponseFormatter::success($program);
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
        $program = Program::find($id);
        $program->update($request->all());
        
        return $program;
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
        return Program::destroy($id);
        // return ResponseFormatter::success("Program studi berhasil dihapus!");
    }
}
