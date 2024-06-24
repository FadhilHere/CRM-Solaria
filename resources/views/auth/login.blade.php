<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>Login</title>
    <style>
        body {
            background-color: #F4D3E7;
            /* Ungu muda */
        }

        .login-btn {
            background-color: #E042A5;
            /* Warna utama untuk tombol login */
            color: #ffffff;
            /* Warna teks */
        }

        .login-btn:hover {
            background-color: #B21B7A;
            /* Warna saat di-hover */
        }

        .account-link {
            /* Style baru untuk link */
            color: #E042A5;
            /* Warna ungu muda */
            text-decoration: none;
            /* Menghilangkan garis bawah */
        }

        .account-link:hover {
            /* Saat di-hover */
            color: #E042A5;
            /* Warna saat di-hover sama dengan tombol login */
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-xs">
        <form action="{{ route('login') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="flex justify-center mb-4">
                <img src="{{ asset('assetsLanding/img/Solaria.png') }}" alt="User Icon" class="h-16 w-16">
                <!-- Sesuaikan ukuran sesuai kebutuhan -->
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input type="email" name="email" id="email" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="admin@gmail.com">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input type="password" name="password" id="password" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="••••••••">
            </div>
            <div class="mb-6">
                <button type="submit"
                    class="login-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-full rounded focus:outline-none focus:shadow-outline">
                    Login
                </button>
            </div>
            <div class="flex justify-between">
                <a class="account-link" href="#">
                    Create Account
                </a>
                <a class="account-link" href="#">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
</body>

</html>
