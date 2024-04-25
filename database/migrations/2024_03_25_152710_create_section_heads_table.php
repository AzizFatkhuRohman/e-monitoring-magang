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
        Schema::create('section_heads', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreignUuid('department_head_id')->references('id')->on('departement_heads')->onDelete('cascade');
            $table->string('nama_section_head');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_heads');
    }
};
