<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Crypt</title>
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/svg" href="{{ asset('images/favicon.svg') }}">
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
                            <img src="{{ asset('images/logo-dark.svg') }}" alt="logo-dark">
                        @endif
                    </a>
                </div>
                <div class="crypt-logo light">
                    <a href="{{ url('/') }}">
                        @if(setting('logo'))
                            <img src="{{ setting('logo') }}" alt="logo-light">
                        @else
                            <img src="{{ asset('images/logo.svg') }}" alt="logo-light">
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
            <div class="login-card">
                <!-- Left column: QR / Illustration -->
                <aside class="login-card__visual">
                    <img class="qr-icon" src="{{ asset('images/features/qr.svg') }}" alt="QR code illustration">
                    <p class="visual__desc">Scan the QR code to log in or Open Crypt app.</p>

                    <p class="no-account">
                        Don't have an account?
                        <a class="link-signup" href="{{ route('register') }}">Sign up</a>
                    </p>
                </aside>

                <!-- Right column: Form -->
                <section class="login-card__form">
                    <h1 class="site-title">Log in</h1>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div class="field-help error">{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    
                    <form class="form-signin" action="{{ route('login') }}" method="post" novalidate>
                        @csrf
                        <div class="form-row">
                            <label for="email" class="form-label">Email/Phone Number <span class="required">*</span></label>
                            <input id="email" name="email" type="text" class="input @error('email') is-invalid @enderror" placeholder="Email or phone number" value="{{ old('email') }}" required aria-required="true">
                            <div class="field-help">This field is required.</div>
                        </div>

                        <div class="form-row">
                            <label for="password" class="form-label">Password <span class="required">*</span>
                                <a class="forgot-link" href="{{ route('password.request') }}" aria-label="Forgot password?">Forgot password?</a>
                            </label>
                            <input id="password" name="password" type="password" class="input @error('password') is-invalid @enderror" placeholder="Password" required aria-required="true">
                            <div class="field-help">This field is required.</div>
                        </div>

                        <div class="form-row form-row--actions">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                                <span class="checkbox__label">Remember me</span>
                            </label>

                            <button type="submit" class="btn btn--primary">Sign in</button>
                        </div>

                        <div class="or-separator"><span>or</span></div>

                        <div class="social-buttons">
                            <a class="btn btn--social btn--google" href="#!" aria-label="Sign in with Google">
                                <img class="btn-icon" src="{{ asset('images/icon/google.svg') }}" alt="">
                                <span>Sign in with Google</span>
                            </a>

                            <a class="btn btn--social btn--apple" href="#!" aria-label="Sign in with Apple">
                                <img class="btn-icon" src="{{ asset('images/icon/apple.svg') }}" alt="">
                                <span>Sign in with Apple</span>
                            </a>
                        </div>

                        <div class="signup-cta">
                            <span>Don't have an account?</span>
                            <a class="link-signup" href="{{ route('register') }}">Sign up</a>
                        </div>
                    </form>
                </section>
            </div>
        </main>
    </div>



    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

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

    /* Card */
    .login-card{
      background:var(--card-bg);
      border-radius:var(--radius);
      box-shadow:0 6px 20px rgba(16,24,40,0.06);
      display:grid;
      grid-template-columns: 360px 420px;
      gap:24px;
      overflow:hidden;
      width:100%;
      max-width:820px;
      padding:26px;
    }

    /* Visual (left) */
    .login-card__visual{
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:center;
      padding:24px;
      border-radius:8px;
      background:linear-gradient(180deg, rgba(246,248,252,1) 0%, rgba(255,255,255,1) 100%);
      text-align:center;
      gap:18px;
    }
    .qr-icon{
      width:120px;
      height:auto;
      display:block;
      margin-bottom:8px;
    }
    .visual__desc{
      color:var(--muted);
      font-size:14px;
      margin:0;
    }
    .no-account{
      margin-top:14px;
      font-size:14px;
      color:var(--muted);
    }
    .link-signup{
      margin-left:6px;
      color:var(--accent);
      text-decoration:none;
      font-weight:600;
    }
    .link-signup:hover{color:var(--accent-dark)}

    /* Form column */
    .login-card__form{
      padding:6px 8px;
      display:flex;
      flex-direction:column;
      justify-content:center;
    }

    .form-signin{
      width:100%;
      max-width:380px;
    }

    /* Form rows */
    .form-row{margin-bottom:14px}
    .form-row--actions{
      display:flex;
      align-items:center;
      gap:12px;
      justify-content:space-between;
      margin-top:6px;
    }
    .form-label{
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:8px;
      color:var(--muted);
      font-size:14px;
      margin-bottom:8px;
    }
    .forgot-link{
      font-size:13px;
      color:var(--accent);
      text-decoration:none;
    }
    .forgot-link:hover{color:var(--accent-dark)}

    .input{
      width:100%;
      height:var(--input-height);
      padding:10px 12px;
      border-radius:8px;
      border:1px solid var(--border);
      background:#fff;
      font-size:15px;
      color:var(--text);
    }
    .input:focus{
      outline:none;
      border-color:var(--accent);
      box-shadow:0 0 0 4px rgba(37,99,235,0.08);
    }

    /* required / field help */
    .field-help{font-size:12px;color:var(--muted);margin-top:6px}
    .required{color:#dc2626}

    /* Checkbox */
    .checkbox{display:flex;align-items:center;gap:8px}
    .checkbox input{width:16px;height:16px}
    .checkbox__label{font-size:14px;color:var(--muted)}

    /* Buttons */
    .btn{
      display:inline-flex;
      align-items:center;
      justify-content:center;
      gap:10px;
      border:0;
      cursor:pointer;
      border-radius:8px;
      padding:10px 14px;
      font-weight:600;
      font-size:14px;
      text-decoration:none;
    }
    .btn--primary{
      background:var(--accent);
      color:#fff;
      min-width:120px;
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
      margin-top:14px;
      margin-bottom:6px;
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

    /* signup CTA at bottom */
    .signup-cta{
      margin-top:16px;
      font-size:14px;
      color:var(--muted);
      display:flex;
      gap:8px;
      align-items:center;
    }

    /* Responsive */
    @media (max-width:860px){
      .login-card{grid-template-columns: 1fr; padding:20px;}
      .login-card__visual{order:0;padding:20px}
      .login-card__form{order:1;padding:8px}
      .social-buttons{flex-direction:row}
    }
    </style>
</body>
</html>
