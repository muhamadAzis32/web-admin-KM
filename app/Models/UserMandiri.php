<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMandiri extends Model
{
    use HasFactory;
    protected $table = 'user_mandiri';
    protected $fillable = [
        'tugas_mandiri',
        'user_id',
        'mata_kuliah_id',
        'isComplete',
        'pertemuan_id'
    ];

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class, 'pertemuan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
