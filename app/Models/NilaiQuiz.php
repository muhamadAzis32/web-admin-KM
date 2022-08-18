<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiQuiz extends Model
{
    use HasFactory;
    protected $table = 'nilai_quiz';
    protected $fillable = [
        'grade',
        'user_id',
        'mata_kuliah_id',
        'quiz_id',
        'isComplete'
    ];

    protected $primaryKey = 'id';

    
    protected $casts = [
        'user_id' => 'integer',
        'mata_kuliah_id' => 'integer',
        'quiz_id' => 'integer',
    ];

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function usequizr()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }
}
