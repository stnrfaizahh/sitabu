<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporanbendahara extends Model
{
    use HasFactory;
    protected $fillable = [
        'bendahara_id',
        'total_penarikan',
        'total_setoran',
        'periode_bulan',
        'periode_tahun',
    ];

    protected $table = 'laporan_bendahara';
    public function bendahara()
    {
        return $this->belongsTo(Bendahara::class, 'bendahara_id');
    }
}