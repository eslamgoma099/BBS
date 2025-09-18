<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>{{ setting('site_name', 'Crypt') }} - Create Account</title>

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
            <div class="col-xl-6 col-lg-7 col-md-8 col-sm-10">
                <div class="card bg-dark border-secondary shadow-lg" style="max-width: 600px; margin: 0 auto;">
                    <div class="card-body p-4 p-md-5">
                        {{-- Header --}}
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-white">Create Account</h2>
                            <p class="text-muted">Join the future of cryptocurrency trading</p>
                        </div>

                        {{-- Error Messages --}}
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger mb-4">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-exclamation-triangle me-2 mt-1"></i>
                                    <div>
                                        <strong>Please correct the following errors:</strong>
                                        <ul class="mb-0 mt-2 ps-3">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Registration Form --}}
                        <form action="{{ route('register') }}" method="POST" class="needs-validation" novalidate>
                            @csrf

                            {{-- Name Fields --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-white fw-medium">First Name <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control form-control-lg bg-dark border-secondary text-white @error('first_name') is-invalid @enderror" 
                                           name="first_name" 
                                           value="{{ old('first_name') }}" 
                                           placeholder="Enter your first name" 
                                           required
                                           autocomplete="given-name">
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">This field is required.</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-white fw-medium">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control form-control-lg bg-dark border-secondary text-white @error('last_name') is-invalid @enderror" 
                                           name="last_name" 
                                           value="{{ old('last_name') }}" 
                                           placeholder="Enter your last name" 
                                           required
                                           autocomplete="family-name">
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">This field is required.</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email Field --}}
                            <div class="mb-3">
                                <label for="email" class="form-label text-white fw-medium">Email <span class="text-danger">*</span></label>
                                <input type="email" 
                                       class="form-control form-control-lg bg-dark border-secondary text-white @error('email') is-invalid @enderror" 
                                       name="email" 
                                       id="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="Enter your email address" 
                                       required
                                       autocomplete="email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">This field is required.</div>
                                @enderror
                            </div>

                            {{-- Country & Phone Fields --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-white fw-medium">Country <span class="text-danger">*</span></label>
                                    <select onchange="endpoint('{{ route('get-country-info','') }}', this.value)" 
                                            name="country" 
                                            id="country" 
                                            class="form-select form-select-lg bg-dark border-secondary text-white @error('country') is-invalid @enderror" 
                                            required>
                                        <option value="" selected disabled>Select your country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->nicename ?? '' }}" 
                                                    data-code="{{ $country->phonecode }}"
                                                    {{ old('country') == $country->nicename ? 'selected' : '' }}>
                                                {{ $country->nicename ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">This field is required.</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-white fw-medium">Phone Code & Flag</label>
                                    <div class="input-group">
                                        <input id="phone_code" 
                                               type="text" 
                                               name="phone_code" 
                                               class="form-control form-control-lg bg-dark border-secondary text-white" 
                                               placeholder="+00" 
                                               readonly>
                                        <span class="input-group-text bg-dark border-secondary">
                                            <img id="flag-icon" src="{{ asset('flags/dd.png') }}" style="height: 20px;" alt="Flag"/>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-white fw-medium">Phone Number <span class="text-danger">*</span></label>
                                <input required 
                                       id="phone" 
                                       name="phone" 
                                       type="text" 
                                       value="{{ old('phone') }}" 
                                       class="form-control form-control-lg bg-dark border-secondary text-white @error('phone') is-invalid @enderror" 
                                       placeholder="Enter your phone number"
                                       autocomplete="tel">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">This field is required.</div>
                                @enderror
                            </div>

                            {{-- Password Fields --}}
                            <div class="mb-3">
                                <label for="password" class="form-label text-white fw-medium">Password <span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input type="password" 
                                           class="form-control form-control-lg bg-dark border-secondary text-white pe-5 @error('password') is-invalid @enderror" 
                                           name="password" 
                                           id="password" 
                                           placeholder="Create a secure password" 
                                           autocomplete="new-password" 
                                           required>
                                    <button type="button" 
                                            class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-muted px-3"
                                            onclick="togglePassword('password', 'eyeIcon1')" 
                                            aria-label="Show/Hide password">
                                        <i class="fas fa-eye" id="eyeIcon1"></i>
                                    </button>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">This field is required.</div>
                                    @enderror
                                </div>
                                <div class="text-muted small mt-1">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Use 8 or more characters with a mix of letters, numbers & symbols.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-white fw-medium">Confirm Password <span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input required 
                                           name="password_confirmation" 
                                           type="password" 
                                           class="form-control form-control-lg bg-dark border-secondary text-white pe-5 @error('password_confirmation') is-invalid @enderror" 
                                           id="cPassword" 
                                           placeholder="Confirm your password"
                                           autocomplete="new-password">
                                    <button type="button" 
                                            class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-muted px-3"
                                            onclick="togglePassword('cPassword', 'eyeIcon2')" 
                                            aria-label="Show/Hide password confirmation">
                                        <i class="fas fa-eye" id="eyeIcon2"></i>
                                    </button>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">This field is required.</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Currency Selection --}}
                            <div class="mb-4">
                                <label class="form-label text-white fw-medium">Preferred Currency</label>
                                <select name="cur" class="form-select form-select-lg bg-dark border-secondary text-white">
                                    @foreach($curs as $item)
                                        <option value="{{ $item->code }}" {{ old('cur') == $item->code ? 'selected' : '' }}>
                                            {{ $item->name }} ({{ $item->sign }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="text-muted small mt-1">
                                    <i class="fas fa-info-circle me-1"></i>
                                    You can change this later in your account settings.
                                </div>
                            </div>

                            {{-- Terms Agreement --}}
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           value="1" 
                                           id="agree_terms" 
                                           required
                                           {{ old('agree_terms') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted" for="agree_terms">
                                        I have read and agree to the
                                        <a href="{{ setting('terms', '#') }}" class="text-warning text-decoration-none fw-semibold" target="_blank">
                                            Terms of Use
                                        </a> and 
                                        <a href="{{ setting('privacy_policy', '#') }}" class="text-warning text-decoration-none fw-semibold" target="_blank">
                                            Privacy Policy
                                        </a>.
                                    </label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="btn btn-warning btn-lg w-100 fw-semibold mb-4">
                                <i class="fas fa-user-plus me-2"></i>
                                Create Account
                            </button>
                        </form>

                        {{-- Divider --}}
                        <div class="d-flex align-items-center my-4">
                            <hr class="flex-grow-1 border-secondary">
                            <span class="px-3 text-muted small">or</span>
                            <hr class="flex-grow-1 border-secondary">
                        </div>

                        {{-- Social Registration Buttons --}}
                        <div class="d-grid gap-2 mb-4">
                            <button type="button" class="btn btn-outline-secondary btn-lg d-flex justify-content-center align-items-center">
                                <img src="{{ asset('images/icon/google.svg') }}" alt="Google" width="20" height="20" class="me-3">
                                Continue with Google
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-lg d-flex justify-content-center align-items-center">
                                <img src="{{ asset('images/icon/apple.svg') }}" alt="Apple" width="20" height="20" class="me-3">
                                Continue with Apple
                            </button>
                        </div>

                        {{-- Login Link --}}
                        <div class="text-center">
                            <span class="text-muted">Already have an account? </span>
                            <a href="{{ route('login') }}" class="text-warning text-decoration-none fw-semibold">Sign in</a>
                        </div>
                    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Password Toggle
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);
            
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

        // Country Info Endpoint
        function endpoint(url, value) {
            if (!value) return;
            
            axios.get(url + '/' + value)
                .then(function (response) {
                    const phoneCodeInput = document.getElementById('phone_code');
                    const flagIcon = document.getElementById('flag-icon');
                    
                    phoneCodeInput.value = "+" + response.data.phonecode;
                    flagIcon.src = response.data.iso;
                    flagIcon.alt = value + " flag";
                })
                .catch(function (error) {
                    console.error('Country info fetch failed:', error);
                    // Optionally show user-friendly error message
                    const phoneCodeInput = document.getElementById('phone_code');
                    phoneCodeInput.value = '+00';
                });
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
            
            // Password confirmation validation
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('cPassword');
            
            function validatePasswordMatch() {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity('Passwords do not match');
                } else {
                    confirmPassword.setCustomValidity('');
                }
            }
            
            password.addEventListener('change', validatePasswordMatch);
            confirmPassword.addEventListener('keyup', validatePasswordMatch);
        });

        // Auto-hide alerts
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 8000); // 8 seconds for registration errors
            });
        });
    </script>

    {{-- Custom Styles --}}
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }
        
        .form-control:focus,
        .form-select:focus {
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
        
        .input-group-text {
            background-color: #212529 !important;
            border-color: #6c757d;
        }
        
        @media (max-width: 767.98px) {
            .min-vh-100 {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }
            
            .card-body {
                padding: 2rem 1.5rem !important;
            }
        }
    </style>
</body>
</html>
