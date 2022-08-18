<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap')->nullable();
            $table->string('nik')->nullable();
            $table->string('nim')->nullable();
            $table->string('email')->nullable();
            $table->string('universitas')->nullable();
            $table->string('prodi')->nullable();
            $table->string('tahun_ajar')->nullable();
            $table->integer('semester')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('kelamin')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->string('tinggal')->nullable();
            $table->string('pembiaya')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('kerja_ayah')->nullable();
            $table->string('kerja_ibu')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('penghasilan')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('pakta_integritas')->nullable();
            $table->string('scan_ktp')->nullable();
            $table->string('scan_kk')->nullable();
            $table->string('scan_ijazah')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('transkip')->nullable();
            $table->string('surat_rekomendasi')->nullable();
            $table->boolean('isVerified')->nullable();
            $table->boolean('isComplete')->nullable();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade")->nullable();
            $table->foreignId("program_id")->nullable()->constrained("program")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('data_mahasiswa');
    }
}
