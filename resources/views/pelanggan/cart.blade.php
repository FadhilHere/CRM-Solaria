@extends('pelanggan.layouts.index')

@section('title', 'Keranjang Belanja')

@section('main')
    <div class="container mt-20">
        <h2>Keranjang Belanja</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (count($cart) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart as $item)
                        @php
                            $itemTotal = $item['price'] * $item['quantity'];
                            $total += $itemTotal;
                        @endphp
                        <tr>
                            <td><img src="{{ Storage::url($item['picture']) }}" alt="{{ $item['name'] }}" class="img-thumbnail"
                                    width="50"></td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($itemTotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center">
                <h4>Total Bayar: Rp. {{ number_format($total, 0, ',', '.') }}</h4>
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn custom-btn">Bayar</button>
                </form>
            </div>
        @else
            <p>Keranjang belanja Anda kosong.</p>
        @endif
    </div>
@endsection

@section('css')
    <style>
        .mt-20 {
            margin-top: 150px;
        }

        .img-thumbnail {
            width: 50px;
            height: 50px;
        }

        .custom-btn {
            background-color: #B21B7A;
            border-color: #B21B7A;
            color: #fff;
            /* Tambahkan warna teks putih */
        }

        .custom-btn:hover {
            background-color: darken(#B21B7A, 10%);
            border-color: darken(#B21B7A, 10%);
        }
    </style>
@endsection

@section('js')
@endsection

@section('script')
@endsection
