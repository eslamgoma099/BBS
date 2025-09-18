<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>{{ setting('site_name') }} | Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="icon" type="image/svg+xml" href="{{ setting('favicon', asset('assets/images/favicon.svg')) }}">

  <style>
    :root {
      --crypt-primary: {{ setting('primary_color', '#6366f1') }};
      --crypt-primary-hover: {{ setting('primary_color_hover', '#5855eb') }};
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
      max-width: 1000px;
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
      min-height: 600px;
    }
    
    .welcome-icon {
      background: rgba(255, 255, 255, 0.1);
      border-radius: var(--crypt-radius);
      padding: 2rem;
      margin-bottom: 2rem;
      backdrop-filter: blur(10px);
      display: inline-flex;
      align-items: center;
      justify-content: center;
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
    
    .form-control, .form-select {
      background: var(--crypt-input-bg);
      border: 1px solid var(--crypt-border);
      color: var(--crypt-text);
      border-radius: 8px;
      padding: 0.75rem 1rem;
      font-size: 0.875rem;
      transition: all 0.2s ease;
    }
    
    .form-control:focus, .form-select:focus {
      background: var(--crypt-input-bg);
      border-color: var(--crypt-primary);
      color: var(--crypt-text);
      box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .form-control::placeholder {
      color: var(--crypt-text-muted);
    }
    
    .input-group-text {
      background: var(--crypt-input-bg);
      border: 1px solid var(--crypt-border);
      color: var(--crypt-text);
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
    
    .form-text {
      color: var(--crypt-text-muted);
      font-size: 0.75rem;
    }
    
    @media (max-width: 768px) {
      .auth-left {
        padding: 2rem;
        min-height: auto;
      }
      
      .auth-right {
        padding: 2rem;
      }
      
      .welcome-icon {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
      }
    }
  </style>
</head>

<body>

    <div class="auth-container">
        <div class="auth-card">
            <div class="row g-0">
                <!-- Left Column - Welcome Section -->
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
                        
                        <div class="welcome-icon">
                            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L2 7v10c0 5.55 3.84 9.74 9 11 5.16-1.26 9-5.45 9-11V7l-10-5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        
                        <h4 class="fw-bold mb-3">Join the Future</h4>
                        <p class="mb-4 opacity-90">
                            Create your account and start trading cryptocurrencies with confidence. Join thousands of traders worldwide.
                        </p>
                        
                        <div class="d-flex align-items-center gap-2">
                            <span class="opacity-75">Already have an account?</span>
                            <a href="{{ route('login') }}" class="text-white fw-semibold text-decoration-none">
                                Sign in →
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Registration Form -->
                <div class="col-lg-7">
                    <div class="auth-right">
                        <div class="mb-4">
                            <h2 class="fw-bold mb-2">Create Account</h2>
                            <p class="text-muted mb-0">Get started with your free account</p>
                        </div>

                        {{-- Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger mb-4" role="alert">
                                <ul class="mb-0 small">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="needs-validation" action="{{ route('register') }}" name="password_strength" id="pass_form" method="POST" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">First Name <span style="color: var(--crypt-danger);">*</span></label>
                                    <input required type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" id="first_name" placeholder="Enter your first name">
                                    <div class="invalid-feedback">This field is required.</div>
                                    @error('first_name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name <span style="color: var(--crypt-danger);">*</span></label>
                                    <input required type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" id="last_name" placeholder="Enter your last name">
                                    <div class="invalid-feedback">This field is required.</div>
                                    @error('last_name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span style="color: var(--crypt-danger);">*</span></label>
                                    <input required type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter your email address">
                                    <div class="invalid-feedback">This field is required.</div>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="country" class="form-label">Country <span style="color: var(--crypt-danger);">*</span></label>
                                    <div class="input-group">
                                        <select required onchange="endpoint('{{ route('get-country-info','') }}',this.value)" name="country" id="country" class="form-select">
                                            <option value=" " selected>Select Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->nicename ?? '' }}" id="{{ $country->phonecode }}">{{ $country->nicename ?? '' }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text p-0" style="width:58px;">
                                            <img id="flag-icon" src="{{ asset('assets/images/flags/dd.png') }}" alt="flag" style="height: 100%; width: 100%; padding:5px; object-fit:cover;"/>
                                        </span>
                                    </div>
                                    @error('country')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone <span style="color: var(--crypt-danger);">*</span></label>
                                    <div class="input-group">
                                        <input id="phone_code" type="text" name='phone_code' class="form-control" placeholder="code" readonly style="max-width: 80px;">
                                        <input required id="phone" name="phone" type="text" value="{{ old('phone') }}" class="form-control" placeholder="Enter phone number">
                                    </div>
                                    <div class="invalid-feedback">This field is required.</div>
                                    @error('phone')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="cur" class="form-label">Currency</label>
                                    <select name="cur" id="cur" class="form-select">
                                        @foreach(\App\Models\Currency::all() as $item)
                                            <option value="{{ $item->code }}">{{ $item->name }} ({{ $item->sign }})</option>
                                        @endforeach
                                    </select>
                                    @error('cur')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password <span style="color: var(--crypt-danger);">*</span></label>
                                    <div class="position-relative">
                                        <input required name="password" type="password" class="form-control" id="password" placeholder="Create your password" autocomplete="off" style="padding-right: 3rem;">
                                        <button type="button" class="password-toggle" id="togglePassword" aria-label="Show password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <span id="passstrength" class="text-sm"></span>
                                    <div class="form-text mt-1">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                                    @error('password')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="cPassword" class="form-label">Confirm Password <span style="color: var(--crypt-danger);">*</span></label>
                                    <div class="position-relative">
                                        <input required name="password_confirmation" type="password" class="form-control" id="cPassword" placeholder="Confirm your password" style="padding-right: 3rem;">
                                        <button type="button" class="password-toggle" id="toggleCPassword" aria-label="Show password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('password_confirmation')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" required type="checkbox" value="1" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            I confirm that I am 18 years old or older and accept all the <a href="{{ route('terms') ?? '#' }}" class="link-primary" target="_blank">terms and conditions</a>.
                                        </label>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                        @error('terms')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 mt-3 btnReg" type="submit">Create Account</button>
                                </div>
                            </div>
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
                            <span class="text-muted">Already have an account? </span>
                            <a href="{{ route('login') }}" class="link-primary fw-semibold">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js"></script>

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
        function setupPasswordToggle(toggleId, inputId) {
            const toggle = document.getElementById(toggleId);
            const input = document.getElementById(inputId);
            
            if (toggle && input) {
                toggle.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            }
        }
        
        setupPasswordToggle('togglePassword', 'password');
        setupPasswordToggle('toggleCPassword', 'cPassword');

        // Country endpoint fetch
        function endpoint(url, value) {
            if (!url || !value || value.trim() === '') return;
            
            axios.get(url + '/' + value, { 
                params: { c_name: value },
                timeout: 10000
            })
            .then(function(response) {
                if (response.data && response.data.phonecode) {
                    const phoneCode = document.getElementById('phone_code');
                    const flagIcon = document.getElementById('flag-icon');
                    
                    if (phoneCode) {
                        phoneCode.value = '+' + response.data.phonecode;
                    }
                    if (flagIcon && response.data.iso) {
                        flagIcon.src = response.data.iso;
                        flagIcon.alt = 'Flag of ' + value;
                    }
                }
            })
            .catch(function(error) {
                console.error('Failed to fetch country info:', error);
            });
        }

        // Enhanced form interactions
        document.querySelectorAll('.form-control, .form-select').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.parentNode.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentNode.classList.remove('focused');
            });
        });

        // Password strength indicator (basic)
        document.getElementById('password')?.addEventListener('input', function() {
            const password = this.value;
            const strengthIndicator = document.getElementById('passstrength');
            
            if (!strengthIndicator) return;
            
            let strength = 0;
            let strengthText = '';
            let strengthColor = '';
            
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/\d/.test(password)) strength++;
            if (/[^\w\s]/.test(password)) strength++;
            
            switch(strength) {
                case 0:
                case 1:
                    strengthText = 'Very weak';
                    strengthColor = 'var(--crypt-danger)';
                    break;
                case 2:
                    strengthText = 'Weak';
                    strengthColor = 'var(--crypt-warning)';
                    break;
                case 3:
                    strengthText = 'Fair';
                    strengthColor = 'var(--crypt-warning)';
                    break;
                case 4:
                    strengthText = 'Good';
                    strengthColor = 'var(--crypt-success)';
                    break;
                case 5:
                    strengthText = 'Strong';
                    strengthColor = 'var(--crypt-success)';
                    break;
            }
            
            if (password.length > 0) {
                strengthIndicator.textContent = strengthText;
                strengthIndicator.style.color = strengthColor;
                strengthIndicator.style.fontSize = '0.75rem';
                strengthIndicator.style.marginTop = '0.25rem';
            } else {
                strengthIndicator.textContent = '';
            }
        });
    </script>

</body>
</html>
