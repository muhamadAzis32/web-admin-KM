<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $quest = $this->examquestion;
        $quest_count = $this->examquestion->count();
        return [
            'id' => $this->id,
            'tipe' => $this->tipe,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'mata_kuliah_id' => $this->mata_kuliah_id,
            'pertemuan_id' => $this->pertemuan_id,
            'jumlah_soal' => $quest_count,
            'soal_exam' => ExamQuestionResource::collection($quest),
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
