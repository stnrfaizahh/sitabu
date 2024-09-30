@extends('layouts.template') 

@section('content') 
  <div class="card card-outline card-primary"> 
      <div class="card-header"> 
        <h3 class="card-title">{{ $page->title }}</h3> 
        <div class="card-tools"> 
          <a class="btn btn-sm btn-primary mt-1" href="{{ route('wali_kelas.create') }}">Tambah</a> 
        </div> 
      </div> 
      <div class="card-body"> 
        <table class="table table-bordered table-striped table-hover table-sm" id="table_wali_kelas"> 
          <thead> 
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>Pemasukan</th>
              <th>Pengeluaran</th>
              <th>Saldo</th>
              <th>Aksi</th> <!-- Kolom untuk aksi jika diperlukan -->
            </tr> 
          </thead> 
        </table> 
      </div> 
  </div> 
@endsection 

@push('css') 
@endpush 

@push('js') 
  <script> 
    $(document).ready(function() { 
      var dataTable = $('#table_wali_kelas').DataTable({ 
          serverSide: true,      
          processing: true,
          ajax: { 
              "url": "{{ route('wali_kelas.list') }}", 
              "dataType": "json", 
              "type": "POST",
              data: function(d) {
                  d._token = "{{ csrf_token() }}";
              } 
          }, 
          columns: [ 
            { 
              data: "DT_RowIndex",             
              className: "text-center", 
              orderable: false, 
              searchable: false     
            },
            { 
              data: "nama",  <!-- Ubah sesuai dengan kolom nama siswa -->
              className: "", 
              orderable: true,     
              searchable: true     
            },
            { 
              data: "pemasukan",                
              className: "", 
              orderable: true,     
              searchable: true     
            },
            { 
              data: "pengeluaran",                
              className: "", 
              orderable: true,     
              searchable: true     
            },
            { 
              data: "saldo",                
              className: "", 
              orderable: true,     
              searchable: true     
            },
            { 
              data: "aksi",                
              className: "", 
              orderable: false,     
              searchable: false     
            } 
          ],
          dom:'Bfrtip',
          buttons:['pdf']
      }); 

    }); 
  </script> 
@endpush
