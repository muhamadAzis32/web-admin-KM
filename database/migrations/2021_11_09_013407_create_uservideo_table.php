<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUservideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uservideo', function (Blueprint $table) {
            $table->id();
            $table->integer('progress');
            
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("konten_video_id")->constrained("konten_video")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('uservideo');
    }
}
