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
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('siswa_id');
            $table->string('nama');
            $table->string('kelas');
            $table->index('kelas');
            $table->decimal('pemasukan', 15, 2)->default(0);
            $table->decimal('pengeluaran', 15, 2)->default(0);
            $table->decimal( 'saldo', 15, 2)->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
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