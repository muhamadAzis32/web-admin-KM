<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use function PHPSTORM_META\type;

class KalenderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    protected $foo = 1212;

    public function __construct($resource, $foo)
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;
        
        $this->foo = $foo;
    }
    
    public function toArray($request)
    {
        return [
            'namaEvent' => $this->judul,
            'jenisEvent' => $this->foo,
            'waktuSelesai' => $this->deadline,
            'pertemuan_id' => $this->pertemuan_id,
            'mata_kuliah_id' => $this->mata_kuliah_id,
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
