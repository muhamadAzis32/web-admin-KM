<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVideo extends Model
{
    use HasFactory;
    protected $table = 'uservideo';
    protected $fillable = [
        'progress',
        'isComplete',
        'user_id',
        'enrolls_id',
        'konten_video_id',
    ];

    protected $primaryKey = 'id';
    protected $casts = [
        'user_id' => 'integer',
        'progress' => 'integer',
        'isComplete' => 'boolean',
        'konten_video_id' => 'integer',
        'enrolls_id' => 'integer',
    ];

    protected $hidden = [
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function get_video()
    {
        return $this->hasOne(KontenVideo::class);
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id', 'id');
    }

    public function enrolls()
    {
        return $this->belongsTo(Enrolls::class, 'enroll_id', 'id');
    }

    public function video()
    {
        return $this->belongsTo(KontenVideo::class, 'konten_video_id', 'id');
    }
}
