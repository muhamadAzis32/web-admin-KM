<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'id' => '1',
            'nama_kategori' => 'Basic',
            'deskripsi' => 'Ini kategori basic'
        ]);  
        
        Kategori::create([
            'id' => '2',
            'nama_kategori' => 'Intermediate',
            'deskripsi' => 'Ini kategori intermediate'
        ]); 

        Kategori::create([
            'id' => '3',
            'nama_kategori' => 'Advance',
            'deskripsi' => 'Ini kategori advance'
        ]); 
    }
}
