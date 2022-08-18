<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataKuliah;
use App\Models\Pertemuan;

class PertemuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pertemuan::create([
            'id' => '1',
            'pertemuan' => '1',
            'judul' => 'Konsep dan Teori Dasar Usaha Mikro Kecil dan Menengah (UMKM).',
            'deskripsi' => 'Ini kelas kredit',
            'mata_kuliah_id' => '1',
            'kontenVideo_id' => json_decode('[{"id":1},{"id":2}]'),
            'kontenDokumen_id' => json_decode('[{"id":1}]'),
            'isMandiri' => true,
            'tugas_mandiri' => 'abc.com',
            'tipe' => 1
        ]);

        Pertemuan::create([
            'id' => '2',
            'pertemuan' => '2',
            'judul' => 'Beragam Karakteristik Bisnis UMKM, Kriteria Kekayaan Bersih dan Peran UMKM Bagi Perkembangan Ekonomi di Indonesia.',
            'deskripsi' => 'Ini kelas kredit',
            'mata_kuliah_id' => '1',
            'kontenVideo_id' => json_decode('[{"id":1},{"id":2}]'),
            'kontenDokumen_id' => json_decode('[{"id":1}]'),
            'isMandiri' => true,
            'tugas_mandiri' => 'abc.com',
            'tipe' => 1
        ]);

        Pertemuan::create([
            'id' => '3',
            'pertemuan' => '3',
            'judul' => 'Regulasi Terkait UMKM yang Ada di Indonesia.',
            'deskripsi' => 'Ini kelas kredit',
            'mata_kuliah_id' => '1',
            'kontenVideo_id' => json_decode('[{"id":1},{"id":2}]'),
            'kontenDokumen_id' => json_decode('[{"id":1}]'),
            'isMandiri' => true,
            'tugas_mandiri' => 'abc.com',
            'tipe' => 1
        ]);

        Pertemuan::create([
            'id' => '4',
            'pertemuan' => '4',
            'judul' => 'Perkembangan Usaha & Indikator Perkembangan Usaha Serta Peluang dan Tantangan Pengembangan Bisnis UMKM Indonesia.',
            'deskripsi' => 'Ini kelas kredit',
            'mata_kuliah_id' => '1',
            'kontenVideo_id' => json_decode('[{"id":1},{"id":2}]'),
            'kontenDokumen_id' => json_decode('[{"id":1}]'),
            'isMandiri' => false,
            'tugas_mandiri' => 'abc.com',
            'tipe' => 1
        ]);

        Pertemuan::create([
            'id' => '5',
            'pertemuan' => '5',
            'judul' => 'Komponen Analisa Persaingan Usaha.',
            'deskripsi' => 'Ini kelas kredit',
            'mata_kuliah_id' => '1',
            'kontenVideo_id' => json_decode('[{"id":1},{"id":2}]'),
            'kontenDokumen_id' => json_decode('[{"id":1}]'),
            'isMandiri' => false,
            'tugas_mandiri' => 'abc.com',
            'tipe' => 1
        ]);        
    }
}

