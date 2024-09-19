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
        Schema::create('laporan_bendahara', function (Blueprint $table) {
            $table->id('laporan_bendahara_id'); // Kolom ID
            $table->foreignId('bendahara_id')->constrained('bendahara', 'bendahara_id')->onDelete('cascade'); // Relasi ke bendahara
            $table->decimal('total_penarikan', 15, 2); // Total penarikan
            $table->decimal('total_setoran', 15, 2); // Total setoran
            $table->string('periode_bulan'); // Bulan laporan
            $table->unsignedSmallInteger('periode_tahun'); // Tahun laporan
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_bendahara');
    }
};