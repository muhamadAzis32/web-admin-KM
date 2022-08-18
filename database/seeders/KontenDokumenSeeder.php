<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KontenDokumen;

class KontenDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KontenDokumen::create([
            'id' => '1',
            'judul' => 'Dokumen A',
            'deskripsi' => 'Ini dokumen A',
            'file' => 'storage/documents/contoh.pdf',
            'mata_kuliah_id' => '1',
            'kategori_id' => '1'
        ]);

        KontenDokumen::create([
            'id' => '2',
            'judul' => 'Dokumen B',
            'deskripsi' => 'Ini dokumen B',
            'file' => 'storage/documents/contoh.pdf',
            'mata_kuliah_id' => '1',
            'kategori_id' => '1'
        ]);

        KontenDokumen::create([
            'id' => '3',
            'judul' => 'Dokumen C',
            'deskripsi' => 'Ini dokumen C',
            'file' => 'storage/documents/contoh.pdf',
            'mata_kuliah_id' => '1',
            'kategori_id' => '1'
        ]);
    }
}
