<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $fillable = [
        'bab',
        'pengantar',
        'file_soal',
        'status',

    ];

    protected $primaryKey = 'id';
    protected $casts = [
        'bab' => 'integer',
    ];



    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id', 'id');
    }
}
