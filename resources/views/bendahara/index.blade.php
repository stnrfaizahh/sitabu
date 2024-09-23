@extends('layouts.app') <!-- Extend your main layout -->

@section('content')
<h2>Rekap Tabunngan Kelas</h2>
<div class="container">
    <div class="row">
        <!-- First Row of Info Boxes -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">KELAS 1A</span>
                    <span class="info-box-number bg-success">10<small>%</small></span>
                    <span class="info-box-number bg-danger">10<small>%</small></span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">KELAS 2B</span>
                    <span class="info-box-number bg-success">2,000</span>
                    <span class="info-box-number bg-danger">2,000</span>
                </div>
            </div>
        </div>

        <!-- Repeat for other classes -->
    </div>

    <div class="row">
        <!-- Add more info boxes for different classes -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">KELAS 3</span>
                    <span class="info-box-number bg-success">5,000</span>
                    <span class="info-box-number bg-danger">10,000</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">KELAS 4</span>
                    <span class="info-box-number bg-success">50,000</span>
                    <span class="info-box-number bg-danger">20,000</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional content for Monthly Recap Report and Charts -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Monthly Recap Report</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                    </div>
                </div>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <p class="text-center">
                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>
                    <div class="chart">
                        <canvas id="salesChart" height="180"></canvas>
                    </div>
                </div>

                <div class="col-md-4">
                    <p class="text-center">
                        <strong>Flow Tabungan</strong>
                    </p>
                    <div class="progress-group">
                        Pengeluaran
                        <span class="float-right"><b>310</b>/400</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                        </div>
                    </div>

                    <div class="progress-group">
                        Pemasukan
                        <span class="float-right"><b>480</b>/800</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: 60%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
