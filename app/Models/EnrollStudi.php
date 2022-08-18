<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollStudi extends Model
{
    use HasFactory;
    protected $table = 'enroll_studi';
    protected $fillable = [
        'user_id',
        'kelas_id',
        'semester',
        'isComplete',
        // 'kategori,'
    ];

    protected $primaryKey = 'id';

    protected $casts = [
        'isComplete' => 'boolean',
        'user_id' => 'integer',
        'semester' => 'json',
        'kelas_id' => 'integer',
    ];

    public function enroll_mata_kuliah()
    {
        return $this->hasMany(EnrollMataKuliah::class);
    }


    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(user::class, 'user_id', 'id');
    }
}
