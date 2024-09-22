<!-- resources/views/tabungan/edit.blade.php -->
@extends('layouts.app')

@section('content')
<h2>Edit Transaksi Tabungan</h2>
<form action="{{ route('tabungan.update', $tabungan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="jumlah_transaksi">Jumlah Transaksi:</label>
    <input type="number" name="jumlah_transaksi" value="{{ $tabungan->jumlah_transaksi }}" required>

    <label for="jenis_transaksi">Jenis Transaksi:</label>
    <select name="jenis_transaksi" required>
        <option value="setor" {{ $tabungan->jenis_transaksi == 'setor' ? 'selected' : '' }}>Setor</option>
        <option value="tarik" {{ $tabungan->jenis_transaksi == 'tarik' ? 'selected' : '' }}>Tarik</option>
    </select>

    <button type="submit">Simpan</button>
</form>
@endsection
