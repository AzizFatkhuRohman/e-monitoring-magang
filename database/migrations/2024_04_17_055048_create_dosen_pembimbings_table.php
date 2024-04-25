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
        Schema::create('dosen_pembimbings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_dosen');
            $table->string('nomor_induk_pegawai');
            $table->string('gelar');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_pembimbings');
    }
};
