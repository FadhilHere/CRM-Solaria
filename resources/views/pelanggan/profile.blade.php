{{-- resources/views/pelanggan/profile.blade.php --}}

@extends('pelanggan.layouts.index')

@section('title', 'Profile')

@section('main')
    <div class="container">
        <h1>Profil Pengguna</h1>
        <p>Nama: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <p>Total Belanja: Rp. {{ number_format(Auth::user()->total_spent, 0, ',', '.') }}</p>
        <p>Badge Loyalitas: <span
                class="badge badge-{{ strtolower(Auth::user()->loyalty_level) }}">{{ Auth::user()->loyalty_level }}</span>
        </p>
        <p>Diskon Saat Ini:
            @if (Auth::user()->loyalty_level == 'Silver')
                5%
            @elseif (Auth::user()->loyalty_level == 'Gold')
                10%
            @elseif (Auth::user()->loyalty_level == 'Platinum')
                15%
            @else
                0%
            @endif
        </p>
    </div>
@endsection

@section('css')
    <style>
        .badge-platinum {
            background-color: #e5e4e2;
            color: black;
        }

        .badge-gold {
            background-color: gold;
            color: black;
        }

        .badge-silver {
            background-color: silver;
            color: black;
        }

        .badge-bronze {
            background-color: #cd7f32;
            color: black;
        }
    </style>
@endsection
