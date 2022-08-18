<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'data_dosen';
    protected $fillable = [
        'user_id',
        'alamat',
        'nidn',
        'ktp',
        'tipe',
        'isVerified'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
