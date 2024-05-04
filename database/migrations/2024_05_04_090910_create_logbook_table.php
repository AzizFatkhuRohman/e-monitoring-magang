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
        Schema::create('logbook', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('mahasiswa_id')->references('id')->on('mahasiswa')->onUpdate('cascade');
            $table->string('week');
            $table->string('mounth');
            $table->string('gambar');
            $table->text('keterangan');
            $table->string('tool_used');
            $table->string('safety_key_point');
            $table->string('problem_solf');
            $table->string('hyarihatto');
            $table->string('point_to_remember');
            $table->string('self_evaluation');
            $table->string('komentar_mentor');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbook');
    }
};
