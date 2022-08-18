<?php

namespace App\Http\Resources;

use App\Models\Kategori;
use Illuminate\Http\Resources\Json\JsonResource;

class MataKuliahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $kategori = Kategori::find($this->kategori_id);
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'sks' => $this->sks,
            'kelas_id' => $this->kelas_id,
            'kategori' => $kategori->nama_kategori,
            'kode'=> $this->kode,
            'semester'=> $this->semester,
            //'video' => $this->get_video,
        ];
    }

    //public static $wrap = 'mata_kuliah';

    public function with($request)
    {
        return [
            "error" => false,
            "message" => "success",
        ];
    }
}
