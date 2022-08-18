<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamPilgan extends Model
{
    use HasFactory;
    protected $table = 'exam_pilgan';
    protected $fillable = [
        'judul',
        'mata_kuliah_id',
        'user_id',
        'deskripsi',
        'jenis',
        'deadline'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'mata_kuliah_id' => 'integer',
    ];

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }

    public function examquestion()
    {
    	return $this->hasMany(ExamQuestion::class);
    }

    
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

}
