<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'from_id', 'to_id', 'content', 'read_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    public function userFrom()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    public function userTo()
    {
        return $this->belongsTo(User::class, 'to_id');
    }
}
