<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>{{ setting('site_name', 'Crypt') }}</title>

  {{-- Bootstrap & Styles (من public/) --}}
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

  {{-- Font Awesome --}}
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  {{-- Favicon --}}
  <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
</head>

<body class="crypt-dark">

    {{-- Header --}}
    <header class="crypt-header blur-header align-items-center fixed-top z-3">
        <div class="row align-items-center justify-content-between w-100 m-0">

            {{-- Logo / Home --}}
            <div class="col-auto d-flex flex-row align-items-center">
                <div class="crypt-logo dark">
                    <a href="{{ url('/') }}">
                        {{-- لو عندك لوجو محفوظ في الإعدادات --}}
                        <img src="{{ setting('logo','asset/images/logo.png') }}" alt="logo">
                    </a>
                </div>
                <div class="crypt-logo light d-none">
                    <a href="{{ url('/') }}">
                        <img src="{{ setting('logo','asset/images/logo.png') }}" alt="logo">
                    </a>
                </div>
            </div>

            {{-- يمين الهيدر --}}
            <div class="col-auto d-flex flex-row align-items-center">
                <div class="user-settings gap-2 gap-sm-3">

                    {{-- dark/light mode زر شكلي (اختياري) --}}
                    <div class="mode">
                        <button class="controller m-auto" id="darkMode" type="button" aria-label="Toggle theme">
                            <span class="dark-logo">
                                <svg viewBox="0 0 512 512" width="20" fill="currentColor" aria-hidden="true">
                                    <path d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z" />
                                </svg>
                            </span>
                            <span class="light-logo d-none">
                                <svg viewBox="0 0 512 512" width="20" fill="currentColor" aria-hidden="true">
                                    <path d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z" />
                                </svg>
                            </span>
                        </button>
                    </div>

                    {{-- زرار الموبايل (اختياري) --}}
                    <div id="mobile_menu" class="close">
                        <button class="navbar-toggler" type="button">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
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

    {{-- Login Form --}}
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="crypt-login-form mt-5" style="max-width: 520px; width: 100%;">

                {{-- عنوان و QR (نفس شكل التصميم الجديد) --}}
                <div class="d-flex justify-content-between mb-4 text-center">
                    <h3 class="fw-bold m-0">Log in</h3>

                    <div class="dropup">
                        <a class="card card-border circle crypt-grayscale-600 text-link p-2" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <svg data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="QR code login"
                                width="26" height="26" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4 4h7v7H4V4zm0 9h7v7H4v-7zm11 0h-2v4h4v-2h3v-2h-4v2h-1v-2zm5 3h-2v2h-2v2h4v-4zm-5 2h-2v2h2v-2zM13 4h7v7h-7V4zM8.5 6.5h-2v2h2v-2zm-2 9h2v2h-2v-2zm11-9h-2v2h2v-2z" fill="currentColor"></path>
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-end text-center card-bs" style="max-width: 390px;">
                            <div class="d-flex flex-column justify-content-center text-sm px-3 mt-2">
                                <img class="card text-bg-light p-3" alt="QR" src="{{ asset('images/features/qr.svg') }}">
                                <div class="crypto-has-dropdown fw-medium crypt-grayscale-600 mt-3">
                                    Scan the QR code to log in or Open {{ setting('site_name','Crypt') }} app.
                                </div>
                                <div class="d-flex flex-row gap-2 mt-3 justify-content-center">
                                    <p class="crypt-grayscale-500 m-0">Don't have an account?</p>
                                    <a href="{{ url('joined') }}" class="link-primary fw-bold">Sign up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- رسائل الخطأ العامة (لو بتظهر رسالة من السيشن) --}}
                @if (session('status'))
                    <div class="alert alert-info py-2">{{ session('status') }}</div>
                @endif

                {{-- FORM: مهم ما نغيّرش الاسماء ولا الروت --}}
                <form class="needs-validation" action="{{ route('login') }}" method="POST" novalidate>
                    @csrf
                    <div class="d-flex flex-column">

                        {{-- email --}}
                        <div class="d-flex flex-column mb-3">
                            <label for="email" class="form-label text-light">
                                Email/Phone Number <span class="crypt-grayscale-600">*</span>
                            </label>
                            <input
                                type="email"
                                class="form-control py-2 @error('email') is-invalid @enderror"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                placeholder="Email/Phone Number"
                                required>
                            @error('email')
                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- password --}}
                        <div class="d-flex flex-column">
                            <div class="d-flex justify-content-between">
                                <label for="password" class="form-label text-light">
                                    Password <span class="crypt-grayscale-600">*</span>
                                </label>
                                <a href="{{ route('password.request') }}" class="link-primary text-sm text-decoration-none">Forgot password?</a>
                            </div>
                            <div class="position-relative">
                                <input
                                    type="password"
                                    class="form-control form-controls py-2 @error('password') is-invalid @enderror"
                                    name="password"
                                    id="password"
                                    placeholder="Login Password"
                                    required>
                                <button type="button" class="btn btn-link position-absolute end-0 top-0 h-100 px-3 text-decoration-none"
                                        onclick="togglePassword()" aria-label="Show/Hide password">
                                    <i class="fa fa-eye" id="eye"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- remember --}}
                        <div class="d-flex justify-content-between mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-secondary" for="remember">Remember me</label>
                            </div>
                        </div>

                        {{-- submit --}}
                        <button class="btn btn-primary rounded-pill text-center mt-4" type="submit">Continue</button>
                    </div>
                </form>

                {{-- Social (شكلي) --}}
                <div class="d-flex flex-column mt-4">
                    <div class="divider" role="separator">
                        <span class="crypt-grayscale-500 p-2">or</span>
                    </div>
                    <a href="#!" class="d-flex justify-content-between align-items-center button btn btn-outline-secondary">
                        Sign in with Google
                        <img alt="" width="32" src="{{ asset('images/icon/google.svg') }}">
                    </a>
                    <a href="#!" class="d-flex justify-content-between align-items-center button btn btn-outline-secondary mt-3">
                        Sign in with Apple
                        <img alt="" width="32" src="{{ asset('images/icon/apple.svg') }}">
                    </a>
                </div>

                <div class="d-flex flex-row gap-2 mt-4 justify-content-center">
                    <p class="crypt-grayscale-500 m-0">Don't have an account?</p>
                    <a href="{{ url('joined') }}" class="link-primary fw-bold">Sign up</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="container-fluid text-left text-lg-start animation-element mt-5">
        <div class="container in-view">
            <div class="d-flex justify-content-center gap-4 crypt-footer-copyright border-0 mb-3 mt-3">
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('docs_url', '#!') }}">Docs</a>
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('cookies_url', '#!') }}">Cookies</a>
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('terms', '#!') }}">Terms</a>
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('privacy_policy', '#!') }}">Privacy</a>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" ></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const eye   = document.getElementById('eye');
            if (input.type === 'password') {
                input.type = 'text';
                eye.classList.remove('fa-eye');
                eye.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                eye.classList.remove('fa-eye-slash');
                eye.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
