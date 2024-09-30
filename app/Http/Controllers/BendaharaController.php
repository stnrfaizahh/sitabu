<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabungan;
use App\Models\WaliKelas;

class BendaharaController extends Controller
{
    public function rekap()
    {
        // Dapatkan semua wali kelas
        $waliKelas = WaliKelas::all();

        // Ambil rekap tabungan dari setiap wali kelas
        $rekapTabunganWaliKelas = $waliKelas->map(function ($wali) {
            $siswa = $wali->siswa; // Ambil semua siswa yang berada di bawah wali kelas tersebut

            // Buat rekap tabungan untuk setiap wali kelas
            $totalPemasukan = 0;
            $totalPengeluaran = 0;
            foreach ($siswa as $s) {
                $pemasukan = Tabungan::where('siswa_id', $s->id)->where('type', 'pemasukan')->sum('amount');
                $pengeluaran = Tabungan::where('siswa_id', $s->id)->where('type', 'pengeluaran')->sum('amount');
                $totalPemasukan += $pemasukan;
                $totalPengeluaran += $pengeluaran;
            }

            return [
                'wali_kelas' => $wali->nama,
                'pemasukan' => $totalPemasukan,
                'pengeluaran' => $totalPengeluaran,
                'saldo' => $totalPemasukan - $totalPengeluaran,
            ];
            
        });

        

        return view('bendahara.rekap', compact('rekapTabunganWaliKelas'));
    }
public function dashboard()
{
    return view('bendahara.dashboard'); // View bendahara dashboard
}
}