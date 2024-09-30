<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tabungan;
use App\Models\Walikelas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TabunganController extends Controller
{
     public function create()
    {
        // Mengambil daftar siswa yang dapat diinput oleh wali kelas
        $siswa = Siswa::all();  // Sesuaikan dengan siswa yang terkait wali kelas
        return view('tabungan.create', compact('siswa'));
    }
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
        // Validasi data transaksi
        $request->validate([
            'siswa_id' => 'required|exists:siswa,siswa_id',
            'jumlah_transaksi' => 'required|numeric|min:1',
            'jenis_transaksi' => 'required|in:setor,tarik',
        ]);

        // Ambil data siswa berdasarkan siswa_id
        $siswa = Siswa::findOrFail($request->siswa_id);

        // Input data transaksi ke tabel tabungan
        $tabungan = new Tabungan();
        $tabungan->siswa_id = $siswa->siswa_id;
        $tabungan->jumlah_transaksi = $request->jumlah_transaksi;
        $tabungan->jenis_transaksi = $request->jenis_transaksi;
        $tabungan->tanggal_transaksi = now();
        $tabungan->save();

        // Perbarui data wali kelas (pemasukan/pengeluaran) berdasarkan jenis transaksi
        $this->updateWaliKelas($siswa, $tabungan);

        return redirect()->back()->with('success', 'Transaksi tabungan berhasil disimpan.');
    }
    // * Mengupdate pemasukan dan pengeluaran wali kelas berdasarkan transaksi siswa
    // */
   private function updateWaliKelas(Siswa $siswa, Tabungan $tabungan)
   {
       // Ambil wali kelas dari siswa yang melakukan transaksi
       $waliKelas = $siswa->wali_kelas;

       if ($tabungan->jenis_transaksi === 'setor') {
           // Update pemasukan wali kelas
           $waliKelas->pemasukan += $tabungan->jumlah_transaksi;
       } elseif ($tabungan->jenis_transaksi === 'tarik') {
           // Update pengeluaran wali kelas
           $waliKelas->pengeluaran += $tabungan->jumlah_transaksi;
       }

       // Update saldo wali kelas (opsional jika diperlukan)
       $waliKelas->saldo = $waliKelas->pemasukan - $waliKelas->pengeluaran;

       // Simpan perubahan pada wali kelas
       $waliKelas->save();
   }

   /**
    * Menampilkan rekap saldo siswa
    */
  
        /// Hitung saldo baru berdasarkan jenis transaksi
        // if ($tabungan->jenis_transaksi == 'setor') {
        //     $tabungan->saldo = $siswa->hitungSaldo() + $request->jumlah_transaksi;
        // } elseif ($tabungan->jenis_transaksi == 'tarik') {
        //     $tabungan->saldo = $siswa->hitungSaldo() - $request->jumlah_transaksi;
        // }

        // Simpan transaksi ke dalam database
   

       

    // Fungsi untuk melihat riwayat tabungan siswa
    public function show($id)
    {
        // Menampilkan saldo siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);
        $saldo = $siswa->saldo;  // Accessor saldo otomatis

        return view('tabungan.show', compact('siswa', 'saldo'));
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