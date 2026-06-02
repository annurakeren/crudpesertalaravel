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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable(); // foto peserta
            $table->string('nama');             // nama peserta
            $table->string('no_ujian')->unique(); // nomor ujian
            $table->decimal('nilai_ujian', 5, 2); // nilai ujian (contoh: 85.50)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
