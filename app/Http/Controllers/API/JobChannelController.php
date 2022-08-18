<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\JobChannel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class JobChannelController extends Controller
{
    public function job_kerja()
    {
        $jobChannel = JobChannel::where('tipe', 'Kerja')->get();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $jobChannel
        ], 200);
        // return ResponseFormatter::success($jobChannel);
    }
    public function job_magang()
    {
        $jobChannel = JobChannel::where('tipe', 'Magang')->get();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $jobChannel
        ], 200);
        // return ResponseFormatter::success($jobChannel);
    }

    public function job_project()
    {
        $jobChannel = JobChannel::where('tipe', 'Project')->get();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $jobChannel
        ], 200);
        // return ResponseFormatter::success($jobChannel);
    }

    public function index()
    {
        $jobChannel = JobChannel::all();
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $jobChannel
        ], 200);
        // return ResponseFormatter::success($jobChannel);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
              [
                'posisi_pekerjaan' => 'required',
                'nama_perusahaan' => 'required',
                'gaji' => 'required',
                'bidang' => 'required',
                'tipe' => 'required',
                'foto' => 'required',
                'requirement' => 'required',
                'job_desk' => 'required',
                'alamat' => 'required',                
             ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($request->file('foto')) {

            //store file into document folder
            $extention = $request->foto->extension();
            $file_name = time().'.'.$extention;
            $path = 'storage/job-channel/'. $file_name;
            $request->foto->storeAs('public/job-channel', $file_name);

            //store your file into database
            $jobChannel = new JobChannel();
            $jobChannel->posisi_pekerjaan = $request->posisi_pekerjaan;
            $jobChannel->nama_perusahaan = $request->nama_perusahaan;
            $jobChannel->gaji = $request->gaji;
            $jobChannel->bidang = $request->bidang;
            $jobChannel->tipe = $request->tipe;
            $jobChannel->requirement = $request->requirement;
            $jobChannel->job_desk = $request->job_desk;
            $jobChannel->alamat = $request->alamat;
            $jobChannel->foto = $path;
            $jobChannel->save();

            return response()->json([
                "error" => false,
                "success" => true,
                "message" => "Images successfully uploaded",
                "file" => $path
            ]);
            // return ResponseFormatter::success(["file" => $txt], "Job channel berhasil ditambahkan");

        }
        return JobChannel::create($request->all());
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
        $job = JobChannel::find($id);
        if(!$job){
            return response()->json([
                "error" => true,
                "message" => "Data job tidak ditemukan"
            ], 404);
        }

        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $job
        ], 200);
        // return ResponseFormatter::success($jobChannel);
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
        $jobChannel = JobChannel::find($id);
        if(!$jobChannel){
            return response()->json([
                "error" => true,
                "message" => "Data job tidak ditemukan"
            ], 404);
        }

        $jobChannel->update($request->all());
        return response()->json([
            "error" => false,
            "message" => "success",
            "data" => $jobChannel
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobChannel = JobChannel::find($id);
        if(!$jobChannel){
            return response()->json([
                "error" => true,
                "message" => "Data job tidak ditemukan"
            ], 404);
        }

        if(File::exists($jobChannel->foto)){
            File::delete($jobChannel->foto);
        }

        $jobChannel->delete();
        return response()->json([
            "error" => false,
            "message" => "Job berhasil dihapus!"
        ], 200);
    }

    public function view($id)
    {
        $jobChannel = JobChannel::find($id);

        if(!$jobChannel){
            return response()->json([
                "error" => true,
                "message" => "Data job tidak ditemukan"
            ], 404);
        }

        if(!File::exists($jobChannel->foto)){
            return response()->json([
                "error" => true,
                "message" => "Foto Job tidak ditemukan!"
            ], 404);
        }

        $foto = URL::to('/').'/'.$jobChannel->foto;
        return redirect($foto);
    }


}
