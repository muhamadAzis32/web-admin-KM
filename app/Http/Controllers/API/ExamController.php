<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Http\Resources\ExamCollection;
use App\Helpers\ResponseFormatter;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->mata_kuliah);
        if($request->mata_kuliah){
            $mata_kuliah = Exam::where('mata_kuliah_id', $request->mata_kuliah)->get();
        }else{
            $mata_kuliah =  Exam::all();
        }

        return response()->json([
            'error' => false,
            'message' => 'success',
            'data' => $mata_kuliah,
        ]);
       
    }

    public function download($id)
    {
        $exam = Exam::find($id);
        
        $lst = explode('/',$exam->exam);
        $txt = 'api/download/'.$lst[1].'/'.$lst[2];

        return redirect($txt);
    }

    public function view($id)
    { 
        $exam = Exam::find($id);
        $lst = explode('/', $exam->exam);
        $txt = 'api/view/'.$lst[1].'/'.$lst[2];
        return redirect($txt);
    }  
    
    public function store(Request $request)
    {
            //store file into document folder
            if(!$request->file){
                return response()->json([
                    'error' => true,
                    'message' => 'Harap masukan file'
                ]);
            }
            
            $extention = $request->file->extension();
            $file_name = time().'.'.$extention;
            $txt = 'storage/exam/'. $file_name;
            $request->file->storeAs('public/exam', $file_name);

            $exam = new Exam();
            $exam->judul = $request->judul;
            $exam->deskripsi = $request->deskripsi;
            $exam->file = $txt;
            $exam->jenis =  $request->jenis;
            $exam->deadline =  $request->deadline;
            $exam->mata_kuliah_id = $request->mata_kuliah_id;
    
            $exam->save();

            return response()->json([
                "error" => false,
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file_name
            ]);
            // return ResponseFormatter::success(["file" => $file_name], "File berhasil ditambahkan!");

        // }
        return Exam::create($request->all());
    }

    public function show($id)
    {
        $exam = Exam::find($id);
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $exam
        ], 200);
        // return ResponseFormatter::success($exam);
       
    }
}