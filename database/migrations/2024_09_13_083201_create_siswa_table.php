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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('siswa_id');
            $table->unsignedBigInteger('wali_kelas_id')->nullable(); // Menambahkan kolom wali_kelas_id
            // $table->foreign('wali_kelas_id')
            //         ->references('wali_kelas_id')->on('wali_kelas')
            //         ->onDelete('cascade');
           
            $table->foreignId('user_id') // Definisikan user_id di sini
                  ->constrained('users') // Relasi ke tabel users
                  ->onDelete('cascade'); // Hapus data siswa jika user dihapus
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropForeign(['wali_kelas_id']);
            $table->dropColumn('wali_kelas_id');

            $table->dropForeign(['user_id']); // Hapus foreign key user_id
            $table->dropColumn('user_id'); // Hapus kolom user_id
        });
    }
};