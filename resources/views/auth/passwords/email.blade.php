@extends('layouts.app')

@section('title', (setting('site_name', 'Crypt') . ' | Forgot Password'))

@section('css')
  {{-- Material Icons للأيقونة داخل الليبل --}}
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    .login-card {
      min-height: 80vh;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      position: relative;
      border-radius: 5px;
      box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.12);
      z-index: 2;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: roboto, system-ui, -apple-system, Segoe UI, Arial, sans-serif !important;
    }
    .ftco-section{ padding: 2em !important; }
    .sifre-hatirlat-form{ z-index: 999 !important; }

    .home-bg > form { z-index: 4; position: relative; padding: 0 25px; width: 100%; }
    .logo-kapsul { text-align: center; position: relative; opacity: .9; }
    .logo { height: auto; padding: 40px 0 10px; }

    .group { position: relative; margin-bottom: 28px; }
    .group input {
      font-size: 16px;
      padding: 12px 10px 10px;
      display: block; width: 100%;
      border: none; background: none; color: #eee;
      border-bottom: 1px solid rgba(255,255,255,.3);
    }
    .group input:focus { outline: none; }

    .group label{
      color: rgba(255,255,255,.6);
      font-size: 15px; font-weight: 500;
      position: absolute; pointer-events: none;
      left: 5px; top: 8px; transition: .2s ease;
      display: flex; align-items: center; gap: 8px;
    }
    .material-icons { font-size: 20px; line-height: 1; }

    .group input:focus ~ label,
    .group input:not(:placeholder-shown) ~ label {
      top: -14px; font-size: 12px; color: rgba(255,255,255,.8);
    }

    .bar { position: relative; display: block; width: 100%; }
    .bar:before, .bar:after {
      content: ''; height: 2px; width: 0; bottom: 1px; position: absolute;
      background: rgba(255,255,255,.7); transition: .2s ease;
    }
    .bar:before { left: 50%; } .bar:after { right: 50%; }
    .group input:focus ~ .bar:before, .group input:focus ~ .bar:after { width: 50%; }

    .sifre-hatirlat-buton{
      background: linear-gradient(-135deg, rgb(63,81,181), rgb(233,30,99));
      border: none; width: 100%; text-align: center; color: #eee;
      padding: 10px; border-radius: 30px; outline: none; opacity: .95;
    }

    .zaten-hesap-var-link{ color:#FFF!important; font-size:14px; padding:14px 0; text-decoration:none; display:inline-block; }
    .card-bs{
      background: rgba(10,0,0,.54);
      border-radius: 12px;
      box-shadow: 0 1px 6px rgba(0,0,0,.12);
    }
  </style>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center py-4">
      <div class="col-lg-6 col-md-8">
        {{-- فلاش نجاح إرسال الإيميل --}}
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST"
              id="sifre-hatirlat-form"
              class="card-bs p-4">
          @csrf

          <div class="logo-kapsul">
            <img width="120" class="logo"
                 src="{{ setting('logo','asset/images/logo.png') }}"
                 alt="{{ setting('site_name', 'Crypt') }} Logo" />
          </div>

          <h2 class="mb-1 fw-bold text-center text-white">Forgot Password? 🔒</h2>
          <p class="mb-4 text-center text-white-50">
            Enter your email and we'll send you instructions to reset your password
          </p>

          {{-- Email --}}
          <div class="group">
            <input id="email"
                   type="email"
                   name="email"
                   class="form-control bg-transparent p-0 @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   placeholder=" "
                   required
                   autocomplete="email"
                   autofocus>
            <span class="bar"></span>
            <label>
              <i class="material-icons">mail_outline</i>
              <span>E-Mail</span>
            </label>
            @error('email')
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="sifre-hatirlat-buton">
            {{ __('Send Password Reset Link') }}
          </button>

          <div class="d-flex justify-content-center">
            <a class="zaten-hesap-var-link" href="{{ url('/') }}">&laquo; Home</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
