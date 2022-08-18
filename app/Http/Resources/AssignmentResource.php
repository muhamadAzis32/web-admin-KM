<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'file' => $this->file,
            'deadline' => date('d-m-Y', strtotime($this->deadline)),
            'pertemuan_id' => $this->pertemuan_id,
            'mata_kuliah_id' => $this->mata_kuliah_id,
            //'kelas_id' => $this->kelas_id,
            // 'count' =>  $countvideo + $countdokumen,
            // 'count_complete' =>  $uvideo + $udokumen,
            // 'isComplete' => $this->isComplete,
            // 'nama_kelas'=> $kelas->nama,
            //'video' => $this->get_video,
        ];
    }

    public function with($request)
    {
        return [
            "error" => false,
            "message" => "success",
        ];
    }
}
