<!-- Header Content -->
<!-- Mobile Sidebar Toggle -->
<button class="header-icon d-md-none" id="sidebar-toggle">
    <i class="fas fa-bars"></i>
</button>

<!-- Search Bar -->
<div class="header-search">
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Search" id="global-search">
        <i class="fas fa-search search-icon"></i>
    </div>
</div>

<!-- Navigation Links -->
<nav class="header-nav">
    <!-- Assets Dropdown -->
    <div class="nav-dropdown">
        <a href="#" class="nav-dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Assets
            <i class="fas fa-chevron-down nav-dropdown-icon"></i>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-header px-3 py-2 border-bottom border-secondary">
                <p class="text-muted mb-1 small">Overview</p>
                <div class="d-flex align-items-center gap-2">
                    <h6 class="mb-0 fw-bold">${{ number_format(auth()->user()->balance ?? 0, 2) }}</h6>
                    <select class="form-select form-select-sm" style="width: auto; font-size: 12px;">
                        <option selected>USDT</option>
                        <option value="1">BTC</option>
                        <option value="2">ETH</option>
                        <option value="3">BNB</option>
                    </select>
                </div>
                <p class="text-muted mb-0 small">${{ number_format(auth()->user()->balance ?? 0, 2) }} USDT</p>
            </div>
            <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('backend.dashboard') }}">
                <i class="fas fa-chart-pie me-2"></i>
                Overview
            </a>
            @if (setting('trade'))
            <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('backend.tradestation') }}">
                <i class="fas fa-exchange-alt me-2"></i>
                Spot Trading
            </a>
            @endif
        </div>
    </div>

    <!-- Orders Dropdown -->
    <div class="nav-dropdown">
        @php
            $openOrdersCount = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->count();
        @endphp
        <a href="#" class="nav-dropdown-toggle position-relative" data-bs-toggle="dropdown" aria-expanded="false">
            Orders
            @if($openOrdersCount > 0)
                <span class="icon-badge">{{ $openOrdersCount }}</span>
            @endif
            <i class="fas fa-chevron-down nav-dropdown-icon"></i>
        </a>
        <div class="dropdown-menu">
            @if($openOrdersCount > 0)
                @php
                    $recentOrders = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->take(3)->get();
                @endphp
                <div class="dropdown-header">Recent Orders</div>
                @foreach($recentOrders as $order)
                <a href="{{ route('backend.trades.index') }}" class="dropdown-item py-2">
                    <div class="d-flex justify-content-between">
                        <span>{{ $order->pair ?? 'BTC/USDT' }}</span>
                        <span class="badge bg-{{ $order->type === 'buy' ? 'success' : 'danger' }}">{{ strtoupper($order->type ?? 'BUY') }}</span>
                    </div>
                </a>
                @endforeach
                <div class="dropdown-divider"></div>
            @else
                <span class="dropdown-item-text text-muted">No open orders</span>
                <div class="dropdown-divider"></div>
            @endif
            <a href="{{ route('backend.trades.index') }}" class="dropdown-item py-2">
                <i class="fas fa-list me-2"></i>View All Orders
            </a>
            <a href="{{ route('backend.transactions') }}" class="dropdown-item py-2">
                <i class="fas fa-history me-2"></i>Trade History
            </a>
        </div>
    </div>
</nav>

