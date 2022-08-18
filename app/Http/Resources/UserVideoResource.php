<?php

namespace App\Http\Resources;

use App\Models\Enrolls;
use App\Models\KontenVideo;
use App\Models\Kategori;
use Illuminate\Http\Resources\Json\JsonResource;

class UserVideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $video = KontenVideo::find($this->konten_video_id);
        return [
            'id' => $this->id,
            'progress' => $this->progress,
            'isComplete' => $this->isComplete,
            'konten_video' => new KontenVideoResource($video),
            //'konten_video' => $this->get_video,
            //'video' => $this->get_video,
          ];
    }
    
}
