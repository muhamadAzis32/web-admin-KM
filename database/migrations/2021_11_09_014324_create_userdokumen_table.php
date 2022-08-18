<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdokumen', function (Blueprint $table) {
            $table->id();
            $table->integer('progress');
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("konten_dokumen_id")->constrained("konten_dokumen")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("enroll_mata_kuliah_id")->constrained("enroll_mata_kuliah")->onDelete("cascade")->onUpdate("cascade");
            $table->boolean('isComplete')->default(false);
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
        Schema::dropIfExists('userdokumen');
    }
}
