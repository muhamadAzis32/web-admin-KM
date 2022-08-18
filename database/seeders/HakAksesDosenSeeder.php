<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AksesKelas;

class HakAksesDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AksesKelas::create([
            'id' => '1',
            'user_id' => '2',
            'mata_kuliah_id' => '1',
        ]);  

        AksesKelas::create([
            'id' => '2',
            'user_id' => '2',
            'mata_kuliah_id' => '2',
        ]);  

        AksesKelas::create([
            'id' => '3',
            'user_id' => '2',
            'mata_kuliah_id' => '3',
        ]);  
    }
}
