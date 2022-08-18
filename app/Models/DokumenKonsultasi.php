<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenKonsultasi extends Model
{
    use HasFactory;
    protected $table = 'dokumen_konsultasi';
    protected $fillable = [
        'user_id',
        'nama_dokumen',
        'file_dokumen',
        'prioritas',
        'pesan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
