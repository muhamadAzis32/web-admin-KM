<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_exam', function (Blueprint $table) {
            $table->id();
            $table->json('exam')->nullable();
            $table->integer('grade')->nullable();
            $table->integer('grade_1')->nullable();
            $table->integer('grade_2')->nullable();
            $table->integer('grade_3')->nullable();
            $table->text('feedback_1')->nullable(); //Kedalaman Analisa
            $table->text('feedback_2')->nullable(); //Flow Argumentasi dan Banyaknya Rujukan
            $table->text('feedback_3')->nullable(); //Kosmetika dan Alur Tampilan
            $table->enum('tipe', ['uts', 'uas'])->default('uts');
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("mata_kuliah_id")->constrained("mata_kuliah")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("exam_id")->constrained("exam")->onDelete("cascade")->onUpdate("cascade");
            $table->boolean('isComplete')->default(false);
            $table->boolean('isremed')->default(false);
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
        Schema::dropIfExists('user_exam');
    }
}
