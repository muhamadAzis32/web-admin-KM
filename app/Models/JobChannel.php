<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobChannel extends Model
{
    use HasFactory;
    protected $table = 'job_channel';
    protected $fillable = [
        'posisi_pekerjaan',
        'nama_perusahaan',
        'gaji',
        'bidang',
        'tipe',
        'jenis',
        'requirement',
        'job_desk',
        'alamat',
        'foto',
    ];

    protected $primaryKey = 'id';
}
