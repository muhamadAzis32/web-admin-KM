<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $opsi = [
            $this->opsi_a,
            $this->opsi_b,
            $this->opsi_c,
            $this->opsi_d,
            $this->opsi_e,
        ];
        return [
            'id' => $this->id,
            "no" => $this->no,
            "pertanyaan" => $this->soal,
            "opsi" => $opsi,
            "jawaban" => (int)$this->jawaban,
            "penjelasan" => $this->penjelasan,
            "quiz_id" => $this->quiz_id,
            //'video' => $this->get_video,
        ];
    }
}
