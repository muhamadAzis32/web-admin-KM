<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAssignmentResource extends JsonResource
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
            'assignment' => $this->assignment,
            'grade' => $this->grade,
            // 'user_id' => $this->user_id,
            // 'pertemuan_id' => $this->pertemuan_id,
            // 'mata_kuliah_id' => $this->mata_kuliah_id,
            'isComplete' => $this->isComplete
        ];
    }
}
