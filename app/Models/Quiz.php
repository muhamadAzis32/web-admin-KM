<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quiz';
    protected $fillable = [
        'judul',
        'deskripsi',
        'tipe',
        'mata_kuliah_id',
        'pertemuan_id'
    ];

    
    protected $primaryKey = 'id';

    
    protected $casts = [
        'pertemuan_id' => 'integer',
        'mata_kuliah_id' => 'integer',
    ];

    public function question()
    {
    	return $this->hasMany(Question::class);
    }

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class, 'pertemuan_id', 'id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }
    // public function mata_kuliah()
    // {
    //     return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    // }
}
