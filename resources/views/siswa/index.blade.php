@extends('layouts.app')

@section('content')
<h2>Dashboard Siswa</h2>

<div class="container-fluid">
    <!-- Dashboard untuk Siswa -->
    <div class="row">
        
        <!-- Kotak Saldo -->
        <div class="col-lg-3 col-6">
            <!-- Small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53.000<sup style="font-size: 20px">,00</sup></h3>
                    <p>Saldo</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Kotak Pemasukan -->
        <div class="col-lg-3 col-6">
            <!-- Small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>100.000<sup style="font-size: 20px">,00</sup></h3>
                    <p>Pemasukan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Kotak Pengeluaran -->
        <div class="col-lg-3 col-6">
            <!-- Small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>20.000<sup style="font-size: 20px">,00</sup></h3>
                    <p>Pengeluaran</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 5a0c4c24aa8e5af2e9a836bfe92662aed9aa4b74
