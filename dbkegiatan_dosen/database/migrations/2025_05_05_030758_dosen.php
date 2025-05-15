<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nidn', 20);
            $table->string('name', 45);
            $table->string('gelar_belakang', 30);
            $table->string('gelar_depan', 20);
            $table->char('jenis_kelamin', 1);
            $table->string('tempat_lahir', 45);
            $table->date('tanggal_lahir');
            $table->string('alamat', 100);
            $table->string('email', 45)->unique();
            $table->integer('tahun_masuk');

            $table->unsignedBigInteger('prodi_id');
            $table->foreign('prodi_id')->references('id')->on('prodi');
            $table->timestamps();
        });

        Schema::create('bidang_ilmu', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->unique();
            $table->text('deskripsi');
            $table->timestamps();
        });


        Schema::create('jenis_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->unique();
            $table->timestamps();
        });

        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('tempat', 100);
            $table->text('deskripsi');

            $table->unsignedBigInteger('jenis_kegiatan_id');
            $table->foreign('jenis_kegiatan_id')->references('id')->on('jenis_kegiatan');
            $table->timestamps();
        });

        Schema::create('dosen_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('dosen');

            $table->unsignedBigInteger('kegiatan_id');
            $table->foreign('kegiatan_id')->references('id')->on('kegiatan');
            $table->timestamps();
        });

        Schema::create('penelitian', function (Blueprint $table) {
            $table->id();
            $table->text('judul');
            $table->date('mulai');
            $table->date('akhir');
            $table->string('tahun_ajaran', 5);

            $table->unsignedBigInteger('bidang_ilmu_id');
            $table->foreign('bidang_ilmu_id')->references('id')->on('bidang_ilmu');
            $table->timestamps();
        });

        Schema::create('tim_penelitian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('dosen');

            $table->unsignedBigInteger('penelitian_id');
            $table->foreign('penelitian_id')->references('id')->on('penelitian');
            $table->string('peran', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
        Schema::dropIfExists('bidang_ilmu');
        Schema::dropIfExists('jenis_kegiatan');
        Schema::dropIfExists('kegiatan');
        Schema::dropIfExists('dosen_kegiatan');
        Schema::dropIfExists('penelitian');
        Schema::dropIfExists('tim_penelitian');
    }
};
