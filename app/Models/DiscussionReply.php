<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionReply extends Model
{
    use HasFactory;
    protected $table = 'discussion_reply';
    protected $fillable = [
        'discussion_id',
        'isi',
        'user_id',
    ];

    protected $primaryKey = 'id';
    
    protected $casts = [ 
        'discussion_id' => 'integer',
        'user_id' => 'integer'  ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function discussion()
    {
        return $this->belongsTo(DiscussionForum::class, 'discussion_id', 'id');
    }
}
