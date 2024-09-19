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
        Schema::create('kepala_sekolah', function (Blueprint $table) {
            $table->id('kepala_sekolah_id');
            $table->foreignId('user_id') // Definisikan user_id di sini
                  ->constrained('users','user_id') // Relasi ke tabel users
                  ->onDelete('cascade'); // Hapus data siswa jika user dihapus
                  $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepala_sekolah');
    }
};