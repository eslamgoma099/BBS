<div class="header d-flex align-items-center">
    <!-- Mobile Toggle Button -->
    <span id="sidebar-mobile-toggle">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.25 7.81V16.19C21.25 17.8608 20.7549 19.1045 19.9297 19.9297C19.1045 20.7549 17.8608 21.25 16.19 21.25H9.75V2.75H16.19C17.8608 2.75 19.1045 3.24514 19.9297 4.07033C20.7549 4.89552 21.25 6.13915 21.25 7.81Z" stroke="currentColor" stroke-width="1.5"/>
            <path d="M9 2V22H7.81C4.17 22 2 19.83 2 16.19V7.81C2 4.17 4.17 2 7.81 2H9Z" fill="currentColor"/>
        </svg>
    </span>

    <!-- Logo -->
    <div class="crypt-logo logo-m dark">
        <a href="{{ setting('site_info_url', '/') }}">
            <img src="{{ setting('logo', '/asset/images/logosm.png') }}" alt="logo">
        </a>
    </div>
    <div class="crypt-logo logo-m light">
        <a href="{{ setting('site_info_url', '/') }}">
            <img src="{{ setting('logo', '/asset/images/logosm.png') }}" alt="logo">
        </a>
    </div>

    <!-- Collapse Button -->
    <div class="collapse-btn">
        <span id="sidebar-collapse">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.25 7.81V16.19C21.25 17.8608 20.7549 19.1045 19.9297 19.9297C19.1045 20.7549 17.8608 21.25 16.19 21.25H9.75V2.75H16.19C17.8608 2.75 19.1045 3.24514 19.9297 4.07033C20.7549 4.89552 21.25 6.13915 21.25 7.81Z" stroke="currentColor" stroke-width="1.5"/>
                <path d="M9 2V22H7.81C4.17 22 2 19.83 2 16.19V7.81C2 4.17 4.17 2 7.81 2H9Z" fill="currentColor"/>
            </svg>
        </span>
    </div>

    <!-- Search -->
    <div class="col-md-3">
        <input type="text" class="search search-input form-control form-control-lg text-sm hidesmscreen circle" placeholder="Search coins, pairs...">
    </div>

    <div class="user-settings gap-2 gap-sm-3">
        <!-- Assets Dropdown -->
        <div class="dropdown profile_menu disable-sm-screen">
            <a class="nav-link crypto-has-dropdown fw-medium" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Assets
                <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" version="1.1" viewBox="0 0 29 29" xml:space="preserve">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" d="m20.5 11.5-6 6-6-6"></path>
                </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-shows">
                <div class="d-flex flex-column ps-2 pe-1 border-bottom border-success border-opacity-10">
                    <p class="text-sm fw-bold crypt-grayscale-600 mb-0">Overview</p>
                    <div class="d-flex col-auto gap-1 p-0">
                        <div>
                            <h4 class="fw-bold crypt-grayscale-400 mb-0 encrypted">${{ number_format(auth()->user()->balance, 2) }}</h4>
                        </div>
                        <div>
                            <select class="form-select text-bg-bs2 crypt-grayscale-600">
                                <option selected>USDT</option>
                                <option value="1">BTC</option>
                                <option value="2">ETH</option>
                                <option value="3">BNB</option>
                            </select>
                        </div>
                    </div>
                    <h6 class="text-sm crypt-grayscale-600 encrypted">≈ ${{ number_format(auth()->user()->balance, 2) }} USDT</h6>
                </div>
                <div>
                    <a class="dropdown-item text-left" href="{{ route('backend.dashboard') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.9999 9L8.99985 12L11.9999 15L14.9999 12L11.9999 9Z" fill="currentColor"/>
                        </svg>
                        Overview
                    </a>
                </div>
                @if (setting('trade'))
                <div>
                    <a class="dropdown-item" href="{{ route('backend.tradestation') }}"> 
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99996 20.0302C13.3136 20.0302 15.9999 17.3439 15.9999 14.0302C15.9999 10.7166 13.3136 8.03027 9.99996 8.03027C6.68627 8.03027 4 10.7166 4 14.0302C4 17.3439 6.68627 20.0302 9.99996 20.0302ZM10.0001 12.0303L8.0001 14.0302L10.0001 16.0302L12 14.0302L10.0001 12.0303Z" fill="currentColor"/>
                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M17.9431 13.0726C19.1897 12.1633 19.9997 10.6914 19.9997 9.03024C19.9997 6.26883 17.7612 4.03027 14.9998 4.03027C13.3386 4.03027 11.8667 4.84034 10.9575 6.08698C14.6102 6.52271 17.5073 9.41976 17.9431 13.0726Z" fill="currentColor"/>
                        </svg>
                        Spot Trading
                    </a>
                </div>
                @endif
                @if (setting('invest'))
                <div>
                    <a class="dropdown-item" href="{{ route('backend.investments') }}"> 
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M8.24423 19.9962L3 16.5L3.65836 16.1708C4.50294 15.7485 5.49706 15.7485 6.34164 16.1708L8.15542 17.0777C8.71084 17.3554 9.32329 17.5 9.94427 17.5H13L10.9487 16.8162C10.3821 16.6274 10 16.0972 10 15.5H18.1716C18.702 15.5 19.2107 15.7107 19.5858 16.0858L21 17.5L18 21.5L16 20.5H9.90833C9.31605 20.5 8.73703 20.3247 8.24423 19.9962Z" fill="currentColor"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 14.5C12.3137 14.5 15 11.8137 15 8.5C15 5.18629 12.3137 2.5 9 2.5C5.68629 2.5 3 5.18629 3 8.5C3 11.8137 5.68629 14.5 9 14.5ZM9 6.5L7 8.5L9 10.5L11 8.5L9 6.5Z" fill="currentColor"/>
                        </svg>
                        Earn
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Orders Dropdown -->
        <div class="dropdown profile_menu disable-sm-screen">
            <a class="nav-link crypto-has-dropdown fw-medium" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Orders
                @php
                    $openOrdersCount = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->count();
                @endphp
                @if($openOrdersCount > 0)
                    <span class="badge badge-primary">{{ $openOrdersCount }}</span>
                @endif
                <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" version="1.1" viewBox="0 0 29 29" xml:space="preserve">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" d="m20.5 11.5-6 6-6-6"></path>
                </svg>
            </a>
            <ul class="profile_menu dropdown-menu dropdown-menu-shows">
                @if($openOrdersCount > 0)
                    @php
                        $recentOrders = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->take(3)->get();
                    @endphp
                    @foreach($recentOrders as $order)
                    <li>
                        <a class="dropdown-item" href="{{ route('backend.trades.index') }}"> 
                            {{ $order->pair ?? 'BTC/USDT' }} - {{ $order->type ?? 'BUY' }}
                        </a>
                    </li>
                    @endforeach
                @else
                    <li><span class="dropdown-item-text">No open orders</span></li>
                @endif
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="{{ route('backend.trades.index') }}">View All Orders</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('backend.transactions') }}">Trade History</a>
                </li>
            </ul>
        </div>

        <!-- Admin Panel Buttons -->
        @auth()
            @if (check_permission('login-manger'))
                @if(auth()->user()->canImpersonate())
                    <a target="_blank" href="https://terminal.wsncapitalltd.com/admin/dashboard"
                       class="btn btn-warning admin-panel-btn d-none d-md-inline-block">
                        Admin Panel
                    </a>
                @else
                    <a target="_blank" href="https://crm.lancaster-chamber.org/admin/dashboard"
                       class="btn btn-warning admin-panel-btn d-none d-md-inline-block">
                        CRM
                    </a>
                @endif
            @endif
        @endauth

        <!-- KYC Button -->
        @if (setting('kyc_verify_button') && auth()->user()->identity->status != 'approved')
            <a href="{{ route('backend.profile.upload.id') }}"
                class="btn btn-outline-danger kyc-btn d-none d-md-inline-block">
                @if(!auth()->user()->identity->front && auth()->user()->identity->status == 'pending')
                    Verify Account
                @elseif(auth()->user()->identity->status == 'pending')
                    Pending
                @elseif(auth()->user()->identity->status == 'disapproved')
                    DISAPPROVED
                @endif
            </a>
        @endif

        <!-- Account Officer -->
        @if (setting('autotrader'))
            @if (auth()->user()->trader_request == 'accepted' && auth()->user()->manager_id)
                <a href="{{ route('backend.profile.view', auth()->user()->manager_id) }}"
                    class="btn btn-primary account-officer-btn d-none d-md-inline-block">
                    {{ auth()->user()->account_officer }}
                </a>
            @endif
        @endif

        <!-- User Profile -->
        <div class="profile_menu d-flex align-items-center">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle no-active d-flex align-items-center" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <img alt="{{ auth()->user()->first_name }}" src="{{ auth()->user()->avatar ?? '/images/default-avatar.png' }}">
                </button>
                <ul class="dropdown-menu">
                    <li class="wallet align-items-center">
                        <img alt="{{ auth()->user()->first_name }}" src="{{ auth()->user()->avatar ?? '/images/default-avatar.png' }}">
                        <div class="d-grid">
                            <h6 class="fw-bold crypt-grayscale-100 mb-0">{{ substr(auth()->user()->email, 0, 2) }}***@{{ substr(strstr(auth()->user()->email, '@'), 1) }}</h6>
                            <a class="d-flex gap-2 mb-2 verified mt-2" href="#!">
                                <p class="crypt-grayscale-600 mb-0">UID:</p>
                                <p class="crypt-grayscale-100 mb-0">{{ auth()->user()->id }}</p>
                                <div class="crypt-grayscale-500" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy" onclick="copyToClipboard('{{ auth()->user()->id }}')">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.15556 5C6.8605 5 5 6.8605 5 9.15556V12.48C5 14.5149 6.46269 16.2083 8.39406 16.566C8.75174 18.4974 10.4451 19.96 12.48 19.96H15.8044C18.0995 19.96 19.96 18.0995 19.96 15.8044V12.48C19.96 10.4451 18.4974 8.75174 16.566 8.39406C16.2083 6.46269 14.5149 5 12.48 5H9.15556ZM14.8315 8.32444C14.4892 7.35604 13.5657 6.66222 12.48 6.66222H9.15556C7.77853 6.66222 6.66222 7.77853 6.66222 9.15556V12.48C6.66222 13.5657 7.35603 14.4892 8.32444 14.8315V12.48C8.32444 10.1849 10.1849 8.32444 12.48 8.32444H14.8315ZM9.98667 12.48C9.98667 11.103 11.103 9.98667 12.48 9.98667H15.8044C17.1814 9.98667 18.2978 11.103 18.2978 12.48V15.8044C18.2978 17.1814 17.1814 18.2978 15.8044 18.2978H12.48C11.103 18.2978 9.98667 17.1814 9.98667 15.8044V12.48Z" fill="currentColor"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="mt-2">
                        <a class="dropdown-item" href="{{ route('backend.dashboard') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M18.6699 2H16.7699C14.5899 2 13.4399 3.15 13.4399 5.33V7.23C13.4399 9.41 14.5899 10.56 16.7699 10.56H18.6699C20.8499 10.56 21.9999 9.41 21.9999 7.23V5.33C21.9999 3.15 20.8499 2 18.6699 2Z" fill="currentColor"/>
                                <path d="M6.29 10.58C8.6593 10.58 10.58 8.6593 10.58 6.29C10.58 3.9207 8.6593 2 6.29 2C3.9207 2 2 3.9207 2 6.29C2 8.6593 3.9207 10.58 6.29 10.58Z" fill="currentColor"/>
                            </svg>
                            Dashboard
                        </a>
                        <a class="dropdown-item" href="{{ route('backend.profile.edit') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
                            </svg>
                            My Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('backend.transactions') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M6.73049 19.7C7.55049 18.82 8.80049 18.89 9.52049 19.85L10.5305 21.2C11.3405 22.27 12.6505 22.27 13.4605 21.2L14.4705 19.85C15.1905 18.89 16.4405 18.82 17.2605 19.7C19.0405 21.6 20.4905 20.97 20.4905 18.31V7.04C20.5005 3.01 19.5605 2 15.7805 2H8.22049C4.44049 2 3.50049 3.01 3.50049 7.04V18.3C3.50049 20.97 4.96049 21.59 6.73049 19.7Z" fill="currentColor"/>
                            </svg>
                            My Orders
                        </a>
                        <a class="dropdown-item" href="{{ route('backend.account.security') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M20.91 11.12C20.91 16.01 17.36 20.59 12.51 21.93C12.18 22.02 11.82 22.02 11.49 21.93C6.63996 20.59 3.08997 16.01 3.08997 11.12V6.73006C3.08997 5.91006 3.70998 4.98007 4.47998 4.67007L10.05 2.39007C11.3 1.88007 12.71 1.88007 13.96 2.39007L19.53 4.67007C20.29 4.98007 20.92 5.91006 20.92 6.73006L20.91 11.12Z" fill="currentColor"/>
                            </svg>
                            Security
                        </a>
                        <a class="dropdown-item" href="{{ route('backend.profile.upload.id') }}">
                            <div class="d-flex flex-row align-items-center gap-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 13C17.06 13 16.19 13.33 15.5 13.88C14.58 14.61 14 15.74 14 17C14 17.75 14.21 18.46 14.58 19.06C15.27 20.22 16.54 21 18 21C19.01 21 19.93 20.63 20.63 20C20.94 19.74 21.21 19.42 21.42 19.06C21.79 18.46 22 17.75 22 17C22 14.79 20.21 13 18 13ZM20.07 16.57L17.94 18.54C17.8 18.67 17.61 18.74 17.43 18.74C17.24 18.74 17.05 18.67 16.9 18.52L15.91 17.53C15.62 17.24 15.62 16.76 15.91 16.47C16.2 16.18 16.68 16.18 16.97 16.47L17.45 16.95L19.05 15.47C19.35 15.19 19.83 15.21 20.11 15.51C20.39 15.81 20.37 16.28 20.07 16.57Z" fill="currentColor"/>
                                </svg>
                                Identity Verification
                                <span class="verified alert align-items-center d-flex mb-0 {{ auth()->user()->identity->status === 'approved' ? 'text-success' : 'text-warning' }}">
                                    {{ auth()->user()->identity->status === 'approved' ? 'Verified' : 'Pending' }}
                                </span>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#!" data-bs-toggle="modal" data-bs-target="#update_bassword_model">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.5 10.5C14.5 9.12 13.38 8 12 8C10.62 8 9.5 9.12 9.5 10.5C9.5 11.62 10.24 12.55 11.25 12.87V15.5C11.25 15.91 11.59 16.25 12 16.25C12.41 16.25 12.75 15.91 12.75 15.5V12.87C13.76 12.55 14.5 11.62 14.5 10.5Z" fill="currentColor"/>
                            </svg>
                            Change Password
                        </a>
                        <a class="dropdown-item text-danger" href="#!" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.28 14.72C11.99 14.43 11.51 14.43 11.22 14.72L10.5 15.44V11.25C10.5 10.84 10.16 10.5 9.75 10.5C9.34 10.5 9 10.84 9 11.25V15.44L8.28 14.72C7.99 14.43 7.51 14.43 7.22 14.72C6.93 15.01 6.93 15.49 7.22 15.78L9.22 17.78C9.23 17.79 9.24 17.79 9.24 17.8C9.3 17.86 9.38 17.91 9.46 17.95C9.56 17.98 9.65 18 9.75 18C9.85 18 9.94 17.98 10.03 17.94C10.12 17.9 10.2 17.85 10.28 17.78L12.28 15.78C12.57 15.49 12.57 15.01 12.28 14.72Z" fill="currentColor"/>
                            </svg>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>



        <!-- Call to Action -->
        <div class="flex disable-sm-screen">
            <a class="btn btn-editor btn-primary" href="#!" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Funds</a>
        </div>
    </div>
</div>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
