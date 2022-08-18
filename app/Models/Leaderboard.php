<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    use HasFactory;
    protected $table = 'leaderboard';
    protected $fillable = [
        'id',
        'user_id',
        'tipe',
        'nilai',
    ];
    protected $casts = [
        'user_id' => 'integer',
        'nilai' => 'integer',
    ];

    // protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
