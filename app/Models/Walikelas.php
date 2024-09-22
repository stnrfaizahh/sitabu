<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;       


class Walikelas extends Model
{
    use HasFactory;
    protected $table = 'wali_kelas';
    protected $primaryKey = 'wali_kelas_id'; 
    public $incrementing = true; 
    
    protected $fillable = [
        'wali_kelas_id',

    ];
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'wali_kelas_id', 'wali_kelas_id');
    }

    public function semuaTabungan()
    {
        // Mengambil semua tabungan dari siswa yang di bawah wali kelas ini
        return $this->hasManyThrough(Tabungan::class, Siswa::class, 'wali_kelas_id', 'siswa_id', 'wali_kelas_id', 'siswa_id');
    }
    
    public function laporanKelas()
    {
        return $this->hasMany(LaporanKelas::class, 'wali_kelas_id');
    }
}