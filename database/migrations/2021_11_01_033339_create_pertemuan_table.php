<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertemuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertemuan', function (Blueprint $table) {
            $table->id();
            $table->integer('pertemuan');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('tugas_mandiri')->nullable();
            $table->enum('tipe', ['1', '2', '3'])->default('1');
            $table->foreignId("mata_kuliah_id")->constrained("mata_kuliah")->onDelete("cascade")->onUpdate("cascade");
            $table->json("kontenVideo_id")->nullable();
            $table->json("kontenDokumen_id")->nullable();
            $table->boolean("isMandiri")->default(false);
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
        Schema::dropIfExists('pertemuan');
    }
}
