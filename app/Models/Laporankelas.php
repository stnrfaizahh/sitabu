<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporankelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'wali_kelas_id',
        'total_penarikan',
        'total_setoran',
        'periode_bulan',
        'periode_tahun',
    ];
    protected $table = 'laporan_kelas';

    public function waliKelas()
    {
        return $this->belongsTo(WaliKelas::class, 'wali_kelas_id');
    }
}