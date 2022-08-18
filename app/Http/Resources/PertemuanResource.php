<?php

namespace App\Http\Resources;
use App\Models\UserVideo;
use App\Models\UserDokumen;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserVideoResource;
use App\Http\Resources\UserDokumenResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PertemuanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user       =   Auth::user();
        $arr = $this->kontenVideo_id;
        $i=0;
        
        foreach($arr as $item) { //foreach element in $arr
            $matchThese = [
                ['user_id', '=', $user->id],
                ['konten_video_id', '=', $item['id']],
            ];
            $u_video =  UserVideo::where($matchThese)->get()->first();
            $data[$i] = (
                new userVideoResource($u_video)
            );
            $i++;
        }

        foreach($arr as $item) { //foreach element in $arr
            $matchThese = [
                ['user_id', '=', $user->id],
                ['konten_dokumen_id', '=', $item['id']],
            ];
            $u_dokumen =  UserDokumen::where($matchThese)->get()->first();
            $data2[$i] = (
                new userDokumenResource($u_dokumen)
            );
            $i++;
        }
        return [
            'id' => $this->id,
            'urutan' => $this->pertemuan,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'mata_kuliah_id' => $this->mata_kuliah_id,
            'user_video' => $data,
            'user_dokumen' => $data2,
            //'video' => $this->get_video,
        ];
    }

    //public static $wrap = 'pertemuan';

    public function with($request)
    {
        return [
            "error" => false,
            "message" => "success",
        ];
    }
}
