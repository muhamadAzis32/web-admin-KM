<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    protected $table = 'guide';
    protected $fillable = [
        'judul',
        'tipe',
        'link',
        'file',
        'deskripsi',
        'thumbnail'
    ];

    
    protected $primaryKey = 'id';
}
