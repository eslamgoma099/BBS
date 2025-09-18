<!-- Header -->
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
        <a href="{{ route('backend.dashboard') }}">
            <img src="{{ setting('logo_dark', '/asset/images/logosm.png') }}" alt="Crypt Logo Dark">
        </a>
    </div>
    <div class="crypt-logo logo-m light">
        <a href="{{ route('backend.dashboard') }}">
            <img src="{{ setting('logo', '/asset/images/logosm.png') }}" alt="Crypt Logo">
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
        <input type="text" class="search search-input form-control form-control-lg text-sm hidesmscreen circle" placeholder="Search">
    </div>

    <div class="user-settings gap-2 gap-sm-3">
        <!-- Dropdown (Assets) -->
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
                    <h6 class="text-sm crypt-grayscale-600 encrypted">${{ number_format(auth()->user()->balance, 2) }} USDT</h6>
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
                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M17.9431 13.0726C19.1897 12.1633 19.9997 10.6914 19.9997 9.03024C19.9997 6.26883 17.7612 4.03027 14.9998 4.03027C13.3386 4.03027 11.8667 4.84034 10.9575 6.08698C"></path>
                        </svg>
                        Spot Trading
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Orders Dropdown -->
        <div class="dropdown profile_menu disable-sm-screen position-relative">
            @php
                $openOrdersCount = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->count();
            @endphp
            <a class="nav-link crypto-has-dropdown fw-medium" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Orders
                @if($openOrdersCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                        {{ $openOrdersCount }}
                    </span>
                @endif
                <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" version="1.1" viewBox="0 0 29 29" xml:space="preserve">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" d="m20.5 11.5-6 6-6-6"></path>
                </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-shows">
                @if($openOrdersCount > 0)
                    @php
                        $recentOrders = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->take(3)->get();
                    @endphp
                    @foreach($recentOrders as $order)
                    <a href="{{ route('backend.trades.index') }}" class="dropdown-item">
                        {{ $order->pair ?? 'BTC/USDT' }} - {{ $order->type ?? 'BUY' }}
                    </a>
                    @endforeach
                    <div class="dropdown-divider"></div>
                @else
                    <span class="dropdown-item-text">No open orders</span>
                @endif
                <a href="{{ route('backend.trades.index') }}" class="dropdown-item">View All Orders</a>
                <a href="{{ route('backend.transactions') }}" class="dropdown-item">Trade History</a>
            </div>
        </div>

        <!-- Notifications -->
        <div class="dropdown position-relative disable-sm-screen">
            <a class="nav-link" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.34 14.49L18.34 12.83C18.13 12.46 17.94 11.76 17.94 11.35V8.82C17.94 6.47 16.56 4.44 14.57 3.49C14.05 2.57 13.09 1.99 11.99 1.99C10.9 1.99 9.94 2.57 9.42 3.49C7.49 4.44 6.06 6.42 6.06 8.82V11.35C6.06 11.76 5.87 12.46 5.66 12.83L4.66 14.49C4.29 15.16 4.2 15.9 4.45 16.58C4.69 17.25 5.26 17.77 5.98 18.02C7.94 18.68 10.01 19 12.02 19C14.02 19 16.09 18.68 18.05 18.03C18.73 17.79 19.26 17.27 19.53 16.58C19.8 15.89 19.73 15.13 19.34 14.49Z" fill="currentColor"/>
                    <path opacity="0.4" d="M14.8299 20.01C14.4099 21.17 13.2999 22 11.9999 22C11.2099 22 10.4299 21.68 9.87989 21.11C9.55989 20.81 9.31989 20.41 9.17989 20C9.30989 20.02 9.43989 20.03 9.57989 20.05C9.80989 20.08 10.0499 20.11 10.2899 20.13C10.8599 20.18 11.4399 20.21 12.0199 20.21C12.5899 20.21 13.1599 20.18 13.7199 20.13C13.9299 20.11 14.1399 20.1 14.3399 20.07C14.4999 20.05 14.6599 20.03 14.8299 20.01Z" fill="currentColor"/>
                </svg>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-shows">
                <h6 class="dropdown-header">Notifications</h6>
                <a href="#" class="dropdown-item">
                    <small class="text-muted">2 hours ago</small><br>
                    Account Login from Chrome
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">View all notifications</a>
            </div>
        </div>

        <!-- Theme Toggle -->
        <div class="controller disable-sm-screen">
            <input type="checkbox" class="checkbox" id="checkbox">
            <label for="checkbox" class="checkbox-label">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
                <span class="ball"></span>
            </label>
        </div>

        <!-- Deposit Button -->
        <button class="btn btn-primary crypto-add-fund disable-sm-screen" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
            Deposit
        </button>

        <!-- User Profile -->
        <div class="dropdown profile_menu">
            <a class="dropdown-toggle profile-icon d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="rounded-circle" src="{{ auth()->user()->avatar ?? '/asset/images/user.png' }}" alt="{{ auth()->user()->first_name }}" style="width: 32px; height: 32px; object-fit: cover;">
                <span class="disable-sm-screen">{{ substr(auth()->user()->email, 0, 2) }}***@{{ substr(strstr(auth()->user()->email, '@'), 1) }}</span>
                <svg class="disable-sm-screen" xmlns="http://www.w3.org/2000/svg" x="0" y="0" version="1.1" viewBox="0 0 29 29" xml:space="preserve">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" d="m20.5 11.5-6 6-6-6"></path>
                </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-shows dropdown-menu-end">
                <!-- User Summary -->
                <div class="dropdown-header px-3 py-3">
                    <div class="d-flex align-items-center">
                        <img src="{{ auth()->user()->avatar ?? '/asset/images/user.png' }}" alt="Avatar" class="rounded-circle me-3" style="width: 48px; height: 48px;">
                        <div>
                            <div class="fw-bold">{{ substr(auth()->user()->email, 0, 2) }}***@{{ substr(strstr(auth()->user()->email, '@'), 1) }}</div>
                            <div class="text-muted small">
                                UID: {{ auth()->user()->id }}
                                <button class="btn btn-sm" onclick="copyToClipboard('{{ auth()->user()->id }}')">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="dropdown-divider"></div>
                
                <!-- Navigation Links -->
                <a href="{{ route('backend.dashboard') }}" class="dropdown-item">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <a href="{{ route('backend.profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-user me-2"></i>My Asset
                </a>
                <a href="{{ route('backend.trades.index') }}" class="dropdown-item">
                    <i class="fas fa-list me-2"></i>My Orders
                </a>
                <a href="{{ route('backend.transactions') }}" class="dropdown-item">
                    <i class="fas fa-download me-2"></i>Export History
                </a>
                
                <!-- Identity Verification -->
                @if(isset(auth()->user()->identity))
                <a href="{{ route('backend.profile.upload.id') }}" class="dropdown-item">
                    <i class="fas fa-shield-alt me-2"></i>Identity Verification
                    <span class="badge {{ auth()->user()->identity->status === 'approved' ? 'bg-success' : 'bg-warning' }}">
                        {{ auth()->user()->identity->status === 'approved' ? 'Verified' : 'Pending' }}
                    </span>
                </a>
                @else
                <a href="{{ route('backend.profile.upload.id') }}" class="dropdown-item">
                    <i class="fas fa-shield-alt me-2"></i>Identity Verification
                    <span class="badge bg-secondary">Not Started</span>
                </a>
                @endif
                
                <div class="dropdown-divider"></div>
                
                <!-- Settings Links -->
                <a href="{{ route('backend.profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-cog me-2"></i>Account Settings
                </a>
                <a href="{{ route('backend.account.security') }}" class="dropdown-item">
                    <i class="fas fa-lock me-2"></i>Security
                </a>
                
                <div class="dropdown-divider"></div>
                
                <!-- Logout -->
                <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i>Log Out
                </a>
            </div>
        </div>

    </div>
</div>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
// Copy to clipboard function
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show toast or alert
        if (typeof toastr !== 'undefined') {
            toastr.success('UID copied to clipboard!');
        } else {
            alert('UID copied to clipboard!');
        }
    }).catch(function(err) {
        console.error('Could not copy text: ', err);
    });
}

