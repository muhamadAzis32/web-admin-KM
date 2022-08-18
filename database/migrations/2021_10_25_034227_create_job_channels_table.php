<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_channel', function (Blueprint $table) {
            $table->id();
            $table->string('posisi_pekerjaan');
            $table->string('nama_perusahaan');
            $table->string('gaji');
            $table->string('bidang');
            $table->enum('tipe', ['Kerja', 'Magang', 'Project'])->default('Kerja');
            $table->enum('jenis', ['Full Time', 'Part Time', 'Internship'])->default('Full Time');
            $table->longText('requirement'); 
            $table->longText('job_desk'); 
            $table->string('alamat'); 
            $table->string('foto');
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
        Schema::dropIfExists('job_channel');
    }
}
