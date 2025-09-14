<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>{{ setting('site_name', 'Crypt') }} | Registration</title>

  {{-- CSS من public/ --}}
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  {{-- Favicon --}}
  <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
</head>

<body class="crypt-dark log-bg">

    <!-- Header -->
    <header class="crypt-header blur-header align-items-center fixed-top z-3">
        <div class="row align-items-center justify-content-between w-100 m-0">
            <!-- Logo -->
            <div class="col-auto d-flex flex-row align-items-center">
                <div class="crypt-logo dark">
                    <a href="{{ url('/') }}">
                        <img src="{{ setting('logo','asset/images/logo.png') }}" alt="logo">
                    </a>
                </div>
                <div class="crypt-logo light d-none">
                    <a href="{{ url('/') }}">
                        <img src="{{ setting('logo','asset/images/logo.png') }}" alt="logo">
                    </a>
                </div>
            </div>

            <!-- secondary menu (اختياري) -->
            <div class="col-auto d-flex flex-row align-items-center">
                <div class="user-settings gap-2 gap-sm-3">
                    <!-- dark/light mode (شكلي) -->
                    <div class="mode">
                        <button class="controller m-auto" id="darkMode" type="button" aria-label="Toggle theme">
                            <span class="dark-logo">
                                <svg viewBox="0 0 512 512" width="20" fill="currentColor" aria-hidden="true">
                                    <path d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"/>
                                </svg>
                            </span>
                            <span class="light-logo d-none">
                                <svg viewBox="0 0 512 512" width="20" fill="currentColor" aria-hidden="true">
                                    <path d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z"/>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Signup Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="crypt-login-form mt-5" style="max-width: 640px; width:100%;">
                <div class="d-flex mb-4">
                    <h3 class="fw-bold m-0">Create Account</h3>
                </div>

                {{-- رسائل الأخطاء --}}
                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="m-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- مهم: نفس الروت ونفس أسماء الحقول القديمة --}}
                <form class="needs-validation" action="{{ route('register') }}" method="POST" novalidate style="background: transparent;">
                    @csrf

                    <div class="d-flex flex-column">

                        {{-- الاسم الأول/الأخير --}}
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-light">First Name <span class="crypt-grayscale-600">*</span></label>
                                <input type="text" class="form-control py-2" name="first_name" value="{{ old('first_name') }}" placeholder="Your First Name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-light">Last Name <span class="crypt-grayscale-600">*</span></label>
                                <input type="text" class="form-control py-2" name="last_name" value="{{ old('last_name') }}" placeholder="Your Last Name" required>
                            </div>
                        </div>

                        {{-- الإيميل --}}
                        <div class="d-flex flex-column mb-3 mt-3">
                            <label for="email" class="form-label text-light">Email <span class="crypt-grayscale-600">*</span></label>
                            <input type="email" class="form-control py-2" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" required>
                            <div class="invalid-feedback mt-0">This field is required.</div>
                        </div>

                        {{-- الدولة + كود الهاتف + الهاتف --}}
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-light">Country <span class="crypt-grayscale-600">*</span></label>
                                <select onchange="endpoint('{{ route('get-country-info','') }}',this.value)" name="country" id="country" class="form-control" required>
                                    <option value="" selected disabled>Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->nicename ?? '' }}" id="{{ $country->phonecode }}">{{ $country->nicename ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-light">Code</label>
                                <input id="phone_code" type="text" name="phone_code" class="form-control" placeholder="+00" readonly>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <span class="form-control bg-white d-flex align-items-center justify-content-center">
                                    <img id="flag-icon" src="{{ asset('flags/dd.png') }}" style="height: 24px;"/>
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-column mt-3">
                            <label class="form-label text-light">Phone <span class="crypt-grayscale-600">*</span></label>
                            <input required id="phone" name="phone" type="text" value="{{ old('phone') }}" class="form-control py-2" placeholder="Phone Number">
                        </div>

                        {{-- الباسوورد + التأكيد --}}
                        <div class="d-flex flex-column mt-3">
                            <label for="password" class="form-label text-light">Password <span class="crypt-grayscale-600">*</span></label>
                            <div class="position-relative">
                                <input type="password" class="form-control form-controls py-2" name="password" id="password" placeholder="Enter a password" autocomplete="off" required>
                                <button type="button" class="btn btn-link position-absolute end-0 top-0 h-100 px-3 text-decoration-none" onclick="togglePassword()" aria-label="Show/Hide password">
                                    <i class="fa fa-eye" id="eye"></i>
                                </button>
                            </div>
                            <div class="text-muted crypt-grayscale-600 text-sm mt-1">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                        </div>

                        <div class="d-flex flex-column mt-3">
                            <label class="form-label text-light">Confirm Password <span class="crypt-grayscale-600">*</span></label>
                            <input required name="password_confirmation" type="password" class="form-control py-2" id="cPassword" placeholder="Confirm Password">
                        </div>

                        {{-- العملة --}}
                        <div class="d-flex flex-column mt-3">
                            <label class="form-label text-light">Currency</label>
                            <select name="cur" class="form-control">
                                @foreach($curs as $item)
                                    <option value="{{ $item->code }}">{{ $item->name }} ({{ $item->sign }})</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- الموافقة على الشروط --}}
                        <div class="d-flex justify-content-between mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="agree_terms" required>
                                <label class="form-check-label text-secondary" for="agree_terms">
                                    I have read and agree to the
                                    <a href="{{ setting('terms', '#!') }}" class="link-primary fw-bold mb-0" target="_blank">Terms of Use</a>.
                                </label>
                                <div class="invalid-feedback mt-0">You must agree before submitting.</div>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <button class="btn btn-primary rounded-pill text-center mt-4" type="submit">Create Account</button>
                    </div>
                </form>

                {{-- Social (اختياري/شكلي) --}}
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
                    <p class="crypt-grayscale-500 m-0">Already have an account?</p>
                    <a href="{{ route('login') }}" class="link-primary fw-bold">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
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

    {{-- JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" ></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

        function endpoint(url, value){
            if(!value) return;
            axios.get(url + '/' + value)
                .then(function (response) {
                    document.getElementById('phone_code').value = "+" + response.data.phonecode;
                    document.getElementById('phone_code').innerHTML = "+" + response.data.phonecode;
                    document.getElementById('flag-icon').src = response.data.iso;
                })
                .catch(function () {
                    console.error('Country info fetch failed');
                });
        }
    </script>
</body>
</html>
