@extends('layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Home
                    </div>
                    
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">

                </div>
            </div>
        </div>
    </div>
    <!-- Page body --> @if(auth()->user()->role === 'admin')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards mb-4">

                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-primary text-white avatar">
                                                <i class="ti ti-stack-2 icon"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ $totalProduk }}
                                            </div>
                                            <div class="text-secondary">
                                                Produk
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-green text-white avatar">
                                                <i class="ti ti-transfer-in icon"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ $totalBarangMasuk }}
                                            </div>
                                            <div class="text-secondary">
                                                Barang Masuk
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-twitter text-white avatar">
                                                <i class="ti ti-transfer-out icon"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ $totalBarangKeluar }}
                                            </div>
                                            <div class="text-secondary">
                                                Barang Keluar
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-facebook text-white avatar">
                                                <i class="ti ti-users icon"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ $totalUser }}
                                            </div>
                                            <div class="text-secondary">
                                                Pengguna
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endif
                <div class="col-12">
                    <div class="card card-md">
                        <div class="card-stamp card-stamp-lg">
                            <div class="card-stamp-icon bg-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                                    <path d="M10 10l.01 0" />
                                    <path d="M14 10l.01 0" />
                                    <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                                </svg>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h3 class="h1">Selamat Datang, {{ auth()->user()->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart -->
               
                        <div class="card-body">
                            <canvas id="myChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- End of Chart -->

            </div>

            <!-- Other card sections... -->
        </div>
    </div>
    @if(auth()->user()->role === 'admin')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Produk', 'Barang Masuk', 'Barang Keluar'], // Tambahkan 'Produk' ke labels
            datasets: [{
                label: 'Jumlah',
                data: [{{ $totalProduk }}, {{ $totalBarangMasuk }}, {{ $totalBarangKeluar }}], // Tambahkan $totalProduk ke data
                backgroundColor: [
                    'rgba(255, 206, 86, 0.5)', // Warna kuning untuk produk
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)', // Warna kuning untuk produk
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    }); // Penutup tambahan untuk myChart
</script>
@endif
@endsection


