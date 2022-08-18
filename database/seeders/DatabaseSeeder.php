<?php

namespace Database\Seeders;

use App\Models\DataDosen;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ProgramSeeder::class,
            KategoriSeeder::class,
            KelasSeeder::class,
            MataKuliahSeeder::class,
            PertemuanSeeder::class,
            HakAksesDosenSeeder::class,
            KontenVideoSeeder::class,
            NilaiSeeder::class,
            // EnrollsSeeder::class,
            KontenDokumenSeeder::class,
            QuestionSeeder::class,
            DataDosenSeeder::class
        ]);
    }
}
