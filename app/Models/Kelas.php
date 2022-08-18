<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssignmentFile;
use App\Models\AssignmentText;
use App\Models\KontenVideo;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        'nama',
        'deskripsi',
        'sebelum',
        'program_id'
    ];  

    protected $primaryKey = 'id';
    protected $casts = [
        'program_id' => 'integer',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function mata_kuliah()
    {
    	return $this->hasMany(MataKuliah::class);
    }    

    public function get_video()
    {
        return $this->hasMany(KontenVideo::class);
    }

    public function get_content()
    {
    	return $this->hasMany(Content::class);
    }    

    public function get_file()
    {
        return $this->hasMany(AssignmentFile::class);
    }

    public function get_pilgan()
    {
        return $this->hasMany(AssignmentPilgan::class);
    }

    public function get_text()
    {
        return $this->hasMany(AssignmentText::class);
    }

    public function AksesKelas()
    {
        return $this->belongsToMany(User::class,'akses_kelas','user_id','kelas_id');
    }
}
