<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionLike extends Model
{
    use HasFactory;
    protected $table = 'discussion_like';
    protected $fillable = [
        'discussion_id',
        'isLike',
        'user_id'
    ];

    protected $casts = [ 
        'discussion_id' => 'integer',
        'user_id' => 'integer',  ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function discussion()
    {
        return $this->belongsTo(DiscussionForum::class, 'discussion_id', 'id');
    }
}
