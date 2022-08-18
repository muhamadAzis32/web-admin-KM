<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    protected $primaryKey = 'id';

    public function parent()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function children()
    {
        return $this->hasMany(Kategori::class);
    }
    
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function video()
    {
        return $this->hasMany(KontenVideo::class);
    }

    public function dokumen()
    {
        return $this->hasMany(KontenDokumen::class);
    }
}
