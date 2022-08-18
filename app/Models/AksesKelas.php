<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesKelas extends Model
{
    use HasFactory;
    protected $table = 'akses_kelas';
    protected $fillable = [
        'user_id',
        'mata_kuliah_id',
    ];

    protected $primaryKey = 'id';

    protected $casts = [ 
        'user_id' => 'integer', 
        'mata_kuliah_id' => 'integer', ];

    public function matkul()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }

    /**
     * Get all of the comments for the AksesKelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */


    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }
}
