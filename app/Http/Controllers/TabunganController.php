<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TabunganController extends Controller
{
    // u/ menampilkan daftar siswa dan saldo mereka
    public function index()
    {
        // Ambil semua siswa dengan transaksi terbaru mereka
        $siswa = Siswa::with(['tabungan' => function($query) {
            $query->orderBy('date', 'desc')->first();
        }])->get();

        return view('tabungan.index', compact('siswa'));
    }
    // fungsi u/ menyimpan transaksi tab (setor/tarik)
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,siswa_id',
            'jumlah_transaksi' => 'required|numeric|min:0',
            'jenis_transaksi' => 'required|in:setor,tarik',
        ]);
        // ambil data siswa
        $siswa = Siswa::find($request->siswa_id);

       // Buat transaksi baru
       $tabungan = new Tabungan();
       $tabungan->siswa_id = $siswa->siswa_id;
       $tabungan->jumlah_transaksi = $request->jumlah_transaksi;
       $tabungan->jenis_transaksi = $request->jenis_transaksi;
       $tabungan->tanggal_transaksi = now();
        
        /// Hitung saldo baru berdasarkan jenis transaksi
        if ($tabungan->jenis_transaksi == 'setor') {
            $tabungan->saldo = $siswa->hitungSaldo() + $request->jumlah_transaksi;
        } elseif ($tabungan->jenis_transaksi == 'tarik') {
            $tabungan->saldo = $siswa->hitungSaldo() - $request->jumlah_transaksi;
        }

        // Simpan transaksi ke dalam database
        $tabungan->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Fungsi untuk melihat riwayat tabungan siswa
    public function show($siswa_id)
    {
        $siswa = Siswa::with('tabungan')->findOrFail($siswa_id);
        return view('tabungan.show', compact('siswa'));
    }

    // Fungsi untuk mengedit transaksi (jika diperlukan)
    public function edit($id)
    {
        $tabungan = Tabungan::findOrFail($id);
        return view('tabungan.edit', compact('tabungan'));
    }

    // Fungsi untuk memperbarui transaksi tabungan (jika diperlukan)
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_transaksi' => 'required|numeric|min:0',
            'jenis_transaksi' => 'required|in:setor,tarik',
        ]);

        // Ambil transaksi tabungan
        $tabungan = Tabungan::findOrFail($id);

        // Update data transaksi
        $tabungan->jumlah_transaksi = $request->jumlah_transaksi;
        $tabungan->jenis_transaksi = $request->jenis_transaksi;
        $tabungan->tanggal_transaksi = now(); // Jika tanggal diupdate

        // Update saldo sesuai dengan perubahan transaksi
        if ($tabungan->jenis_transaksi == 'setor') {
            $tabungan->saldo = $tabungan->siswa->hitungSaldo() + $request->jumlah_transaksi;
        } elseif ($tabungan->jenis_transaksi == 'tarik') {
            $tabungan->saldo = $tabungan->siswa->hitungSaldo() - $request->jumlah_transaksi;
        }

        // Simpan perubahan
        $tabungan->save();

        return redirect()->back()->with('success', 'Transaksi berhasil diperbarui.');
    }
}