<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>{{ setting('site_name') }} | Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/favicon.svg') }}">
  
  <style>
    :root {
      --crypt-primary: #6366f1;
      --crypt-primary-hover: #5855eb;
      --crypt-bg: #0f172a;
      --crypt-card-bg: #1e293b;
      --crypt-text: #f8fafc;
      --crypt-text-muted: #94a3b8;
      --crypt-border: #334155;
      --crypt-input-bg: #334155;
      --crypt-success: #10b981;
      --crypt-warning: #f59e0b;
      --crypt-danger: #ef4444;
      --crypt-radius: 12px;
      --crypt-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.3);
    }
    
    * {
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
      background: linear-gradient(135deg, var(--crypt-bg) 0%, #1e293b 100%);
      color: var(--crypt-text);
      min-height: 100vh;
      margin: 0;
    }
    
    .auth-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
    }
    
    .auth-card {
      background: var(--crypt-card-bg);
      border-radius: var(--crypt-radius);
      box-shadow: var(--crypt-shadow);
      overflow: hidden;
      width: 100%;
      max-width: 900px;
      border: 1px solid var(--crypt-border);
    }
    
    .auth-brand {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin-bottom: 2rem;
    }
    
    .auth-brand img {
      height: 32px;
      width: auto;
    }
    
    .auth-left {
      background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
      color: white;
      padding: 3rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      min-height: 500px;
    }
    
    .qr-container {
      background: rgba(255, 255, 255, 0.1);
      border-radius: var(--crypt-radius);
      padding: 2rem;
      margin-bottom: 2rem;
      backdrop-filter: blur(10px);
    }
    
    .qr-container img {
      width: 160px;
      height: 160px;
      border-radius: 8px;
    }
    
    .auth-right {
      padding: 3rem;
      background: var(--crypt-card-bg);
    }
    
    .form-label {
      color: var(--crypt-text);
      font-weight: 500;
      margin-bottom: 0.5rem;
    }
    
    .form-control {
      background: var(--crypt-input-bg);
      border: 1px solid var(--crypt-border);
      color: var(--crypt-text);
      border-radius: 8px;
      padding: 0.75rem 1rem;
      font-size: 0.875rem;
      transition: all 0.2s ease;
    }
    
    .form-control:focus {
      background: var(--crypt-input-bg);
      border-color: var(--crypt-primary);
      color: var(--crypt-text);
      box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .form-control::placeholder {
      color: var(--crypt-text-muted);
    }
    
    .btn-primary {
      background: var(--crypt-primary);
      border-color: var(--crypt-primary);
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      border-radius: 8px;
      transition: all 0.2s ease;
    }
    
    .btn-primary:hover {
      background: var(--crypt-primary-hover);
      border-color: var(--crypt-primary-hover);
      transform: translateY(-1px);
    }
    
    .btn-social {
      background: transparent;
      border: 1px solid var(--crypt-border);
      color: var(--crypt-text);
      border-radius: 8px;
      padding: 0.75rem 1rem;
      transition: all 0.2s ease;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.75rem;
    }
    
    .btn-social:hover {
      background: rgba(99, 102, 241, 0.1);
      border-color: var(--crypt-primary);
      color: var(--crypt-text);
      text-decoration: none;
    }
    
    .divider {
      position: relative;
      margin: 1.5rem 0;
      text-align: center;
    }
    
    .divider::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      height: 1px;
      background: var(--crypt-border);
    }
    
    .divider span {
      background: var(--crypt-card-bg);
      color: var(--crypt-text-muted);
      padding: 0 1rem;
      font-size: 0.875rem;
    }
    
    .link-primary {
      color: var(--crypt-primary);
      text-decoration: none;
    }
    
    .link-primary:hover {
      color: var(--crypt-primary-hover);
      text-decoration: underline;
    }
    
    .form-check-input:checked {
      background-color: var(--crypt-primary);
      border-color: var(--crypt-primary);
    }
    
    .form-check-label {
      color: var(--crypt-text-muted);
    }
    
    .password-toggle {
      background: none;
      border: none;
      color: var(--crypt-text-muted);
      position: absolute;
      right: 0.75rem;
      top: 50%;
      transform: translateY(-50%);
      padding: 0;
      width: 1.5rem;
      height: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 10;
    }
    
    .password-toggle:hover {
      color: var(--crypt-text);
    }
    
    .alert-danger {
      background: rgba(239, 68, 68, 0.1);
      border: 1px solid rgba(239, 68, 68, 0.3);
      color: var(--crypt-danger);
      border-radius: 8px;
    }
    
    @media (max-width: 768px) {
      .auth-left {
        padding: 2rem;
        min-height: auto;
      }
      
      .auth-right {
        padding: 2rem;
      }
      
      .qr-container {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
      }
      
      .qr-container img {
        width: 120px;
        height: 120px;
      }
    }
  </style>
