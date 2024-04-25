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
        Schema::create('grup_leaders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('section_head_id')->references('id')->on('section_heads')->onDelete('cascade');
            $table->string('nama_grup_leader');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grup_leaders');
    }
};
