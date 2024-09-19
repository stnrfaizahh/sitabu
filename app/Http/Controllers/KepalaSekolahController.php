<?php

namespace App\Http\Controllers;

use App\Models\Laporanbendahara;
use Illuminate\Http\Request;
use app\Models\RekapBendahara;

class KepalaSekolahController extends Controller
{
    public function lihatLaporan()
    {
        // Dapatkan laporan yang sudah direkap oleh bendahara
        $laporanBendahara = Laporanbendahara::all();

        return view('kepala_sekolah.laporan', compact('laporanBendahara'));
    }
}