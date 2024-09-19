@extends('layouts.template') 
 
@section('content') 
  <div class="card card-outline card-primary"> 
    <div class="card-header"> 
      <h3 class="card-title">{{ $page->title }}</h3> 
      <div class="card-tools"></div> 
    </div> 
    <div class="card-body"> 
      @empty($walikelas) 
        <div class="alert alert-danger alert-dismissible"> 
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> 
            Data yang Anda cari tidak ditemukan. 
        </div> 
        <a href="{{ url('wali_kelas.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a> 
      @else 
        <form method="POST" action="{{ url('/walikelas/'.$walikelas->wali_kelas_id) }}" class="form-horizontal"> 
          @csrf
          {!! method_field('PUT') !!}  <!-- tambahkan baris ini untuk proses edit -->
          <div class="form-group row"> 
            <label class="col-1 control-label col-form-label">Nama Siswa</label> 
            <div class="col-11"> 
              <input type="text" class="form-control" id="nama" name="nama" value="{{ $walikelas->nama }}" required> 
              @error('nama') 
                <small class="form-text text-danger">{{ $message }}</small> 
              @enderror 
            </div> 
          </div> 
          <div class="form-group row"> 
            <label class="col-1 control-label col-form-label">Pemasukan</label> 
            <div class="col-11"> 
              <input type="number" class="form-control" id="pemasukan" name="pemasukan" value="{{ $walikelas->pemasukan }}" required> 
              @error('pemasukan') 
                <small class="form-text text-danger">{{ $message }}</small> 
              @enderror 
            </div> 
          </div> 
          <div class="form-group row"> 
            <label class="col-1 control-label col-form-label">Pengeluaran</label> 
            <div class="col-11"> 
              <input type="number" class="form-control" id="pengeluaran" name="pengeluaran" value="{{ $walikelas->pengeluaran }}" required> 
              @error('pengeluaran') 
                <small class="form-text text-danger">{{ $message }}</small> 
              @enderror 
            </div> 
          </div> 
          <div class="form-group row"> 
            <label class="col-1 control-label col-form-label">Saldo</label> 
            <div class="col-11"> 
              <input type="number" class="form-control" id="saldo" name="saldo" value="{{ $walikelas->saldo }}" required> 
              @error('saldo') 
                <small class="form-text text-danger">{{ $message }}</small> 
              @enderror 
            </div> 
          </div> 
          <div class="form-group row"> 
            <div class="col-11 offset-1"> 
              <button type="submit" class="btn btn-primary btn-sm">Simpan</button> 
              <a class="btn btn-sm btn-default ml-1" href="{{ route('wali_kelas.index') }}">Kembali</a> 
            </div> 
          </div> 
        </form> 
      @endempty 
    </div> 
  </div> 
@endsection
 
@push('css') 
@endpush 

@push('js') 
@endpush
