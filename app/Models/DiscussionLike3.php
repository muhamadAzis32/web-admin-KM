<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionLike3 extends Model
{
    use HasFactory;
    protected $table = 'discussion_like3';
    protected $fillable = [
        'discussion_reply_id',
        'isLike',
        'user_id'
    ];

    protected $casts = [ 
        'discussion_reply_id' => 'integer',
        'user_id' => 'integer', 
        'isLike' => 'boolean', ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function discussion_reply()
    {
        return $this->belongsTo(DiscussionReply::class, 'discussion_reply_id', 'id');
    }
}
