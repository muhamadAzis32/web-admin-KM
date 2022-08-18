<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->text('soal');
            $table->text('opsi_a');
            $table->text('opsi_b');
            $table->text('opsi_c');
            $table->text('opsi_d');
            $table->text('opsi_e');
            $table->text('jawaban');
            $table->text('penjelasan');
            $table->foreignId("quiz_id")->constrained("quiz")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('questions');
    }
}
