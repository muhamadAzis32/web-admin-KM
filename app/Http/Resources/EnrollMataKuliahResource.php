<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\MataKuliah;
use App\Models\UserDokumen;
use App\Models\UserVideo;

class EnrollMataKuliahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $mata_kuliah = MataKuliah::find($this->mata_kuliah_id);
        $uvideo = UserVideo::where('enroll_mata_kuliah_id', $this->id);
        $udokumen = UserDokumen::where('enroll_mata_kuliah_id', $this->id);
        //$kelas = Kelas::find($mata_kuliah->kelas_id);
        $listvideo = $uvideo;
        $listdokumen = $udokumen;
        $countvideo = $listvideo->count();
        $countdokumen = $listdokumen->count();
        $uvideo = $listvideo->where("isComplete", true)->count();
        $udokumen = $listdokumen->where("isComplete", true)->count();
        return [
            'id' => $this->id,
            //'kelas_id' => $this->kelas_id,
            'count' =>  $countvideo + $countdokumen,
            'count_complete' =>  $uvideo + $udokumen,
            'isComplete' => $this->isComplete,
            //'kelas' => $kelas->nama,
            'mata_kuliah'=> new MataKuliahResource($mata_kuliah),
            //'video' => $this->get_video,
        ];
    }

    public function with($request)
    {
        return [
            "error" => false,
            "message" => "success",
            //'kelas' => $kelas,
        ];
    }
}
