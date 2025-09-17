<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ setting('site_title', setting('site_name','Crypt')) }}</title>

  {{-- Theme CSS --}}
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  {{-- لا نحتاج Font Awesome بعد الآن --}}
  <link rel="icon" type="image/svg+xml" href="{{ setting('favicon', asset('assets/images/favicon.svg')) }}">

  @yield('style')

  <style>
    body.crypt-dark .content-wrap { background:#0e0e11; }
    body.crypt-light .content-wrap { background:#fff; }
    .layout{display:grid;grid-template-columns:260px 1fr;}
    .layout.sidebar-collapsed{grid-template-columns:84px 1fr;}
    .sidebar{position:sticky;top:0;height:100vh;overflow-y:auto;border-right:1px solid rgba(255,255,255,.06)}
    .header{position:sticky;top:0;z-index:1030;padding:.75rem 1rem;border-bottom:1px solid rgba(255,255,255,.06);backdrop-filter:blur(8px)}
    .content-wrap{min-height:calc(100vh - 56px)}
    @media(max-width:992px){
      .layout{grid-template-columns:1fr}
      .sidebar{position:fixed;left:0;top:0;width:280px;transform:translateX(-100%);transition:.25s;box-shadow:0 10px 30px rgba(0,0,0,.35)}
      .sidebar.show{transform:translateX(0)}
      .content-wrap{min-height:100vh}
    }
  </style>

  @yield('headJS')
</head>
<body class="crypt-dark">

<div class="layout" id="appLayout">

  {{-- ========== SIDEBAR (new theme) ========== --}}
  <aside class="sidebar p-3" id="appSidebar">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <div class="disable-sm-screen">
        <div class="crypt-logo dark">
          <a href="{{ url('/') }}">
            @if(setting('logo_dark')) <img src="{{ setting('logo_dark') }}" alt="logo-dark">
            @else <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="logo-dark"> @endif
          </a>
        </div>
        <div class="crypt-logo light">
          <a href="{{ url('/') }}"><img src="{{ setting('logo', asset('assets/images/logo.svg')) }}" alt="logo"></a>
        </div>
      </div>
    </div>

    <div class="side-wrapper">
      <div class="side-title">Main</div>
      <div class="side-menu">
        <a class="sidebar-link {{ active('admin.dashboard','active') }}" href="{{ route('admin.dashboard') }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M18.6699 2H16.7699C14.5899 2 13.4399 3.15 13.4399 5.33V7.23C13.4399 9.41 14.5899 10.56 16.7699 10.56H18.6699C20.8499 10.56 21.9999 9.41 21.9999 7.23V5.33C21.9999 3.15 20.8499 2 18.6699 2Z" fill="currentColor"/>
            <path opacity="0.4" d="M7.24 13.4301H5.34C3.15 13.4301 2 14.5801 2 16.7601V18.6601C2 20.8501 3.15 22.0001 5.33 22.0001H7.23C9.41 22.0001 10.56 20.8501 10.56 18.6701V16.7701C10.57 14.5801 9.42 13.4301 7.24 13.4301Z" fill="currentColor"/>
            <path d="M6.29 10.58C8.6593 10.58 10.58 8.6593 10.58 6.29C10.58 3.9207 8.6593 2 6.29 2C3.9207 2 2 3.9207 2 6.29C2 8.6593 3.9207 10.58 6.29 10.58Z" fill="currentColor"/>
            <path d="M17.7099 22C20.0792 22 21.9999 20.0793 21.9999 17.71C21.9999 15.3407 20.0792 13.42 17.7099 13.42C15.3406 13.42 13.4199 15.3407 13.4199 17.71C13.4199 20.0793 15.3406 22 17.7099 22Z" fill="currentColor"/>
          </svg>
          <span>Dashboard</span>
        </a>

        @if (check_permission('view-leads,create-leads,update-leads,create-source-leads,create-status-leads,import-leads,assign-manager-leads'))
        <a class="sidebar-link {{ active('admin.users.leads','active') }}" href="{{ route('admin.users.leads') }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M21.97 18.33C21.97 18.69 21.89 19.06 21.72 19.4C21.55 19.74 21.31 20.04 21.04 20.3C20.55 20.81 20 21.08 19.4 21.21C19.39 21.21 19.38 21.21 19.37 21.22C18.75 21.36 18.12 21.43 17.48 21.43C16.38 21.43 15.34 21.18 14.37 20.68C13.4 20.18 12.56 19.5 11.85 18.64C11.14 17.78 10.58 16.79 10.17 15.67C9.76003 14.55 9.55003 13.36 9.55003 12.1C9.55003 11.28 9.67003 10.5 9.91003 9.76C10.15 9.02 10.51 8.33 10.99 7.69C11.47 7.05 12.06 6.5 12.76 6.04C13.46 5.58 14.25 5.28 15.12 5.15C15.34 5.11 15.57 5.09 15.8 5.09C16.8 5.09 17.75 5.37 18.61 5.94C19.47 6.51 20.16 7.28 20.68 8.26C21.2 9.24 21.46 10.36 21.46 11.63C21.46 12.85 21.22 14.01 20.74 15.1C20.26 16.19 19.58 17.16 18.7 17.98L18.65 18.03C19.06 18.07 19.45 18.15 19.83 18.26C20.21 18.37 20.56 18.52 20.89 18.7C21.22 18.88 21.52 19.1 21.78 19.35C21.9 19.47 21.97 19.64 21.97 19.81V18.33Z" fill="currentColor"/>
            <path d="M16.42 9.9502C15.81 9.9502 15.42 10.5402 15.84 11.0002L16.72 12.0102C16.86 12.1702 16.97 12.4402 16.95 12.6402L16.84 13.8102C16.79 14.5402 17.38 14.9402 18.06 14.6502L19.18 14.1302C19.37 14.0402 19.69 14.0402 19.88 14.1302L21 14.6502C21.68 14.9402 22.27 14.5402 22.22 13.8102L22.11 12.6402C22.09 12.4402 22.2 12.1702 22.34 12.0102L23.22 11.0002C23.64 10.5402 23.25 9.9502 22.64 9.9502L21.46 9.9502C21.26 9.9502 21.0 9.8302 20.91 9.6502L20.39 8.4802C20.08 7.8502 19.38 7.8502 19.07 8.4802L18.55 9.6502C18.46 9.8302 18.2 9.9502 18 9.9502H16.42Z" fill="currentColor"/>
          </svg>
          <span>Leads</span>
        </a>
        @endif

        @if (check_permission('view-customers,create-customers,update-customers,assign-manager-customers,assign-retention-customers'))
        <a class="sidebar-link {{ active('admin.users.index','active') }}" href="{{ route('admin.users.index') }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M21.0899 21.5C21.0899 21.78 20.8799 22 20.5999 22H3.40991C3.12991 22 2.90991 21.78 2.90991 21.5C2.90991 17.36 6.99991 14 11.9999 14C16.9999 14 21.0899 17.36 21.0899 21.5Z" fill="currentColor"/>
            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
          </svg>
          <span>Customers</span>
        </a>
        @endif

        @if (check_permission('view-roles,create-roles,update-roles'))
        <a class="sidebar-link {{ active('admin.roles.index','active') }}" href="{{ route('admin.roles.index') }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M18 13C17.06 13 16.19 13.33 15.5 13.88C14.58 14.61 14 15.74 14 17C14 17.75 14.21 18.46 14.58 19.06C15.27 20.22 16.54 21 18 21C19.01 21 19.93 20.63 20.63 20C20.94 19.74 21.21 19.42 21.42 19.06C21.79 18.46 22 17.75 22 17C22 14.79 20.21 13 18 13ZM20.07 16.57L17.94 18.54C17.8 18.67 17.61 18.74 17.43 18.74C17.24 18.74 17.05 18.67 16.9 18.52L15.91 17.53C15.62 17.24 15.62 16.76 15.91 16.47C16.2 16.18 16.68 16.18 16.97 16.47L17.45 16.95L19.05 15.47C19.35 15.19 19.83 15.21 20.11 15.51C20.39 15.81 20.37 16.28 20.07 16.57Z" fill="currentColor"/>
            <path d="M21.09 21.5C21.09 21.78 20.87 22 20.59 22H3.41003C3.13003 22 2.91003 21.78 2.91003 21.5C2.91003 17.36 6.99003 14 12 14C13.03 14 14.03 14.14 14.95 14.41C14.36 15.11 14 16.02 14 17C14 17.75 14.21 18.46 14.58 19.06C14.78 19.4 15.04 19.71 15.34 19.97C16.04 20.61 16.97 21 18 21C19.12 21 20.13 20.54 20.85 19.8C21.01 20.34 21.09 20.91 21.09 21.5Z" fill="currentColor"/>
            <path opacity="0.4" d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
          </svg>
          <span>Manage Roles</span>
        </a>
        @endif

        @if (check_permission('view-trading-hours,edit-trading-hours'))
        <a class="sidebar-link {{ active('admin.trading_hours.index','active') }}" href="{{ route('admin.trading_hours.index') }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="currentColor"/>
            <path d="M15.71 15.18L13.31 13.32C12.61 12.78 12.09 11.69 12.09 10.82V7.5C12.09 7.09 11.75 6.75 11.34 6.75C10.93 6.75 10.59 7.09 10.59 7.5V10.82C10.59 12.25 11.36 13.83 12.44 14.68L14.84 16.54C15.15 16.77 15.59 16.71 15.82 16.4C16.05 16.09 15.99 15.65 15.68 15.42L15.71 15.18Z" fill="currentColor"/>
          </svg>
          <span>Trading Hours</span>
        </a>
        @endif

        @if (check_permission('view-active-customers,create-active-customers,update-active-customersm,assign-manager-active-customers,assign-retention-active-customers,set-active-users-as-free,set-active-users-as-archieve'))
        <a class="sidebar-link {{ active('admin.users.activ-users','active') }}" href="{{ route('admin.users.activ-users') }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 13C17.06 13 16.19 13.33 15.5 13.88C14.58 14.61 14 15.74 14 17C14 17.75 14.21 18.46 14.58 19.06C15.27 20.22 16.54 21 18 21C19.01 21 19.93 20.63 20.63 20C20.94 19.74 21.21 19.42 21.42 19.06C21.79 18.46 22 17.75 22 17C22 14.79 20.21 13 18 13ZM20.07 16.57L17.94 18.54C17.8 18.67 17.61 18.74 17.43 18.74C17.24 18.74 17.05 18.67 16.9 18.52L15.91 17.53C15.62 17.24 15.62 16.76 15.91 16.47C16.2 16.18 16.68 16.18 16.97 16.47L17.45 16.95L19.05 15.47C19.35 15.19 19.83 15.21 20.11 15.51C20.39 15.81 20.37 16.28 20.07 16.57Z" fill="currentColor"/>
            <path opacity="0.4" d="M21.09 21.5C21.09 21.78 20.87 22 20.59 22H3.41003C3.13003 22 2.91003 21.78 2.91003 21.5C2.91003 17.36 6.99003 14 12 14C13.03 14 14.03 14.14 14.95 14.41C14.36 15.11 14 16.02 14 17C14 17.75 14.21 18.46 14.58 19.06C14.78 19.4 15.04 19.71 15.34 19.97C16.04 20.61 16.97 21 18 21C19.12 21 20.13 20.54 20.85 19.8C21.01 20.34 21.09 20.91 21.09 21.5Z" fill="currentColor"/>
            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
          </svg>
          <span>Active Customers</span>
        </a>
        @endif

        @if (check_permission('view-archieve-customers,create-archieve-customers,update-archieve-customers,assign-manager-archieve-customers,assign-retention-archieve-customers,set-archieve-users-as-free,set-archieve-users-as-active'))
        <a class="sidebar-link {{ active('admin.users.archieve-users','active') }}" href="{{ route('admin.users.archieve-users') }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M19.97 10H4.03C2.76 10 1.74 11.02 1.74 12.29V19.06C1.74 20.33 2.76 21.35 4.03 21.35H19.97C21.24 21.35 22.26 20.33 22.26 19.06V12.29C22.26 11.02 21.24 10 19.97 10Z" fill="currentColor"/>
            <path d="M21.5 2.64998V8.15998C21.5 9.32998 20.58 10.25 19.41 10.25H4.59C3.42 10.25 2.5 9.32998 2.5 8.15998V2.64998C2.5 1.47998 3.42 0.549988 4.59 0.549988H19.41C20.58 0.549988 21.5 1.47998 21.5 2.64998ZM14.97 7.75H9.03C8.62 7.75 8.28 7.41 8.28 7C8.28 6.59 8.62 6.25 9.03 6.25H14.97C15.38 6.25 15.72 6.59 15.72 7C15.72 7.41 15.38 7.75 14.97 7.75Z" fill="currentColor"/>
          </svg>
          <span>Archive Customers</span>
        </a>
        @endif

        @if (check_permission('view-assets,create-currency-pair,update-currency-pair,delete-currency-pair,update-leverage,update-buy,update-sell'))
        <a class="sidebar-link {{ active('admin.currencies.index','active') }}" href="{{ route('admin.currencies.index') }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M6.73049 19.7C7.55049 18.82 8.80049 18.89 9.52049 19.85L10.5305 21.2C11.3405 22.27 12.6505 22.27 13.4605 21.2L14.4705 19.85C15.1905 18.89 16.4405 18.82 17.2605 19.7C19.0405 21.6 20.4905 20.97 20.4905 18.31V7.04C20.5005 3.01 19.5605 2 15.7805 2H8.22049C4.44049 2 3.50049 3.01 3.50049 7.04V18.3C3.50049 20.97 4.96049 21.59 6.73049 19.7Z" fill="currentColor"/>
            <path d="M16.2305 11.75H10.7305C10.3205 11.75 9.98047 11.41 9.98047 11C9.98047 10.59 10.3205 10.25 10.7305 10.25H16.2305C16.6405 10.25 16.9805 10.59 16.9805 11C16.9805 11.41 16.6405 11.75 16.2305 11.75Z" fill="currentColor"/>
            <path d="M16.2305 7.75H10.7305C10.3205 7.75 9.98047 7.41 9.98047 7C9.98047 6.59 10.3205 6.25 10.7305 6.25H16.2305C16.6405 6.25 16.9805 6.59 16.9805 7C16.9805 7.41 16.6405 7.75 16.2305 7.75Z" fill="currentColor"/>
            <path d="M7.78027 8C7.23027 8 6.78027 7.55 6.78027 7C6.78027 6.45 7.23027 6 7.78027 6C8.33027 6 8.78027 6.45 8.78027 7C8.78027 7.55 8.33027 8 7.78027 8Z" fill="currentColor"/>
            <path d="M7.78027 12C7.23027 12 6.78027 11.55 6.78027 11C6.78027 10.45 7.23027 10 7.78027 10C8.33027 10 8.78027 10.45 8.78027 11C8.78027 11.55 8.33027 12 7.78027 12Z" fill="currentColor"/>
          </svg>
          <span>Assets</span>
        </a>
        @endif

        @if(check_permission('view-conversion-agents,create-manager,assign-user-to-manager,update-manager,delete-manager,login-as-manager'))
        <a class="sidebar-link {{ active('admin.users.managers','active') }}" href="{{ route('admin.users.managers') }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M17.9975 18.33C17.9975 18.69 17.9175 19.06 17.7475 19.4C17.5775 19.74 17.3375 20.04 17.0675 20.3C16.5775 20.81 16.0275 21.08 15.4275 21.21C15.4175 21.21 15.4075 21.21 15.3975 21.22C14.7775 21.36 14.1475 21.43 13.5075 21.43C12.4075 21.43 11.3675 21.18 10.3975 20.68C9.42754 20.18 8.58754 19.5 7.87754 18.64C7.16754 17.78 6.60754 16.79 6.19754 15.67C5.78754 14.55 5.57754 13.36 5.57754 12.1C5.57754 11.28 5.69754 10.5 5.93754 9.76C6.17754 9.02 6.53754 8.33 7.01754 7.69C7.49754 7.05 8.08754 6.5 8.78754 6.04C9.48754 5.58 10.2775 5.28 11.1475 5.15C11.3675 5.11 11.5975 5.09 11.8275 5.09C12.8275 5.09 13.7775 5.37 14.6375 5.94C15.4975 6.51 16.1875 7.28 16.7075 8.26C17.2275 9.24 17.4875 10.36 17.4875 11.63C17.4875 12.85 17.2475 14.01 16.7675 15.1C16.2875 16.19 15.6075 17.16 14.7275 17.98L14.6775 18.03C15.0875 18.07 15.4775 18.15 15.8575 18.26C16.2375 18.37 16.5875 18.52 16.9175 18.7C17.2475 18.88 17.5475 19.1 17.8075 19.35C17.9275 19.47 17.9975 19.64 17.9975 19.81V18.33Z" fill="currentColor"/>
            <path d="M12.7803 12.83C12.7803 13.24 12.4403 13.58 12.0303 13.58C11.6203 13.58 11.2803 13.24 11.2803 12.83V8.84C11.2803 8.43 11.6203 8.09 12.0303 8.09C12.4403 8.09 12.7803 8.43 12.7803 8.84V12.83Z" fill="currentColor"/>
            <path d="M11.98 16C11.62 16 11.33 15.71 11.33 15.35C11.33 14.99 11.62 14.7 11.98 14.7C12.34 14.7 12.63 14.99 12.63 15.35C12.63 15.71 12.34 16 11.98 16Z" fill="currentColor"/>
            <path opacity="0.4" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="currentColor"/>
          </svg>
          <span>Conversion Agents</span>
        </a>
        @endif

        @if(check_permission('view-retention-agents,create-retention,update-retention,delete-retention,login-as-retention'))
        <a class="sidebar-link {{ active('admin.users.retentions','active') }}" href="{{ route('admin.users.retentions') }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M21.0899 21.5C21.0899 21.78 20.8799 22 20.5999 22H3.40991C3.12991 22 2.90991 21.78 2.90991 21.5C2.90991 17.36 6.99991 14 11.9999 14C16.9999 14 21.0899 17.36 21.0899 21.5Z" fill="currentColor"/>
            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
          </svg>
          <span>Retention Agents</span>
        </a>
        @endif

        @if(check_permission('view-admins,create-admin,update-admin,delete-admin,login-as-admin'))
        <a class="sidebar-link {{ active('admin.users.admins','active') }}" href="{{ route('admin.users.admins') }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M20.91 11.12C20.91 16.01 17.36 20.59 12.51 21.93C12.18 22.02 11.82 22.02 11.49 21.93C6.63996 20.59 3.08997 16.01 3.08997 11.12V6.73006C3.08997 5.91006 3.70998 4.98007 4.47998 4.67007L10.05 2.39007C11.3 1.88007 12.71 1.88007 13.96 2.39007L19.53 4.67007C20.29 4.98007 20.92 5.91006 20.92 6.73006L20.91 11.12Z" fill="currentColor"/>
            <path d="M12 8.84998C13.28 8.84998 14.32 9.88998 14.32 11.17C14.32 12.45 13.28 13.49 12 13.49C10.72 13.49 9.67999 12.45 9.67999 11.17C9.67999 9.88998 10.72 8.84998 12 8.84998ZM16.59 16.64C16.59 17.2 16.14 17.65 15.58 17.65H8.42C7.86 17.65 7.41 17.2 7.41 16.64C7.41 15.24 9.68 14.09 12 14.09C14.32 14.09 16.59 15.24 16.59 16.64Z" fill="currentColor"/>
          </svg>
          <span>Admins</span>
        </a>
        @endif
      </div>
    </div>

      {{-- Trading --}}
      @if (check_permission('view-packages'))
      <div class="side-wrapper">
        <div class="side-title">Trading</div>
        <div class="side-menu">
          @if (setting('invest'))
          <a class="sidebar-link {{ active('admin.packages.index','active') }}" href="{{ route('admin.packages.index') }}">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.4" d="M19.97 10H4.03C2.76 10 1.74 11.02 1.74 12.29V19.06C1.74 20.33 2.76 21.35 4.03 21.35H19.97C21.24 21.35 22.26 20.33 22.26 19.06V12.29C22.26 11.02 21.24 10 19.97 10Z" fill="currentColor"/>
              <path d="M21.5 2.64998V8.15998C21.5 9.32998 20.58 10.25 19.41 10.25H4.59C3.42 10.25 2.5 9.32998 2.5 8.15998V2.64998C2.5 1.47998 3.42 0.549988 4.59 0.549988H19.41C20.58 0.549988 21.5 1.47998 21.5 2.64998ZM14.97 7.75H9.03C8.62 7.75 8.28 7.41 8.28 7C8.28 6.59 8.62 6.25 9.03 6.25H14.97C15.38 6.25 15.72 6.59 15.72 7C15.72 7.41 15.38 7.75 14.97 7.75Z" fill="currentColor"/>
            </svg>
            <span>Packages</span>
          </a>
          <a class="sidebar-link {{ active('admin.investments','active') }}" href="{{ route('admin.investments') }}">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.4" d="M17 4H18C19.1 4 20 4.9 20 6V18C20 19.1 19.1 20 18 20H6C4.9 20 4 19.1 4 18V6C4 4.9 4.9 4 6 4H7" fill="currentColor"/>
              <path d="M9 2C8.45 2 8 2.45 8 3S8.45 4 9 4H15C15.55 4 16 3.55 16 3S15.55 2 15 2H9ZM15 10H9C8.45 10 8 10.45 8 11S8.45 12 9 12H15C15.55 12 16 11.55 16 11S15.55 10 15 10ZM13 14H9C8.45 14 8 14.45 8 15S8.45 16 9 16H13C13.55 16 14 15.55 14 15S13.55 14 13 14Z" fill="currentColor"/>
            </svg>
            <span>Investments</span>
          </a>
          @endif
        </div>
      </div>
      @endif

      {{-- Activities --}}
      @if(check_permission('view-recent-login,view-recent-trade,update-recent-trade_delete-recent-trade,view-transaction,delete-transaction'))
      <div class="side-wrapper">
        <div class="side-title">Activities</div>
        <div class="side-menu">
          <a class="sidebar-link {{ active(['admin.users.active.plans','admin.trades.*'], 'show-sub') }}" href="#" data-sub-toggle>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.4" d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2Z" fill="currentColor"/>
              <path d="M12.75 6C12.75 5.58579 12.4142 5.25 12 5.25C11.5858 5.25 11.25 5.58579 11.25 6V12.1893L8.46967 14.9697C8.17678 15.2626 8.17678 15.7374 8.46967 16.0303C8.76256 16.3232 9.23744 16.3232 9.53033 16.0303L12.5303 13.0303C12.671 12.8897 12.75 12.6989 12.75 12.5V6Z" fill="currentColor"/>
            </svg>
            <span>Activities</span><span class="menu-item-arrow ms-auto">▼</span>
          </a>
          <ul class="br-menu-sub">
            @if(check_permission('view-recent-trade'))
            <li class="nav-item"><a href="{{route('admin.all.trades')}}" class="nav-link {{ active('admin.all.trades','active') }}">Recent Trades</a></li>
            @endif
            @if(check_permission('view-transaction'))
            <li class="nav-item"><a href="{{ route('admin.transactions') }}" class="nav-link {{ active('admin.transactions','active') }}">Transactions</a></li>
            @endif
          </ul>
        </div>
      </div>
      @endif

      {{-- Certificates --}}
      @if (check_permission('view-recent-login,view-recent-trade,update-recent-trade_delete-recent-trade,view-transaction,delete-transaction'))
      <div class="side-wrapper">
        <div class="side-title">Certificates</div>
        <div class="side-menu">
          <a class="sidebar-link {{ active(['admin.certification.*'], 'show-sub') }}" href="#" data-sub-toggle>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.4" d="M18 20.5H17V20.25C17 19.15 16.1 18.25 15 18.25H12.75V15.96C12.5 15.99 12.25 16 12 16C11.75 16 11.5 15.99 11.25 15.96V18.25H9C7.9 18.25 7 19.15 7 20.25V20.5H6C5.59 20.5 5.25 20.84 5.25 21.25C5.25 21.66 5.59 22 6 22H18C18.41 22 18.75 21.66 18.75 21.25C18.75 20.84 18.41 20.5 18 20.5Z" fill="currentColor"/>
              <path opacity="0.4" d="M5.51979 11.64C4.85979 11.39 4.27979 10.98 3.81979 10.52C2.88979 9.49 2.27979 8.26 2.27979 6.82C2.27979 5.38 3.40979 4.25 4.84979 4.25H5.40979C5.14979 4.78 4.99979 5.37 4.99979 6V9C4.99979 9.94 5.17979 10.83 5.51979 11.64Z" fill="currentColor"/>
              <path opacity="0.4" d="M21.72 6.82C21.72 8.26 21.11 9.49 20.18 10.52C19.72 10.98 19.14 11.39 18.48 11.64C18.82 10.83 19 9.94 19 9V6C19 5.37 18.85 4.78 18.59 4.25H19.15C20.59 4.25 21.72 5.38 21.72 6.82Z" fill="currentColor"/>
              <path d="M15 2H9C6.79 2 5 3.79 5 6V9C5 12.87 8.13 16 12 16C15.87 16 19 12.87 19 9V6C19 3.79 17.21 2 15 2ZM14.84 8.45L14.22 9.21C14.12 9.32 14.05 9.54 14.06 9.69L14.12 10.67C14.16 11.27 13.73 11.58 13.17 11.36L12.26 11C12.12 10.95 11.88 10.95 11.74 11L10.83 11.36C10.27 11.58 9.84 11.27 9.88 10.67L9.94 9.69C9.95 9.54 9.88 9.32 9.78 9.21L9.16 8.45C8.77 7.99 8.94 7.48 9.52 7.33L10.47 7.09C10.62 7.05 10.8 6.91 10.88 6.78L11.41 5.96C11.74 5.45 12.26 5.45 12.59 5.96L13.12 6.78C13.2 6.91 13.38 7.05 13.53 7.09L14.48 7.33C15.06 7.48 15.23 7.99 14.84 8.45Z" fill="currentColor"/>
            </svg>
            <span>Certificates</span><span class="menu-item-arrow ms-auto">▼</span>
          </a>
          <ul class="br-menu-sub">
            @if (check_permission('view-recent-trade'))
            <li class="nav-item"><a href="{{ route('admin.certification.index') }}" class="nav-link {{ active('admin.certification.index','active') }}">Certificates</a></li>
            @endif
            @if (check_permission('view-transaction'))
            <li class="nav-item"><a href="{{ route('admin.certification.requests') }}" class="nav-link {{ active('admin.certification.requests','active') }}">Requests</a></li>
            @endif
          </ul>
        </div>
      </div>
      @endif

      <div class="nav-divider div-transparent mb-2 mt-2"></div>

      {{-- Configuration --}}
      @if (check_permission('view-settings,update-settings'))
      <div class="side-wrapper">
        <div class="side-title">Configuration</div>
        <div class="side-menu">
          <a class="sidebar-link {{ active(['admin.settings.*','admin.overnights','admin.margin.call'], 'show-sub') }}" href="#" data-sub-toggle>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.4" d="M2 12.8801V11.1201C2 10.0801 2.85 9.22006 3.9 9.22006C5.71 9.22006 6.45 7.94006 5.54 6.37006C5.02 5.47006 5.33 4.30006 6.24 3.78006L7.97 2.79006C8.76 2.32006 9.78 2.60006 10.25 3.39006L10.36 3.58006C11.26 5.15006 12.74 5.15006 13.65 3.58006L13.76 3.39006C14.23 2.60006 15.25 2.32006 16.04 2.79006L17.77 3.78006C18.68 4.30006 18.99 5.47006 18.47 6.37006C17.56 7.94006 18.3 9.22006 20.11 9.22006C21.15 9.22006 22.01 10.0701 22.01 11.1201V12.8801C22.01 13.9201 21.16 14.7801 20.11 14.7801C18.3 14.7801 17.56 16.0601 18.47 17.6301C18.99 18.5401 18.68 19.7001 17.77 20.2201L16.04 21.2101C15.25 21.6801 14.23 21.4001 13.76 20.6101L13.65 20.4201C12.75 18.8501 11.27 18.8501 10.36 20.4201L10.25 20.6101C9.78 21.4001 8.76 21.6801 7.97 21.2101L6.24 20.2201C5.33 19.7001 5.02 18.5301 5.54 17.6301C6.45 16.0601 5.71 14.7801 3.9 14.7801C2.85 14.7801 2 13.9201 2 12.8801Z" fill="currentColor"/>
              <path d="M12 15.25C13.7949 15.25 15.25 13.7949 15.25 12C15.25 10.2051 13.7949 8.75 12 8.75C10.2051 8.75 8.75 10.2051 8.75 12C8.75 13.7949 10.2051 15.25 12 15.25Z" fill="currentColor"/>
            </svg>
            <span>Settings</span><span class="menu-item-arrow ms-auto">▼</span>
          </a>
          <ul class="br-menu-sub">
            <li class="nav-item"><a href="{{ route('admin.overnights') }}" class="nav-link {{ active('admin.overnights','active') }}">Overnight Commissions</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.fees') }}" class="nav-link {{ active('admin.settings.fees','active') }}">Fees Setting</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.site_settings') }}" class="nav-link {{ active('admin.settings.site_settings','active') }}">Site Setting</a></li>
            <li class="nav-item"><a href="{{ route('admin.margin.call') }}" class="nav-link {{ active('admin.margin.call','active') }}">Margin Call</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.withdrawals') }}" class="nav-link {{ active('admin.settings.withdrawals','active') }}">User Withdrawal Setting</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.payment_methods') }}" class="nav-link {{ active('admin.settings.payment_methods','active') }}">Payment Methods</a></li>
            <li class="nav-item"><a href="{{ route('admin.p_methods.index') }}" class="nav-link {{ active('admin.p_methods.*','active') }}">Crypto Payment Methods</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.c_payment') }}" class="nav-link {{ active('admin.settings.c_payment','active') }}">Custom Payment Link</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.lead.config') }}" class="nav-link {{ active('admin.settings.lead.config','active') }}">Lead Config</a></li>
          </ul>
        </div>
      </div>
      @endif

      {{-- Dev Settings --}}
      @if (check_permission('view-dev-settings,update-dev-settings'))
      <div class="side-wrapper">
        <div class="side-menu">
          <a class="sidebar-link {{ active(['admin.settings.*'], 'show-sub') }}" href="#" data-sub-toggle>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.4" d="M22.0004 8.69C22.0004 10.66 21.3304 12.44 20.2004 13.8L13.8004 20.2C12.4404 21.33 10.6604 22 8.69043 22C4.89043 22 1.81043 18.93 1.81043 15.12C1.81043 13.15 2.48043 11.37 3.61043 10.01L10.0104 3.61C11.3704 2.48 13.1504 1.81 15.1204 1.81C18.9204 1.81 22.0004 4.89 22.0004 8.69Z" fill="currentColor"/>
              <path d="M14.4404 14.44L9.56043 9.56C8.76043 8.76 8.76043 7.47 9.56043 6.68C10.3604 5.88 11.6504 5.88 12.4404 6.68L17.3204 11.56C18.1204 12.36 18.1204 13.65 17.3204 14.44C16.5204 15.24 15.2304 15.24 14.4404 14.44Z" fill="currentColor"/>
            </svg>
            <span>Dev Settings</span><span class="menu-item-arrow ms-auto">▼</span>
          </a>
          <ul class="br-menu-sub">
            <li class="nav-item"><a href="{{ route('admin.settings.smtp') }}" class="nav-link {{ active('admin.settings.smtp','active') }}">SMTP Settings</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.crm') }}" class="nav-link {{ active('admin.settings.crm','active') }}">CRM Settings</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.modules') }}" class="nav-link {{ active('admin.settings.modules','active') }}">Modules Settings</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.index') }}" class="nav-link {{ active('admin.settings.index','active') }}">General Settings</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.mails') }}" class="nav-link {{ active('admin.settings.mails','active') }}">Mail Setting</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.apis') }}" class="nav-link {{ active('admin.settings.apis','active') }}">APIs Setting</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.pages') }}" class="nav-link {{ active('admin.settings.pages','active') }}">Pages Setting</a></li>
          </ul>
        </div>
      </div>
      @endif

      <div class="nav-divider div-transparent mb-2 mt-2"></div>

      {{-- Logout --}}
      <div class="side-wrapper">
        <div class="side-menu">
          <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.4" d="M17.4399 14.62L16.9999 15.06L15.9399 16.12C15.5199 16.54 15.5199 17.22 15.9399 17.64C16.3599 18.06 17.0399 18.06 17.4599 17.64L18.5199 16.58L18.9599 16.14C19.3799 15.72 19.3799 15.04 18.9599 14.62L17.4599 13.12C17.0399 12.7 16.3599 12.7 15.9399 13.12C15.5199 13.54 15.5199 14.22 15.9399 14.64L16.9999 15.7L17.4399 14.62Z" fill="currentColor"/>
              <path d="M9.76001 18.67H6.18001C3.87001 18.67 2 16.8 2 14.49V9.50998C2 7.19998 3.87001 5.32998 6.18001 5.32998H9.76001C10.3700 5.32998 10.87 4.82998 10.87 4.21998C10.87 3.60998 10.3700 3.10998 9.76001 3.10998H6.18001C2.65001 3.10998 -0.220009 5.97998 -0.220009 9.50998V14.49C-0.220009 18.02 2.65001 20.89 6.18001 20.89H9.76001C10.3700 20.89 10.87 20.39 10.87 19.78C10.87 19.17 10.3700 18.67 9.76001 18.67Z" fill="currentColor"/>
              <path d="M16.84 14.67H10.88C10.27 14.67 9.77002 15.17 9.77002 15.78C9.77002 16.39 10.27 16.89 10.88 16.89H16.84C17.45 16.89 17.95 16.39 17.95 15.78C17.95 15.17 17.45 14.67 16.84 14.67Z" fill="currentColor"/>
            </svg>
            <span>Logout</span>
          </a>
        </div>
      </div>

      {{-- Time --}}
      <div class="time-display text-center py-3 crypt-grayscale-600">
        {!! \Carbon\Carbon::now()->toDateTimeString() !!}
      </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
  </aside>
  {{-- ========== /SIDEBAR ========== --}}

  {{-- ========== RIGHT SIDE (Header + Page Content) ========== --}}
  <div class="content-wrap">

    {{-- Header --}}
    <div class="header d-flex align-items-center gap-3">
        <!-- Mobile Toggle Button -->
        <span id="sidebar-mobile-toggle" role="button" class="d-lg-none">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.25 7.81V16.19C21.25 17.8608 20.7549 19.1045 19.9297 19.9297C19.1045 20.7549 17.8608 21.25 16.19 21.25H9.75V2.75H16.19C17.8608 2.75 19.1045 3.24514 19.9297 4.07033C20.7549 4.89552 21.25 6.13915 21.25 7.81Z" stroke="currentColor" stroke-width="1.5"/>
            <path d="M9 2V22H7.81C4.17 22 2 19.83 2 16.19V7.81C2 4.17 4.17 2 7.81 2H9Z" fill="currentColor"/>
          </svg>
        </span>

        <!-- Logo mobile -->
        <div class="crypt-logo logo-m dark d-lg-none"><a href="{{ url('/') }}">@if(setting('logo_dark'))<img src="{{ setting('logo_dark') }}" alt="">@else<img src="{{ asset('assets/images/logo-dark.svg') }}" alt="">@endif</a></div>
        <div class="crypt-logo logo-m light d-lg-none"><a href="{{ url('/') }}"><img src="{{ setting('logo', asset('assets/images/logo.svg')) }}" alt=""></a></div>

        <!-- Collapse Button (desktop) -->
        <div class="collapse-btn d-none d-lg-block"><span id="sidebar-collapse" role="button">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.25 7.81V16.19C21.25 17.8608 20.7549 19.1045 19.9297 19.9297C19.1045 20.7549 17.8608 21.25 16.19 21.25H9.75V2.75H16.19C17.8608 2.75 19.1045 3.24514 19.9297 4.07033C20.7549 4.89552 21.25 6.13915 21.25 7.81Z" stroke="currentColor" stroke-width="1.5"/>
            <path d="M9 2V22H7.81C4.17 22 2 19.83 2 16.19V7.81C2 4.17 4.17 2 7.81 2H9Z" fill="currentColor"/>
          </svg>
        </span></div>

        <!-- Search -->
        <div class="col col-md-4"><input type="text" class="search search-input form-control form-control-lg text-sm hidesmscreen circle" placeholder="Search"></div>

        <div class="ms-auto d-flex align-items-center gap-2 gap-sm-3 user-settings">

          <!-- Assets dropdown (examples) -->
          <div class="dropdown profile_menu d-none d-md-block">
            <a class="nav-link crypto-has-dropdown fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Assets <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" d="m20.5 11.5-6 6-6-6"></path></svg>
            </a>
            <div class="dropdown-menu dropdown-menu-shows p-2" style="min-width: 260px;">
              <div class="d-flex flex-column ps-2 pe-1 border-bottom border-success border-opacity-10">
                <p class="text-sm fw-bold crypt-grayscale-600 mb-0">Overview</p>
                <div class="d-flex col-auto gap-1 p-0">
                  <div><h4 class="fw-bold crypt-grayscale-400 mb-0 encrypted">0.00000</h4></div>
                  <div>
                    <select class="form-select text-bg-bs2 crypt-grayscale-600">
                      <option selected>BTC</option><option>ETH</option><option>BNB</option><option>USDT</option>
                    </select>
                  </div>
                </div>
                <h6 class="text-sm crypt-grayscale-600 encrypted">≈ $0.00 USDT</h6>
              </div>
              <a class="dropdown-item text-left" href="#">Overview</a>
              <a class="dropdown-item" href="#">Spot</a>
              <a class="dropdown-item" href="#">Margin</a>
              <a class="dropdown-item" href="#">Futures</a>
            </div>
          </div>

          <!-- CTA -->
          <a class="btn btn-editor btn-primary d-none d-md-inline-flex" href="#" data-bs-toggle="modal" data-bs-target="#buyCrypto">Add Funds</a>

          <!-- Profile dropdown -->
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle no-active d-flex align-items-center" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                {{-- <img src="{{ asset('assets/images/social/user.png') }}" class="img-fixed" alt="user"> --}}
                <ul class="dropdown-menu">
              <li class="wallet align-items-center p-2">
                {{-- <img alt="" src="{{ asset('assets/images/social/user.png') }}"> --}}
                <div class="d-grid">
                  <h6 class="fw-bold crypt-grayscale-100 mb-0">{{ auth()->user()->email ?? 'user@example.com' }}</h6>
                </div>
              </li>
              <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li><a class="dropdown-item" href="#">My Asset</a></li>
              <li><a class="dropdown-item" href="#">Order History</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
            </ul>
          </div>

          <!-- Notifications -->
          <div class="controller d-none d-md-inline-flex">
            <a href="#" class="notify" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNotify">
              <div class="notification"></div>
              <svg viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.707 8.796c0 1.256.332 1.997 1.063 2.85.553.628.73 1.435.73 2.31 0 .874-.287 1.704-.863 2.378a4.537 4.537 0 01-2.9 1.413c-1.571.134-3.143.247-4.736.247-1.595 0-3.166-.068-4.737-.247a4.532 4.532 0 01-2.9-1.413 3.616 3.616 0 01-.864-2.378c0-.875.178-1.682.73-2.31.754-.854 1.064-1.594 1.064-2.85V8.37c0-1.682.42-2.781 1.283-3.858C7.861 2.942 9.919 2 11.956 2h.09c2.08 0 4.204.987 5.466 2.625.82 1.054 1.195 2.108 1.195 3.745v.426zM9.074 20.061c0-.504.462-.734.89-.833.5-.106 3.545-.106 4.045 0 .428.099.89.33.89.833-.025.48-.306.904-.695 1.174a3.635 3.635 0 01-1.713.731 3.795 3.795 0 01-1.008 0 3.618 3.618 0 01-1.714-.732c-.39-.269-.67-.694-.695-1.173z"/></svg>
            </a>
          </div>

          <!-- Dark/Light toggle -->
          <div class="mode">
            <button class="controller m-auto" id="darkMode">
              <span class="dark-logo"><svg viewBox="0 0 512 512" width="20" fill="currentColor"><path d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"/></svg></span>
              <span class="light-logo"><svg viewBox="0 0 512 512" width="20" fill="currentColor"><path d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1z"/></svg></span>
            </button>
          </div>

          <!-- Mobile hamburger (offcanvas) -->
          <div id="mobile_menu" class="close d-lg-none">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M4 12H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M4 6H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </button>
          </div>
        </div>
      </div>

    {{-- صفحة المحتوى --}}
    <main class="p-3 p-md-4">
      @yield('content')
    </main>

    {{-- Footer (اختياري) --}}
    <footer class="py-2 text-center crypt-grayscale-600">
      <small>Copyright &copy; {{ date('Y') }} {{ setting('site_name') }}. All Rights Reserved.</small>
    </footer>

  </div>
  {{-- ========== /RIGHT SIDE ========== --}}

</div>

{{-- Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
  // Sidebar collapse (desktop)
  const layout = document.getElementById('appLayout');
  document.getElementById('sidebar-collapse')?.addEventListener('click', () => {
    layout.classList.toggle('sidebar-collapsed');
  });

  // Sidebar mobile toggle
  const sidebar = document.getElementById('appSidebar');
  document.getElementById('sidebar-mobile-toggle')?.addEventListener('click', () => {
    sidebar.classList.toggle('show');
  });

  // Theme persistence
  (function(){
    const key='crypt-theme';
    const html=document.documentElement, body=document.body, btn=document.getElementById('darkMode');
    const apply=(mode)=>{ if(mode==='light'){ body.classList.remove('crypt-dark'); body.classList.add('crypt-light'); html.dataset.theme='light'; } else { body.classList.add('crypt-dark'); body.classList.remove('crypt-light'); html.dataset.theme='dark'; } };
    apply(localStorage.getItem(key)||'dark');
    btn?.addEventListener('click',()=>{ const next=(html.dataset.theme==='dark')?'light':'dark'; localStorage.setItem(key,next); apply(next); });
  })();
</script>

@yield('js')
@include('partials.alerts')
</body>
</html>
