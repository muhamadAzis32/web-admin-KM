<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatkulJadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matkul_jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enroll_matkul_id')->constrained('enroll_mata_kuliah')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('jadwal_id')->constrained('jadwal_kuliah')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('matkul_jadwal');
    }
}
