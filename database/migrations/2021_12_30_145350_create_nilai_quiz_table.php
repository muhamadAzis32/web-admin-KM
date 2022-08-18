<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_quiz', function (Blueprint $table) {
            $table->id();
            $table->integer('grade')->nullable();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("mata_kuliah_id")->constrained("mata_kuliah")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("quiz_id")->constrained("quiz")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('nilai_quiz');
    }
}
