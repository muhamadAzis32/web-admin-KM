<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MataKuliah;
use App\Models\DataDosen;
use App\Models\Kelas;

class Jadwal_kuliah extends Model
{
    use HasFactory;
    protected $table = 'jadwal_kuliah';
    protected $fillable = [
        'jam_kuliah',
        'hari',
        'matkul_id',
        'dosen_id',
        'kelas_id'
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
}
