<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exam';
    protected $fillable = [
        'judul',
        'mata_kuliah_id',
        // 'user_id',
        'file',
        'deskripsi',
        'jenis',
        'deadline'
    ];
    protected $casts = [
        'mata_kuliah_id' => 'integer',
    ];

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }


}
