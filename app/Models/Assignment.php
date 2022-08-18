<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Pertemuan;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignment';
    protected $fillable = [
        'judul',
        'pertemuan_id',
        'deskripsi',
        'file',
        'deadline',
        'user_id',
        'mata_kuliah_id'
    ];

    protected $primaryKey = 'id';

    protected $casts = [ 
        'pertemuan_id' => 'integer', 
        'mata_kuliah_id' => 'integer', 
        'user_id' => 'integer', ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class, 'pertemuan_id', 'id');
    }
}
