<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionForum extends Model
{
    use HasFactory;
    protected $table = 'discussion_forum';
    protected $fillable = [
        'judul',
        'isi',
        'user_id',
        'mata_kuliah_id',
        'gambar'
    ];

    protected $casts = [ 
        'user_id' => 'integer', 
        'mata_kuliah_id' => 'integer', ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }

    public function discussion()
    {
        return $this->hasMany(DiscussionReply::class);
    }

    public function reply()
    {
    	return $this->hasMany(DiscussionReply::class);
    }
}
