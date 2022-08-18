<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenVideo extends Model
{
    use HasFactory;
    protected $table = 'konten_video';
    protected $fillable = [
        'judul',
        'deskripsi',
        'link',
        'durasi',
        'mata_kuliah_id',
        'kategori_id',
    ];

    protected $primaryKey = 'id';
    protected $casts = [
        'mata_kuliah_id' => 'integer',
        'kategori_id' => 'integer',
        'durasi' => 'integer',
    ];

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'katgeori_id', 'id');
    }
}

