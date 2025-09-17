<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>{{ setting('site_name') }} | Register</title>
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/svg+xml" href="{{ setting('favicon', asset('assets/images/favicon.svg')) }}">

  <style>
    /* preserve brand colors from old view if provided */
    .btn-primary:not(:disabled):not(.disabled):active { background-color: {{ setting('primary_color_hover','#447007') }}!important; border-color: {{ setting('primary_color_hover','#447007') }}!important; }
    .btn-primary { background-color: {{ setting('primary_color','#6aac0e') }}!important; border-color: {{ setting('primary_color','#6aac0e') }}!important; }
    .btn-primary:hover { color:#fff; background-color: {{ setting('primary_color_hover','#447007') }}!important; border-color: {{ setting('primary_color_hover','#447007') }}!important; }
    .btn-outline-primary { color: {{ setting('primary_color','#6aac0e') }}!important; border-color: {{ setting('primary_color','#6aac0e') }}!important; }
    .btn-outline-primary:hover { color:#fff!important; border-color: {{ setting('primary_color_hover','#447007') }}!important; background-color: {{ setting('primary_color_hover','#447007') }}!important; }
  </style>
</head>

<body class="crypt-dark log-bg">

    <!-- Header -->
    <header class="crypt-header blur-header align-items-center fixed-top z-3">
        <div class="row align-items-center justify-content-between mx-0">
            <!-- main menu -->
            <div class="col-auto d-flex flex-row align-items-center">
                <!-- Logo -->
                <div class="crypt-logo dark">
                    <a href="{{ url('/') }}">
                        @if(setting('logo_dark'))
                            <img src="{{ setting('logo_dark') }}" alt="logo-dark">
                        @else
                            <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="logo-dark">
                        @endif
                    </a>
                </div>
                <div class="crypt-logo light">
                    <a href="{{ url('/') }}">
                        <img src="{{ setting('logo', asset('assets/images/logo.svg')) }}" alt="logo-light">
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

                    <!-- Login & Joint account shortcuts -->
                    <div class="d-none d-md-flex align-items-center gap-2">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
                        @if(setting('joint_account') == 1)
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Open Joint Account</a>
                        @endif
                    </div>

                    <!-- Hamburger Menu -->
                    <div id="mobile_menu" class="close d-md-none">
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

    <!-- Signup Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="crypt-login-form mt-5" style="max-width:720px;">
                <div class="d-flex mb-4">
                    <h3 class="fw-bold">Create Account</h3>
                </div>

                {{-- Errors --}}
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form class="needs-validation" action="{{ route('register') }}" name="password_strength" id="pass_form" method="POST" novalidate>
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label text-light">First Name <span class="crypt-grayscale-600">*</span></label>
                            <input required type="text" name="first_name" value="{{ old('first_name') }}" class="form-control py-2" id="first_name" placeholder="Your First Name">
                            <div class="invalid-feedback mt-0">This field is required.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label text-light">Last Name <span class="crypt-grayscale-600">*</span></label>
                            <input required type="text" name="last_name" value="{{ old('last_name') }}" class="form-control py-2" id="last_name" placeholder="Your Last Name">
                            <div class="invalid-feedback mt-0">This field is required.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label text-light">Email <span class="crypt-grayscale-600">*</span></label>
                            <input required type="email" name="email" value="{{ old('email') }}" class="form-control py-2" id="email" placeholder="name@example.com">
                            <div class="invalid-feedback mt-0">This field is required.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="country" class="form-label text-light">Country <span class="crypt-grayscale-600">*</span></label>
                            <div class="input-group">
                                <select required onchange="endpoint('{{ route('get-country-info','') }}',this.value)" name="country" id="country" class="form-select">
                                    <option value=" " selected>Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->nicename ?? '' }}" id="{{ $country->phonecode }}">{{ $country->nicename ?? '' }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-text bg-white p-0" style="width:58px;">
                                    <img id="flag-icon" src="{{ asset('assets/images/flags/dd.png') }}" alt="flag" style="height: 100%; width: 100%; padding:5px; object-fit:cover;"/>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label text-light">Phone <span class="crypt-grayscale-600">*</span></label>
                            <div class="input-group">
                                <input id="phone_code" type="text" name='phone_code' class="form-control" placeholder="code" readonly>
                                <input required id="phone" name="phone" type="text" value="{{ old('phone') }}" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="invalid-feedback mt-0">This field is required.</div>
                        </div>

                        <div class="col-md-6"></div>

                        <div class="col-md-6">
                            <label for="password" class="form-label text-light">Password <span class="crypt-grayscale-600">*</span></label>
                            <div class="input-group position-relative">
                                <input required name="password" type="password" class="form-control py-2" id="password" placeholder="Enter a password" autocomplete="off">
                                <button class="btn btn-outline-secondary position-absolute end-0 top-50 translate-middle-y me-2" type="button" id="togglePassword" aria-label="Show password"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            </div>
                            <span id="passstrength" class="text-sm"></span>
                            <div class="text-muted crypt-grayscale-600 text-sm">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="cPassword" class="form-label text-light">Confirm Password <span class="crypt-grayscale-600">*</span></label>
                            <div class="input-group position-relative">
                                <input required name="password_confirmation" type="password" class="form-control py-2" id="cPassword" placeholder="Confirm Password">
                                <button class="btn btn-outline-secondary position-absolute end-0 top-50 translate-middle-y me-2" type="button" id="toggleCPassword" aria-label="Show password"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cur" class="form-label text-light">Currency</label>
                            <select name="cur" id="cur" class="form-select">
                                @foreach(\App\Models\Currency::all() as $item)
                                    <option value="{{ $item->code }}">{{ $item->name }} ({{ $item->sign }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" required type="checkbox" value="1" id="defaultCheck1">
                                <label class="form-check-label text-secondary" for="defaultCheck1">
                                    I confirm that I am 18 years old or older and accept all the terms and conditions.
                                </label>
                                <div class="invalid-feedback mt-0"> You must agree before submitting.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary rounded-pill text-center mt-2 w-100 btnReg" type="submit">Create Account</button>
                        </div>
                    </div>
                </form>

                <div class="d-flex flex-column mt-3">
                    <div class="divider" role="separator">
                        <span class="crypt-grayscale-500 p-2">or</span>
                    </div>
                    <a href="#" class="d-flex justify-content-between align-items-center button btn btn-outline-secondary" data-bs-toggle="button">Sign in with Google
                        <img alt="" width="32" src="{{ asset('assets/images/icon/google.svg') }}">
                    </a>
                    <a href="#" class="d-flex justify-content-between align-items-center button btn btn-outline-secondary mt-3" data-bs-toggle="button">Sign in with Apple
                        <img alt="" width="32" src="{{ asset('assets/images/icon/apple.svg') }}">
                    </a>
                </div>
                <div class="d-flex flex-row gap-2 mt-4 justify-content-center">
                    <p class="crypt-grayscale-500">Already have an account?</p>
                    <a href="{{ route('login') }}" class="link-primary fw-bold">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="container-fluid text-left text-lg-start animation-element">
        <div class="container in-view">
            <div class="d-flex justify-content-center gap-4 crypt-footer-copyright border-0 mb-3 mt-3">
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('docs') ?? '#' }}">Docs</a>
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('cookies') ?? '#' }}">Cookies</a>
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('terms') ?? '#' }}">Terms</a>
                <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('privacy_policy') ?? '#' }}">Privacy</a>
            </div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" ></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>

    <script>
        // Password toggles
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const toggleCPassword = document.querySelector('#toggleCPassword');
        const cPassword = document.querySelector('#cPassword');

        togglePassword?.addEventListener('click', function () {
            if (!password) return;
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i')?.classList.toggle('fa-eye');
            this.querySelector('i')?.classList.toggle('fa-eye-slash');
        });

        toggleCPassword?.addEventListener('click', function () {
            if (!cPassword) return;
            const type = cPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            cPassword.setAttribute('type', type);
            this.querySelector('i')?.classList.toggle('fa-eye');
            this.querySelector('i')?.classList.toggle('fa-eye-slash');
        });

        // country endpoint fetch (same logic as old view)
        function endpoint(url,value){
            axios.get(url+'/'+value, { params: { c_name: value } })
            .then(function (response) {
                document.getElementById('phone_code').value = "+"+response.data.phonecode;
                document.getElementById('phone_code').innerHTML = "+"+response.data.phonecode;
                document.getElementById('flag-icon').src = response.data.iso;
            }).catch(function () {
                console.error('Failed to fetch country info');
            });
        }

        // simple bootstrap validation
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

        // Theme persistence
        (function () {
            const html = document.documentElement;
            const body = document.body;
            const key = 'crypt-theme';
            const btn = document.getElementById('darkMode');
            const apply = (mode) => {
                if (mode === 'light') { body.classList.remove('crypt-dark'); body.classList.add('crypt-light'); html.dataset.theme = 'light'; }
                else { body.classList.add('crypt-dark'); body.classList.remove('crypt-light'); html.dataset.theme = 'dark'; }
            };
            apply(localStorage.getItem(key) || 'dark');
            btn?.addEventListener('click', () => { const next = (html.dataset.theme === 'dark') ? 'light' : 'dark'; localStorage.setItem(key, next); apply(next); });
        })();
    </script>

</body>
</html>
