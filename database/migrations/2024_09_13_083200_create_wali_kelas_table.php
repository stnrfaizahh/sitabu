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
        Schema::create('wali_kelas', function (Blueprint $table) {
            $table->id('wali_kelas_id');
            $table->foreignId(column: 'siswa_id')->constrained('siswa', 'siswa_id')->onDelete('cascade');
            $table->decimal('pemasukan');
            $table->decimal('pengeluaran');
            $table->decimal( 'saldo', 15, 2)->default(0);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wali_kelas');
    }
};