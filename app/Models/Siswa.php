<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey ='siswa_id';
    
    protected $fillable = [
        'user_id',
        // 'kelas',
        'wali_kelas_id',
        'saldo',
    
    ];
 
    protected $table = 'siswa';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // public function kelas()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function wali_kelas()
    {
        return $this->belongsTo(Walikelas::class);
    }
    public function tabungan()
    {
        return $this->hasMany(Tabungan::class, 'siswa_id');
    }
    public function hitungSaldo()
    {
    $totalSetor = $this->tabungan()->where('jenis_transaksi', 'setor')->sum('jumlah_transaksi');
    $totalTarik = $this->tabungan()->where('jenis_transaksi', 'tarik')->sum('jumlah_transaksi');

    return $totalSetor - $totalTarik;
    }
    public function getSaldoAttribute()
    {
        // Menghitung total setoran
        $totalSetor = $this->tabungan()->where('jenis_transaksi', 'setor')->sum('jumlah_transaksi') ?? 0;
        
        // Menghitung total penarikan
        $totalTarik = $this->tabungan()->where('jenis_transaksi', 'tarik')->sum('jumlah_transaksi') ?? 0;
        
        // Mengembalikan saldo akhir siswa
        return $totalSetor - $totalTarik;
    }

    // Mutator untuk menyimpan kelas dalam huruf kapital (opsional)
    public function setKelasAttribute($value)
    {
        $this->attributes['kelas'] = strtoupper($value);
    }

}