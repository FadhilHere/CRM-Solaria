<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/jquery-selectric/selectric.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/img/oldfavicon.ico') }}" />
    <style>
        .radio-inline {
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" id="register-form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" placeholder="Enter your name" required
                                            autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" placeholder="Enter your email" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password"
                                                class="form-control pwstrength @error('password') is-invalid @enderror"
                                                data-indicator="pwindicator" name="password"
                                                placeholder="Enter your password" required>
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password_confirmation" class="d-block">Confirm Password</label>
                                            <input id="password_confirmation" type="password" class="form-control"
                                                name="password_confirmation" placeholder="Confirm your password"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input id="phone_number" type="text"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number" value="{{ old('phone_number') }}"
                                            placeholder="Enter your phone number" required>
                                        @error('phone_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address"
                                            placeholder="Enter your address" required>{{ old('address') }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="date_of_birth">Date of Birth</label>
                                        <input id="date_of_birth" type="date"
                                            class="form-control @error('date_of_birth') is-invalid @enderror"
                                            name="date_of_birth" value="{{ old('date_of_birth') }}"
                                            placeholder="Tanggal/Bulan/Tahun" required>
                                        @error('date_of_birth')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="preference">Preference</label>
                                        <div>
                                            <label class="radio-inline"><input type="radio" name="preference"
                                                    value="Western" required> Western</label>
                                            <label class="radio-inline"><input type="radio" name="preference"
                                                    value="Chinese" required> Chinese</label>
                                            <label class="radio-inline"><input type="radio" name="preference"
                                                    value="Local" required> Local</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"
                                            id="register-btn">Register</button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-4 text-muted text-center">
                                Already have an account? <a href="{{ route('login') }}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- JS Libraries -->
    <script src="{{ asset('assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/auth-register.js') }}"></script>
    <script src="{{ asset('assets/js/page/sweetalert.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#date_of_birth", {
            dateFormat: "d/m/Y",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    longhand: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                },
                months: {
                    shorthand: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    longhand: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                        'September', 'October', 'November', 'December'
                    ],
                },
            },
            altInput: true,
            altFormat: "d/m/Y",
            defaultDate: "{{ old('date_of_birth') }}"
        });

        document.getElementById('register-form').addEventListener('submit', function(e) {
            var dateOfBirth = document.getElementById('date_of_birth')._flatpickr.input.value;
            if (dateOfBirth) {
                var dateParts = dateOfBirth.split('/');
                var formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];
                document.getElementById('date_of_birth').value = formattedDate;
            }
        });

        @if (session('success'))
            swal({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                timer: 2000,
                buttons: false,
            }).then(() => {
                window.location.href = '{{ route('login') }}';
            });
        @endif

        @if (session('error'))
            swal({
                title: 'Failed',
                text: '{{ session('error') }}',
                icon: 'error',
                timer: 2000,
                buttons: false,
            });
        @endif
    </script>
</body>

</html>
