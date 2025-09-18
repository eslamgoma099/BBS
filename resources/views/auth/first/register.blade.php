<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>{{ setting('site_name', 'Crypt') }} | Register</title>
  <!-- TopHive Crypt Theme CSS -->
  <link rel="stylesheet" href="{{ asset('assets1/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets1/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets1/css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('assets1/css/responsive.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/svg" href="{{ asset('assets1/images/favicon.svg') }}">

</head>

<body class="crypt-dark">

    <!-- Header -->
    <header class="crypt-header blur-header align-items-center fixed-top z-3">
        <div class="row align-items-center justify-content-between">

            <!-- main menu -->
            <div class="col-auto d-flex flex-row align-items-center">

                <!-- Logo -->
                <div class="crypt-logo dark">
                    <a href="{{ url('/') }}">
                        @if(setting('logo_dark'))
                            <img src="{{ setting('logo_dark') }}" alt="logo-dark">
                        @else
                            <img src="{{ asset('assets1/images/logo-dark.svg') }}" alt="logo-dark">
                        @endif
                    </a>
                </div>
                <div class="crypt-logo light">
                    <a href="{{ url('/') }}">
                        @if(setting('logo'))
                            <img src="{{ setting('logo') }}" alt="logo-light">
                        @else
                            <img src="{{ asset('assets1/images/logo.svg') }}" alt="logo-light">
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

                </div>
            </div>

        </div>
    </header>

    <div class="page-wrapper">
        <main class="login-main" role="main">
            <div class="signup-card">
                <!-- Left column: Welcome / Illustration -->
                <aside class="signup-card__visual">
                    <img class="signup-icon" src="{{ asset('assets1/images/features/qr.svg') }}" alt="QR Code illustration">
                    <h3 class="visual__title">Join the Future</h3>
                    <p class="visual__desc">Create your account and start trading cryptocurrencies with confidence. Join thousands of traders worldwide.</p>

                    <p class="has-account">
                        Already have an account?
                        <a class="link-signin" href="{{ route('login') }}">Sign in</a>
                    </p>
                </aside>

                <!-- Right column: Form -->
                <section class="signup-card__form">
                    <h1 class="site-title">Create Account</h1>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div class="field-help error">{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    
                    <form class="form-signup" action="{{ route('register') }}" name="password_strength" id="pass_form" method="POST" novalidate>
                        @csrf
                        <div class="form-row form-row--split">
                            <div class="form-col">
                                <label for="first_name" class="form-label">First Name <span class="required">*</span></label>
                                <input required type="text" name="first_name" value="{{ old('first_name') }}" class="input @error('first_name') is-invalid @enderror" id="first_name" placeholder="Enter your first name" aria-required="true">
                                <div class="field-help">This field is required.</div>
                                @error('first_name')
                                    <div class="field-help error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-col">
                                <label for="last_name" class="form-label">Last Name <span class="required">*</span></label>
                                <input required type="text" name="last_name" value="{{ old('last_name') }}" class="input @error('last_name') is-invalid @enderror" id="last_name" placeholder="Enter your last name" aria-required="true">
                                <div class="field-help">This field is required.</div>
                                @error('last_name')
                                    <div class="field-help error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="email" class="form-label">Email <span class="required">*</span></label>
                            <input required type="email" name="email" value="{{ old('email') }}" class="input @error('email') is-invalid @enderror" id="email" placeholder="Enter your email address" aria-required="true">
                            <div class="field-help">This field is required.</div>
                            @error('email')
                                <div class="field-help error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <label for="country" class="form-label">Country <span class="required">*</span></label>
                            <div class="input-group">
                                <select required onchange="endpoint('{{ route('get-country-info','') }}',this.value)" name="country" id="country" class="input select-input">
                                    <option value=" " selected>Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->nicename ?? '' }}" id="{{ $country->phonecode }}">{{ $country->nicename ?? '' }}</option>
                                    @endforeach
                                </select>
                                <div class="flag-container">
                                    <img id="flag-icon" src="{{ asset('assets/images/flags/dd.png') }}" alt="flag" class="flag-img"/>
                                </div>
                            </div>
                            <div class="field-help">This field is required.</div>
                            @error('country')
                                <div class="field-help error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-row form-row--split">
                            <div class="form-col">
                                <label for="phone" class="form-label">Phone <span class="required">*</span></label>
                                <div class="input-group">
                                    <input id="phone_code" type="text" name='phone_code' class="input phone-code" placeholder="+1" readonly>
                                    <input required id="phone" name="phone" type="text" value="{{ old('phone') }}" class="input phone-number @error('phone') is-invalid @enderror" placeholder="Enter phone number" aria-required="true">
                                </div>
                                <div class="field-help">This field is required.</div>
                                @error('phone')
                                    <div class="field-help error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-col">
                                <label for="cur" class="form-label">Currency</label>
                                <select name="cur" id="cur" class="input select-input">
                                    @foreach(\App\Models\Currency::all() as $item)
                                        <option value="{{ $item->code }}">{{ $item->name }} ({{ $item->sign }})</option>
                                    @endforeach
                                </select>
                                @error('cur')
                                    <div class="field-help error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row form-row--split">
                            <div class="form-col">
                                <label for="password" class="form-label">Password <span class="required">*</span></label>
                                <div class="password-input">
                                    <input required name="password" type="password" class="input @error('password') is-invalid @enderror" id="password" placeholder="Create your password" autocomplete="off" aria-required="true">
                                    <button type="button" class="password-toggle" id="togglePassword" aria-label="Show password">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <span id="passstrength" class="field-help"></span>
                                <div class="field-help">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                                @error('password')
                                    <div class="field-help error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-col">
                                <label for="cPassword" class="form-label">Confirm Password <span class="required">*</span></label>
                                <div class="password-input">
                                    <input required name="password_confirmation" type="password" class="input @error('password_confirmation') is-invalid @enderror" id="cPassword" placeholder="Confirm your password" aria-required="true">
                                    <button type="button" class="password-toggle" id="toggleCPassword" aria-label="Show password">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                    <div class="field-help error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <label class="checkbox">
                                <input required type="checkbox" value="1" id="defaultCheck1" name="terms">
                                <span class="checkbox__label">
                                    I confirm that I am 18 years old or older and accept all the <a href="{{ route('terms') ?? '#' }}" class="link-signup" target="_blank">terms and conditions</a>.
                                </span>
                            </label>
                            <div class="field-help">You must agree before submitting.</div>
                            @error('terms')
                                <div class="field-help error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-row form-row--actions">
                            <button type="submit" class="btn btn--primary btnReg">Create Account</button>
                        </div>
                    </form>

                    <div class="or-separator"><span>or</span></div>

                    <div class="social-buttons">
                        <a class="btn btn--social btn--google" href="#!" aria-label="Sign up with Google">
                            <img class="btn-icon" src="{{ asset('assets1/images/icon/google.svg') }}" alt="">
                            <span>Sign up with Google</span>
                        </a>

                        <a class="btn btn--social btn--apple" href="#!" aria-label="Sign up with Apple">
                            <img class="btn-icon" src="{{ asset('assets1/images/icon/apple.svg') }}" alt="">
                            <span>Sign up with Apple</span>
                        </a>
                    </div>

                    <div class="signin-cta">
                        <span>Already have an account?</span>
                        <a class="link-signin" href="{{ route('login') }}">Sign in</a>
                    </div>
                </section>
            </div>
        </main>
    </div>



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js"></script>

    <script>
        // Theme toggle functionality
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
        document.querySelectorAll('.input').forEach(function(input) {
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
                    strengthColor = '#dc2626';
                    break;
                case 2:
                    strengthText = 'Weak';
                    strengthColor = '#f59e0b';
                    break;
                case 3:
                    strengthText = 'Fair';
                    strengthColor = '#f59e0b';
                    break;
                case 4:
                    strengthText = 'Good';
                    strengthColor = '#10b981';
                    break;
                case 5:
                    strengthText = 'Strong';
                    strengthColor = '#10b981';
                    break;
            }
            
            if (password.length > 0) {
                strengthIndicator.textContent = 'Strength: ' + strengthText;
                strengthIndicator.style.color = strengthColor;
            } else {
                strengthIndicator.textContent = '';
            }
        });
    </script>

    <style>
    :root{
      --bg: #f7f8fb;
      --card-bg: #ffffff;
      --muted: #6b7280;
      --text: #111827;
      --accent: #2563eb;
      --accent-dark: #1e40af;
      --border: #e6e9ef;
      --radius: 10px;
      --gap: 18px;
      --input-height: 44px;
      --font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family:var(--font-family);
      background:var(--bg);
      color:var(--text);
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      line-height:1.4;
    }

    .site-title{
      margin:0 0 20px;
      font-size:20px;
      font-weight:600;
      color:var(--text);
    }

    /* Main layout */
    .login-main{
      display:flex;
      align-items:center;
      justify-content:center;
      padding:40px 20px;
    }

    /* Signup Card */
    .signup-card{
      background:var(--card-bg);
      border-radius:var(--radius);
      box-shadow:0 6px 20px rgba(16,24,40,0.06);
      display:grid;
      grid-template-columns: 400px 520px;
      gap:24px;
      overflow:hidden;
      width:100%;
      max-width:960px;
      padding:26px;
    }

    /* Visual (left) */
    .signup-card__visual{
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:center;
      padding:32px 24px;
      border-radius:8px;
      background:linear-gradient(180deg, rgba(246,248,252,1) 0%, rgba(255,255,255,1) 100%);
      text-align:center;
      gap:18px;
    }
    .signup-icon{
      width:140px;
      height:auto;
      display:block;
      margin-bottom:8px;
    }
    .visual__title{
      margin:0 0 8px;
      font-size:22px;
      font-weight:700;
      color:var(--text);
    }
    .visual__desc{
      color:var(--muted);
      font-size:14px;
      margin:0;
      line-height:1.5;
    }
    .has-account{
      margin-top:14px;
      font-size:14px;
      color:var(--muted);
    }
    .link-signin{
      margin-left:6px;
      color:var(--accent);
      text-decoration:none;
      font-weight:600;
    }
    .link-signin:hover{color:var(--accent-dark)}

    /* Form column */
    .signup-card__form{
      padding:6px 8px;
      display:flex;
      flex-direction:column;
      justify-content:center;
    }

    .form-signup{
      width:100%;
      max-width:480px;
    }

    /* Form rows */
    .form-row{margin-bottom:16px}
    .form-row--split{
      display:grid;
      grid-template-columns:1fr 1fr;
      gap:12px;
      margin-bottom:16px;
    }
    .form-col{
      display:flex;
      flex-direction:column;
    }
    .form-row--actions{
      display:flex;
      align-items:center;
      gap:12px;
      justify-content:flex-start;
      margin-top:8px;
    }
    .form-label{
      display:block;
      color:var(--muted);
      font-size:14px;
      margin-bottom:8px;
      font-weight:500;
    }

    .input, .select-input{
      width:100%;
      height:var(--input-height);
      padding:10px 12px;
      border-radius:8px;
      border:1px solid var(--border);
      background:#fff;
      font-size:15px;
      color:var(--text);
    }
    .input:focus, .select-input:focus{
      outline:none;
      border-color:var(--accent);
      box-shadow:0 0 0 4px rgba(37,99,235,0.08);
    }

    /* Input groups */
    .input-group{
      display:flex;
      align-items:stretch;
      position:relative;
    }
    .phone-code{
      flex:0 0 80px;
      border-top-right-radius:0;
      border-bottom-right-radius:0;
      border-right:none;
    }
    .phone-number{
      flex:1;
      border-top-left-radius:0;
      border-bottom-left-radius:0;
    }
    .flag-container{
      position:absolute;
      right:8px;
      top:50%;
      transform:translateY(-50%);
      z-index:5;
    }
    .flag-img{
      width:24px;
      height:16px;
      object-fit:cover;
      border-radius:2px;
    }

    /* Password input */
    .password-input{
      position:relative;
    }
    .password-toggle{
      position:absolute;
      right:12px;
      top:50%;
      transform:translateY(-50%);
      background:none;
      border:none;
      color:var(--muted);
      cursor:pointer;
      padding:4px;
      z-index:10;
    }
    .password-toggle:hover{color:var(--text)}

    /* required / field help */
    .field-help{font-size:12px;color:var(--muted);margin-top:6px}
    .field-help.error{color:#dc2626}
    .required{color:#dc2626}

    /* Checkbox */
    .checkbox{display:flex;align-items:flex-start;gap:8px;margin-top:4px}
    .checkbox input{width:16px;height:16px;margin-top:2px;flex-shrink:0}
    .checkbox__label{font-size:14px;color:var(--muted);line-height:1.4}
    .link-signup{color:var(--accent);text-decoration:none;font-weight:600}
    .link-signup:hover{color:var(--accent-dark)}

    /* Buttons */
    .btn{
      display:inline-flex;
      align-items:center;
      justify-content:center;
      gap:10px;
      border:0;
      cursor:pointer;
      border-radius:8px;
      padding:10px 16px;
      font-weight:600;
      font-size:14px;
      text-decoration:none;
    }
    .btn--primary{
      background:var(--accent);
      color:#fff;
      min-width:140px;
    }
    .btn--primary:hover{background:var(--accent-dark)}
    .btn--social{
      width:100%;
      border:1px solid var(--border);
      background:#fff;
      color:var(--text);
      padding:10px 12px;
      justify-content:flex-start;
    }
    .btn-icon{width:18px;height:18px;display:inline-block}

    /* Social button spacing */
    .social-buttons{
      display:flex;
      gap:10px;
      margin-top:12px;
      flex-direction:column;
    }

    /* OR separator */
    .or-separator{
      display:flex;
      align-items:center;
      justify-content:center;
      margin-top:16px;
      margin-bottom:8px;
      color:var(--muted);
      font-size:13px;
    }
    .or-separator::before,
    .or-separator::after{
      content:"";
      display:block;
      height:1px;
      background:var(--border);
      width:36%;
      margin:0 10px;
    }

    /* signin CTA at bottom */
    .signin-cta{
      margin-top:16px;
      font-size:14px;
      color:var(--muted);
      display:flex;
      gap:8px;
      align-items:center;
    }

    /* Responsive */
    @media (max-width:960px){
      .signup-card{
        grid-template-columns: 1fr;
        padding:20px;
        max-width:600px;
      }
      .signup-card__visual{
        order:0;
        padding:24px;
      }
      .signup-card__form{
        order:1;
        padding:8px;
      }
      .form-row--split{
        grid-template-columns:1fr;
        gap:16px;
      }
      .social-buttons{flex-direction:row}
    }
    @media (max-width:640px){
      .form-row--split{grid-template-columns:1fr}
      .social-buttons{flex-direction:column}
    }
    </style>

</body>
</html>
