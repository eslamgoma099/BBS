<!-- Crypt Header - Exact Match to Original Design -->
<header class="crypt-header">
    <div class="header-inner">
        <!-- Left Section: Logo -->
        <div class="header-left">
            <!-- Mobile Sidebar Toggle -->
            <button class="mobile-toggle d-md-none" id="sidebar-mobile-toggle">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
            
            <!-- Logo -->
            <a href="{{ setting('site_info_url', '/') }}" class="crypt-logo">
                <img class="logo-light" src="{{ setting('logo', '/asset/images/logosm.png') }}" alt="Crypt Logo">
                <img class="logo-dark" src="{{ setting('logo_dark', '/asset/images/logosm.png') }}" alt="Crypt Logo Dark">
            </a>
        </div>

        <!-- Center Section: Search -->
        <div class="header-center">
            <div class="search-container">
                <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 21L16.514 16.506L21 21ZM19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <input type="text" class="search-input" placeholder="Search coins, pairs...">
            </div>
        </div>

        <!-- Right Section: User Controls -->
        <div class="header-right">
            <!-- Assets Dropdown -->
            <div class="header-dropdown">
                <button class="header-nav-btn" data-dropdown="assets">
                    Assets
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="dropdown-menu" id="assets-dropdown">
                    <div class="dropdown-header">
                        <div class="balance-overview">
                            <div class="balance-amount encrypted">
                                ${{ number_format(auth()->user()->balance, 2) }}
                            </div>
                            <div class="balance-currency">
                                <select class="currency-select">
                                    <option selected>USDT</option>
                                    <option value="BTC">BTC</option>
                                    <option value="ETH">ETH</option>
                                    <option value="BNB">BNB</option>
                                </select>
                            </div>
                        </div>
                        <div class="balance-usd encrypted">≈ ${{ number_format(auth()->user()->balance, 2) }} USDT</div>
                    </div>
                    <div class="dropdown-links">
                        <a href="{{ route('backend.dashboard') }}" class="dropdown-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2L13.09 8.26L22 9L13.09 9.74L12 16L10.91 9.74L2 9L10.91 8.26L12 2Z"/>
                            </svg>
                            Overview
                        </a>
                        @if (setting('trade'))
                        <a href="{{ route('backend.tradestation') }}" class="dropdown-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M16 6L18.29 8.29L13.41 13.17L9.41 9.17L2 16.59L3.41 18L9.41 12L13.41 16L19.71 9.71L22 12V6H16Z"/>
                            </svg>
                            Spot Trading
                        </a>
                        @endif
                        @if (setting('invest'))
                        <a href="{{ route('backend.investments') }}" class="dropdown-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2L15.09 8.26L22 9L15.09 9.74L12 16L8.91 9.74L2 9L8.91 8.26L12 2Z"/>
                            </svg>
                            Earn
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Orders Dropdown -->
            <div class="header-dropdown">
                <button class="header-nav-btn" data-dropdown="orders">
                    Orders
                    @php
                        $openOrdersCount = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->count();
                    @endphp
                    @if($openOrdersCount > 0)
                        <span class="notification-badge">{{ $openOrdersCount }}</span>
                    @endif
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="dropdown-menu" id="orders-dropdown">
                    <div class="dropdown-links">
                        @if($openOrdersCount > 0)
                            @php
                                $recentOrders = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->take(3)->get();
                            @endphp
                            @foreach($recentOrders as $order)
                            <a href="{{ route('backend.trades.index') }}" class="dropdown-link">
                                {{ $order->pair ?? 'BTC/USDT' }} - {{ $order->type ?? 'BUY' }}
                            </a>
                            @endforeach
                            <div class="dropdown-divider"></div>
                        @else
                            <div class="dropdown-text">No open orders</div>
                        @endif
                        <a href="{{ route('backend.trades.index') }}" class="dropdown-link">View All Orders</a>
                        <a href="{{ route('backend.transactions') }}" class="dropdown-link">Trade History</a>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div class="notifications-btn">
                <button class="header-icon-btn" data-dropdown="notifications">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 8A6 6 0 0 0 6 8C6 15 3 17 3 17H21C21 17 18 15 18 8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.73 21C13.5542 21.3031 13.3019 21.5547 12.9982 21.7295C12.6946 21.9044 12.3504 21.9965 12 21.9965C11.6496 21.9965 11.3054 21.9044 11.0018 21.7295C10.6982 21.5547 10.4458 21.3031 10.27 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="notification-badge">3</span>
                </button>
            </div>

            <!-- Theme Toggle -->
            <div class="theme-toggle">
                <button class="header-icon-btn theme-toggle-btn" id="themeToggle">
                    <!-- Sun Icon (Light Mode) -->
                    <svg class="theme-icon sun-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/>
                        <path d="M12 1V3M12 21V23M4.22 4.22L5.64 5.64M18.36 18.36L19.78 19.78M1 12H3M21 12H23M4.22 19.78L5.64 18.36M18.36 5.64L19.78 4.22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <!-- Moon Icon (Dark Mode) -->
                    <svg class="theme-icon moon-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3A7 7 0 0 0 21 12.79Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>

            <!-- Add Funds Button -->
            <div class="add-funds-btn">
                <button class="crypt-btn crypt-btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
                    Add Funds
                </button>
            </div>

            <!-- User Profile -->
            <div class="user-profile">
                <button class="user-avatar" data-dropdown="user">
                    <img src="{{ auth()->user()->avatar ?? '/asset/images/user.png' }}" alt="{{ auth()->user()->first_name }}">
                </button>
                
                <!-- User Dropdown Menu -->
                <div class="dropdown-menu user-dropdown-menu" id="user-dropdown">
                    <!-- User Summary -->
                    <div class="user-summary">
                        <img src="{{ auth()->user()->avatar ?? '/asset/images/user.png' }}" alt="Avatar" class="user-avatar-large">
                        <div class="user-info">
                            <div class="user-email">{{ substr(auth()->user()->email, 0, 2) }}***@{{ substr(strstr(auth()->user()->email, '@'), 1) }}</div>
                            <div class="user-uid">
                                <span>UID: {{ auth()->user()->id }}</span>
                                <button class="copy-uid" onclick="copyToClipboard('{{ auth()->user()->id }}')">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M16 1H4C2.9 1 2 1.9 2 3V17H4V3H16V1ZM19 5H8C6.9 5 6 5.9 6 7V21C6 22.1 6.9 23 8 23H19C20.1 23 21 22.1 21 21V7C21 5.9 20.1 5 19 5ZM19 21H8V7H19V21Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button class="btn-add-funds-small" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
                            Add Funds
                        </button>
                    </div>
                    
                    <!-- Navigation Links -->
                    <div class="user-nav-links">
                        <a href="{{ route('backend.dashboard') }}" class="user-nav-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M3 13H11V3H3V13ZM3 21H11V15H3V21ZM13 21H21V11H13V21ZM13 3V9H21V3H13Z"/>
                            </svg>
                            Dashboard
                        </a>
                        <a href="{{ route('backend.profile.edit') }}" class="user-nav-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 12C14.21 12 16 10.21 16 8S14.21 4 12 4 8 5.79 8 8 9.79 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"/>
                            </svg>
                            My Asset
                        </a>
                        <a href="{{ route('backend.transactions') }}" class="user-nav-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.89 22 5.99 22H18C19.1 22 20 21.1 20 20V8L14 2ZM18 20H6V4H13V9H18V20Z"/>
                            </svg>
                            My Orders
                        </a>
                        <a href="{{ route('backend.transactions') }}" class="user-nav-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM9 17H7V10H9V17ZM13 17H11V7H13V17ZM17 17H15V13H17V17Z"/>
                            </svg>
                            Export History
                        </a>
                        
                        <!-- Identity Verification -->
                        <a href="{{ route('backend.profile.upload.id') }}" class="user-nav-link verification-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 1L3 5V11C3 16.55 6.84 21.74 12 23C17.16 21.74 21 16.55 21 11V5L12 1ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z"/>
                            </svg>
                            Identity Verification
                            <span class="verification-badge {{ auth()->user()->identity->status === 'approved' ? 'verified' : 'pending' }}">
                                {{ auth()->user()->identity->status === 'approved' ? 'Verified' : 'Pending' }}
                            </span>
                        </a>
                        
                        <!-- Divider -->
                        <div class="dropdown-divider"></div>
                        
                        <!-- Settings Links -->
                        <a href="{{ route('backend.profile.edit') }}" class="user-nav-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19.14 12.94C19.18 12.64 19.2 12.33 19.2 12S19.18 11.36 19.14 11.06L21.16 9.48C21.34 9.34 21.39 9.07 21.28 8.87L19.36 5.55C19.24 5.33 18.99 5.26 18.77 5.33L16.38 6.29C15.88 5.91 15.35 5.59 14.76 5.35L14.4 2.81C14.36 2.57 14.16 2.4 13.91 2.4H10.09C9.84 2.4 9.64 2.57 9.6 2.81L9.24 5.35C8.65 5.59 8.12 5.92 7.62 6.29L5.23 5.33C5.01 5.26 4.76 5.33 4.64 5.55L2.72 8.87C2.61 9.07 2.66 9.34 2.84 9.48L4.86 11.06C4.82 11.36 4.8 11.69 4.8 12S4.82 12.64 4.86 12.94L2.84 14.52C2.66 14.66 2.61 14.93 2.72 15.13L4.64 18.45C4.76 18.67 5.01 18.74 5.23 18.67L7.62 17.71C8.12 18.09 8.65 18.41 9.24 18.65L9.6 21.19C9.64 21.43 9.84 21.6 10.09 21.6H13.91C14.16 21.6 14.36 21.43 14.4 21.19L14.76 18.65C15.35 18.41 15.88 18.09 16.38 17.71L18.77 18.67C18.99 18.74 19.24 18.67 19.36 18.45L21.28 15.13C21.39 14.93 21.34 14.66 21.16 14.52L19.14 12.94ZM12 15.6C10.02 15.6 8.4 13.98 8.4 12S10.02 8.4 12 8.4S15.6 10.02 15.6 12S13.98 15.6 12 15.6Z"/>
                            </svg>
                            Account Settings
                        </a>
                        <a href="{{ route('backend.account.security') }}" class="user-nav-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 1L3 5V11C3 16.55 6.84 21.74 12 23C17.16 21.74 21 16.55 21 11V5L12 1ZM12 7C13.1 7 14 7.9 14 9S13.1 11 12 11 10 10.1 10 9 10.9 7 12 7ZM12 19C10.31 19 8.77 18.1 7.89 16.64C8.1 15.69 10.98 15.2 12 15.2S15.9 15.69 16.11 16.64C15.23 18.1 13.69 19 12 19Z"/>
                            </svg>
                            Security
                        </a>
                        <a href="#" class="user-nav-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9.4 16.6L4.8 12L3.4 13.4L9.4 19.4L20.6 8.2L19.2 6.8L9.4 16.6Z"/>
                            </svg>
                            API Management
                        </a>
                        <a href="#" class="user-nav-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2L13.09 8.26L22 9L13.09 9.74L12 16L10.91 9.74L2 9L10.91 8.26L12 2Z"/>
                            </svg>
                            Reward Hub
                        </a>
                        
                        <!-- Logout -->
                        <div class="dropdown-divider"></div>
                        <a href="#" class="user-nav-link logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17 7L15.59 8.41L18.17 11H8V13H18.17L15.59 15.59L17 17L22 12L17 7ZM4 5H12V3H4C2.9 3 2 3.9 2 5V19C2 20.1 2.9 21 4 21H12V19H4V5Z"/>
                            </svg>
                            Log Out
                        </a>
                    </div>
                    
                    <!-- CTA Sections -->
                    <div class="user-cta-section">
                        <div class="cta-item">
                            <span>Invite Friends — 20% commissions</span>
                            <button class="cta-btn">Invite</button>
                        </div>
                        <div class="cta-item">
                            <span>Crypt Affiliate Programs — up to 60%</span>
                            <button class="cta-btn">Apply now</button>
                        </div>
                    </div>
                    
                    <!-- Notifications -->
                    <div class="user-notifications">
                        <div class="notifications-header">
                            <span>Notifications</span>
                            <span class="notification-count">3</span>
                        </div>
                        <div class="notification-item">
                            <span class="notification-text">Account Login — You have logged in your account from Windows Chrome 130.</span>
                            <span class="notification-time">2 hours ago</span>
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
