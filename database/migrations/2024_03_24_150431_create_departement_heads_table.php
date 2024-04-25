<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departement_heads', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('departement_id')->references('id')->on('departements')->onDelete('cascade');
            $table->string('nama_departement_head');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departement_heads');
    }
};