<!-- Action Items -->
<div class="header-actions">
    <!-- Add Funds Button -->
    <button class="btn-add-funds" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
        Add Funds
    </button>

    <!-- Notifications -->
    <div class="nav-dropdown">
        <a href="#" class="header-icon" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="icon-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <div class="dropdown-header">Notifications</div>
            <a href="#" class="dropdown-item py-2">
                <div class="d-flex flex-column">
                    <span>Account Login from Chrome</span>
                    <small class="text-muted">2 hours ago</small>
                </div>
            </a>
            <a href="#" class="dropdown-item py-2">
                <div class="d-flex flex-column">
                    <span>Security Alert</span>
                    <small class="text-muted">1 day ago</small>
                </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item py-2 text-center">View all notifications</a>
        </div>
    </div>

    <!-- Profile -->
    <div class="nav-dropdown">
        <a href="#" class="header-icon" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="profile-img" 
                 src="{{ auth()->user()->avatar ?? '/asset/images/user.png' }}" 
                 alt="{{ auth()->user()->first_name }}">
        </a>
        <div class="dropdown-menu dropdown-menu-end" style="min-width: 280px;">
            <!-- User Summary -->
            <div class="dropdown-header px-3 py-3">
                <div class="d-flex align-items-center">
                    <img src="{{ auth()->user()->avatar ?? '/asset/images/user.png' }}" 
                         alt="Avatar" 
                         class="profile-img me-3">
                    <div>
                        <div class="fw-bold">{{ substr(auth()->user()->email, 0, 2) }}***@{{ substr(strstr(auth()->user()->email, '@'), 1) }}</div>
                        <div class="text-muted small d-flex align-items-center gap-2">
                            UID: {{ auth()->user()->id }}
                            <button class="btn btn-sm p-0 text-muted" onclick="copyToClipboard('{{ auth()->user()->id }}')">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="dropdown-divider"></div>
            
            <!-- Navigation Links -->
            <a href="{{ route('backend.dashboard') }}" class="dropdown-item py-2">
                <i class="fas fa-tachometer-alt me-3"></i>Dashboard
            </a>
            <a href="{{ route('backend.profile.edit') }}" class="dropdown-item py-2">
                <i class="fas fa-user me-3"></i>My Asset
            </a>
            <a href="{{ route('backend.trades.index') }}" class="dropdown-item py-2">
                <i class="fas fa-list me-3"></i>My Orders
            </a>
            <a href="{{ route('backend.transactions') }}" class="dropdown-item py-2">
                <i class="fas fa-download me-3"></i>Export History
            </a>
            
            <!-- Identity Verification -->
            @if(isset(auth()->user()->identity))
            <a href="{{ route('backend.profile.upload.id') }}" class="dropdown-item py-2 d-flex justify-content-between">
                <span><i class="fas fa-shield-alt me-3"></i>Identity Verification</span>
                <span class="badge {{ auth()->user()->identity->status === 'approved' ? 'bg-success' : 'bg-warning' }}">
                    {{ auth()->user()->identity->status === 'approved' ? 'Verified' : 'Pending' }}
                </span>
            </a>
            @else
            <a href="{{ route('backend.profile.upload.id') }}" class="dropdown-item py-2 d-flex justify-content-between">
                <span><i class="fas fa-shield-alt me-3"></i>Identity Verification</span>
                <span class="badge bg-secondary">Not Started</span>
            </a>
            @endif
            
            <div class="dropdown-divider"></div>
            
            <!-- Settings Links -->
            <a href="{{ route('backend.profile.edit') }}" class="dropdown-item py-2">
                <i class="fas fa-cog me-3"></i>Account Settings
            </a>
            <a href="{{ route('backend.account.security') }}" class="dropdown-item py-2">
                <i class="fas fa-lock me-3"></i>Security
            </a>
            
            <div class="dropdown-divider"></div>
            
            <!-- Logout -->
            <a href="#" class="dropdown-item py-2 text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-3"></i>Log Out
            </a>
        </div>
    </div>

    <!-- Theme Toggle -->
    <button class="header-icon" id="theme-toggle-btn">
        <i class="fas fa-moon" id="theme-icon"></i>
    </button>
</div>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('global-search');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                // Implement global search functionality
                console.log('Search for:', this.value);
                // You can implement actual search logic here
            }
        });
    }

    // Initialize theme icon based on current theme
    const themeIcon = document.getElementById('theme-icon');
    const currentTheme = localStorage.getItem('theme') || 'dark';
    if (themeIcon) {
        themeIcon.className = currentTheme === 'dark' ? 'fas fa-moon' : 'fas fa-sun';
    }

    console.log('Header initialized successfully');
});
</script>