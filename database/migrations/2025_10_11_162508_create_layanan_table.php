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
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->decimal('harga_per_km', 10, 2);
            $table->decimal('harga_per_kg', 10, 2);
            $table->decimal('biaya_minimum', 10, 2);
            $table->decimal('berat_maks_kg', 8, 2)->default(1000);
            $table->decimal('volume_maks_m3', 8, 3)->default(5.000);
            $table->decimal('berat_volumetrik_ratio', 8, 2)->default(4000);
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
