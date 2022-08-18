<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_assignment', function (Blueprint $table) {
            $table->id();
            $table->string('assignment')->nullable();
            $table->integer('grade')->nullable();
            $table->integer('grade_1')->nullable();
            $table->integer('grade_2')->nullable();
            $table->integer('grade_3')->nullable();
            $table->text('feedback_1')->nullable(); //Kedalaman Analisa
            $table->text('feedback_2')->nullable(); //Flow Argumentasi dan Banyaknya Rujukan
            $table->text('feedback_3')->nullable(); //Kosmetika dan Alur Tampilan
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("mata_kuliah_id")->constrained("mata_kuliah")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("assignment_id")->constrained("assignment")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('user_assignment');
    }
}
