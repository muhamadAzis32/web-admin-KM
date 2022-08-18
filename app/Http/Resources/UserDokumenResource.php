<?php

namespace App\Http\Resources;

use App\Models\Enrolls;
use App\Models\KontenVideo;
use App\Models\Kategori;
use App\Models\KontenDokumen;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDokumenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $dokumen = KontenDokumen::find($this->konten_dokumen_id);
        return [
            'id' => $this->id,
            'progress' => $this->progress,
            'isComplete' => $this->isComplete,
            'konten_dokumen' => new KontenDokumenResource($dokumen)
            //'konten_video' => $this->get_video,
            //'video' => $this->get_video,
          ];
    }
    
}
