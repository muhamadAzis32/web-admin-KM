<?php

namespace App\Http\Controllers\API;

use App\Models\Kelas;
use App\Models\KontenDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return KontenDokumen::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
              [
                'judul' => 'required',
                'deskripsi' => 'required',
                'kategori' => 'required',
                'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
                'bab' => 'required',
             ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($files = $request->file('file')) {

            //store file into document folder
            $extention = $request->file->extension();
            $file_name = time().'.'.$extention;
            $txt = 'storage/documents/'. $file_name;
            $request->file->storeAs('public/documents', $file_name);
            //$file = $request->file->store(('public/documents'));

            //store your file into database
            $kelas = Kelas::find($id);
            $document = new KontenDokumen();
            $document->judul = $request->judul;
            $document->deskripsi = $request->deskripsi;
            $document->kategori = $request->kategori;
            $document->bab = $request->bab;
            $document->file = $txt;
            //$document->kelas_id = $kelas->id;
    
            $kelas->get_dokumen()->save($document);

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file_name
            ]);

        }
        return KontenDokumen::create($request->all());
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
        return KontenDokumen::find($id);
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
        $dokumen = KontenDokumen::find($id);
        $dokumen ->update($request->all());
        return $dokumen;
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
        return KontenDokumen::destroy($id);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return KontenDokumen::where(strtolower('judul'), 'like', '%'.$name.'%')->get();
    }

    public function download($id)
    {
        $dokumen = KontenDokumen::find($id);
        $lst = explode('/', $dokumen->file);
        $txt = 'api/download/'.$lst[2];
        return redirect($txt);
    }

    public function view($id)
    {
        $dokumen = KontenDokumen::find($id);
        $lst = explode('/', $dokumen->file);
        $txt = 'api/view/'.$lst[2];
        return redirect($txt);
    }
    
    public function jumlah_dokumen($id)
    {        
        return KontenDokumen::where('kelas_id',$id)->count();
    }
}
