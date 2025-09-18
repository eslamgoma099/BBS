<!DOCTYPE html>
<html lang="en">
<head class="crypt-dark">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Original Theme CSS Files -->
    <link rel="stylesheet" href="{{ asset('new-theme/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('new-theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('new-theme/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('new-theme/css/button.css') }}">
    <link rel="icon" type="image/svg" href="{{ asset('images/favicon.svg') }}">
</head>

<body class="crypt-dark">
    <!-- Header -->
    <header class="crypt-header blur-header align-items-center fixed-top z-3">
        <div class="crypt-logo dark">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo-dark.svg') }}" alt="logo-dark">
            </a>
        </div>
        <div class="crypt-logo light">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="logo">
            </a>
        </div>

        <!-- dark/light mode -->
        <div class="mode">
            <button class="controller m-auto" id="darkMode">
                <span class="dark-logo">
                    <svg viewBox="0 0 512 512" width="100" fill="currentColor">
                        <path d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z" />
                    </svg>
                </span>
                <span class="light-logo">
                    <svg viewBox="0 0 512 512" width="100" fill="currentColor">
                        <path d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z" />
                    </svg>
                </span>
            </button>
        </div>
    </header>

    <div class="page-wrapper">
        <!-- Main Content -->
        <main class="login-main" role="main">
            <div class="login-card">
                <!-- Left Side - QR Illustration -->
                <aside class="login-card__visual">
                    <img class="qr-icon" src="{{ asset('images/features/qr.svg') }}" alt="QR code illustration">
                </aside>

                <!-- Right Side - Login Form -->
                <section class="login-card__form">
                    <div class="form-head">
                        <h2 class="form-head__title">Log in</h2>
                        <div class="form-head__qr">
                            <img alt="" src="{{ asset('images/svg/log-qr.svg') }}">
                        </div>
                    </div>

                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-signin" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="form-label">Email/Phone Number <span class="required">*</span></label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                id="email" 
                                placeholder="Email/Phone Number" 
                                value="{{ old('email') }}" 
                                required 
                                autofocus
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label">Password <span class="required">*</span></label>
                                <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                            </div>
                            <div class="password-field">
                                <input 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    id="password" 
                                    placeholder="Login Password" 
                                    required
                                >
                                <button type="button" class="password-toggle" id="togglePassword" aria-label="Show password">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                    </svg>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-check-wrap">
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    name="remember" 
                                    id="remember_me" 
                                    {{ old('remember') ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="remember_me">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary btn-block">Continue</button>
                        </div>

                        <div class="divider">
                            <span>or</span>
                        </div>

                        <!-- Social Login Buttons -->
                        <div class="social-login">
                            <a href="#" class="btn btn-social btn-google">
                                <img src="{{ asset('images/icon/google.svg') }}" alt="Google" width="20" height="20">
                                <span>Sign in with Google</span>
                            </a>
                            <a href="#" class="btn btn-social btn-apple">
                                <img src="{{ asset('images/icon/apple.svg') }}" alt="Apple" width="20" height="20">
                                <span>Sign in with Apple</span>
                            </a>
                        </div>

                        <!-- Sign Up Link -->
                        <div class="form-footer">
                            <p>Don't have an account? <a href="{{ url('joined') }}" class="signup-link">Sign up</a></p>
                        </div>
                    </form>
                </section>
            </div>
        </main>
    </div>

    <!-- Original Theme JavaScript -->
    <script src="{{ asset('new-theme/js/bootstrap.bundle.min.js') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dark/Light mode toggle
            const darkModeBtn = document.getElementById('darkMode');
            if (darkModeBtn) {
                darkModeBtn.addEventListener('click', function() {
                    document.body.classList.toggle('crypt-dark');
                    document.body.classList.toggle('crypt-light');
                    
                    // Update logo visibility
                    const darkLogos = document.querySelectorAll('.crypt-logo.dark');
                    const lightLogos = document.querySelectorAll('.crypt-logo.light');
                    
                    darkLogos.forEach(logo => logo.style.display = document.body.classList.contains('crypt-dark') ? 'block' : 'none');
                    lightLogos.forEach(logo => logo.style.display = document.body.classList.contains('crypt-light') ? 'block' : 'none');
                });
            }

            // Password toggle functionality
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            
            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.type === 'password' ? 'text' : 'password';
                    passwordInput.type = type;
                    
                    // Update icon
                    const svg = this.querySelector('svg path');
                    if (type === 'text') {
                        svg.setAttribute('d', 'M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z');
                    } else {
                        svg.setAttribute('d', 'M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z');
                    }
                });
            }

            // Form validation enhancement
            const form = document.querySelector('.form-signin');
            if (form) {
                form.addEventListener('submit', function(event) {
                    const email = document.getElementById('email').value.trim();
                    const password = document.getElementById('password').value.trim();
                    
                    if (!email || !password) {
                        event.preventDefault();
                        
                        if (!email) {
                            document.getElementById('email').classList.add('is-invalid');
                        }
                        if (!password) {
                            document.getElementById('password').classList.add('is-invalid');
                        }
                    }
                });
            }

            // Remove invalid class on input
            document.querySelectorAll('.form-control').forEach(input => {
                input.addEventListener('input', function() {
                    this.classList.remove('is-invalid');
                });
            });
            
            console.log('🚀 TopHive Crypt Login Page Initialized!');
        });
    </script>
</body>
</html>
