@extends('admin.layouts.index')

@section('title', 'Detail Pesanan')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Pesanan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetails as $detail)
                                    <tr>
                                        <td>{{ $detail->menu->id }}</td>
                                        <td>{{ $detail->menu->name }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>Rp. {{ number_format($detail->price, 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($detail->quantity * $detail->price, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        <h4>Total Bayar: Rp. {{ number_format($order->total_price, 0, ',', '.') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('script')
@endsection
