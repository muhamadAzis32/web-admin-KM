<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis',['UTS','UAS']);
            $table->string('bab');            
            $table->string('pengantar');
            $table->string('soal');
            $table->enum('status',['active','pending'])->default('active');
            $table->foreignId("assignment_id")->constrained("assignment")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('ujian');
    }
}
