{{-- Modern Sidebar Component --}}
<style>
    .modern-sidebar {
        width: 280px;
        height: 100vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: fixed;
        left: 0;
        top: 0;
        overflow-y: auto;
        z-index: 1000;
        transition: all 0.3s ease;
        padding: 20px 0;
    }

    .modern-sidebar::-webkit-scrollbar {
        width: 4px;
    }

    .modern-sidebar::-webkit-scrollbar-track {
        background: rgba(255,255,255,0.1);
    }

    .modern-sidebar::-webkit-scrollbar-thumb {
        background: rgba(255,255,255,0.3);
        border-radius: 10px;
    }

    .sidebar-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        margin-bottom: 30px;
    }

    .sidebar-logo a {
        color: white;
        text-decoration: none;
        font-size: 24px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .side-wrapper {
        padding: 0 20px;
        margin-bottom: 25px;
    }

    .side-title {
        color: rgba(255,255,255,0.7);
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .side-menu {
        list-style: none;
        padding: 0;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 5px;
        transition: all 0.3s ease;
        position: relative;
    }

    .sidebar-link:hover {
        background: rgba(255,255,255,0.1);
        color: white;
        transform: translateX(5px);
        text-decoration: none;
    }

    .sidebar-link.is-active,
    .sidebar-link.active,
    .active.show-sub {
        background: rgba(255,255,255,0.15);
        color: white;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .sidebar-link.is-active::before,
    .sidebar-link.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 3px;
        height: 20px;
        background: white;
        border-radius: 0 3px 3px 0;
    }

    .sidebar-link svg,
    .sidebar-link i {
        width: 20px;
        height: 20px;
        margin-right: 12px;
        flex-shrink: 0;
        font-size: 18px;
    }

    .sidebar-link span {
        font-size: 14px;
        font-weight: 500;
    }

    .nav-divider {
        height: 1px;
        background: rgba(255,255,255,0.1);
        margin: 20px;
    }

    .br-menu-sub {
        background: rgba(0,0,0,0.1);
        margin: 5px 0;
        border-radius: 8px;
        overflow: hidden;
        max-height: 0;
        transition: max-height 0.3s ease;
        list-style: none;
        padding: 0;
    }

    .show-sub + .br-menu-sub,
    .active.show-sub + .br-menu-sub {
        max-height: 500px;
        padding: 10px 0;
    }

    .br-menu-sub .nav-link {
        display: block;
        padding: 8px 15px 8px 50px;
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        font-size: 13px;
        transition: all 0.3s ease;
        border-radius: 6px;
        margin: 2px 10px;
    }

    .br-menu-sub .nav-link:hover {
        background: rgba(255,255,255,0.05);
        color: white;
        text-decoration: none;
    }

    .br-menu-sub .nav-link.active {
        background: rgba(255,255,255,0.1);
        color: white;
        position: relative;
    }

    .br-menu-sub .nav-link.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 2px;
        height: 15px;
        background: white;
        border-radius: 0 2px 2px 0;
    }

    .menu-item-arrow {
        margin-left: auto;
        transition: transform 0.3s ease;
        font-size: 12px;
    }

    .show-sub .menu-item-arrow {
        transform: rotate(180deg);
    }

    .time-display {
        margin-top: auto;
        padding: 15px 20px;
        text-align: center;
        color: rgba(255,255,255,0.6);
        font-size: 12px;
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    .trade-room-btn {
        background: rgba(255,255,255,0.15);
        color: white;
        padding: 8px 15px;
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        transition: all 0.3s ease;
        margin: 10px 20px;
        display: block;
        text-align: center;
    }

    .trade-room-btn:hover {
        background: rgba(255,255,255,0.25);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .modern-sidebar {
            width: 100%;
            transform: translateX(-100%);
        }

        .modern-sidebar.show {
            transform: translateX(0);
        }
    }
    </style>

    <!-- Modern Sidebar -->
    <div class="modern-sidebar" id="modernSidebar">
        <!-- Brand Logo -->
        <div class="sidebar-logo">
            <a href="{{ url('/') }}" target="_blank">
                <span>{{ setting('site_name', 'CRM') }}</span>
            </a>
        </div>

        <!-- Trade Room Button -->
        <a class="trade-room-btn" target="_blank" href="{{ route('backend.dashboard') }}">
            <i class="fa fa-exchange"></i> Switch to TRADE ROOM
        </a>

        <!-- Main Navigation -->
        <div class="side-wrapper">
            <div class="side-title">Main</div>
            <div class="side-menu">

                <!-- Dashboard -->
                <a class="sidebar-link {{ active('admin.dashboard') }}" href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Leads -->
                @if (check_permission('view-leads,create-leads,update-leads,create-source-leads,create-status-leads,import-leads,assign-manager-leads'))
                <a class="sidebar-link {{ active('admin.users.leads') }}" href="{{ route('admin.users.leads') }}">
                    <i class="fa fa-phone"></i>
                    <span>Leads</span>
                </a>
                @endif

                <!-- Customers -->
                @if (check_permission('view-customers,create-customers,update-customers,assign-manager-customers,assign-retention-customers'))
                <a class="sidebar-link {{ active('admin.users.index') }}" href="{{ route('admin.users.index') }}">
                    <i class="fa fa-users"></i>
                    <span>Customers</span>
                </a>
                @endif

                <!-- Roles -->
                @if (check_permission('view-roles,create-roles,update-roles'))
                <a class="sidebar-link {{ active('admin.roles.index') }}" href="{{ route('admin.roles.index') }}">
                    <i class="fa fa-user-circle"></i>
                    <span>Manage Roles</span>
                </a>
                @endif

                <!-- Trading Hours -->
                @if (check_permission('view-trading-hours,edit-trading-hours'))
                <a class="sidebar-link {{ active('admin.trading_hours.index') }}" href="{{ route('admin.trading_hours.index') }}">
                    <i class="fa fa-clock-o"></i>
                    <span>Trading Hours</span>
                </a>
                @endif

                <!-- Active Customers -->
                @if (check_permission('view-active-customers,create-active-customers,update-active-customersm,assign-manager-active-customers,assign-retention-active-customers,set-active-users-as-free,set-active-users-as-archieve'))
                <a class="sidebar-link {{ active('admin.users.activ-users') }}" href="{{ route('admin.users.activ-users') }}">
                    <i class="fa fa-user-plus"></i>
                    <span>Active Customers</span>
                </a>
                @endif

                <!-- Archive Customers -->
                @if (check_permission('view-archieve-customers,create-archieve-customers,update-archieve-customers,assign-manager-archieve-customers,assign-retention-archieve-customers,set-archieve-users-as-free,set-archieve-users-as-active'))
                <a class="sidebar-link {{ active('admin.users.archieve-users') }}" href="{{ route('admin.users.archieve-users') }}">
                    <i class="fa fa-archive"></i>
                    <span>Archive Customers</span>
                </a>
                @endif

                <!-- Assets -->
                @if (check_permission('view-assets,create-currency-pair,update-currency-pair,delete-currency-pair,update-leverage,update-buy,update-sell'))
                <a class="sidebar-link {{ active('admin.currencies.index') }}" href="{{ route('admin.currencies.index') }}">
                    <i class="fa fa-list-ul"></i>
                    <span>Assets</span>
                </a>
                @endif

                <!-- Conversion Agents -->
                @if(check_permission('view-conversion-agents,create-manager,assign-user-to-manager,update-manager,delete-manager,login-as-manager'))
                <a class="sidebar-link {{ active('admin.users.managers') }}" href="{{ route('admin.users.managers') }}">
                    <i class="fa fa-user-md"></i>
                    <span>Conversion Agents</span>
                </a>
                @endif

                <!-- Retention Agents -->
                @if(check_permission('view-retention-agents,create-retention,update-retention,delete-retention,login-as-retention'))
                <a class="sidebar-link {{ active('admin.users.retentions') }}" href="{{ route('admin.users.retentions') }}">
                    <i class="fa fa-user-circle-o"></i>
                    <span>Retention Agents</span>
                </a>
                @endif

                <!-- Admins -->
                @if(check_permission('view-admins,create-admin,update-admin,delete-admin,login-as-admin'))
                <a class="sidebar-link {{ active('admin.users.admins') }}" href="{{ route('admin.users.admins') }}">
                    <i class="fa fa-universal-access"></i>
                    <span>Admins</span>
                </a>
                @endif

            </div>
        </div>

        <!-- Packages & Investments -->
        @if (check_permission('view-packages'))
        <div class="side-wrapper">
            <div class="side-title">Trading</div>
            <div class="side-menu">

                @if (setting('invest'))
                <!-- Packages -->
                <a class="sidebar-link {{ active('admin.packages.index') }}" href="{{ route('admin.packages.index') }}">
                    <i class="fa fa-shopping-bag"></i>
                    <span>Packages</span>
                </a>

                <!-- Investments -->
                <a class="sidebar-link {{ active('admin.investments') }}" href="{{ route('admin.investments') }}">
                    <i class="fa fa-money"></i>
                    <span>Investments</span>
                </a>
                @endif

            </div>
        </div>
        @endif

        <!-- Activities -->
        @if(check_permission('view-recent-login,view-recent-trade,update-recent-trade_delete-recent-trade,view-transaction,delete-transaction'))
        <div class="side-wrapper">
            <div class="side-title">Activities</div>
            <div class="side-menu">

                <a class="sidebar-link {{ active(['admin.users.active.plans','admin.trades.*'], 'show-sub') }}" href="#" onclick="toggleSubmenu(this, event)">
                    <i class="fa fa-fire"></i>
                    <span>Activities</span>
                    <span class="menu-item-arrow">▼</span>
                </a>
                <ul class="br-menu-sub">
                    @if(check_permission('view-recent-trade'))
                    <li class="nav-item">
                        <a href="{{route('admin.all.trades')}}" class="nav-link {{ active('admin.all.trades') }}">
                            Recent Trades
                        </a>
                    </li>
                    @endif
                    @if(check_permission('view-transaction'))
                    <li class="nav-item">
                        <a href="{{ route('admin.transactions') }}" class="nav-link {{ active('admin.transactions') }}">
                            Transactions
                        </a>
                    </li>
                    @endif
                </ul>

            </div>
        </div>
        @endif

        <!-- Certificates -->
        @if (check_permission('view-recent-login,view-recent-trade,update-recent-trade_delete-recent-trade,view-transaction,delete-transaction'))
        <div class="side-wrapper">
            <div class="side-title">Certificates</div>
            <div class="side-menu">

                <a class="sidebar-link {{ active(['admin.certification.*'], 'show-sub') }}" href="#" onclick="toggleSubmenu(this, event)">
                    <i class="fa fa-certificate"></i>
                    <span>Certificates</span>
                    <span class="menu-item-arrow">▼</span>
                </a>
                <ul class="br-menu-sub">
                    @if (check_permission('view-recent-trade'))
                    <li class="nav-item">
                        <a href="{{ route('admin.certification.index') }}" class="nav-link {{ active('admin.certification.index') }}">
                            Certificates
                        </a>
                    </li>
                    @endif
                    @if (check_permission('view-transaction'))
                    <li class="nav-item">
                        <a href="{{ route('admin.certification.requests') }}" class="nav-link {{ active('admin.certification.requests') }}">
                            Requests
                        </a>
                    </li>
                    @endif
                </ul>

            </div>
        </div>
        @endif

        <div class="nav-divider"></div>

        <!-- Settings -->
        @if (check_permission('view-settings,update-settings'))
        <div class="side-wrapper">
            <div class="side-title">Configuration</div>
            <div class="side-menu">

                <a class="sidebar-link {{ active(['admin.settings.*','admin.overnights','admin.margin.call'], 'show-sub') }}" href="#" onclick="toggleSubmenu(this, event)">
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                    <span class="menu-item-arrow">▼</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="nav-item">
                        <a href="{{ route('admin.overnights') }}" class="nav-link {{ active('admin.overnights') }}">
                            Overnight Commissions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.fees') }}" class="nav-link {{ active('admin.settings.fees') }}">
                            Fees Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.site_settings') }}" class="nav-link {{ active('admin.settings.site_settings') }}">
                            Site Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.margin.call') }}" class="nav-link {{ active('admin.margin.call') }}">
                            Margin Call
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.withdrawals') }}" class="nav-link {{ active('admin.settings.withdrawals') }}">
                            User Withdrawal Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.payment_methods') }}" class="nav-link {{ active('admin.settings.payment_methods') }}">
                            Payment Methods
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.p_methods.index') }}" class="nav-link {{ active('admin.p_methods.*') }}">
                            Crypto Payment Methods
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.c_payment') }}" class="nav-link {{ active('admin.settings.c_payment') }}">
                            Custom Payment Link
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.lead.config') }}" class="nav-link {{ active('admin.settings.lead.config') }}">
                            Lead Config
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        @endif

        <!-- Dev Settings -->
        @if (check_permission('view-dev-settings,update-dev-settings'))
        <div class="side-wrapper">
            <div class="side-menu">

                <a class="sidebar-link {{ active(['admin.settings.*'], 'show-sub') }}" href="#" onclick="toggleSubmenu(this, event)">
                    <i class="fa fa-code"></i>
                    <span>Dev Settings</span>
                    <span class="menu-item-arrow">▼</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.smtp') }}" class="nav-link {{ active('admin.settings.smtp') }}">
                            SMTP Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.crm') }}" class="nav-link {{ active('admin.settings.crm') }}">
                            CRM Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.modules') }}" class="nav-link {{ active('admin.settings.modules') }}">
                            Modules Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ active('admin.settings.index') }}">
                            General Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.mails') }}" class="nav-link {{ active('admin.settings.mails') }}">
                            Mail Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.apis') }}" class="nav-link {{ active('admin.settings.apis') }}">
                            APIs Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.pages') }}" class="nav-link {{ active('admin.settings.pages') }}">
                            Pages Setting
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        @endif

        <div class="nav-divider"></div>

        <!-- Logout -->
        <div class="side-wrapper">
            <div class="side-menu">
                <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <!-- Time Display -->
        <div class="time-display">
            {!! \Carbon\Carbon::now()->toDateTimeString() !!}
        </div>
    </div>

    <script>
    function toggleSubmenu(element, event) {
        event.preventDefault();

        // Toggle current submenu
        element.classList.toggle('show-sub');

        // Close other submenus
        const allLinks = document.querySelectorAll('.sidebar-link');
        allLinks.forEach(link => {
            if (link !== element && link.classList.contains('show-sub')) {
                link.classList.remove('show-sub');
            }
        });
    }

    // Auto-expand active submenu on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Find active submenu item
        const activeSubmenuLink = document.querySelector('.br-menu-sub .nav-link.active');
        if (activeSubmenuLink) {
            // Find parent sidebar link
            const parentWrapper = activeSubmenuLink.closest('.side-wrapper');
            if (parentWrapper) {
                const parentLink = parentWrapper.querySelector('.sidebar-link');
                if (parentLink) {
                    parentLink.classList.add('show-sub');
                }
            }
        }

        // Handle mobile menu toggle
        const mobileToggle = document.getElementById('btnLeftMenuMobile');
        const sidebar = document.getElementById('modernSidebar');

        if (mobileToggle && sidebar) {
            mobileToggle.addEventListener('click', function(e) {
                e.preventDefault();
                sidebar.classList.toggle('show');
            });
        }
    });
    </script>

    {{-- Hidden logout form --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
