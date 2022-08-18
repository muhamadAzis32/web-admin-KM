<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianKuliah extends Model
{
    use HasFactory;
    protected $table = 'ujian_kuliah';
    protected $fillable = [
        'deadline',
        'tanggal_ujian',
        'matkul_id',
        'dosen_id',
        'kelas_id',
        'mahasiswa_id'
    ];

    public function matkul()
    {
        return $this->belongsTo(MataKuliah::class, 'matkul_id');
    }

    public function dosen()
    {
        return $this->belongsTo(DataDosen::class, 'dosen_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Administration::class, 'mahasiswa_id');
    }
}
