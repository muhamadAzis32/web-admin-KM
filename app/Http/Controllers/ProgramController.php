<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
  public function index()
    {
        $program = Program::all();
        return view('admin.program.index', compact('program'));
    }

    public function create()
    {
        $program = program::all();
        return view('admin.program.tambah',compact( 'program'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required',
            'detail' => 'required',
        ]);
        program::create([
            'nama_program' => $request->nama_program,
            'detail' => $request->detail,
        ]);
        
        return redirect()->route('program.index')
            ->with('success', 'Program Studi Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $program = program::where('id', $id)->first();
        $programselect = program::all();
        return view('admin.program.show', compact('program'));
    }


    public function edit($id)
    {
        $program = program::find($id);
    
        return view('admin.program.edit', compact('program'));
    }

    public function update(Request $request, $id)
    { 
        $program = program::findOrFail($id);
        $program->nama_program = $request->nama_program;
        $program->detail = $request->detail;
        $program->save();
        
        return redirect()->route('program.index')
        ->with('edit', 'Program Studi Berhasil Diedit');
    }

    public function destroy($id)
    {
        program::where('id', $id)->delete();
        
        return redirect()->route('program.index')
            ->with('delete', 'Program Studi Berhasil Dihapus');
    }
}
