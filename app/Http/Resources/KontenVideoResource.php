<?php

namespace App\Http\Resources;

use App\Models\Kategori;
use Illuminate\Http\Resources\Json\JsonResource;

class KontenVideoResource extends JsonResource
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
            'link' => $this->link,
            'durasi' => $this->durasi,
            'mata_kuliah_id' => $this->mata_kuliah_id,
            // 'title' => $this->title,
            // 'description' => $this->description,
            'kategori' => $kategori->nama_kategori,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
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
