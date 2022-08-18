<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'mata_kuliah';
    protected $fillable = [
        'judul',
        'deskripsi',
        'sks',
        'kategori_id',
        'semester',
        'kelas_id',
        'kode',
    ];

    protected $primaryKey = 'id';
    protected $casts = [
        'kategori_id' => 'integer',
        'semester' => 'integer',
        'kelas_id' => 'integer',
        'sks' => 'integer',
    ];
    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id', 'id');
    }

    public function get_dokumen()
    {
    	return $this->hasMany(KontenDokumen::class);
    }

    public function get_video()
    {
    	return $this->hasMany(KontenVideo::class);
    }

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class, 'pertemuan_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id', 'id');
    }


    public function get_userAssignment()
    {
        return $this->hasMany(UserAssignment::class);
    }

    public function enroll()
    {
        return $this->hasMany(EnrollMataKuliah::class);
    }

}
