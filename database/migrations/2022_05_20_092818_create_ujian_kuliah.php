<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjianKuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_kuliah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matkul_id')->constrained('mata_kuliah')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('dosen_id')->constrained('data_dosen')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->constrained('data_mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal_ujian');
            $table->date('deadline');
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
        Schema::dropIfExists('ujian_kuliah');
    }
}
