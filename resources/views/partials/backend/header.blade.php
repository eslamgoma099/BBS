<div class="header d-flex align-items-center new-crypt-header">
    <!-- Mobile Toggle Button -->
    {{-- <span id="sidebar-mobile-toggle" class="mobile-toggle-btn">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            <path d="M4 12H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            <path d="M4 6H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </span>

    <!-- Logo -->
    <div class="crypt-logo logo-m">
        <a href="{{ env('SITE_URL') }}">
            <img src="{{ setting('logo','asset/images/logosm.png') }}" alt="logo" class="header-logo-new">
        </a>
    </div> --}}

    <!-- Collapse Button (Important) -->
    <div class="collapse-btn">
        <span id="sidebar-collapse">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.25 7.81V16.19C21.25 17.8608 20.7549 19.1045 19.9297 19.9297C19.1045 20.7549 17.8608 21.25 16.19 21.25H9.75V2.75H16.19C17.8608 2.75 19.1045 3.24514 19.9297 4.07033C20.7549 4.89552 21.25 6.13915 21.25 7.81Z" stroke="currentColor" stroke-width="1.5"></path>
                <path d="M9 2V22H7.81C4.17 22 2 19.83 2 16.19V7.81C2 4.17 4.17 2 7.81 2H9Z" fill="currentColor"></path>
            </svg>
        </span>
    </div>

    <!-- Search -->
    <div class="header-center">
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input form-control" placeholder="Search coins, pairs..." v-model="searchQuery">
        </div>
    </div>

    <div class="user-settings gap-2 gap-sm-3">
        <!-- Assets Dropdown -->
        <div class="header-dropdown disable-sm-screen" id="assets-dropdown">
            <button class="dropdown-trigger" onclick="toggleDropdown('assets')">
                {{-- <i class="fas fa-wallet"></i> --}}
                <span>Assets</span>
                <span class="balance-display">${{ number_format(auth()->user()->balance, 2) }}</span>
                <i class="fas fa-chevron-down dropdown-arrow"></i>
            </button>

            <div class="dropdown-menu assets-dropdown">
                <div class="dropdown-header">
                    <h4>My Assets</h4>
                    <button class="close-dropdown" onclick="closeDropdown()">×</button>
                </div>

                <div class="assets-summary">
                    <div class="total-balance">
                        <span class="label">Total Balance</span>
                        <span class="amount encrypted">${{ number_format(auth()->user()->balance, 2) }}</span>
                    </div>
                    <div class="balance-change positive">
                        <span>+2.45%</span>
                        <span>24h</span>
                    </div>
                </div>

                <div class="assets-list">
                    <div class="asset-item">
                        <div class="asset-logo-placeholder">BTC</div>
                        <div class="asset-info">
                            <span class="asset-symbol">Bitcoin</span>
                            <span class="asset-amount">{{ number_format(auth()->user()->balance * 0.6 / 45000, 6) }}</span>
                        </div>
                        <div class="asset-value">
                            <span class="usd-value">${{ number_format(auth()->user()->balance * 0.6, 2) }}</span>
                            <span class="change positive">+2.45%</span>
                        </div>
                    </div>
                    <div class="asset-item">
                        <div class="asset-logo-placeholder eth">ETH</div>
                        <div class="asset-info">
                            <span class="asset-symbol">Ethereum</span>
                            <span class="asset-amount">{{ number_format(auth()->user()->balance * 0.3 / 3000, 6) }}</span>
                        </div>
                        <div class="asset-value">
                            <span class="usd-value">${{ number_format(auth()->user()->balance * 0.3, 2) }}</span>
                            <span class="change negative">-1.23%</span>
                        </div>
                    </div>
                    <div class="asset-item">
                        <div class="asset-logo-placeholder usdt">USDT</div>
                        <div class="asset-info">
                            <span class="asset-symbol">Tether</span>
                            <span class="asset-amount encrypted">{{ number_format(auth()->user()->bonus, 2) }}</span>
                        </div>
                        <div class="asset-value">
                            <span class="usd-value">${{ number_format(auth()->user()->bonus, 2) }}</span>
                            <span class="change">+0.01%</span>
                        </div>
                    </div>
                </div>

                <div class="dropdown-actions">
                    <a href="{{ route('backend.dashboard') }}" class="action-btn primary">View All Assets</a>
                    <button class="action-btn secondary" data-toggle="modal" data-target=".bd-example-modal-lg">Deposit</button>
                </div>
            </div>
        </div>

        <!-- Orders Dropdown -->
        <div class="header-dropdown disable-sm-screen" id="orders-dropdown">
            <button class="dropdown-trigger" onclick="toggleDropdown('orders')">
                {{-- <i class="fas fa-list-alt"></i> --}}
                <span>Orders</span>
                @php
                    $openOrdersCount = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->count();
                @endphp
                @if($openOrdersCount > 0)
                    <span class="notification-badge">{{ $openOrdersCount }}</span>
                @endif
                <i class="fas fa-chevron-down dropdown-arrow"></i>
            </button>

            <div class="dropdown-menu orders-dropdown">
                <div class="dropdown-header">
                    <h4>Recent Orders</h4>
                    <button class="close-dropdown" onclick="closeDropdown()">×</button>
                </div>

                <div class="orders-tabs">
                    <button class="tab-btn active" onclick="switchOrderTab(this, 'open')">
                        Open ({{ $openOrdersCount }})
                    </button>
                    <button class="tab-btn" onclick="switchOrderTab(this, 'recent')">
                        Recent
                    </button>
                </div>

                <div class="orders-list">
                    @if($openOrdersCount > 0)
                        @php
                            $recentOrders = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->take(3)->get();
                        @endphp
                        @foreach($recentOrders as $order)
                        <div class="order-item">
                            <div class="order-pair">
                                <span class="pair-name">{{ $order->pair ?? 'BTC/USDT' }}</span>
                                <span class="order-type {{ strtolower($order->type ?? 'buy') }}">{{ $order->type ?? 'BUY' }}</span>
                            </div>
                            <div class="order-details">
                                <div class="price-amount">
                                    <span class="price">${{ number_format($order->amount ?? 45250, 2) }}</span>
                                    <span class="amount">{{ $order->lot_size ?? '0.5' }}</span>
                                </div>
                                <div class="order-status">
                                    <span class="status open">Open</span>
                                    <span class="time">{{ $order->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="no-orders">
                            <p>No open orders</p>
                        </div>
                    @endif
                </div>

                <div class="dropdown-actions">
                    <a href="{{ route('backend.trades.index') }}" class="action-btn primary">View All Orders</a>
                    <a href="{{ route('backend.transactions') }}" class="action-btn secondary">Trade History</a>
                </div>
            </div>
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

        <!-- Notifications -->
        <div class="header-dropdown" id="notifications-dropdown">
            <button class="dropdown-trigger notification-btn" onclick="toggleDropdown('notifications')">
                <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                </svg>
                <div class="notification-badge-new"></div>
            </button>

            <div class="dropdown-menu notifications-dropdown">
                <div class="dropdown-header">
                    <h4>Notifications</h4>
                    <button class="mark-all-read" onclick="markAllAsRead()">Mark all as read</button>
                </div>

                <div class="notifications-list">
                    <div class="notification-item unread">
                        <div class="notification-icon trade">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="notification-content">
                            <span class="notification-title">Trade Executed</span>
                            <span class="notification-message">Your BTC order has been processed</span>
                            <span class="notification-time">30m ago</span>
                        </div>
                    </div>
                    <div class="notification-item">
                        <div class="notification-icon security">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="notification-content">
                            <span class="notification-title">Security Alert</span>
                            <span class="notification-message">New login from Chrome browser</span>
                            <span class="notification-time">1h ago</span>
                        </div>
                    </div>
                </div>

                <div class="dropdown-actions">
                    <a href="#notifications" class="action-btn primary">View All</a>
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <div class="header-dropdown profile-dropdown" id="profile-dropdown">
            <button class="dropdown-trigger profile-trigger" onclick="toggleDropdown('profile')">
                {{-- <img src="{{ auth()->user()->avatar ?? '/images/default-avatar.png' }}" alt="Profile" class="profile-avatar"> --}}
                <span class="profile-name d-none d-sm-inline">{{ auth()->user()->first_name }}</span>
                <i class="fas fa-chevron-down dropdown-arrow"></i>
            </button>

            <div class="dropdown-menu user-profile-menu">
                <div class="profile-header">
                    <img src="{{ auth()->user()->avatar ?? '/images/default-avatar.png' }}" alt="Profile" class="large-avatar">
                    <div class="profile-info">
                        <span class="name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                        <span class="email">{{ substr(auth()->user()->email, 0, 2) }}***@{{ substr(strstr(auth()->user()->email, '@'), 1) }}</span>
                        <span class="level">
                            UID: {{ auth()->user()->id }}
                            <button class="copy-uid-btn" onclick="copyToClipboard('{{ auth()->user()->id }}')" title="Copy UID">
                                <i class="fas fa-copy"></i>
                            </button>
                        </span>
                    </div>
                </div>

                <div class="profile-menu">
                    <a href="{{ route('backend.dashboard') }}" class="menu-item">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('backend.profile.edit') }}" class="menu-item">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                    <a href="{{ route('backend.account.security') }}" class="menu-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Security</span>
                    </a>
                    <a href="{{ route('backend.profile.upload.id') }}" class="menu-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Verification</span>
                        <span class="status-badge {{ auth()->user()->identity->status === 'approved' ? 'verified' : 'pending' }}">
                            {{ auth()->user()->identity->status === 'approved' ? 'Verified' : 'Pending' }}
                        </span>
                    </a>
                    <a href="{{ route('backend.withdraw.select') }}" class="menu-item">
                        <i class="fas fa-money-bill-wave"></i>
                        <span>Withdraw</span>
                    </a>
                    <div class="menu-divider"></div>
                    <a href="#settings" class="menu-item">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                    <a data-toggle="modal" data-target="#update_bassword_model" class="menu-item">
                        <i class="fas fa-key"></i>
                        <span>Change Password</span>
                    </a>
                    <button class="menu-item logout-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Theme Toggle -->
        <div class="theme-controller">
            <button class="theme-toggle-btn" id="darkMode">
                <span class="dark-logo">
                    <svg viewBox="0 0 24 24" width="20" fill="currentColor">
                        <path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/>
                    </svg>
                </span>
                <span class="light-logo">
                    <svg viewBox="0 0 24 24" width="20" fill="currentColor">
                        <path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/>
                    </svg>
                </span>
            </button>
        </div>

        <!-- Deposit Button -->
        <button class="btn btn-primary deposit-btn-new" data-toggle="modal" data-target=".bd-example-modal-lg">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-1">
                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
            </svg>
            DEPOSIT
        </button>
    </div>
</div>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
