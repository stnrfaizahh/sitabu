@extends('layouts.template') 
 
@section('content') 
  <div class="card card-outline card-primary"> 
      <div class="card-header"> 
        <h3 class="card-title">{{ $page->title }}</h3> 
        <div class="card-tools"></div> 
      </div> 
      <div class="card-body"> 
        @empty($walikelas)  <!-- Disesuaikan dengan variabel yang akan dikirimkan dari controller -->
            <div class="alert alert-danger alert-dismissible"> 
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> 
                Data yang Anda cari tidak ditemukan. 
            </div> 
        @else 
            <table class="table table-bordered table-striped table-hover table-sm"> 
                <tr> 
                    <th>No</th> 
                    <td>{{ $walikelas->walikelas_id }}</td> <!-- Ubah sesuai dengan ID wali kelas -->
                </tr> 
                <tr> 
                    <th>Nama Siswa</th> 
                    <td>{{ $walikelas->siswa->nama }}</td>  <!-- Menggunakan relasi siswa -->
                </tr>
                <tr> 
                    <th>Pemasukan</th> 
                    <td>{{ $walikelas->pemasukan }}</td> 
                </tr> 
                <tr> 
                    <th>Pengeluaran</th> 
                    <td>{{ $walikelas->pengeluaran }}</td> 
                </tr> 
                <tr> 
                    <th>Saldo</th> 
                    <td>{{ $walikelas->saldo }}</td> 
                </tr> 
            </table> 
        @endempty 
        <a href="{{ route('wali_kelas.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a> 
    </div> 
  </div> 
@endsection 
 
@push('css') 
@endpush 
 
@push('js') 
@endpush
