@extends('layouts.template') 
 
@section('content') 
  <div class="card card-outline card-primary"> 
    <div class="card-header"> 
      <h3 class="card-title">{{ $page->title }}</h3> 
      <div class="card-tools"></div>
    </div> 
    <div class="card-body"> 
      <form method="POST" action="{{ route('wali_kelas.store') }}" class="form-horizontal"> 
        @csrf 
        <div class="form-group row"> 
          <label class="col-1 control-label col-form-label">Siswa</label> 
          <div class="col-11"> 
            <!-- Dropdown untuk memilih siswa berdasarkan id -->
            <select class="form-control" id="siswa_id" name="siswa_id" required>
              <option value="" disabled selected>Pilih Siswa</option>
              @foreach($siswa as $s)
                <option value="{{ $s->siswa_id }}">{{ $s->user->nama }}</option>
              @endforeach
            </select>
            @error('siswa_id') 
              <small class="form-text text-danger">{{ $message }}</small> 
            @enderror 
          </div> 
        </div> 
        <div class="form-group row"> 
          <label class="col-1 control-label col-form-label">Pemasukan</label> 
          <div class="col-11"> 
            <input type="number" class="form-control" id="pemasukan" name="pemasukan" required> 
            @error('pemasukan') 
              <small class="form-text text-danger">{{ $message }}</small> 
            @enderror 
          </div> 
        </div> 
        <div class="form-group row"> 
          <label class="col-1 control-label col-form-label">Pengeluaran</label> 
          <div class="col-11"> 
            <input type="number" class="form-control" id="pengeluaran" name="pengeluaran" required> 
            @error('pengeluaran') 
              <small class="form-text text-danger">{{ $message }}</small> 
            @enderror 
          </div> 
        </div> 
        <div class="form-group row"> 
          <label class="col-1 control-label col-form-label">Saldo</label> 
          <div class="col-11"> 
            <input type="number" class="form-control" id="saldo" name="saldo" required> 
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
    </div> 
  </div> 
@endsection 
 
@push('css') 
@endpush 
 
@push('js') 
@endpush
