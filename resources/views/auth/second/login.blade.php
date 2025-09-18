<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>{{ setting('site_name') }} | Login</title>
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/favicon.svg') }}">
</head>

<body class="crypt-dark">

    <!-- Header -->
    <header class="crypt-header blur-header align-items-center fixed-top z-3">
        <div class="row align-items-center justify-content-between mx-0">

            <!-- main menu -->
            <div class="col-auto d-flex flex-row align-items-center">

                <!-- Logo (dynamic if available) -->
                <div class="crypt-logo dark">
                    <a href="{{ url('/') }}">
                        @if(function_exists('setting') && setting('logo_dark') )
                            <img src="{{ setting('logo_dark') }}" alt="logo-dark">
                        @else
                            <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="logo-dark">
                        @endif
                    </a>
                </div>
                <div class="crypt-logo light">
                    <a href="{{ url('/') }}">
                        @if(function_exists('setting') && setting('logo') )
                            <img src="{{ setting('logo') }}" alt="logo-light">
                        @else
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="logo-light">
                        @endif
                    </a>
                </div>

            </div>

            <!-- secondary menu -->
            <div class="col-auto d-flex flex-row align-items-center">
                <div class="user-settings gap-2 gap-sm-3 d-flex align-items-center">

                    <!-- dark/light mode -->
                    <div class="mode">
                        <button class="controller m-auto" id="darkMode" type="button" aria-label="Toggle theme">
                            <span class="dark-logo">
                                <svg viewBox="0 0 512 512" width="20" fill="currentColor"><path d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"/></svg>
                            </span>
                            <span class="light-logo">
                                <svg viewBox="0 0 512 512" width="20" fill="currentColor"><path d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z"/></svg>
                            </span>
                        </button>
                    </div>

                    <!-- Hamburger Menu (optional) -->
                    <div id="mobile_menu" class="close">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Open menu">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M4 12H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M4 6H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </header>

    <!-- Login Form -->
    <div class="container-fluid d-flex align-items-center justify-content-center min-vh-100 py-5">
        <div class="card border-0 shadow-lg" style="max-width: 900px; border-radius: 12px; overflow: hidden;">
            <div class="row g-0">
                <!-- Left Column - QR Code Section -->
                <div class="col-lg-5 d-flex flex-column align-items-center justify-content-center p-4 p-lg-5 bg-light" style="min-height: 500px;">
                    <div class="text-center">
                        <div class="mb-4">
                            <img class="card text-bg-light p-3 border-0" alt="QR Code to sign in" src="{{ asset('assets/images/features/qr.svg') }}" style="max-width: 200px; border-radius: 8px;">
                        </div>
                        <p class="fw-medium text-muted mb-4">
                            Scan the QR code to log in or Open Crypt app.
                        </p>
                        <div class="d-flex flex-row gap-2 justify-content-center">
                            <p class="text-muted mb-0">Don't have an account?</p>
                            <a href="{{ url('joined') }}" class="link-primary fw-bold text-decoration-none">Sign up</a>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Login Form -->
                <div class="col-lg-7 p-4 p-lg-5">
                    <div class="mb-4">
                        <h3 class="fw-bold mb-0">Log in</h3>
                    </div>

                    {{-- Validation errors block --}}
                    @if ($errors->any())
                        <div class="alert alert-danger py-2" role="alert">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="needs-validation" action="{{ route('login') }}" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control py-2 @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus style="border-radius: 8px;">
                            <div class="invalid-feedback">This field is required.</div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="password" class="form-label mb-0">Password <span class="text-danger">*</span></label>
                                <a href="{{ route('password.request') }}" class="link-primary text-decoration-none">Forgot password?</a>
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control py-2 @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password" required style="border-radius: 8px; padding-right: 45px;">
                                <button class="btn btn-link position-absolute top-50 end-0 translate-middle-y me-2 p-0 text-muted" type="button" id="togglePassword" aria-label="Show password">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                                <div class="invalid-feedback">This field is required.</div>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember_me" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary w-100 py-2 mb-3" type="submit" style="border-radius: 8px;">Log in</button>
                    </form>

                    <div class="text-center my-3">
                        <div class="d-flex align-items-center">
                            <hr class="flex-grow-1">
                            <span class="px-3 text-muted">or</span>
                            <hr class="flex-grow-1">
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-secondary d-flex align-items-center justify-content-center py-2" style="border-radius: 8px;">
                            <img alt="Google" width="20" height="20" src="{{ asset('assets/images/icon/google.svg') }}" class="me-2">
                            Sign in with Google
                        </a>
                        <a href="#" class="btn btn-outline-dark d-flex align-items-center justify-content-center py-2" style="border-radius: 8px;">
                            <img alt="Apple" width="20" height="20" src="{{ asset('assets/images/icon/apple.svg') }}" class="me-2">
                            Sign in with Apple
                        </a>
                    </div>

                    <div class="text-center mt-4">
                        <p class="mb-0">Don't have an account? <a href="{{ url('joined') }}" class="link-primary fw-bold text-decoration-none">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="container-fluid text-left text-lg-start animation-element mt-5">
        <div class="container in-view">
            <div class="d-flex justify-content-center gap-4 crypt-footer-copyright border-0 mb-3 mt-3">
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('docs') ?? '#' }}">Docs</a>
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('cookies') ?? '#' }}">Cookies</a>
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('terms') ?? route('terms') ?? '#' }}">Terms</a>
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('privacy_policy') ?? route('privacy') ?? '#' }}">Privacy</a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        // Client-side bootstrap validation (kept from theme)
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();

        // Password toggle
        document.getElementById('togglePassword')?.addEventListener('click', function () {
            const input = document.getElementById('password');
            if (!input) return;
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.querySelector('i')?.classList.toggle('fa-eye');
            this.querySelector('i')?.classList.toggle('fa-eye-slash');
        });

        // Persist theme preference in localStorage
        (function () {
            const html = document.documentElement;
            const body = document.body;
            const key = 'crypt-theme';
            const btn = document.getElementById('darkMode');
            const apply = (mode) => {
                if (mode === 'light') {
                    body.classList.remove('crypt-dark');
                    body.classList.add('crypt-light');
                    html.dataset.theme = 'light';
                } else {
                    body.classList.add('crypt-dark');
                    body.classList.remove('crypt-light');
                    html.dataset.theme = 'dark';
                }
            };
            apply(localStorage.getItem(key) || 'dark');
            btn?.addEventListener('click', () => {
                const next = (html.dataset.theme === 'dark') ? 'light' : 'dark';
                localStorage.setItem(key, next);
                apply(next);
            });
        })();
    </script>
</body>
</html>
