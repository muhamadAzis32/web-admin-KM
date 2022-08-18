<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
    use HasFactory;
    protected $table = 'user_exam';
    protected $fillable = [
        'exam',
        'grade',
        'grade_1',
        'grade_2',
        'grade_3',
        'feedback_1',
        'feedback_2',
        'feedback_3',
        'tipe',
        'user_id',
        'mata_kuliah_id',
        'isComplete',
        'exam_id',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'mata_kuliah_id' => 'integer',
        'exam_id' => 'integer',
        'grade' => 'double',
        'grade_1' => 'double',
        'grade_2' => 'double',
        'grade_3' => 'double',
        'isComplete' => 'boolean',
        'isremed' => 'boolean',
        'akhir' => 'boolean',
    ];

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }

    public function relasiexam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
