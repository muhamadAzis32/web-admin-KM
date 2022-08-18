<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\UserVideo;
use app\Models\UserDokumen;

class EnrollMataKuliah extends Model
{
    use HasFactory;
    protected $table = 'enroll_mata_kuliah';
    protected $fillable = [
        'user_id',
        'mata_kuliah_id',
        'enroll_studi_id',
        'isComplete',
        'semester',
        'nilai_akhir'
    ];

    protected $primaryKey = 'id';

    protected $casts = [
        'isComplete' => 'boolean',
        'user_id' => 'integer',
        'mata_kuliah_id' => 'integer',
        'enroll_studi_id' => 'integer',
        'semester' => 'integer',
        'nilai_akhir' => 'integer',
    ];

    public function jadwal()
    {
        return $this->belongsToMany(Jadwal_kuliah::class, 'enroll_mata_kuliah', 'mata_kuliah_id', 'id');
    }

    public function get_dokumen()
    {
    	return $this->hasMany(userDokumen::class);
    }

    public function get_video()
    {
    	return $this->hasMany(userVideo::class);
    }

    public function get_kelas()
    {
    	return $this->belongsTo(Kelas::class);
    }

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

    public function enroll_studi()
    {
        return $this->belongsTo(EnrollStudi::class, 'enroll_studi_id', 'id');
    }
}
