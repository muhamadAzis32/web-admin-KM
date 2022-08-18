<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Enrolls;
use Illuminate\Http\Request;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AssignmentResource;
use App\Http\Resources\AssignmentCollection;
use App\Helpers\ResponseFormatter;

class AssignmentController extends Controller
{
    public function index(Request $request)
    {
        // $user       =   Auth::user();
        // $enrolls       =  Enrolls::where('user_id', $user->id)->get();
        if($request->mata_kuliah){
            $mata_kuliah = Assignment::where('mata_kuliah_id', $request->mata_kuliah)->get();
        }else if ($request->pertemuan){
            $mata_kuliah = Assignment::where('pertemuan_id', $request->pertemuan)->get();
        }else{
            $mata_kuliah =  Assignment::all();
        }
        return new AssignmentCollection($mata_kuliah->paginate(18));
        // return ResponseFormatter::success($assignment, "Daftar assignment!");
        // return $assignment = Assignment::all();
        // return new AssignmentCollection($mata_kuliah->paginate(1));
       
    }

    public function download($id)
    {
        $assignment = Assignment::find($id);
        
        $lst = explode('/',$assignment->assignment);
        // dd($assignment,$lst);
        $txt = 'api/download/'.$lst[1].'/'.$lst[2];

        return redirect($txt);
    }

    public function view($id)
    {
        $assignment = Assignment::find($id);
        $lst = explode('/', $assignment->assignment);
        // dd($lst);
        $txt = 'api/view/'.$lst[1].'/'.$lst[2];
        return redirect($txt);
    }   

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(),
        //       [
        //         'judul' => 'required',
        //         'deskripsi' => 'required',
        //         'kategori' => 'required',
        //         'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
        //         'bab' => 'required',
        //      ]);
        // if ($validator->fails()) {
        //     return response()->json(['error'=>$validator->errors()], 401);
        // }

        // if ($files = $request->file('file')) {

            //store file into document folder
            $extention = $request->assignment->extension();
            $file_name = time().'.'.$extention;
            $txt = 'storage/assigments/'. $file_name;
            $request->assignment->storeAs('public/assigments', $file_name);
            //$file = $request->file->store(('public/documents'));

            $assignment = new Assignment();
            $assignment->pertemuan_id = $request->pertemuan_id;
            $assignment->judul = $request->judul;
            $assignment->deskripsi = $request->deskripsi;
            $assignment->assignment = $txt;
            $assignment->tipe =  $request->tipe;
            $assignment->deadline =  $request->deadline;
            $assignment->user_id =  $request->user_id;
            $assignment->kelas_id =  $request->kelas_id;
    
            $assignment->save();
            // $assignment->get_dokumen()->save($document);

            return response()->json([
                "error" => false,
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file_name
            ]);
            // return ResponseFormatter::success(["file" => $file_name], "Assignment berhasil diupload!");

        // }
        return Assignment::create($request->all());
    }

    public function show($id)
    {
        // $user       =   Auth::user();
        // $enrolls       =  Enrolls::where('user_id', $user->id)->get();
        $assignment = Assignment::find($id);
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $assignment
        ], 200);
        // return ResponseFormatter::success($assignment, "Daftar assignment!");
       
    }
}
