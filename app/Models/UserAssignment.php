<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAssignment extends Model
{
    use HasFactory;
    protected $table = 'user_assignment';
    protected $fillable = [
        'assignment',
        'grade',
        'grade_1',
        'grade_2',
        'grade_3',
        'feedback_1',
        'feedback_2',
        'feedback_3',
        'user_id',
        'mata_kuliah_id',
        'isComplete',
        'assignment_id'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'grade' => 'double',
        'grade_1'  => 'double',
        'grade_2' => 'double',
        'grade_3' => 'double',
        'mata_kuliah_id' => 'integer',
        'assignment_id' => 'integer',
    ];

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }

    public function pertemuan()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function get_user()
    // {
    //     return $this->hasMany(User::class);
    // }
}
