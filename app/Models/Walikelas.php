<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walikelas extends Model
{
    use HasFactory;
    protected $table = 'wali_kelas';
   
    protected $primaryKey = 'wali_kelas_id'; 
    public $incrementing = false; 
    
    protected $fillable = [
        'siswa_id',
        'pemasukan',
        'pengeluaran',
        'saldo',
    ];


    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function laporanKelas()
    {
        return $this->hasMany(LaporanKelas::class, 'wali_kelas_id');
    }
}