<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollMataKuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enroll_mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->unique(["mata_kuliah_id","user_id"]);
            $table->foreignId("mata_kuliah_id")->constrained("mata_kuliah")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("enroll_studi_id")->constrained("enroll_studi")->onDelete("cascade")->onUpdate("cascade");
            $table->integer('semester')->nullable();
            $table->double('nilai_akhir')->nullable();
            $table->boolean('isComplete')->default(false);
            $table->boolean('isStart')->default(false);
            $table->foreignId("dosen_id")->constrained("data_dosen")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('enroll_mata_kuliah');
    }
}