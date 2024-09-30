<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabungan;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $siswa = Siswa::with('user')->where('user_id', auth()->user()->user_id)->firstOrFail();   
        return view('dashboard', compact('siswa'));
    }
    public function index(Request $request)
    {
        // Ambil ID siswa dari user yang sedang login
        // $siswaId = auth()->user()->id;
        $siswa = Siswa::where('user_id', auth()->user()->user_id)->first();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan.');
        }

        // Ambil semua transaksi tabungan terkait siswa yang sedang login
        $tabungan = $siswa->tabungan;

        // Dapatkan semua tabungan untuk siswa yang sedang login
        // $tabungan = Tabungan::where('siswa_id', $siswaId)->get();

        // Hitung total pemasukan, pengeluaran, dan saldo
        $pemasukan = $tabungan->where('type', 'pemasukan')->sum('amount');
        $pengeluaran = $tabungan->where('type', 'pengeluaran')->sum('amount');
        $saldo = $pemasukan - $pengeluaran;

        return view('siswa.index', compact('tabungan', 'pemasukan', 'pengeluaran', 'saldo'));
    }
}