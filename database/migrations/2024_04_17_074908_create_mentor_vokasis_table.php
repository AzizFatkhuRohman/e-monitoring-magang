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
        Schema::create('mentor_vokasis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('grup_leader_id')->references('id')->on('grup_leaders')->onDelete('cascade');
            $table->string('alamat_email_mentor');
            $table->string('no_telp_mentor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_vokasis');
    }
};
