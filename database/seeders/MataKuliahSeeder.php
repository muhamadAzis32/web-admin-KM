<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MataKuliah::create([
            'id' => '1',
            'kode' => '1111',
            'judul' => 'Pengantar UMKM',
            'deskripsi' => 'Ini kelas kredit',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '2',
            'semester' => '1',
        ]);    
        
        MataKuliah::create([
            'id' => '2',
            'kode' => '1112',
            'judul' => 'Pengantar Kredit I',
            'deskripsi' => 'Ini kelas KREDIT',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '2',
            'semester' => '2',
        ]);   

        MataKuliah::create([
            'id' => '3',
            'kode' => '1113',
            'judul' => 'Pengantar Kredit II',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '3',
        ]);  

        MataKuliah::create([
            'id' => '4',
            'kode' => '2565',
            'judul' => 'Lembaga Keuangan',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '1',  
        ]);  

        MataKuliah::create([
            'id' => '5',
            'kode' => '2565',
            'judul' => 'Pengantar Keuangan dan Akutansi Perusahaan',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '1',  
        ]);  

        MataKuliah::create([
            'id' => '6',
            'kode' => '2565',
            'judul' => 'Manajemen Keuangan dan Arus Kas Perusahaan',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '1',  
        ]);

        MataKuliah::create([
            'id' => '7',
            'kode' => '2565',
            'judul' => 'Hutang Piutang dan Manajemen Kredit',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '1',  
        ]);  

        MataKuliah::create([
            'id' => '8',
            'kode' => '2565',
            'judul' => 'Analisa Kredit Bagi UMKM I',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '1',  
        ]);  

        MataKuliah::create([
            'id' => '9',
            'kode' => '2565',
            'judul' => 'Perencanaan & Permohonan Kredit',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '1',  
        ]);  

        MataKuliah::create([
            'id' => '10',
            'kode' => '2565',
            'judul' => 'Risiko Kredit',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '2',  
        ]);  

        MataKuliah::create([
            'id' => '11',
            'kode' => '2565',
            'judul' => 'Perjanjian dan Pemberian Kredit bagi UMKM',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '2',  
        ]);  

        MataKuliah::create([
            'id' => '12',
            'kode' => '2565',
            'judul' => 'Analisa Kredit bagi UMKM II',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '2',  
        ]);  

        MataKuliah::create([
            'id' => '13',
            'kode' => '2565',
            'judul' => 'Analisa Pertimbangan Kredit',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '2',  
        ]);  

        MataKuliah::create([
            'id' => '14',
            'kode' => '2565',
            'judul' => 'Pemberian Keputusan dan Pengawasan Kredit',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '2',  
        ]);  

        MataKuliah::create([
            'id' => '15',
            'kode' => '2565',
            'judul' => 'Credit Scoring & Statistic Credit',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '2',  
        ]);  

        MataKuliah::create([
            'id' => '16',
            'kode' => '2565',
            'judul' => 'Credit Analytics & Credit 5.0 di Era AI',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '2',  
        ]);  

        MataKuliah::create([
            'id' => '17',
            'kode' => '2565',
            'judul' => 'Bahasa Inggris',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '10', 
            // 10 Mata Kuliah Umum (MKU) 
        ]);  

        MataKuliah::create([
            'id' => '18',
            'kode' => '2565',
            'judul' => 'Pendidikan Agama',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '10', 
            // 10 Mata Kuliah Umum (MKU) 
        ]);  

        MataKuliah::create([
            'id' => '19',
            'kode' => '2565',
            'judul' => 'Pancasila',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '10', 
            // 10 Mata Kuliah Umum (MKU) 
        ]);  

        MataKuliah::create([
            'id' => '20',
            'kode' => '2565',
            'judul' => 'Pendidikan Kewarganegaraan (PKN)',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '10', 
            // 10 Mata Kuliah Umum (MKU) 
        ]);  

        MataKuliah::create([
            'id' => '21',
            'kode' => '2565',
            'judul' => 'Bahasa Indonesia',
            'deskripsi' => 'Ini kelas collection',
            'kategori_id' => '1',
            'kelas_id' => '1',
            'sks' => '3',
            'semester' => '10', 
            // 10 Mata Kuliah Umum (MKU) 
        ]);

    }
}

