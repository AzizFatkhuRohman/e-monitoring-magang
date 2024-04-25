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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('dosen_pembimbing_id')->references('id')->on('dosen_pembimbings')->onDelete('cascade');
            $table->foreignUuid('mentor_vokasi_id')->references('id')->on('mentor_vokasis')->onDelete('cascade');
            $table->string('nama_mahasiswa');
            $table->integer('nomor_induk_mahasiswa');
            $table->string('no_registrasi_vokasi');
            $table->string('shop');
            $table->string('divisi');
            $table->string('line');
            $table->string('pos');
            $table->string('shift');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
