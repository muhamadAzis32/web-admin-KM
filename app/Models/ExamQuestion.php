<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;
    protected $table = 'exam_question';
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
        'exam_pilgan_id',
    ];

    protected $casts = [
        'exam_pilgan_id' => 'integer',
    ];

    protected $primaryKey = 'id';

    public function exampilgan()
    {
        return $this->belongsTo(ExamPilgan::class, 'exam_pilgan_id', 'id');
    }
}
