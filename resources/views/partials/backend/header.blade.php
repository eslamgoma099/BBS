<!-- New Crypt Theme Header -->
<header class="crypt-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- Left Section: Logo -->
            <div class="col-auto">
                <!-- Mobile Sidebar Toggle -->
                <button class="btn btn-dark d-md-none me-2" id="sidebar-mobile-toggle">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
                
                <!-- Logo -->
                <a href="{{ setting('site_info_url', '/') }}" class="crypt-logo d-flex align-items-center">
                    <img class="light" src="{{ setting('logo', '/asset/images/logosm.png') }}" alt="Crypt Logo" style="height: 32px;">
                    <img class="dark" src="{{ setting('logo_dark', '/asset/images/logosm.png') }}" alt="Crypt Logo Dark" style="height: 32px;">
                </a>
            </div>

            <!-- Center Section: Search -->
            <div class="col">
                <div class="d-flex justify-content-center">
                    <div class="search-container position-relative" style="width: 100%; max-width: 400px;">
                        <input type="text" class="search-input form-control" placeholder="Search coins, pairs..." style="padding-left: 40px;">
                        <svg class="position-absolute top-50 translate-middle-y ms-2" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="left: 12px;">
                            <path d="M21 21L16.514 16.506L21 21ZM19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Right Section: User Controls -->
            <div class="col-auto">
                <div class="d-flex align-items-center gap-3">
                    <!-- Assets Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Assets
                        </button>
                        <div class="dropdown-menu dropdown-menu-dark">
                            <div class="dropdown-header px-3 py-2">
                                <div class="fw-bold text-light">${{ number_format(auth()->user()->balance, 2) }}</div>
                                <small class="text-muted">≈ ${{ number_format(auth()->user()->balance, 2) }} USDT</small>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('backend.dashboard') }}" class="dropdown-item">
                                <i class="fas fa-chart-line me-2"></i>Overview
                            </a>
                            @if (setting('trade'))
                            <a href="{{ route('backend.tradestation') }}" class="dropdown-item">
                                <i class="fas fa-exchange-alt me-2"></i>Spot Trading
                            </a>
                            @endif
                            @if (setting('invest'))
                            <a href="{{ route('backend.investments') }}" class="dropdown-item">
                                <i class="fas fa-coins me-2"></i>Earn
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Orders Dropdown -->
                    <div class="dropdown position-relative">
                        @php
                            $openOrdersCount = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->count();
                        @endphp
                        <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Orders
                            @if($openOrdersCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                                    {{ $openOrdersCount }}
                                </span>
                            @endif
                        </button>
                        <div class="dropdown-menu dropdown-menu-dark">
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
                    <div class="dropdown position-relative">
                        <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                                3
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-dark">
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
                    <button class="controller btn btn-dark" id="themeToggle">
                        <!-- Sun Icon (Light Mode) -->
                        <svg class="theme-icon sun-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 1V3M12 21V23M4.22 4.22L5.64 5.64M18.36 18.36L19.78 19.78M1 12H3M21 12H23M4.22 19.78L5.64 18.36M18.36 5.64L19.78 4.22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <!-- Moon Icon (Dark Mode) -->
                        <svg class="theme-icon moon-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3A7 7 0 0 0 21 12.79Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <!-- Add Funds Button -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
                        Add Funds
                    </button>

                    <!-- User Profile -->
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ auth()->user()->avatar ?? '/asset/images/user.png' }}" alt="{{ auth()->user()->first_name }}" class="rounded-circle me-2" style="width: 32px; height: 32px; object-fit: cover;">
                            <span class="d-none d-md-inline">{{ auth()->user()->first_name }}</span>
                        </button>
                        
                        <!-- User Dropdown Menu -->
                        <div class="dropdown-menu dropdown-menu-dark dropdown-menu-end" style="width: 300px;">
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
                            <a href="{{ route('backend.transactions') }}" class="dropdown-item">
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
        </div>
    </div>
</header>

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
    const themeToggle = document.getElementById('themeToggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-bs-theme', newTheme);
            document.body.className = newTheme === 'dark' ? 'crypt-dark' : 'crypt-light';
            localStorage.setItem('theme', newTheme);
            
            // Update theme icons
            const sunIcon = document.querySelector('.sun-icon');
            const moonIcon = document.querySelector('.moon-icon');
            if (newTheme === 'dark') {
                sunIcon.style.display = 'none';
                moonIcon.style.display = 'block';
            } else {
                sunIcon.style.display = 'block';
                moonIcon.style.display = 'none';
            }
        });
        
        // Initialize theme icons
        const currentTheme = document.documentElement.getAttribute('data-bs-theme') || 'dark';
        const sunIcon = document.querySelector('.sun-icon');
        const moonIcon = document.querySelector('.moon-icon');
        if (currentTheme === 'dark') {
            sunIcon.style.display = 'none';
            moonIcon.style.display = 'block';
        } else {
            sunIcon.style.display = 'block';
            moonIcon.style.display = 'none';
        }
    }
});
</script>