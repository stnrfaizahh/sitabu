<!-- resources/views/tabungan/show.blade.php -->
@extends('layouts.app')

@section('content')
<h2>Riwayat Tabungan {{ $siswa->user->name }}</h2>

<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jenis Transaksi</th>
            <th>Jumlah</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa->tabungan as $transaksi)
        <tr>
            <td>{{ $transaksi->tanggal_transaksi }}</td>
            <td>{{ ucfirst($transaksi->jenis_transaksi) }}</td>
            <td>{{ $transaksi->jumlah_transaksi }}</td>
            <td>{{ $transaksi->saldo }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
