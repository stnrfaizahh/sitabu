<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Siswa;
use App\Models\Tabungan; // Model untuk tabungan
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Walikelas;

class WalikelasController extends Controller
{

    public function dashboard()
    {
        $walikelas = Walikelas::with('siswa.user')->where('user_id', auth()->user()->user_id)->firstOrFail();   
        return view('dashboard', compact('walikelas'));
    }
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Siswa',
            'list' => ['Home', 'Wali Kelas Dashboard']
        ];
        $page = (object)[
            'title' => 'Daftar Siswa yang Terdaftar dalam Sistem'
        ];
        $activeMenu = 'walikelas'; 
        $walikelas = Walikelas::with('siswa')->get();
        return view('walikelas.index', compact('breadcrumb', 'page', 'activeMenu', 'walikelas'));
    }

   public function list()
{
    // Ambil wali kelas beserta siswa dan tabungannya
    $walikelas = Walikelas::with('siswa.user', 'siswa.tabungan')
    ->select('wali_kelas_id' );
    // $walikelas = Walikelas::with('siswa.user', 'siswa.tabungan')->select('wali_kelas_id', 'kelas')->get();

    return DataTables::of($walikelas)
        ->addIndexColumn()
        ->addColumn('nama', function ($wali_kelas) {
            // Buat array untuk menyimpan nama siswa
            return $wali_kelas->siswa->map(function ($siswa) {
                return $siswa->user->nama; // Ambil nama siswa dari relasi user
            });
        })
        ->addColumn('pemasukan', function ($wali_kelas) {
            // Ambil total pemasukan (setor) dari tabungan siswa
            return $wali_kelas->siswa->sum(function ($siswa) {
                return $siswa->tabungan->where('jenis_transaksi', 'setor')->sum('jumlah_transaksi');
            });
        })
        ->addColumn('pengeluaran', function ($wali_kelas) {
            // Ambil total pemasukan (setor) dari tabungan siswa
            return $wali_kelas->siswa->sum(function ($siswa) {
                return $siswa->tabungan->where('jenis_transaksi', 'tarik')->sum('jumlah_transaksi');
            });
        })
        ->addColumn('saldo', function ($row) {
            return $row->siswa->sum(function ($siswa) {
                return $siswa->tabungan ? $siswa->tabungan->sum('saldo') : 0;
            });
        })
        ->addColumn('aksi', function ($row) {
            return '<a href="'.url('/wali_kelas/' . $row->wali_kelas_id).'" class="btn btn-info btn-sm">Detail</a> ' .
                   '<a href="'.url('/wali_kelas/' . $row->wali_kelas_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ' .
                   '<form class="d-inline-block" method="POST" action="'.url('/wali_kelas/'.$row->wali_kelas_id).'">' .
                   csrf_field() . method_field('DELETE') .
                   '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
        })
        ->rawColumns(['aksi'])
        ->make(true);
}

    public function create()
{
    $breadcrumb = (object)[
        'title' => 'Tambah Wali Kelas',
        'list' => ['Home', 'Wali Kelas', 'Tambah']
    ];
    $page = (object)[
        'title' => 'Tambah Data Wali Kelas Baru'
    ];
    $activeMenu = 'walikelas';
    $siswa = Siswa::all(); // Ambil semua data siswa

    return view('walikelas.create', compact('breadcrumb', 'page', 'activeMenu', 'siswa'));
}
public function store(Request $request)
{
    // Validasi data
    $request->validate([
        'siswa_id' => 'required',
        'jumlah_transaksi' => 'required|numeric',
        'jenis_transaksi' => 'required|in:setor,tarik', // Setor untuk pemasukan, Tarik untuk pengeluaran
        'tanggal_transaksi' => 'required|date',
    ]);

    // Ambil data siswa
    $siswa = Siswa::where('kelas', $request->kelas)->get();

    // Hitung saldo setelah transaksi
    $saldoAwal = $siswa->saldo;
    $saldoAkhir = ($request->jenis_transaksi == 'setor') ? $saldoAwal + $request->jumlah_transaksi : $saldoAwal - $request->jumlah_transaksi;

    // Simpan data ke tabel tabungan
    Tabungan::create([
        'siswa_id' => $siswa->siswa_id,
        'jumlah_transaksi' => $request->jumlah_transaksi,
        'jenis_transaksi' => $request->jenis_transaksi,
        'saldo' => $saldoAkhir,
        'tanggal_transaksi' => $request->tanggal_transaksi,
    ]);

    // Update saldo siswa
    $siswa->update(['saldo' => $saldoAkhir]);

    return redirect()->route('wali_kelas.index')->with('success', 'Data tabungan berhasil ditambahkan!');
}


public function show($id)
{
    // Cari wali kelas berdasarkan ID
    $walikelas = Walikelas::with('siswa.tabungan')->findOrFail($id); // Menggunakan eager loading untuk relasi siswa

    // Breadcrumb untuk navigasi
    $breadcrumb = (object)[
        'title' => 'Detail Wali Kelas',
        'list' => ['Home', 'Wali Kelas', 'Detail']
    ];
    
    // Informasi halaman
    $page = (object)[
        'title' => 'Detail Data Wali Kelas'
    ];
    
    $activeMenu = 'walikelas';

    // Kirim data ke view
    return view('walikelas.show', compact('breadcrumb', 'page', 'activeMenu', 'walikelas'));
}

    public function edit($id)
{
    $walikelas = Walikelas::findOrFail($id);
    
    $breadcrumb = (object)[
        'title' => 'Edit Wali Kelas',
        'list' => ['Home', 'Wali Kelas', 'Edit']
    ];
    $page = (object)[
        'title' => 'Edit Data Wali Kelas'
    ];
    $activeMenu = 'walikelas';
    $siswa = Siswa::all();

    return view('walikelas.edit', compact('breadcrumb', 'page', 'activeMenu', 'walikelas'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'siswa_id' => 'required|exists:siswa,siswa_id',
    ]);

    $walikelas = Walikelas::findOrFail($id);
    $walikelas->update([
        'siswa_id' => $request->siswa_id,
    ]);

    return redirect()->route('wali_kelas.index')
        ->with('success', 'Data Wali Kelas berhasil diperbarui');
}

public function destroy($id)
{
    $walikelas = Walikelas::findOrFail($id);
    $walikelas->delete();

    return redirect()->route('wali_kelas.index')
        ->with('success', 'Data Wali Kelas berhasil dihapus');
}

public function rekapKelas(Request $request)
{
//     Ambil ID wali kelas yang sedang login
    $waliKelasId = auth()->user()->id;

    // Dapatkan semua siswa yang berada di bawah wali kelas yang sedang login
    $siswa = Siswa::where('wali_kelas_id', $waliKelasId)->get();

    // Siapkan data tabungan untuk DataTables
    $rekapTabungan = $siswa->map(function ($siswa) {
        $pemasukan = Tabungan::where('siswa_id', $siswa->id)->where('type', 'pemasukan')->sum('amount');
        $pengeluaran = Tabungan::where('siswa_id', $siswa->id)->where('type', 'pengeluaran')->sum('amount');
        $saldo = $pemasukan - $pengeluaran;

        return [
            'siswa' => $siswa->nama,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'saldo' => $saldo,
        ];
    });
    

    // Jika request dari DataTables
    if ($request->ajax()) {
        return DataTables::of($rekapTabungan)
            ->addIndexColumn()
            ->make(true);
    }

    // Jika bukan request AJAX, tampilkan view dengan DataTables
    return view('wali_kelas.rekap_kelas');
}
}