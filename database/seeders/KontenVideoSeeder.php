<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KontenVideo;

class KontenVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KontenVideo::create([
            'id' => '1',
            'judul' => 'Belajar Python 1',
            'deskripsi' => 'Ini video python',
            'link' => 'iA8lLwmtKQM',
            'durasi' => '1437',
            'mata_kuliah_id' => '1',
            'kategori_id' => '1'
        ]);

        KontenVideo::create([
            'id' => '2',
            'judul' => 'Belajar Python 2',
            'deskripsi' => 'Ini video python',
            'link' => 'iA8lLwmtKQM',
            'durasi' => '1437',
            'mata_kuliah_id' => '1',
            'kategori_id' => '1'
        ]);

        KontenVideo::create([
            'id' => '3',
            'judul' => 'Belajar Python 3',
            'deskripsi' => 'Ini video python',
            'link' => 'iA8lLwmtKQM',
            'durasi' => '1437',
            'mata_kuliah_id' => '1',
            'kategori_id' => '1'
        ]);

        KontenVideo::create([
            'id' => '4',
            'judul' => 'Belajar Python 4',
            'deskripsi' => 'Ini video python',
            'link' => 'iA8lLwmtKQM',
            'durasi' => '1437',
            'mata_kuliah_id' => '1',
            'kategori_id' => '2'
        ]);

        KontenVideo::create([
            'id' => '5',
            'judul' => 'Belajar Python 5',
            'deskripsi' => 'Ini video python',
            'link' => 'iA8lLwmtKQM',
            'durasi' => '1437',
            'mata_kuliah_id' => '1',
            'kategori_id' => '3'
        ]);
    }
}
