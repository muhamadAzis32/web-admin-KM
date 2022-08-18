<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'id' => '1',
            'nama' => 'Credit',
            'deskripsi' => 'Ini program studi kredit',
            'program_id' => '1'
        ]);    
        
        Kelas::create([
            'id' => '2',
            'nama' => 'Sales',
            'deskripsi' => 'Ini program studi sales',
            'program_id' => '1'
        ]);   

        Kelas::create([
            'id' => '3',
            'nama' => 'Collection',
            'deskripsi' => 'Ini program studi collection',
            'program_id' => 2
        ]); 
        
        Kelas::create([
            'id' => '4',
            'nama' => 'Manajemen operasional & kualitas',
            'deskripsi' => 'Ini program studi Manajemen operasional & kualitas',
            'program_id' => 2
        ]);  

        Kelas::create([
            'id' => '5',
            'nama' => 'Logistik & supply chain',
            'deskripsi' => 'Ini program studi Logistik & supply chain',
            'program_id' => 3
        ]);  

        Kelas::create([
            'id' => '6',
            'nama' => 'Ekspor & Impor',
            'deskripsi' => 'Ini program studi Ekspor & Impor',
            'program_id' => 3
        ]);  

        Kelas::create([
            'id' => '7',
            'nama' => 'Cyber Security',
            'deskripsi' => 'Ini program studi Cyber Security',
            'program_id' => 4
        ]);  

        Kelas::create([
            'id' => '8',
            'nama' => 'Block Chain',
            'deskripsi' => 'Ini program studi Block Chain',
            'program_id' => 4
        ]);  

        Kelas::create([
            'id' => '9',
            'nama' => 'Big Data',
            'deskripsi' => 'Ini program studi Big Data',
            'program_id' => 1
        ]);  


        Kelas::create([
            'id' => '10',
            'nama' => 'AI & Algorithm',
            'deskripsi' => 'Ini program studi AI & Algorithm',
            'program_id' => 1
        ]);  

        Kelas::create([
            'id' => '11',
            'nama' => 'CSC',
            'deskripsi' => 'Ini program studi CSC',
            'program_id' => 2
        ]);  

        Kelas::create([
            'id' => '12',
            'nama' => 'Flutter',
            'deskripsi' => 'Ini program studi Flutter',
            'program_id' => 2
        ]);  

        Kelas::create([
            'id' => '13',
            'nama' => 'Firebase & MySQL',
            'deskripsi' => 'Ini program studi Firebase & MySQL',
            'program_id' => 3
        ]);  

        Kelas::create([
            'id' => '14',
            'nama' => 'Web Development',
            'deskripsi' => 'Ini program studi Web Development',
            'program_id' => 3
        ]);  

        Kelas::create([
            'id' => '15',
            'nama' => 'REST API',
            'deskripsi' => 'Ini program studi REST API',
            'program_id' => 4
        ]);  

        Kelas::create([
            'id' => '16',
            'nama' => 'Backend Laravel',
            'deskripsi' => 'Ini program studi Backend Laravel',
            'program_id' => 4
        ]);  

        Kelas::create([
            'id' => '17',
            'nama' => 'Digital Marketing ',
            'deskripsi' => 'Ini program studi Digital Marketing',
            'program_id' => 1
        ]);  

        Kelas::create([
            'id' => '18',
            'nama' => 'Digital Research',
            'deskripsi' => 'Ini program studi Digital Research',
            'program_id' => 1
        ]);  

        Kelas::create([
            'id' => '19',
            'nama' => 'Digital Outreach',
            'deskripsi' => 'Ini program studi Digital Outreach',
            'program_id' => 2
        ]);  

        Kelas::create([
            'id' => '20',
            'nama' => 'VR & AR',
            'deskripsi' => 'Ini program studi VR & AR',
            'program_id' => 2
        ]);  

        Kelas::create([
            'id' => '21',
            'nama' => 'Streamer, Podcast & Youtuber Academy',
            'deskripsi' => 'Ini program studi Streamer, Podcast & Youtuber Academy',
            'program_id' => 3
        ]);  
    }
}

