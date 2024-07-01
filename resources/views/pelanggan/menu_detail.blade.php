@extends('pelanggan.layouts.index')

@section('title', 'Detail Menu')

@section('main')
    <div class="container mt-20">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ Storage::url($menu->picture) }}" alt="{{ $menu->name }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>{{ $menu->name }}</h2>
                <p>{{ $menu->description }}</p>
                <h4>Rp. {{ number_format($menu->price, 0, ',', '.') }}</h4>
                <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="quantity">Jumlah</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="1"
                            min="1">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Tambahkan ke Keranjang</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .mt-20 {
            margin-top: 150px;
        }
    </style>
@endsection

@section('js')
    <!-- JS Libraries -->
    <script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/index.js') }}"></script>
@endsection

@section('script')
@endsection
