<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Musonza\Chat\Traits\Messageable;

class User extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable, Messageable;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    
     */

    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'level',
        'gambar',
        'no_hp',
        'firebaseUID',
        'dosen_akademik',
        'role'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function AksesKelas()
    {
        return $this->belongsToMany(MataKuliah::class,'akses_kelas','mata_kuliah_id','user_id');
    }

    public function get_mata_kuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }

    public function get_akses_kelas()
    {
        return $this->hasMany(AksesKelas::class);
    }

    public function studi()
    {
        return $this->hasOne(EnrollStudi::class);
    }

    public function data_dosen()
    {
        return $this->hasOne(DataDosen::class);
    }
    public function getAvatarAttribute()
    {
        return 'https://www.gravatar.com/avatar/' . md5(strtolower($this->email));
    }

    public function messagesTo()
    {
        return $this->hasOne(Message::class, 'to_id')->latest();
    }

    public function messagesFrom()
    {
        return $this->hasOne(Message::class, 'from_id')->latest();
    }
    
}
