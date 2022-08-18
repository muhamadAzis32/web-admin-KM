<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDosen extends Model
{
    use HasFactory;
    protected $table = 'data_dosen';
    protected $fillable = [
        'tipe',
        'detail_dosen',
        'nama_lengkap',
        'no_hp',
        'alamat',
        'nidn',
        'ktp',
        'user_id',
        'isVerified',
    ];

    // protected $casts = [ 
    //     'kelas_id' => 'integer', ];

    protected $primaryKey = 'id';

    // public function ()
    // {
    // }

}
