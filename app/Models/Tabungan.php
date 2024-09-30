<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'jumlah_transaksi',
        'jenis_transaksi',
        'saldo',
        'tanggal_transaksi',
    ];
    protected $table = 'tabungan';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}