<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('kode');
            $table->integer('sks');
            $table->integer('semester');
            $table->foreignId("kategori_id")->constrained("kategori")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("kelas_id")->constrained("kelas")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('mata_kuliah');
    }
}
