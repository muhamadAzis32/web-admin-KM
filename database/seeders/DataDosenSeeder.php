<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataDosen;

class DataDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataDosen::create([
            'tipe' => '1',
            'detail_dosen' => 'Salah satu dosen yang mengajar di kampus gratis',
            'nama_lengkap' => 'Halima Rahimah',
            'no_hp' => '084106046224',
            'alamat' => 'Kpg. Bayan No. 185, Batu 83857, KalBar',
            'nidn' => '0012025703',
            'ktp' => '3525015201880002',
            'isVerified' => "1",
            'user_id' => '2',
        ]);
        DataDosen::create([
            'tipe' => '1',
            'detail_dosen' => 'Salah satu dosen yang mengajar di kampus gratis',
            'nama_lengkap' => 'Indra Natsir ',
            'no_hp' => '0849 4555 9770',
            'alamat' => 'Jr. Bhayangkara No. 751, Makassar 71237, Aceh',
            'nidn' => '0313037101',
            'ktp' => '3326160608070197',
            'isVerified' => "1",
            'user_id' => '2',
        ]);
    }
}
