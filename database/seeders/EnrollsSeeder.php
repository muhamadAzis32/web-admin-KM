<?php

namespace Database\Seeders;

use App\Models\EnrollMataKuliah;
use App\Models\EnrollStudi;
use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class EnrollsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EnrollStudi::create([
            'id' => 1,
            'user_id' => 4,
            'kelas_id' => 1.
        ]);

        EnrollMataKuliah::create([
            'id' => 1,
            'user_id' => 5,
            'mata_kuliah_id' => 1,
            'enroll_studi_id' => 1,
            'semester' => 1,
            'nilai_akhir' => 97,
        ]);
        EnrollMataKuliah::create([
            'id' => 2,
            'user_id' => 6,
            'mata_kuliah_id' => 1,
            'enroll_studi_id' => 1,
            'semester' => 1,
            'nilai_akhir' => 86,
        ]);
        EnrollMataKuliah::create([
            'id' => 3,
            'user_id' => 4,
            'mata_kuliah_id' => 1,
            'enroll_studi_id' => 1,
            'semester' => 1,
            'nilai_akhir' => 50,
        ]);
        EnrollMataKuliah::create([
            'id' => 4,
            'user_id' => 5,
            'mata_kuliah_id' => 2,
            'enroll_studi_id' => 1,
            'semester' => 1,
            'nilai_akhir' => 80,
        ]);
        EnrollMataKuliah::create([
            'id' => 5,
            'user_id' => 5,
            'mata_kuliah_id' => 3,
            'enroll_studi_id' => 1,
            'semester' => 2,
            'nilai_akhir' => 40,
        ]);
    }
}
