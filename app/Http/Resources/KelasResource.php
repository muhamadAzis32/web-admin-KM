<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KelasResource extends JsonResource
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
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'sebelum' => $this->sebelum,
            'program_id' => $this->program_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
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
