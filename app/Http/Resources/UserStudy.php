<?php

namespace App\Http\Resources;

use App\Models\KontenDokumen;
use App\Models\KontenVideo;
use Illuminate\Http\Resources\Json\JsonResource;

class UserStudy extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $vid = $this->kontenVideo_id;
        $i = 0;
        foreach($vid as $item) {
            $matchThese = [
                ['id', '=', $item['id']],
            ];
            $u_video =  KontenVideo::where($matchThese)->get()->first();
            $dataVideo[$i] = (
                new KontenVideoResource($u_video)
            );
            $i++;
        }

        $dok = $this->kontenDokumen_id;
        foreach($dok as $item) {
            $matchThese = [
                ['id', '=', $item['id']],
            ];
            $u_dokumen =  KontenDokumen::where($matchThese)->get()->first();
            $dataDokumen[$i] = (
                new DokumenResource($u_dokumen)
            );
            $i++;
        }
        return [
            'pertemuan_id' => $this->id,
            'mata_kuliah_id' => $this->mata_kuliah_id,
            'mata_kuliah' => $this->mataKuliah->judul,
            'pertemuan' => $this->judul,
            'video' => $dataVideo,
            'dokumen' => $dataDokumen,
            // 'vid_id' => $this->kontenVideo_id
          ];   
    }

}
