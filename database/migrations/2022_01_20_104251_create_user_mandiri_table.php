<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMandiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mandiri', function (Blueprint $table) {
            $table->id();
            $table->string('tugas_mandiri')->nullable();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("mata_kuliah_id")->constrained("mata_kuliah")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("pertemuan_id")->constrained("assignment")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('user_mandiri');
    }
}
