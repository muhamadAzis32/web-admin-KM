<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gambar')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('firebaseUID')->unique()->nullable();
            $table->string('dosen_akademik')->nullable();
            $table->enum('role', ['admin', 'dosen', 'mahasiswa', 'guest'])->default('guest');
            $table->timestamps();
        });

        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'role' => 'admin',
        //     'firebaseUID' => 'admin',
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'dosen',
        //     'email' => 'dosen@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'role' => 'dosen',
        //     'firebaseUID' => 'dosen',
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'user',
        //     'email' => 'user@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'role' => 'mahasiswa',
        //     'firebaseUID' => 'user',
        //     'dosen_akademik' => 'dosen',
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'learning',
        //     'email' => 'learning.kampusgratis1@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'role' => 'mahasiswa',
        //     'firebaseUID' => 'o6xpgIdzzuY5A4wgfQLwpIGoOs42',
        //     'dosen_akademik' => 'dosen',
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'learning',
        //     'email' => 'learning.kampusgratis3@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'role' => 'mahasiswa',
        //     'firebaseUID' => 'jkWufdhKgGed7WbF4msiyAttgBY2',
        //     'dosen_akademik' => 'dosen',
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'riyanto',
        //     'email' => 'salamceocantiq@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'role' => 'mahasiswa',
        //     'firebaseUID' => 'NYErGOvHwWRui406d8MkwoMz4Qv2',
        //     'dosen_akademik' => 'dosen',
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
