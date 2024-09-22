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
        'wali_kelas_id',
    
    ];
 
    protected $table = 'siswa';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wali_kelas()
    {
        return $this->belongsTo(Walikelas::class, 'wali_kelas_id');
    }
    public function transactions()
    {
        return $this->hasMany(Tabungan::class, 'siswa_id');
    }
    public function hitungSaldo()
    {
    $totalSetor = $this->tabungan()->where('jenis_transaksi', 'setor')->sum('jumlah_transaksi');
    $totalTarik = $this->tabungan()->where('jenis_transaksi', 'tarik')->sum('jumlah_transaksi');

    return $totalSetor - $totalTarik;
    }

}