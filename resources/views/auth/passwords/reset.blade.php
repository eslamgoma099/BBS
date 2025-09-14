<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>{{ setting('site_name', 'Crypt') }} | Reset Password</title>

  {{-- CSS من public --}}
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
  <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
</head>

<body class="crypt-dark log-bg">

  <!-- Header -->
  <header class="crypt-header blur-header align-items-center fixed-top z-3">
    <div class="row align-items-center justify-content-between w-100 m-0">
      <div class="col-auto d-flex flex-row align-items-center">
        <div class="crypt-logo dark">
          <a href="{{ url('/') }}">
            <img src="{{ setting('logo','asset/images/logo.png') }}" alt="logo">
          </a>
        </div>
      </div>
      <div class="col-auto">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill px-3">
          &laquo; Home
        </a>
      </div>
    </div>
  </header>

  <!-- Reset Form -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="crypt-login-form mt-5" style="max-width:640px;width:100%;">
        <div class="d-flex mb-4 justify-content-between align-items-center">
          <h3 class="fw-bold m-0">Reset Password</h3>
        </div>

        {{-- أخطاء التحقق --}}
        @if ($errors->any())
          <div class="alert alert-danger py-2">
            <ul class="m-0 ps-3">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" novalidate>
          @csrf

          <input type="hidden" name="token" value="{{ $token }}">

          <div class="mb-3">
            <label for="email" class="form-label text-light">E-Mail Address</label>
            <input id="email" type="email"
                   class="form-control py-2 @error('email') is-invalid @enderror"
                   name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password" class="form-label text-light">Password</label>
            <div class="position-relative">
              <input id="password" type="password"
                     class="form-control py-2 @error('password') is-invalid @enderror"
                     name="password" required autocomplete="new-password">
              <button type="button" class="btn btn-link position-absolute end-0 top-0 h-100 px-3 text-decoration-none" onclick="togglePassword('password','eye1')" aria-label="Show/Hide password">
                <i class="fa fa-eye" id="eye1"></i>
              </button>
            </div>
            @error('password')
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password-confirm" class="form-label text-light">Confirm Password</label>
            <div class="position-relative">
              <input id="password-confirm" type="password" class="form-control py-2" name="password_confirmation" required autocomplete="new-password">
              <button type="button" class="btn btn-link position-absolute end-0 top-0 h-100 px-3 text-decoration-none" onclick="togglePassword('password-confirm','eye2')" aria-label="Show/Hide password">
                <i class="fa fa-eye" id="eye2"></i>
              </button>
            </div>
          </div>

          <button type="submit" class="btn btn-primary rounded-pill mt-2">Reset Password</button>
        </form>
      </div>
    </div>
  </div>

  <footer class="container-fluid text-left text-lg-start animation-element mt-5">
    <div class="container in-view">
      <div class="d-flex justify-content-center gap-4 crypt-footer-copyright border-0 mb-3 mt-3">
        <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('privacy_policy', '#!') }}">Privacy</a>
        <a class="text-link text-sm crypt-grayscale-600" href="{{ setting('terms', '#!') }}">Terms</a>
      </div>
    </div>
  </footer>

  {{-- JS --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" ></script>
  <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
  <script>
    function togglePassword(inputId, eyeId){
      const input = document.getElementById(inputId);
      const eye   = document.getElementById(eyeId);
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</body>
</html>
