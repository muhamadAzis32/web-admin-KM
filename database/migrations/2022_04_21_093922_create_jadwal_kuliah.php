<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kuliah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matkul_id')->constrained('mata_kuliah')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('dosen_id')->constrained('data_dosen')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->time('jam_kuliah');
            $table->string('hari');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_kuliah');
    }
}
