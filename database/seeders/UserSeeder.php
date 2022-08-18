<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'admin',
            'firebaseUID' => 'admin',
        ]);
        User::create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('kampusgratis2022'),
            'role' => 'admin',
            'firebaseUID' => 'admin1',
        ]);
        User::create([
            'name' => 'dosen',
            'email' => 'dosen@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'dosen',
            'firebaseUID' => 'dosen',
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'mahasiswa',
            'firebaseUID' => 'user',
            'dosen_akademik' => 'dosen',
        ]);
        User::create([
            'name' => 'learning',
            'email' => 'learning.kampusgratis1@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'mahasiswa',
            'firebaseUID' => 'o6xpgIdzzuY5A4wgfQLwpIGoOs42',
            'dosen_akademik' => 'dosen',
        ]);
        User::create([
            'name' => 'learning',
            'email' => 'learning.kampusgratis3@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'mahasiswa',
            'firebaseUID' => 'jkWufdhKgGed7WbF4msiyAttgBY2',
            'dosen_akademik' => 'dosen',
        ]);
        User::create([
            'name' => 'riyanto',
            'email' => 'salamceocantiq@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'mahasiswa',
            'firebaseUID' => 'NYErGOvHwWRui406d8MkwoMz4Qv2',
            'dosen_akademik' => 'dosen',
        ]);
    }
}
