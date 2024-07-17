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
                    @endforeach
                </tbody>
            </table>

            <form id="checkout-form" action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Total Belanja: Rp. {{ number_format($total, 0, ',', '.') }}</h4>
                    <div class="form-group">
                        <label for="promo_id">Pilih Promo:</label>
                        <select name="promo_id" id="promo_id" class="form-control">
                            <option value="">Tidak menggunakan promo</option>
                            @foreach ($promos as $promo)
                                <option value="{{ $promo->id }}">{{ $promo->name }} - {{ $promo->percentage }}%
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" id="checkout-button" class="btn custom-btn">Bayar</button>
                </div>
            </form>

            <div id="discount-details" class="mt-3" style="display: none;">
                <h4>Rincian Diskon:</h4>
                <p>Total Belanja: Rp. {{ number_format($total, 0, ',', '.') }}</p>
                <p id="promo-discount" style="display: none;">Diskon Promo: Rp. <span></span></p>
                <p>Diskon Member: Rp. <span id="member-discount"></span></p>
                <hr>
                <h4>Total Bayar: Rp. <span id="final-total"></span></h4>
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
    <script>
        $(document).ready(function() {
            $('#promo_id').change(function() {
                const promoId = $(this).val();
                if (promoId) {
                    $.ajax({
                        url: '{{ route('cart.calculate-discount') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            promo_id: promoId,
                            total: {{ $total }}
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#discount-details').show();
                                $('#promo-discount').show();
                                $('#promo-discount span').text(response.promo_discount);
                                $('#member-discount').text(response.member_discount);
                                $('#final-total').text(response.final_total);
                            }
                        },
                        error: function() {
                            alert('Gagal menghitung diskon. Silakan coba lagi.');
                        }
                    });
                } else {
                    $('#discount-details').hide();
                }
            });
        });
    </script>
@endsection
