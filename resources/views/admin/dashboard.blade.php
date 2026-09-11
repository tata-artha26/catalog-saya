@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="row mb-4">
        @foreach ([
            ['label' => 'Produk', 'value' => 0, 'color' => 'primary', 'icon' => 'bi-box-seam-fill'],
            ['label' => 'Pesanan', 'value' => 0, 'color' => 'success', 'icon' => 'bi-receipt'],
            ['label' => 'Pelanggan', 'value' => 0, 'color' => 'info', 'icon' => 'bi-people-fill'],
            ['label' => 'Pendapatan', 'value' => 0, 'color' => 'warning', 'icon' => 'bi-cash-stack'],
        ] as $stat)
            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-{{ $stat['color'] }}">
                    <div class="inner">
                        <h3>{{ $stat['value'] }}</h3>
                        <p>{{ $stat['label'] }}</p>
                    </div>
                    <i class="small-box-icon bi {{ $stat['icon'] }}"></i>
                    <a href="#" class="small-box-footer link-light link-underline-opacity-50-hover">
                        Selengkapnya <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Penjualan Terbaru</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pelanggan</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-center text-secondary py-4">
                                        Belum ada pesanan
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kategori Populer</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-secondary py-4">Belum ada data</p>
                </div>
            </div>
        </div>
    </div>
@endsection