<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;
    protected $table = 'data_mahasiswa';
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'email',
        'prodi',
        'tahun_ajar',
        'semester',
        'alamat_domisili',
        'alamat_ktp',
        'no_hp',
        'tempat_lahir',
        'tgl_lahir',
        'kelamin',
        'kebutuhan_khusus',
        'tinggal',
        'pembiayan',
        'nama_ayah',
        'nama_ibu',
        'kerja_ayah',
        'kerja_ibu',
        'pekerjaan',
        'penghasilan',
        'penghasilan_ayah',
        'penghasilan_ibu',
        'pakta_integritas',
        'scan_ktp',
        'scan_kk',
        'scan_ijazah',
        'pas_foto',
        'transkip',
        'surat_rekomendasi',
        'program_id',
        'isVerified',
        'isComplete',
        'user_id'
    ];

    protected $primaryKey = 'id';
    protected $casts = ['kebutuhan_khusus' => 'array'];

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

    public function program()
    {
        return $this->belongsTo(user::class, 'program_id', 'id');
    }
}
