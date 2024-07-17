@extends('admin.layouts.index')

@section('title', 'Dashboard')

@section('main')
    <div class="row">
        <!-- Orders Card -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalOrders }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Customers Card -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Customers</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalUsers }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Menus Card (New) -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-hamburger"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Menus</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalMenus }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Promo Card -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Promo</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalPromos }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Chart Card -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Penjualan Per Bulan</h4>
                </div>
                <div class="card-body">
                    <div id="salesChart"></div>
                </div>
            </div>
        </div>

        <!-- Menu Preferences Chart Card -->
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4>Menu Paling Banyak Dipesan Berdasarkan Kategori</h4>
                </div>
                <div class="card-body">
                    <div id="menuPreferencesChart"></div>
                </div>
            </div>
        </div>

        <!-- Loyalty Level Chart Card -->
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4>Jumlah Pelanggan Berdasarkan Loyalty Level</h4>
                </div>
                <div class="card-body">
                    <div id="loyaltyLevelChart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/bundles/apexcharts/apexcharts.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sales Chart
            var salesOptions = {
                chart: {
                    type: 'line',
                    height: 250
                },
                series: [{
                    name: 'Penjualan',
                    data: @json($salesData)
                }],
                xaxis: {
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                        'September', 'Oktober', 'November', 'Desember'
                    ]
                }
            };

            var salesChart = new ApexCharts(document.querySelector("#salesChart"), salesOptions);
            salesChart.render();

            // Menu Preferences Chart
            var menuPreferencesOptions = {
                chart: {
                    type: 'pie',
                    height: 250
                },
                series: @json($categoryPreferences->pluck('orders_count')),
                labels: @json($categoryPreferences->pluck('category_name')),
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var menuPreferencesChart = new ApexCharts(document.querySelector("#menuPreferencesChart"),
                menuPreferencesOptions);
            menuPreferencesChart.render();

            // Loyalty Level Chart
            var loyaltyLevelOptions = {
                chart: {
                    type: 'pie',
                    height: 250
                },
                series: @json($loyaltyLevels->pluck('count')),
                labels: @json($loyaltyLevels->pluck('loyalty_level')),
                colors: ['#c0c0c0', '#cd7f32', '#ffd700', '#3797A7'], // Bronze, Silver, Gold, Platinum
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var loyaltyLevelChart = new ApexCharts(document.querySelector("#loyaltyLevelChart"),
                loyaltyLevelOptions);
            loyaltyLevelChart.render();
        });
    </script>
@endsection
