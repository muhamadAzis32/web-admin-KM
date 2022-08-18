<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDokumen extends Model
{
    use HasFactory;
    protected $table = 'userdokumen';
    protected $fillable = [
        'progress',
        'isComplete',
        'user_id',
        'enrolls_id',
        'konten_dokumen_id',
    ];

    protected $primaryKey = 'id';

    
    protected $casts = [
        'user_id' => 'integer',
        'progress' => 'integer',
        'isComplete' => 'boolean',
        'enrolls_id' => 'integer',
        'konten_dokumen_id' => 'integer',
    ];


    protected $hidden = [
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function get_dokumen()
    {
        return $this->hasOne(KontenDokumen::class);
    }

    public function enrolls()
    {
        return $this->belongsTo(enrolls::class, 'enroll_id', 'id');
    }

    public function dokumen()
    {
        return $this->belongsTo(Kontendokumen::class, 'konten_dokumen_id', 'id');
    }

}
