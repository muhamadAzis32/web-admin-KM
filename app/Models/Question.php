<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = [
        'no',
        'soal',
        'opsi_a',
        'opsi_b',
        'opsi_c',
        'opsi_d',
        'opsi_e',
        'jawaban',
        'penjelasan',
        'quiz_id',
    ];
    protected $casts = [
        'no' => 'integer',
        'quiz_id' => 'integer',
    ];
    
    protected $primaryKey = 'id';

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }

    // public function mata_kuliah()
    // {
    //     return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    // }
}
