<!-- Header -->
<div class="header d-flex align-items-center justify-content-between px-3 py-2" style="background-color: #1a1a1a; border-bottom: 1px solid #333333; height: 60px;">
    
    <!-- Left Side - Search Bar -->
    <div class="d-flex align-items-center flex-grow-1" style="max-width: 400px;">
        <div class="search-container position-relative w-100">
            <input type="text" 
                   class="form-control search-input" 
                   placeholder="Search" 
                   style="background-color: #2a2a2a; 
                          border: 1px solid #444444; 
                          border-radius: 20px; 
                          color: #ffffff; 
                          padding-left: 40px; 
                          padding-right: 15px; 
                          height: 40px;
                          font-size: 14px;">
            <i class="fas fa-search position-absolute" 
               style="left: 15px; 
                      top: 50%; 
                      transform: translateY(-50%); 
                      color: #888888; 
                      font-size: 14px; 
                      pointer-events: none;"></i>
        </div>
    </div>

    <!-- Center - Navigation Elements -->
    <div class="d-flex align-items-center gap-4">
        <!-- Assets Dropdown -->
        <div class="dropdown">
            <a class="nav-link d-flex align-items-center text-white text-decoration-none" 
               href="#" 
               role="button" 
               data-bs-toggle="dropdown" 
               aria-expanded="false"
               style="font-size: 14px; font-weight: 500; padding: 8px 12px;">
                Assets
                <i class="fas fa-chevron-down ms-2" style="font-size: 10px;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-dark" style="background-color: #2a2a2a; border: 1px solid #444444; border-radius: 8px;">
                <div class="dropdown-header px-3 py-2 border-bottom border-secondary">
                    <p class="text-muted mb-1 small">Overview</p>
                    <div class="d-flex align-items-center gap-2">
                        <h5 class="text-white mb-0 fw-bold">${{ number_format(auth()->user()->balance, 2) }}</h5>
                        <select class="form-select form-select-sm bg-dark border-secondary text-white" style="width: auto;">
                            <option selected>USDT</option>
                            <option value="1">BTC</option>
                            <option value="2">ETH</option>
                            <option value="3">BNB</option>
                        </select>
                    </div>
                    <p class="text-muted mb-0 small">${{ number_format(auth()->user()->balance, 2) }} USDT</p>
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
        <div class="dropdown position-relative">
            @php
                $openOrdersCount = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->count();
            @endphp
            <a class="nav-link d-flex align-items-center text-white text-decoration-none position-relative" 
               href="#" 
               role="button" 
               data-bs-toggle="dropdown" 
               aria-expanded="false"
               style="font-size: 14px; font-weight: 500; padding: 8px 12px;">
                Orders
                @if($openOrdersCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark" style="font-size: 10px;">
                        {{ $openOrdersCount }}
                    </span>
                @endif
                <i class="fas fa-chevron-down ms-2" style="font-size: 10px;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-dark" style="background-color: #2a2a2a; border: 1px solid #444444; border-radius: 8px;">
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
    </div>

    <!-- Right Side - Action Elements -->
    <div class="d-flex align-items-center gap-3">
        <!-- Add Funds Button -->
        <button class="btn btn-warning fw-bold px-3 py-2" 
                data-bs-toggle="modal" 
                data-bs-target=".bd-example-modal-lg"
                style="background-color: #ffd700; 
                       border: none; 
                       border-radius: 6px; 
                       color: #000000; 
                       font-size: 14px; 
                       font-weight: 600;">
            Add Funds
        </button>

        <!-- Notifications -->
        <div class="dropdown">
            <a class="nav-link position-relative d-flex align-items-center justify-content-center" 
               href="#" 
               role="button" 
               data-bs-toggle="dropdown" 
               aria-expanded="false"
               style="width: 40px; height: 40px; border-radius: 50%; background-color: transparent; border: none;">
                <i class="fas fa-bell" style="color: #ffffff; font-size: 16px;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark" style="font-size: 10px;">
                    3
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark" style="background-color: #2a2a2a; border: 1px solid #444444; border-radius: 8px;">
                <div class="dropdown-header">Notifications</div>
                <a href="#" class="dropdown-item py-2">
                    <div class="d-flex flex-column">
                        <span class="text-white">Account Login from Chrome</span>
                        <small class="text-muted">2 hours ago</small>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item py-2 text-center">View all notifications</a>
            </div>
        </div>

        <!-- Profile Icon -->
        <div class="dropdown">
            <a class="nav-link d-flex align-items-center justify-content-center" 
               href="#" 
               role="button" 
               data-bs-toggle="dropdown" 
               aria-expanded="false"
               style="width: 40px; height: 40px; border-radius: 50%; background-color: transparent; border: none;">
                <img class="rounded-circle" 
                     src="{{ auth()->user()->avatar ?? '/asset/images/user.png' }}" 
                     alt="{{ auth()->user()->first_name }}" 
                     style="width: 32px; height: 32px; object-fit: cover; border: 2px solid #444444;">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark" style="background-color: #2a2a2a; border: 1px solid #444444; border-radius: 8px; min-width: 280px;">
                <!-- User Summary -->
                <div class="dropdown-header px-3 py-3">
                    <div class="d-flex align-items-center">
                        <img src="{{ auth()->user()->avatar ?? '/asset/images/user.png' }}" 
                             alt="Avatar" 
                             class="rounded-circle me-3" 
                             style="width: 48px; height: 48px; border: 2px solid #444444;">
                        <div>
                            <div class="fw-bold text-white">{{ substr(auth()->user()->email, 0, 2) }}***@{{ substr(strstr(auth()->user()->email, '@'), 1) }}</div>
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
        <div class="theme-toggle">
            <button class="btn btn-sm d-flex align-items-center justify-content-center" 
                    id="theme-toggle-btn"
                    style="width: 40px; height: 40px; border-radius: 50%; background-color: transparent; border: none;">
                <i class="fas fa-moon" id="theme-icon" style="color: #ffffff; font-size: 16px;"></i>
            </button>
        </div>
    </div>
</div>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<style>
/* Header specific styles */
.header {
    background-color: #1a1a1a !important;
    border-bottom: 1px solid #333333 !important;
}

.header .search-input:focus {
    background-color: #2a2a2a !important;
    border-color: #ffd700 !important;
    box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25) !important;
    color: #ffffff !important;
}

