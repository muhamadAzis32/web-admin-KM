<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = 'content';
    protected $fillable = [
        'tipe',
        'judul',
        'deskripsi',
        'file',
        'bab',
        'kelas_id',
        'kategori',
    ];

    protected $casts = [ 
        'kelas_id' => 'integer', ];

    protected $primaryKey = 'id';


    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id', 'id');
    }
}
