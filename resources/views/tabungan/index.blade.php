<!-- resources/views/tabungan/index.blade.php -->
@extends('layouts.app')

@section('content')
<h2>Input Tabungan Siswa</h2>
<form action="{{ route('tabungan.store') }}" method="POST">
    @csrf
    <label for="siswa_id">Pilih Siswa:</label>
    <select name="siswa_id" id="siswa_id" required>
        @foreach($siswaList as $siswa)
            <option value="{{ $siswa->siswa_id }}">{{ $siswa->user->name }}</option>
        @endforeach
    </select>

    <label for="jumlah_transaksi">Jumlah Transaksi:</label>
    <input type="number" name="jumlah_transaksi" required>

    <label for="jenis_transaksi">Jenis Transaksi:</label>
    <select name="jenis_transaksi" required>
        <option value="setor">Setor</option>
        <option value="tarik">Tarik</option>
    </select>

    <button type="submit">Simpan</button>
</form>
@endsection
