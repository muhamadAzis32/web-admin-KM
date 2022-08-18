<?php

namespace App\Http\Resources;

use App\Models\Kelas;
use Illuminate\Http\Resources\Json\JsonResource;

class EnrollStudiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $kelas = Kelas::find($this->kelas_id);
        return [
            'id' => $this->id,
            'isComplete' => $this->isComplete,
            'semester' => $this->semester,
            'studi' => $this->studiformat($kelas),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function studiformat($studi)
    {
        return [
            'id' => $studi->id,
            'nama' => $studi->nama,
            'deskripsi' => $studi->deskripsi,
          ];
    }

    public function with($request)
    {
        return [
            "status" => "success",
            "message" => "berhasil mendapatkan enrollStudi",
        ];
    }
}
