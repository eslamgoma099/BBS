<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>{{ setting('site_name', 'Crypt') }} - Log in</title>

  {{-- Bootstrap 5.3.3 & Styles --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

  {{-- Font Awesome 6 --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  {{-- Google Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  {{-- Favicon --}}
  <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
</head>

<body class="bg-dark text-white">
    {{-- Modern Header --}}
    <header class="navbar navbar-expand-lg bg-dark border-bottom border-secondary fixed-top">
        <div class="container-fluid px-4">
            {{-- Logo --}}
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ setting('logo', asset('images/logo.png')) }}" alt="{{ setting('site_name', 'Crypt') }}" height="32" class="me-2">
                <span class="fw-bold text-warning">{{ setting('site_name', 'Crypt') }}</span>
            </a>
            
            {{-- Right Side --}}
            <div class="d-flex align-items-center gap-3">
                {{-- Theme Toggle --}}
                <button class="btn btn-outline-secondary btn-sm" type="button" id="themeToggle" title="Toggle theme">
                    <i class="fas fa-moon"></i>
                </button>
                
                {{-- Help Link --}}
                <a href="#" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-question-circle"></i>
                    Help
                </a>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <div class="container-fluid bg-dark" style="min-height: 100vh; padding-top: 80px;">
        <div class="row justify-content-center align-items-center min-vh-100">
            {{-- Left Column - QR Code Section --}}
            <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
                <div class="text-center">
                    <div class="card bg-secondary bg-opacity-10 border-secondary p-4 mb-4" style="max-width: 320px;">
                        <div class="card-body text-center">
                            <div class="bg-white p-3 rounded mb-3">
                                <img src="{{ asset('images/features/qr.svg') }}" alt="QR Code" class="img-fluid" style="max-width: 200px;">
                            </div>
                            <h6 class="text-muted">Scan QR code to login</h6>
                            <p class="text-muted small">Or open {{ setting('site_name','Crypt') }} app</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <span class="text-muted">Don't have an account? </span>
                        <a href="{{ route('register') }}" class="text-warning text-decoration-none fw-semibold">Sign up</a>
                    </div>
                </div>
            </div>
            
            {{-- Right Column - Login Form --}}
            <div class="col-lg-6 col-xl-5">
                <div class="card bg-dark border-secondary shadow-lg" style="max-width: 480px; margin: 0 auto;">
                    <div class="card-body p-4 p-md-5">
                        {{-- Header --}}
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-white">Log in</h2>
                            <p class="text-muted">Welcome back! Please enter your details</p>
                        </div>

                        {{-- Status Messages --}}
                        @if (session('status'))
                            <div class="alert alert-info border-0 bg-info bg-opacity-10 text-info">
                                <i class="fas fa-info-circle me-2"></i>{{ session('status') }}
                            </div>
                        @endif

                        {{-- Login Form --}}
                        <form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            
                            {{-- Email/Phone Field --}}
                            <div class="mb-3">
                                <label for="email" class="form-label text-white fw-medium">
                                    Email/Phone Number <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="email"
                                    class="form-control form-control-lg bg-dark border-secondary text-white @error('email') is-invalid @enderror"
                                    name="email"
                                    id="email"
                                    value="{{ old('email') }}"
                                    placeholder="Enter your email or phone number"
                                    required
                                    autocomplete="email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">This field is required.</div>
                                @enderror
                            </div>

                            {{-- Password Field --}}
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label for="password" class="form-label text-white fw-medium mb-0">
                                        Password <span class="text-danger">*</span>
                                    </label>
                                    <a href="{{ route('password.request') }}" class="text-warning text-decoration-none small">
                                        Forgot password?
                                    </a>
                                </div>
                                <div class="position-relative">
                                    <input
                                        type="password"
                                        class="form-control form-control-lg bg-dark border-secondary text-white pe-5 @error('password') is-invalid @enderror"
                                        name="password"
                                        id="password"
                                        placeholder="Enter your password"
                                        required
                                        autocomplete="current-password">
                                    <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-muted px-3"
                                            onclick="togglePassword()" aria-label="Show/Hide password">
                                        <i class="fas fa-eye" id="eyeIcon"></i>
                                    </button>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">This field is required.</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Remember Me --}}
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember"
                                           {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted" for="remember">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="btn btn-warning btn-lg w-100 fw-semibold mb-4">
                                Continue
                            </button>
                        </form>

                        {{-- Divider --}}
                        <div class="d-flex align-items-center my-4">
                            <hr class="flex-grow-1 border-secondary">
                            <span class="px-3 text-muted small">or</span>
                            <hr class="flex-grow-1 border-secondary">
                        </div>

                        {{-- Social Login Buttons --}}
                        <div class="d-grid gap-2 mb-4">
                            <button type="button" class="btn btn-outline-secondary btn-lg d-flex justify-content-center align-items-center">
                                <img src="{{ asset('images/icon/google.svg') }}" alt="Google" width="20" height="20" class="me-3">
                                Sign in with Google
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-lg d-flex justify-content-center align-items-center">
                                <img src="{{ asset('images/icon/apple.svg') }}" alt="Apple" width="20" height="20" class="me-3">
                                Sign in with Apple
                            </button>
                        </div>

                        {{-- Sign Up Link --}}
                        <div class="text-center">
                            <span class="text-muted">Don't have an account? </span>
                            <a href="{{ route('register') }}" class="text-warning text-decoration-none fw-semibold">Sign up</a>
                        </div>
                        
                        {{-- Mobile QR Code Link --}}
                        <div class="d-lg-none text-center mt-4">
                            <a href="#qrModal" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal">
                                <i class="fas fa-qrcode me-2"></i>
                                Scan QR Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- QR Code Modal for Mobile --}}
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title text-white" id="qrModalLabel">QR Code Login</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="bg-white p-3 rounded mb-3 d-inline-block">
                        <img src="{{ asset('images/features/qr.svg') }}" alt="QR Code" class="img-fluid" style="max-width: 200px;">
                    </div>
                    <h6 class="text-muted">Scan QR code to login</h6>
                    <p class="text-muted small">Or open {{ setting('site_name','Crypt') }} app</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="bg-dark border-top border-secondary py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-wrap justify-content-center gap-4 text-center">
                        <a href="{{ setting('docs_url', '#') }}" class="text-muted text-decoration-none small">Documentation</a>
                        <a href="{{ setting('cookies_url', '#') }}" class="text-muted text-decoration-none small">Cookies Policy</a>
                        <a href="{{ setting('terms', '#') }}" class="text-muted text-decoration-none small">Terms of Service</a>
                        <a href="{{ setting('privacy_policy', '#') }}" class="text-muted text-decoration-none small">Privacy Policy</a>
                        <a href="#" class="text-muted text-decoration-none small">Support</a>
                    </div>
                    <div class="text-center mt-3">
                        <p class="text-muted small mb-0">
                            &copy; {{ date('Y') }} {{ setting('site_name', 'Crypt') }}. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        // Password Toggle
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        // Theme Toggle
        document.getElementById('themeToggle')?.addEventListener('click', function() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-bs-theme', newTheme);
            
            const icon = this.querySelector('i');
            if (newTheme === 'dark') {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            } else {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }
        });

        // Form Validation
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.needs-validation');
            
            Array.from(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });
            });
        });

        // Auto-hide alerts
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>

    {{-- Custom Styles --}}
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }
        
        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
            border: none;
            color: #000;
        }
        
        .btn-warning:hover {
            background: linear-gradient(135deg, #ffb300 0%, #ff8f00 100%);
            color: #000;
        }
        
        .card {
            backdrop-filter: blur(10px);
            background: rgba(33, 37, 41, 0.95) !important;
        }
        
        .navbar {
            backdrop-filter: blur(10px);
            background: rgba(33, 37, 41, 0.95) !important;
        }
        
        @media (max-width: 991.98px) {
            .min-vh-100 {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }
        }
        
        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
        }
        
        .form-check-input:checked {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        
        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }
        
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }
    </style>
</body>
</html>
