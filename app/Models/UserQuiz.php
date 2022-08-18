<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model
{
    use HasFactory;
    protected $table = 'user_quiz';
    protected $fillable = [
        'user_id',
        'mata_kuliah_id',
        'quiz_id',
        'soal',
        'jawaban'
    ];

    
    protected $primaryKey = 'id';

    
    protected $casts = [
        'user_id' => 'integer',
        'mata_kuliah_id' => 'integer',
        'quiz_id' => 'integer',
    ];

 

}
