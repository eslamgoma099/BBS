<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>{{ setting('site_name', 'Crypt') }}</title>

  {{-- Theme assets --}}
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/svg+xml" href="{{ setting('favicon', asset('assets/images/favicon.svg')) }}">

  <style>
.profile_menu > .dropdown > .btn img,
.dropdown-menu .wallet img {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  object-fit: cover;
}

/* أي صورة كبيرة في الكونتنت زي اللي على يمين الداشبورد */
.content img, .card img {
  max-width: 260px;
  max-height: 260px;
  border-radius: 12px;
  object-fit: cover;
}
    /* --- Simple layout frame for header + sidebar --- */
    body.crypt-dark .content-wrap { background: #0e0e11; }
    body.crypt-light .content-wrap { background: #fff; }
    .layout { display: grid; grid-template-columns: 260px 1fr; }
    .layout.sidebar-collapsed { grid-template-columns: 84px 1fr; }
    .sidebar { position: sticky; top: 0; height: 100vh; overflow-y: auto; border-right: 1px solid rgba(255,255,255,.06); }
    .header { position: sticky; top: 0; z-index: 1030; padding: .75rem 1rem; border-bottom: 1px solid rgba(255,255,255,.06); backdrop-filter: blur(8px); }
    .content-wrap { min-height: calc(100vh - 56px); }
    .logo-m img, .crypt-logo img { max-height: 28px; }
    .crypt-logo.logo-sm img { max-height: 24px; }

    /* scrollbars */
    .sidebar::-webkit-scrollbar{ width:6px } .sidebar::-webkit-scrollbar-thumb{ background: rgba(255,255,255,.1); border-radius: 10px }

    /* active link helper (if no .is-active applied by theme) */
    .sidebar .sidebar-link.active { background: rgba(255,255,255,.08); color: #fff }

    /* mobile */
    @media (max-width: 992px){
      .layout { grid-template-columns: 1fr; }
      .sidebar { position: fixed; left: 0; top: 0; width: 280px; transform: translateX(-100%); transition: .25s ease; box-shadow: 0 10px 30px rgba(0,0,0,.35); }
      .sidebar.show { transform: translateX(0) }
      .content-wrap { min-height: 100vh }
    }
  </style>
</head>

<body class="crypt-dark">

  <div class="layout" id="appLayout">

    {{-- Sidebar --}}
    <aside class="sidebar p-3" id="appSidebar">
      <!-- Brand + small logos -->
      <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="disable-sm-screen">
          <div class="crypt-logo dark"><a href="{{ url('/') }}">@if(setting('logo_dark'))<img src="{{ setting('logo_dark') }}" alt="logo-dark">@else<img src="{{ asset('assets/images/logo-dark.svg') }}" alt="logo-dark">@endif</a></div>
          <div class="crypt-logo light"><a href="{{ url('/') }}"><img src="{{ setting('logo', asset('assets/images/logo.svg')) }}" alt="logo-light"></a></div>
          <div class="crypt-logo logo-sm dark mt-2"><a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-m-dark.svg') }}" alt="logo-m-dark"></a></div>
          <div class="crypt-logo logo-sm light mt-2"><a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-m.svg') }}" alt="logo-m"></a></div>
        </div>
      </div>

      {{-- Menu: Assets/Main --}}
      <div class="side-wrapper">
        <div class="side-title">Main</div>
        <div class="side-menu">
          <a class="sidebar-link {{ active('admin.dashboard','active') }}" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-home"></i>
            <span>Dashboard</span>
          </a>

          @if (check_permission('view-leads,create-leads,update-leads,create-source-leads,create-status-leads,import-leads,assign-manager-leads'))
          <a class="sidebar-link {{ active('admin.users.leads','active') }}" href="{{ route('admin.users.leads') }}">
            <i class="fa fa-phone"></i><span>Leads</span>
          </a>
          @endif

          @if (check_permission('view-customers,create-customers,update-customers,assign-manager-customers,assign-retention-customers'))
          <a class="sidebar-link {{ active('admin.users.index','active') }}" href="{{ route('admin.users.index') }}">
            <i class="fa fa-users"></i><span>Customers</span>
          </a>
          @endif

          @if (check_permission('view-roles,create-roles,update-roles'))
          <a class="sidebar-link {{ active('admin.roles.index','active') }}" href="{{ route('admin.roles.index') }}">
            <i class="fa fa-user-circle"></i><span>Manage Roles</span>
          </a>
          @endif

          @if (check_permission('view-trading-hours,edit-trading-hours'))
          <a class="sidebar-link {{ active('admin.trading_hours.index','active') }}" href="{{ route('admin.trading_hours.index') }}">
            <i class="fa fa-clock-o"></i><span>Trading Hours</span>
          </a>
          @endif

          @if (check_permission('view-active-customers,create-active-customers,update-active-customersm,assign-manager-active-customers,assign-retention-active-customers,set-active-users-as-free,set-active-users-as-archieve'))
          <a class="sidebar-link {{ active('admin.users.activ-users','active') }}" href="{{ route('admin.users.activ-users') }}">
            <i class="fa fa-user-plus"></i><span>Active Customers</span>
          </a>
          @endif

          @if (check_permission('view-archieve-customers,create-archieve-customers,update-archieve-customers,assign-manager-archieve-customers,assign-retention-archieve-customers,set-archieve-users-as-free,set-archieve-users-as-active'))
          <a class="sidebar-link {{ active('admin.users.archieve-users','active') }}" href="{{ route('admin.users.archieve-users') }}">
            <i class="fa fa-archive"></i><span>Archive Customers</span>
          </a>
          @endif

          @if (check_permission('view-assets,create-currency-pair,update-currency-pair,delete-currency-pair,update-leverage,update-buy,update-sell'))
          <a class="sidebar-link {{ active('admin.currencies.index','active') }}" href="{{ route('admin.currencies.index') }}">
            <i class="fa fa-list-ul"></i><span>Assets</span>
          </a>
          @endif

          @if(check_permission('view-conversion-agents,create-manager,assign-user-to-manager,update-manager,delete-manager,login-as-manager'))
          <a class="sidebar-link {{ active('admin.users.managers','active') }}" href="{{ route('admin.users.managers') }}">
            <i class="fa fa-user-md"></i><span>Conversion Agents</span>
          </a>
          @endif

          @if(check_permission('view-retention-agents,create-retention,update-retention,delete-retention,login-as-retention'))
          <a class="sidebar-link {{ active('admin.users.retentions','active') }}" href="{{ route('admin.users.retentions') }}">
            <i class="fa fa-user-circle-o"></i><span>Retention Agents</span>
          </a>
          @endif

          @if(check_permission('view-admins,create-admin,update-admin,delete-admin,login-as-admin'))
          <a class="sidebar-link {{ active('admin.users.admins','active') }}" href="{{ route('admin.users.admins') }}">
            <i class="fa fa-universal-access"></i><span>Admins</span>
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
            <i class="fa fa-shopping-bag"></i><span>Packages</span>
          </a>
          <a class="sidebar-link {{ active('admin.investments','active') }}" href="{{ route('admin.investments') }}">
            <i class="fa fa-money"></i><span>Investments</span>
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
            <i class="fa fa-fire"></i><span>Activities</span><span class="menu-item-arrow ms-auto">▼</span>
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
            <i class="fa fa-certificate"></i><span>Certificates</span><span class="menu-item-arrow ms-auto">▼</span>
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
            <i class="fa fa-cogs"></i><span>Settings</span><span class="menu-item-arrow ms-auto">▼</span>
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
            <i class="fa fa-code"></i><span>Dev Settings</span><span class="menu-item-arrow ms-auto">▼</span>
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
            <i class="fa fa-power-off"></i><span>Logout</span>
          </a>
        </div>
      </div>

      {{-- Time --}}
      <div class="time-display text-center py-3 crypt-grayscale-600">
        {!! \Carbon\Carbon::now()->toDateTimeString() !!}
      </div>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
    </aside>

    {{-- Right side: header + content --}}
    <div class="content-wrap">

      {{-- Header (new theme) --}}
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

      {{-- Page Content --}}
      <main class="p-3 p-md-4">
        @yield('content')
      </main>

    </div>
  </div>

  {{-- Scripts --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
  <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>
    // Popovers for sidebar icons
    document.querySelectorAll('[data-bs-toggle="popover"]').forEach(function (el) {
      new bootstrap.Popover(el);
    });

    // Submenu toggles
    document.querySelectorAll('[data-sub-toggle]').forEach(function(link){
      link.addEventListener('click', function(e){
        e.preventDefault();
        link.classList.toggle('show-sub');
        const next = link.nextElementSibling; // .br-menu-sub
        if(next) next.style.maxHeight = next.style.maxHeight ? null : '500px';
        document.querySelectorAll('[data-sub-toggle]').forEach(function(other){
          if(other !== link) other.classList.remove('show-sub');
        });
      });
    });

    // Auto-open active submenu if inner link is active
    (function(){
      const active = document.querySelector('.br-menu-sub .nav-link.active');
      if(active){
        const parentToggle = active.closest('.side-wrapper')?.querySelector('[data-sub-toggle]');
        parentToggle?.classList.add('show-sub');
        const sub = parentToggle?.nextElementSibling; if(sub) sub.style.maxHeight = '500px';
      }
    })();

    // Sidebar collapse (desktop)
    const layout = document.getElementById('appLayout');
    document.getElementById('sidebar-collapse')?.addEventListener('click', function(){
      layout.classList.toggle('sidebar-collapsed');
    });

    // Sidebar mobile toggle
    const sidebar = document.getElementById('appSidebar');
    document.getElementById('sidebar-mobile-toggle')?.addEventListener('click', function(){
      sidebar.classList.toggle('show');
    });

    // Theme persistence
    (function(){
      const key='crypt-theme'; const html=document.documentElement; const body=document.body; const btn=document.getElementById('darkMode');
      const apply=(mode)=>{ if(mode==='light'){ body.classList.remove('crypt-dark'); body.classList.add('crypt-light'); html.dataset.theme='light'; } else { body.classList.add('crypt-dark'); body.classList.remove('crypt-light'); html.dataset.theme='dark'; } };
      apply(localStorage.getItem(key)||'dark');
      btn?.addEventListener('click',()=>{ const next=(html.dataset.theme==='dark')?'light':'dark'; localStorage.setItem(key,next); apply(next); });
    })();
  </script>

</body>
</html>
