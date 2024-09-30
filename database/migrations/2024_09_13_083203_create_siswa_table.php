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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger(column: 'wali_kelas_id');
            $table->string('kelas');
            
            // $table->foreignId('wali_kelas_id')->nullable(); // Belum ada foreign key, buat nullable
            $table->decimal('saldo', 15, 2)->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('wali_kelas_id')->references('wali_kelas_id')->on('wali_kelas')->onDelete('cascade');
        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropForeign(['kelas']);
            $table->dropColumn('kelas');
            
            $table->dropForeign(['user_id']); // Hapus foreign key user_id
            $table->dropColumn('user_id'); // Hapus kolom user_id
        });
    }
};