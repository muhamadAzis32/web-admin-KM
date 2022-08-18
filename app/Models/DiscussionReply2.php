<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionReply2 extends Model
{
    use HasFactory;
    protected $table = 'discussion_reply2';
    protected $fillable = [
        'discussion_reply_id',
        'isi',
        'user_id',
    ];

    protected $casts = [ 
        'discussion_reply_id' => 'integer',
        'user_id' => 'integer',  ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function discussion_reply()
    {
        return $this->belongsTo(DiscussionForum::class, 'discussion_reply_id', 'id');
    }
}
