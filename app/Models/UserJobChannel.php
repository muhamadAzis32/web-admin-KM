<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJobChannel extends Model
{
    use HasFactory;
    protected $table = 'user_job_channel';
    protected $fillable = [
        'job_id',
        'user_id',
        'cv',
        'no_telp',
        'approve'
    ];

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function job_channel()
    {
        return $this->belongsTo(JobChannel::class, 'job_id', 'id');
    }
}
