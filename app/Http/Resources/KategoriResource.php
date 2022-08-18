<?php

namespace App\Http\Resources;

use App\Models\Kelas;
use App\Models\KontenDokumen;
use App\Models\KontenVideo;
use Illuminate\Http\Resources\Json\JsonResource;

class KategoriResource extends JsonResource
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
            'nama' => $this->nama_kategori,
            'deskripsi' => $this->deskripsi,
            'videoCount' => KontenVideo::where('kategori_id', $this->id)->get()->count(),
            'documentCount' => KontenDokumen::where('kategori_id', $this->id)->get()->count(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
          ];
    }
}