// Theme toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('checkbox');
    
    // Initialize theme based on saved preference
    const savedTheme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-bs-theme', savedTheme);
    document.body.className = savedTheme === 'dark' ? 'crypt-dark' : 'crypt-light';
    checkbox.checked = savedTheme === 'dark';
    
    // Handle theme toggle
    checkbox.addEventListener('change', function() {
        const newTheme = checkbox.checked ? 'dark' : 'light';
        document.documentElement.setAttribute('data-bs-theme', newTheme);
        document.body.className = newTheme === 'dark' ? 'crypt-dark' : 'crypt-light';
        localStorage.setItem('theme', newTheme);
        
        // Update logo visibility based on theme
        const logoDark = document.querySelectorAll('.crypt-logo.dark');
        const logoLight = document.querySelectorAll('.crypt-logo.light');
        
        if (newTheme === 'dark') {
            logoDark.forEach(el => el.style.display = 'block');
            logoLight.forEach(el => el.style.display = 'none');
        } else {
            logoDark.forEach(el => el.style.display = 'none');
            logoLight.forEach(el => el.style.display = 'block');
        }
    });
    
    // Initialize logo visibility
    const logoDark = document.querySelectorAll('.crypt-logo.dark');
    const logoLight = document.querySelectorAll('.crypt-logo.light');
    
    if (savedTheme === 'dark') {
        logoDark.forEach(el => el.style.display = 'block');
        logoLight.forEach(el => el.style.display = 'none');
    } else {
        logoDark.forEach(el => el.style.display = 'none');
        logoLight.forEach(el => el.style.display = 'block');
    }
});
</script>