.header .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1) !important;
    border-radius: 6px;
}

.header .btn-warning:hover {
    background-color: #ffed4a !important;
}

.dropdown-menu-dark {
    background-color: #2a2a2a !important;
    border: 1px solid #444444 !important;
}

.dropdown-menu-dark .dropdown-item {
    color: #ffffff !important;
    transition: all 0.2s ease;
}

.dropdown-menu-dark .dropdown-item:hover {
    background-color: #333333 !important;
    color: #ffd700 !important;
}

.dropdown-menu-dark .dropdown-divider {
    border-color: #444444 !important;
}

.dropdown-menu-dark .dropdown-header {
    color: #888888 !important;
    font-weight: 600 !important;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .header {
        padding: 10px 15px !important;
    }
    
    .search-container {
        max-width: 200px !important;
    }
    
    .header .d-flex.gap-4 {
        display: none !important;
    }
    
    .header .d-flex.gap-3 .btn-warning {
        padding: 6px 12px !important;
        font-size: 12px !important;
    }
}

@media (max-width: 576px) {
    .search-container {
        max-width: 150px !important;
    }
    
    .header .d-flex.gap-3 {
        gap: 0.5rem !important;
    }
}
</style>

<script>
// Copy to clipboard function
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show toast or alert
        if (typeof toastr !== 'undefined') {
            toastr.success('UID copied to clipboard!');
        } else {
            // Simple notification
            const notification = document.createElement('div');
            notification.textContent = 'UID copied to clipboard!';
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: #28a745;
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                z-index: 9999;
                font-size: 14px;
            `;
            document.body.appendChild(notification);
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 3000);
        }
    }).catch(function(err) {
        console.error('Could not copy text: ', err);
    });
}

// Theme toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const themeToggleBtn = document.getElementById('theme-toggle-btn');
    const themeIcon = document.getElementById('theme-icon');
    
    // Initialize theme based on saved preference or default to dark
    const savedTheme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-bs-theme', savedTheme);
    document.body.className = savedTheme === 'dark' ? 'crypt-dark' : 'crypt-light';
    
    // Update icon based on current theme
    function updateThemeIcon(theme) {
        if (theme === 'dark') {
            themeIcon.className = 'fas fa-moon';
        } else {
            themeIcon.className = 'fas fa-sun';
        }
    }
    
    updateThemeIcon(savedTheme);
    
    // Handle theme toggle click
    themeToggleBtn.addEventListener('click', function() {
        const currentTheme = localStorage.getItem('theme') || 'dark';
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        document.documentElement.setAttribute('data-bs-theme', newTheme);
        document.body.className = newTheme === 'dark' ? 'crypt-dark' : 'crypt-light';
        localStorage.setItem('theme', newTheme);
        
        updateThemeIcon(newTheme);
        
        // Update logo visibility if logos exist
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
    
    // Search functionality
    const searchInput = document.querySelector('.search-input');
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            // Implement search functionality here
            console.log('Search for:', this.value);
        }
    });
});
</script>