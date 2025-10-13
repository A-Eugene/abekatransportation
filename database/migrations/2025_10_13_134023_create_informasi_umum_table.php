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
        Schema::create('informasi_umum', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_informasi_umum')->cascadeOnDelete();
            $table->string('judul');
            $table->text('isi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_umum');
    }
};
