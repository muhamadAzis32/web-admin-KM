<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([
            'id' => 1,
            'nama_program' => 'S1',
            'detail' => 'Program S1'
        ]);
        Program::create([
            'id' => 2,
            'nama_program' => 'D1',
            'detail' => 'Program D1'
        ]);
        Program::create([
            'id' => 3,
            'nama_program' => 'Crash Program',
            'detail' => 'Program Crash Program'
        ]);
        Program::create([
            'id' => 4,
            'nama_program' => 'Kursus',
            'detail' => 'Program Kursus'
        ]);
    }
}
