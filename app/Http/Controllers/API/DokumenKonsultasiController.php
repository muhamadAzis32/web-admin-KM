<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DokumenKonsultasi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class DokumenKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumen = DokumenKonsultasi::where('user_id', Auth::user()->id)->get(['id', 'nama_dokumen', 'prioritas']);

        return response()->json([
            'status' => 'success',
            'data' => $dokumen
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nama_dokumen' => 'required',
            'file_dokumen' => 'required|mimes:doc,docx,pdf,txt|max:2048',
            'prioritas' => 'required',
            'pesan' => 'required',
        ]);

        try {
            $dokumen = new DokumenKonsultasi();
            $dokumen->user_id = Auth::user()->id;
            $dokumen->nama_dokumen = $request->nama_dokumen;
            $dokumen->prioritas = $request->prioritas;
            $dokumen->pesan = $request->pesan;
            
            $file_ext = $request->file_dokumen->extension();
            $file_name = 'users_'.$request->user_id.'_'.time().'.'.$file_ext;
            $path_dokumen = 'storage/documents/konsultasi/'. $file_name;
            $request->file_dokumen->storeAs('public/documents/konsultasi', $file_name);
            
            $dokumen->file_dokumen = $path_dokumen;
            $dokumen->save();

            if(!$dokumen) {
                return response()->json(['success' => false, 'message' => 'Dokumen gagal ditambahkan']);
            }

            return response()->json([
                'success' => true, 
                'message' => 'Dokumen berhasil ditambahkan',
                'data' => [
                    'id' => $dokumen->id,
                    'nama_dokumen' => $dokumen->nama_dokumen,
                    'prioritas' => $dokumen->prioritas,
                    'pesan' => $dokumen->pesan,
                ]
            ]);

        } catch (QueryException $e) {
            if($e->errorInfo[1] == 1062) {
                
                return response()->json(['success' => false, 'message' => 'Dokumen gagal ditambahkan, ID sudah ada']);
    
            } else {
                throw $e;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DokumenKonsultasi  $dokumenKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $dokumen = DokumenKonsultasi::where('id', $id)->with('user')->get()[0];

        if(!$dokumen){
            return response()->json(['success' => false, 'message' => 'Dokumen tidak ditemukan']);
        }

        if(!File::exists($dokumen->file_dokumen)) {
            return response()->json(['success' => false, 'message' => 'File dokumen tidak ditemukan']);
        }

        return response()->json([
            'status' => 'success',
            'id' => $dokumen->id,
            'nama_dokumen' => $dokumen->nama_dokumen,
            'prioritas' => $dokumen->prioritas,
            'pesan' => $dokumen->pesan,
            'file_dokumen' => URL::to('/').'/'.$dokumen->file_dokumen,
            'email' => $dokumen->user->email,
            'no_hp' => $dokumen->user->no_hp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DokumenKonsultasi  $dokumenKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DokumenKonsultasi $dokumenKonsultasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DokumenKonsultasi  $dokumenKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DokumenKonsultasi $dokumenKonsultasi)
    {
        //
        $dokumen = DokumenKonsultasi::find($dokumenKonsultasi->id);

        if(!$dokumen){
            return response()->json(['success' => false, 'message' => 'Dokumen tidak ditemukan']);
        }
        
        if(File::exists($dokumen->file_dokumen)) {
            File::delete(public_path($dokumen->file_dokumen));
        }

        $dokumen->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Dokumen berhasil dihapus'
        ]);
    }
}
