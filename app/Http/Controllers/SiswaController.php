<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabungan;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil ID siswa dari user yang sedang login
        $siswaId = auth()->user()->id;

        // Dapatkan semua tabungan untuk siswa yang sedang login
        $tabungan = Tabungan::where('siswa_id', $siswaId)->get();

        // Hitung total pemasukan, pengeluaran, dan saldo
        $pemasukan = $tabungan->where('type', 'pemasukan')->sum('amount');
        $pengeluaran = $tabungan->where('type', 'pengeluaran')->sum('amount');
        $saldo = $pemasukan - $pengeluaran;

        return view('siswa.dashboard', compact('tabungan', 'pemasukan', 'pengeluaran', 'saldo'));
    }
}