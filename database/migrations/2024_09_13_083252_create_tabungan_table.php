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
        Schema::create('tabungan', function (Blueprint $table) {
            $table->id('tabungan_id');
            $table->foreignId('siswa_id')->constrained('siswa','siswa_id')->onDelete('cascade'); // Relasi ke siswa
            $table->decimal('jumlah_transaksi', 15, 2); // Jumlah transaksi
            $table->enum('jenis_transaksi', ['setor', 'tarik']); // Jenis transaksi
            $table->decimal('saldo', 15, 2); // Saldo setelah transaksi
            $table->date('tanggal_transaksi'); // Tanggal transaksi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabungan');
    }
};