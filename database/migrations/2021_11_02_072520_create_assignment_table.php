<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('file')->nullable();
            $table->enum('jenis', ['Latihan Soal', 'Investigasi Pendalaman', 'Experiment', 'Tugas']);
            // $table->enum('tipe', ['Text', 'File', 'Pilgan'])->default('Text');
            $table->date('deadline');
            $table->foreignId("pertemuan_id")->constrained("pertemuan")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("mata_kuliah_id")->constrained("mata_kuliah")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('assignment');
    }
}