</head>

<body>

    <div class="auth-container">
        <div class="auth-card">
            <div class="row g-0">
                <!-- Left Column - QR Code Section -->
                <div class="col-lg-5">
                    <div class="auth-left">
                        <div class="auth-brand">
                            @if(function_exists('setting') && setting('logo'))
                                <img src="{{ setting('logo') }}" alt="{{ setting('site_name', 'Crypt') }}">
                            @else
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="Crypt">
                            @endif
                            <h4 class="mb-0 fw-bold">{{ setting('site_name', 'Crypt') }}</h4>
                        </div>
                        
                        <div class="qr-container">
                            <img src="{{ asset('assets/images/features/qr.svg') }}" alt="QR Code to sign in" class="img-fluid">
                        </div>
                        
                        <h5 class="fw-bold mb-3">Quick Login</h5>
                        <p class="mb-4 opacity-90">
                            Scan the QR code to log in instantly or open the Crypt mobile app.
                        </p>
                        
                        <div class="d-flex align-items-center gap-2">
                            <span class="opacity-75">Don't have an account?</span>
                            <a href="{{ url('joined') }}" class="text-white fw-semibold text-decoration-none">
                                Sign up →
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Login Form -->
                <div class="col-lg-7">
                    <div class="auth-right">
                        <div class="mb-4">
                            <h2 class="fw-bold mb-2">Welcome back</h2>
                            <p class="text-muted mb-0">Please sign in to your account</p>
                        </div>

                        {{-- Validation errors block --}}
                        @if ($errors->any())
                            <div class="alert alert-danger mb-4" role="alert">
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
                                <label for="email" class="form-label">Email <span style="color: var(--crypt-danger);">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your email address" value="{{ old('email') }}" required autofocus>
                                <div class="invalid-feedback">This field is required.</div>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label for="password" class="form-label mb-0">Password <span style="color: var(--crypt-danger);">*</span></label>
                                    <a href="{{ route('password.request') }}" class="link-primary small">Forgot password?</a>
                                </div>
                                <div class="position-relative">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password" required style="padding-right: 3rem;">
                                    <button type="button" class="password-toggle" id="togglePassword" aria-label="Show password">
                                        <i class="fas fa-eye"></i>
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
                            
                            <button class="btn btn-primary w-100 mb-4" type="submit">Sign In</button>
                        </form>

                        <div class="divider">
                            <span>or continue with</span>
                        </div>

                        <div class="d-grid gap-3">
                            <a href="#" class="btn-social">
                                <img src="{{ asset('assets/images/icon/google.svg') }}" alt="Google" width="20" height="20">
                                <span>Continue with Google</span>
                            </a>
                            <a href="#" class="btn-social">
                                <img src="{{ asset('assets/images/icon/apple.svg') }}" alt="Apple" width="20" height="20">
                                <span>Continue with Apple</span>
                            </a>
                        </div>

                        <div class="text-center mt-4">
                            <span class="text-muted">Don't have an account? </span>
                            <a href="{{ url('joined') }}" class="link-primary fw-semibold">Create account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Bootstrap form validation
        (function() {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();

        // Password toggle functionality
        document.getElementById('togglePassword')?.addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Enhanced form interactions
        document.querySelectorAll('.form-control').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.parentNode.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentNode.classList.remove('focused');
            });
        });
    </script>
</body>
</html>
