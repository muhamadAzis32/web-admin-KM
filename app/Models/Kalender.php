<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalender extends Model
{
    use HasFactory;
    protected $table = 'kalender';
    protected $fillable = [
        'judul',
        'deadline',
        'user_id',
        'tipe',
        'color',
    ];
    protected $casts = [
        'user_id' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
