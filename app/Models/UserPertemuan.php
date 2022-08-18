<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPertemuan extends Model
{
    use HasFactory;
    protected $table = 'user_pertemuan';
    protected $fillable = [
        'progress',
        'isComplete',
        'user_id',
        'enrolls_id',
        'pertemuan_id',
    ];

    protected $primaryKey = 'id';

    protected $casts = [
        'user_id' => 'integer',
        'progress' => 'integer',
        'isComplete' => 'boolean',
        'pertemuan_id' => 'integer',
        'enrolls_id' => 'integer',
    ];

    protected $hidden = [
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function get_dokumen()
    {
    	return $this->hasMany(userDokumen::class);
    }

    public function get_video()
    {
    	return $this->hasMany(userVideo::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

    public function enrolls()
    {
        return $this->belongsTo(Enrolls::class, 'enrolls', 'id');
    }
}
