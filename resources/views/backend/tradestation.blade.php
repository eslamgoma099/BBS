<!DOCTYPE html>
<html lang="en">
<head class="crypt-dark">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Exchange - {{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Original Theme CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets1/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets1/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets1/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets1/css/button.css') }}">
    <link rel="icon" type="image/svg" href="{{ asset('assets1/images/favicon.svg') }}">
    
    <!-- Additional Theme CSS to ensure proper loading -->
    <style>
        /* Ensure dark theme is applied correctly */
        body.crypt-dark {
            background-color: #0a0e1a;
            color: #fff;
        }
        
        .sidebar {
            background-color: #141929;
            min-height: 100vh;
        }
        
        .card-bs {
            background-color: #1a202c;
            border: 1px solid #2d3748;
            border-radius: 8px;
        }
        
        /* Ensure sidebar is visible */
        .fixed-sidebar .sidebar {
            width: 280px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
        }
        
        .fixed-sidebar .wrapper {
            margin-left: 280px;
            width: calc(100% - 280px);
        }
        
        /* Mobile responsive */
        @media (max-width: 768px) {
            .fixed-sidebar .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .fixed-sidebar .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .fixed-sidebar .wrapper {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body class="crypt-dark">
    <section class="container-fluid d-sm-flex flex-row fixed-sidebar">
        
        <!-- Sidebar -->
        <aside class="sidebar">
            <!-- Brand Logo -->
            <div class="d-flex align-items-center justify-content-between">
                <div class="justify-content-between disable-sm-screen mt-3">
                    <!-- Logo -->
                    <div class="crypt-logo dark">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('assets1/images/logo-dark.svg') }}" alt="logo-dark">
                        </a>
                    </div>
                    <div class="crypt-logo light">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('assets1/images/logo.svg') }}" alt="logo">
                        </a>
                    </div>
                    <!-- Logo sm -->
                    <div class="crypt-logo logo-sm dark">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('assets1/images/logo-m-dark.svg') }}" alt="logo-sm-dark">
                        </a>
                    </div>
                    <div class="crypt-logo logo-sm light">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('assets1/images/logo-m.svg') }}" alt="logo-sm">
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Menu -->
            <div class="side-wrapper">
                <div class="side-title">Assets</div>
                <div class="side-menu">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Dashboard">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M18.6699 2H16.7699C14.5899 2 13.4399 3.15 13.4399 5.33V7.23C13.4399 9.41 14.5899 10.56 16.7699 10.56H18.6699C20.8499 10.56 21.9999 9.41 21.9999 7.23V5.33C21.9999 3.15 20.8499 2 18.6699 2Z" fill="currentColor"/>
                            <path opacity="0.4" d="M7.24 13.4301H5.34C3.15 13.4301 2 14.5801 2 16.7601V18.6601C2 20.8501 3.15 22.0001 5.33 22.0001H7.23C9.41 22.0001 10.56 20.8501 10.56 18.6701V16.7701C10.57 14.5801 9.42 13.4301 7.24 13.4301Z" fill="currentColor"/>
                            <path d="M6.29 10.58C8.6593 10.58 10.58 8.6593 10.58 6.29C10.58 3.9207 8.6593 2 6.29 2C3.9207 2 2 3.9207 2 6.29C2 8.6593 3.9207 10.58 6.29 10.58Z" fill="currentColor"/>
                            <path d="M17.7099 22C20.0792 22 21.9999 20.0793 21.9999 17.71C21.9999 15.3407 20.0792 13.42 17.7099 13.42C15.3406 13.42 13.4199 15.3407 13.4199 17.71C13.4199 20.0793 15.3406 22 17.7099 22Z" fill="currentColor"/>
                        </svg>
                        <span> Dashboard </span>
                    </a>
                    <a class="sidebar-link" href="#" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Marketplace">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.9597 17.84L19.3297 18.39C18.8797 18.54 18.5197 18.89 18.3697 19.35L17.8197 20.98C17.3497 22.39 15.3697 22.36 14.9297 20.95L13.0797 15C12.7197 13.82 13.8097 12.72 14.9797 13.09L20.9397 14.94C22.3397 15.38 22.3597 17.37 20.9597 17.84Z" fill="currentColor"/>
                            <path opacity="0.4" d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" fill="currentColor"/>
                        </svg>
                        <span> Marketplace </span>
                    </a>
                    <a class="sidebar-link is-active" href="{{ route('tradestation') }}" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Exchange">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 15.5C15 19.09 12.09 22 8.5 22C4.91 22 2 19.09 2 15.5C2 11.91 4.91 9 8.5 9C8.67 9 8.84999 9.01 9.01999 9.02C12.19 9.27 14.73 11.81 14.98 14.98C14.99 15.15 15 15.33 15 15.5Z" fill="currentColor"></path>
                            <path opacity="0.4" d="M22 8.5C22 12.09 19.09 15 15.5 15C15.33 15 15.15 14.99 14.98 14.98C14.73 11.81 12.19 9.27 9.01999 9.02C9.00999 8.85 9 8.67 9 8.5C9 4.91 11.91 2 15.5 2C19.09 2 22 4.91 22 8.5Z" fill="currentColor"></path>
                            <path d="M5.59 2H3C2.45 2 2 2.45 2 3V5.59C2 6.48 3.07999 6.93 3.70999 6.3L6.29999 3.71001C6.91999 3.08001 6.48 2 5.59 2Z" fill="currentColor"></path>
                            <path d="M18.41 22H21C21.55 22 22 21.55 22 21V18.41C22 17.52 20.92 17.07 20.29 17.7L17.7 20.29C17.08 20.92 17.52 22 18.41 22Z" fill="currentColor"></path>
                        </svg>
                        <span> Exchange </span>
                    </a>
                    <a class="sidebar-link trending" href="#" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="My Asset">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.0602 11.8201L20.9002 11.6001C20.6202 11.2601 20.2902 10.9901 19.9102 10.7901C19.4002 10.5001 18.8202 10.3501 18.2202 10.3501H5.7702C5.1702 10.3501 4.6002 10.5001 4.0802 10.7901C3.6902 11.0001 3.3402 11.2901 3.0502 11.6501C2.4802 12.3801 2.2102 13.2801 2.3002 14.1801L2.6702 18.8501C2.8002 20.2601 2.9702 22.0001 6.1402 22.0001H17.8602C21.0302 22.0001 21.1902 20.2601 21.3302 18.8401L21.7002 14.1901C21.7902 13.3501 21.5702 12.5101 21.0602 11.8201ZM14.3902 17.3401H9.6002C9.2102 17.3401 8.9002 17.0201 8.9002 16.6401C8.9002 16.2601 9.2102 15.9401 9.6002 15.9401H14.3902C14.7802 15.9401 15.0902 16.2601 15.0902 16.6401C15.0902 17.0301 14.7802 17.3401 14.3902 17.3401Z" fill="currentColor"/>
                            <path opacity="0.4" d="M3.37988 11.31C3.59988 11.11 3.81988 10.93 4.07988 10.79C4.58988 10.5 5.16988 10.35 5.76988 10.35H18.2299C18.8299 10.35 19.3999 10.5 19.9199 10.79C20.1799 10.93 20.4099 11.11 20.6199 11.32V10.79V9.82C20.6199 6.25 19.5299 5.16 15.9599 5.16H13.5799C13.1399 5.16 13.1299 5.15 12.8699 4.81L11.6699 3.2C11.0999 2.46 10.6499 2 9.21988 2H8.03988C4.46988 2 3.37988 3.09 3.37988 6.66V10.8V11.31Z" fill="currentColor"/>
                        </svg>
                        <span> My Asset </span>
                    </a>
                    <a class="sidebar-link" href="#" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Order History">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M6.73049 19.7C7.55049 18.82 8.80049 18.89 9.52049 19.85L10.5305 21.2C11.3405 22.27 12.6505 22.27 13.4605 21.2L14.4705 19.85C15.1905 18.89 16.4405 18.82 17.2605 19.7C19.0405 21.6 20.4905 20.97 20.4905 18.31V7.04C20.5005 3.01 19.5605 2 15.7805 2H8.22049C4.44049 2 3.50049 3.01 3.50049 7.04V18.3C3.50049 20.97 4.96049 21.59 6.73049 19.7Z" fill="currentColor"/>
                            <path d="M16.2305 11.75H10.7305C10.3205 11.75 9.98047 11.41 9.98047 11C9.98047 10.59 10.3205 10.25 10.7305 10.25H16.2305C16.6405 10.25 16.9805 10.59 16.9805 11C16.9805 11.41 16.6405 11.75 16.2305 11.75Z" fill="currentColor"/>
                            <path d="M16.2305 7.75H10.7305C10.3205 7.75 9.98047 7.41 9.98047 7C9.98047 6.59 10.3205 6.25 10.7305 6.25H16.2305C16.6405 6.25 16.9805 6.59 16.9805 7C16.9805 7.41 16.6405 7.75 16.2305 7.75Z" fill="currentColor"/>
                            <path d="M7.78027 8C7.23027 8 6.78027 7.55 6.78027 7C6.78027 6.45 7.23027 6 7.78027 6C8.33027 6 8.78027 6.45 8.78027 7C8.78027 7.55 8.33027 8 7.78027 8Z" fill="currentColor"/>
                            <path d="M7.78027 12C7.23027 12 6.78027 11.55 6.78027 11C6.78027 10.45 7.23027 10 7.78027 10C8.33027 10 8.78027 10.45 8.78027 11C8.78027 11.55 8.33027 12 7.78027 12Z" fill="currentColor"/>
                        </svg>
                        <span> Order History </span>
                    </a>
                </div>
            </div>
            
            <!-- Divider -->
            <div class="nav-divider div-transparent mb-2 mt-2"></div>
            
            <!-- Menu 2 -->
            <div class="side-wrapper">
                <div class="side-title">Accounts</div>
                <div class="side-menu">
                    <a class="sidebar-link" href="#" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Settings">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M2 12.8801V11.1201C2 10.0801 2.85 9.22006 3.9 9.22006C5.71 9.22006 6.45 7.94006 5.54 6.37006C5.02 5.47006 5.33 4.30006 6.24 3.78006L7.97 2.79006C8.76 2.32006 9.78 2.60006 10.25 3.39006L10.36 3.58006C11.26 5.15006 12.74 5.15006 13.65 3.58006L13.76 3.39006C14.23 2.60006 15.25 2.32006 16.04 2.79006L17.77 3.78006C18.68 4.30006 18.99 5.47006 18.47 6.37006C17.56 7.94006 18.3 9.22006 20.11 9.22006C21.15 9.22006 22.01 10.0701 22.01 11.1201V12.8801C22.01 13.9201 21.16 14.7801 20.11 14.7801C18.3 14.7801 17.56 16.0601 18.47 17.6301C18.99 18.5401 18.68 19.7001 17.77 20.2201L16.04 21.2101C15.25 21.6801 14.23 21.4001 13.76 20.6101L13.65 20.4201C12.75 18.8501 11.27 18.8501 10.36 20.4201L10.25 20.6101C9.78 21.4001 8.76 21.6801 7.97 21.2101L6.24 20.2201C5.33 19.7001 5.02 18.5301 5.54 17.6301C6.45 16.0601 5.71 14.7801 3.9 14.7801C2.85 14.7801 2 13.9201 2 12.8801Z" fill="currentColor"/>
                            <path d="M12 15.25C13.7949 15.25 15.25 13.7949 15.25 12C15.25 10.2051 13.7949 8.75 12 8.75C10.2051 8.75 8.75 10.2051 8.75 12C8.75 13.7949 10.2051 15.25 12 15.25Z" fill="currentColor"/>
                        </svg>
                        <span> Settings </span>
                    </a>
                    <a class="sidebar-link" href="#" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Security">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M20.91 11.12C20.91 16.01 17.36 20.59 12.51 21.93C12.18 22.02 11.82 22.02 11.49 21.93C6.63996 20.59 3.08997 16.01 3.08997 11.12V6.73006C3.08997 5.91006 3.70998 4.98007 4.47998 4.67007L10.05 2.39007C11.3 1.88007 12.71 1.88007 13.96 2.39007L19.53 4.67007C20.29 4.98007 20.92 5.91006 20.92 6.73006L20.91 11.12Z" fill="currentColor"/>
                            <path d="M14.5 10.5C14.5 9.12 13.38 8 12 8C10.62 8 9.5 9.12 9.5 10.5C9.5 11.62 10.24 12.55 11.25 12.87V15.5C11.25 15.91 11.59 16.25 12 16.25C12.41 16.25 12.75 15.91 12.75 15.5V12.87C13.76 12.55 14.5 11.62 14.5 10.5Z" fill="currentColor"/>
                        </svg>
                        <span> Security </span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="wrapper pb-2">
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
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets1/images/logo-dark.svg') }}" alt="logo-dark">
                    </a>
                </div>
                <div class="crypt-logo logo-m light">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets1/images/logo.svg') }}" alt="logo">
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
                                        <h4 class="fw-bold crypt-grayscale-400 mb-0 encrypted">{{ number_format(auth()->user()->balance ?? 0.001245, 6) }}</h4>
                                    </div>
                                    <div>
                                        <select class="form-select text-bg-bs2 crypt-grayscale-600">
                                            <option selected>BTC</option>
                                            <option value="1">ETH</option>
                                            <option value="2">BNB</option>
                                            <option value="3">USDT</option>
                                        </select>
                                    </div>
                                </div>
                                <h6 class="text-sm crypt-grayscale-600 encrypted">≈ ${{ number_format((auth()->user()->balance ?? 0.001245) * 76294.82, 2) }} USDT</h6>
                            </div>
                            <div>
                                <a class="dropdown-item text-left" href="#">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.9999 9L8.99985 12L11.9999 15L14.9999 12L11.9999 9Z" fill="currentColor"/>
                                    </svg>
                                    Overview
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Dropdown -->
                    <div class="dropdown profile_menu disable-sm-screen">
                        <a class="nav-link crypto-has-dropdown fw-medium" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Orders
                            <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" version="1.1" viewBox="0 0 29 29" xml:space="preserve">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" d="m20.5 11.5-6 6-6-6"></path>
                            </svg>
                        </a>
                        <ul class="profile_menu dropdown-menu dropdown-menu-shows">
                            <li><a class="dropdown-item" href="#">Spot Orders</a></li>
                            <li><a class="dropdown-item" href="#">Margin Orders</a></li>
                            <li><a class="dropdown-item" href="#">Funding Orders</a></li>
                            <li><a class="dropdown-item" href="#">Earn Orders</a></li>
                        </ul>
                    </div>

                    <!-- Call to Action -->
                    <div class="flex disable-sm-screen">
                        <a class="btn btn-editor btn-primary" href="#!" data-bs-toggle="modal" data-bs-target="#buyCrypto">Add Funds</a>
                    </div>

                    <!-- Profile Modal -->
                    <div class="profile_menu d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle no-active d-flex align-items-center" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <img alt="" src="{{ asset('assets1/images/social/user.png') }}">
                            </button>
                            <ul class="dropdown-menu">
                                <li class="wallet align-items-center">
                                    <img alt="" src="{{ asset('assets1/images/social/user.png') }}">
                                    <div class="d-grid">
                                        <h6 class="fw-bold crypt-grayscale-100 mb-0">{{ auth()->user()->email }}</h6>
                                        <a class="d-flex gap-2 mb-2 verified mt-2" href="#!">
                                            <p class="crypt-grayscale-600 mb-0">UID:</p>
                                            <p class="crypt-grayscale-100 mb-0">{{ auth()->user()->id ?? '35403204' }}</p>
                                            <div class="crypt-grayscale-500" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.15556 5C6.8605 5 5 6.8605 5 9.15556V12.48C5 14.5149 6.46269 16.2083 8.39406 16.566C8.75174 18.4974 10.4451 19.96 12.48 19.96H15.8044C18.0995 19.96 19.96 18.0995 19.96 15.8044V12.48C19.96 10.4451 18.4974 8.75174 16.566 8.39406C16.2083 6.46269 14.5149 5 12.48 5H9.15556ZM14.8315 8.32444C14.4892 7.35604 13.5657 6.66222 12.48 6.66222H9.15556C7.77853 6.66222 6.66222 7.77853 6.66222 9.15556V12.48C6.66222 13.5657 7.35603 14.4892 8.32444 14.8315V12.48C8.32444 10.1849 10.1849 8.32444 12.48 8.32444H14.8315ZM9.98667 12.48C9.98667 11.103 11.103 9.98667 12.48 9.98667H15.8044C17.1814 9.98667 18.2978 11.103 18.2978 12.48V15.8044C18.2978 17.1814 17.1814 18.2978 15.8044 18.2978H12.48C11.103 18.2978 9.98667 17.1814 9.98667 15.8044V12.48Z" fill="currentColor" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" d="M18.6699 2H16.7699C14.5899 2 13.4399 3.15 13.4399 5.33V7.23C13.4399 9.41 14.5899 10.56 16.7699 10.56H18.6699C20.8499 10.56 21.9999 9.41 21.9999 7.23V5.33C21.9999 3.15 20.8499 2 18.6699 2Z" fill="currentColor"/>
                                            <path opacity="0.4" d="M7.24 13.4301H5.34C3.15 13.4301 2 14.5801 2 16.7601V18.6601C2 20.8501 3.15 22.0001 5.33 22.0001H7.23C9.41 22.0001 10.56 20.8501 10.56 18.6701V16.7701C10.57 14.5801 9.42 13.4301 7.24 13.4301Z" fill="currentColor"/>
                                            <path d="M6.29 10.58C8.6593 10.58 10.58 8.6593 10.58 6.29C10.58 3.9207 8.6593 2 6.29 2C3.9207 2 2 3.9207 2 6.29C2 8.6593 3.9207 10.58 6.29 10.58Z" fill="currentColor"/>
                                            <path d="M17.7099 22C20.0792 22 21.9999 20.0793 21.9999 17.71C21.9999 15.3407 20.0792 13.42 17.7099 13.42C15.3406 13.42 13.4199 15.3407 13.4199 17.71C13.4199 20.0793 15.3406 22 17.7099 22Z" fill="currentColor"/>
                                        </svg>
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.0602 11.8201L20.9002 11.6001C20.6202 11.2601 20.2902 10.9901 19.9102 10.7901C19.4002 10.5001 18.8202 10.3501 18.2202 10.3501H5.7702C5.1702 10.3501 4.6002 10.5001 4.0802 10.7901C3.6902 11.0001 3.3402 11.2901 3.0502 11.6501C2.4802 12.3801 2.2102 13.2801 2.3002 14.1801L2.6702 18.8501C2.8002 20.2601 2.9702 22.0001 6.1402 22.0001H17.8602C21.0302 22.0001 21.1902 20.2601 21.3302 18.8401L21.7002 14.1901C21.7902 13.3501 21.5702 12.5101 21.0602 11.8201ZM14.3902 17.3401H9.6002C9.2102 17.3401 8.9002 17.0201 8.9002 16.6401C8.9002 16.2601 9.2102 15.9401 9.6002 15.9401H14.3902C14.7802 15.9401 15.0902 16.2601 15.0902 16.6401C15.0902 17.0301 14.7802 17.3401 14.3902 17.3401Z" fill="currentColor"/>
                                            <path opacity="0.4" d="M3.37988 11.31C3.59988 11.11 3.81988 10.93 4.07988 10.79C4.58988 10.5 5.16988 10.35 5.76988 10.35H18.2299C18.8299 10.35 19.3999 10.5 19.9199 10.79C20.1799 10.93 20.4099 11.11 20.6199 11.32V10.79V9.82C20.6199 6.25 19.5299 5.16 15.9599 5.16H13.5799C13.1399 5.16 13.1299 5.15 12.8699 4.81L11.6699 3.2C11.0999 2.46 10.6499 2 9.21988 2H8.03988C4.46988 2 3.37988 3.09 3.37988 6.66V10.8V11.31Z" fill="currentColor"/>
                                        </svg>
                                        My Asset
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4" d="M16.19 2H7.82002C4.18002 2 2.01001 4.17 2.01001 7.81V16.18C2.01001 19.82 4.18002 21.99 7.82002 21.99H16.19C19.83 21.99 22 19.82 22 16.18V7.81C22 4.17 19.83 2 16.19 2Z" fill="currentColor"/>
                                                <path d="M9.16985 14.0899C9.35985 14.0899 9.54985 14.0199 9.69985 13.8699L14.0799 9.48992V11.9199C14.0799 12.3299 14.4199 12.6699 14.8299 12.6699C15.2399 12.6699 15.5799 12.3299 15.5799 11.9199V7.67992C15.5799 7.57992 15.5599 7.48992 15.5199 7.38992C15.4399 7.20992 15.2998 7.05993 15.1098 6.97993C15.0198 6.93993 14.9199 6.91992 14.8199 6.91992H10.5799C10.1699 6.91992 9.82985 7.25992 9.82985 7.66992C9.82985 8.07992 10.1699 8.41992 10.5799 8.41992H13.0098L8.62985 12.7999C8.33985 13.0899 8.33985 13.5699 8.62985 13.8599C8.78985 14.0199 8.97985 14.0899 9.16985 14.0899Z" fill="currentColor"/>
                                                <path d="M18.7099 16.28C18.5799 15.89 18.1599 15.68 17.7599 15.81C14.0399 17.05 9.94993 17.05 6.22993 15.81C5.83993 15.68 5.40994 15.89 5.27994 16.28C5.14994 16.67 5.35994 17.1 5.74994 17.23C7.75994 17.9 9.86994 18.24 11.9899 18.24C14.1099 18.24 16.2199 17.9 18.2299 17.23C18.6299 17.09 18.8399 16.67 18.7099 16.28Z" fill="currentColor"/>
                                            </svg>
                                            Log Out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Notification -->
                    <div class="controller">
                        <a href="#!" class="notify" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNotify">
                            <div class="notification"></div>
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.707 8.796c0 1.256.332 1.997 1.063 2.85.553.628.73 1.435.73 2.31 0 .874-.287 1.704-.863 2.378a4.537 4.537 0 01-2.9 1.413c-1.571.134-3.143.247-4.736.247-1.595 0-3.166-.068-4.737-.247a4.532 4.532 0 01-2.9-1.413 3.616 3.616 0 01-.864-2.378c0-.875.178-1.682.73-2.31.754-.854 1.064-1.594 1.064-2.85V8.37c0-1.682.42-2.781 1.283-3.858C7.861 2.942 9.919 2 11.956 2h.09c2.08 0 4.204.987 5.466 2.625.82 1.054 1.195 2.108 1.195 3.745v.426zM9.074 20.061c0-.504.462-.734.89-.833.5-.106 3.545-.106 4.045 0 .428.099.89.33.89.833-.025.48-.306.904-.695 1.174a3.635 3.635 0 01-1.713.731 3.795 3.795 0 01-1.008 0 3.618 3.618 0 01-1.714-.732c-.39-.269-.67-.694-.695-1.173z" />
                            </svg>
                        </a>
                    </div>

                    <!-- dark/light mode -->
                    <div class="mode">
                        <button class="controller m-auto" id="darkMode">
                            <span class="dark-logo">
                                <svg viewBox="0 0 512 512" width="100" fill="currentColor">
                                    <path d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z" />
                                </svg>
                            </span>
                            <span class="light-logo">
                                <svg viewBox="0 0 512 512" width="100" fill="currentColor">
                                    <path d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z" />
                                </svg>
                            </span>
                        </button>
                    </div>

                    <!-- Hamburger Menu -->
                    <div id="mobile_menu" class="close">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M4 12H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M4 6H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Dashboard/Trading Interface -->
            <div class="row g-2 pb-2 animation-element">
                <!-- Order Book | Market Trades -->
                <div id="second" class="col-12 col-xxl-2 col-xl-3 col-lg-6">
                    <div class="tab-content card-bs table-temp3 p-2">
                        <!-- Tab -->
                        <div class="nav nav-pills nav-justified card-bs-tabs gap-2 p-1">
                            <button class="nav-link active" id="book-tab" data-bs-toggle="tab" data-bs-target="#book-tab-pane" type="button" role="tab" aria-controls="book-tab-pane" aria-selected="true">Order Book</button>
                            <button class="nav-link" id="market-tab" data-bs-toggle="tab" data-bs-target="#market-tab-pane" type="button" role="tab" aria-controls="market-tab-pane" aria-selected="false">Market Trades</button>
                        </div>
                        <!-- Order Book -->
                        <div class="tab-pane fade show active" id="book-tab-pane" role="tabpanel" aria-labelledby="book-tab" tabindex="0">
                            <!-- Spread Button -->
                            <div class="col-12 text-start px-2">
                                <button class="btn btn-secondary btn-sm mt-1">Spread 0.05%</button>
                            </div>
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-dark table-hover crypt-tab">
                                    <thead>
                                        <tr>
                                            <th scope="col">Price(USDT)</th>
                                            <th scope="col">Amount(BTC)</th>
                                            <th scope="col">Total(USDT)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.87</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.86</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.85</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.84</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.83</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.82</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.81</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.80</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.79</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.78</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr class="table-active mb-0">
                                            <th scope="row" class="text-danger fs-6 fw-bold">76,494.88 <img alt="" src="{{ asset('assets1/images/icon/down.svg') }}" width="10"></th>
                                            <td colspan="2" class="text-primary">≈ 76.706,32 USD</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.77</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.76</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.75</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.74</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.73</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.72</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.71</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.70</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.69</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.68</span></td>
                                            <td>0.536</td>
                                            <td>6.345</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Market Trades -->
                        <div class="tab-pane fade" id="market-tab-pane" role="tabpanel" aria-labelledby="market-tab" tabindex="0">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-dark table-hover crypt-tab">
                                    <thead>
                                        <tr>
                                            <th scope="col">Price(USDT)</th>
                                            <th scope="col">Amount(BTC)</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.67</span></td>
                                            <td>0.023</td>
                                            <td>20:34:26</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.66</span></td>
                                            <td>0.156</td>
                                            <td>20:34:22</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.65</span></td>
                                            <td>0.089</td>
                                            <td>20:34:18</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.64</span></td>
                                            <td>0.234</td>
                                            <td>20:34:14</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.63</span></td>
                                            <td>0.067</td>
                                            <td>20:34:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.62</span></td>
                                            <td>0.145</td>
                                            <td>20:34:06</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.61</span></td>
                                            <td>0.078</td>
                                            <td>20:34:02</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.60</span></td>
                                            <td>0.123</td>
                                            <td>20:33:58</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.59</span></td>
                                            <td>0.056</td>
                                            <td>20:33:54</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.58</span></td>
                                            <td>0.234</td>
                                            <td>20:33:50</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.57</span></td>
                                            <td>0.089</td>
                                            <td>20:33:46</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.56</span></td>
                                            <td>0.167</td>
                                            <td>20:33:42</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.55</span></td>
                                            <td>0.045</td>
                                            <td>20:33:38</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.54</span></td>
                                            <td>0.234</td>
                                            <td>20:33:34</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.53</span></td>
                                            <td>0.123</td>
                                            <td>20:33:30</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.52</span></td>
                                            <td>0.078</td>
                                            <td>20:33:26</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.51</span></td>
                                            <td>0.156</td>
                                            <td>20:33:22</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.50</span></td>
                                            <td>0.234</td>
                                            <td>20:33:18</td>
                                        </tr>
                                        <tr>
                                            <td class="text-down">76,494.88<span class="text-down text-opacity-75">.49</span></td>
                                            <td>0.089</td>
                                            <td>20:33:14</td>
                                        </tr>
                                        <tr>
                                            <td class="text-up">76,494.88<span class="text-up text-opacity-50">.48</span></td>
                                            <td>0.145</td>
                                            <td>20:33:10</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="first" class="col-12 col-xxl-7 col-xl-6 col-lg-12">
                    <!-- Watchlist -->
                    <div class="card-bs p-2">
                        <div class="nav nav-pills nav-justified card-bs-tabs gap-2 p-1">
                            <button class="nav-link active text-sm" id="v-pills-btcusdt-tab" data-bs-toggle="pill" data-bs-target="#v-pills-btcusdt" type="button" role="tab" aria-controls="v-pills-btcusdt" aria-selected="true">
                                <div class="d-flex flex-row justify-content-between gap-3 align-items-center">
                                    <div class="d-flex flex-row align-items-center gap-2">
                                        <img alt="" src="{{ asset('assets1/images/coin/btc.svg') }}" width="20">
                                        <div class="d-flex flex-column justify-content-start align-items-start text-start">
                                            <p class="fw-medium mb-0">BTC/USDT <span class="verified text-sm">24h</span></p>
                                            <p class="fw-medium mb-0 text-success">76,494.88 <span class="text-success text-opacity-75">+1.24%</span></p>
                                        </div>
                                    </div>
                                    <div>
                                        <img class="up-candle" alt="" src="{{ asset('assets1/images/icon/up.svg') }}" width="30">
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link text-sm" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                <div class="d-flex flex-row justify-content-between gap-3 align-items-center">
                                    <div class="d-flex flex-row align-items-center gap-2">
                                        <img alt="" src="{{ asset('assets1/images/coin/eth.svg') }}" width="20">
                                        <div class="d-flex flex-column justify-content-start align-items-start text-start">
                                            <p class="fw-medium mb-0">ETH/USDT <span class="verified text-sm">24h</span></p>
                                            <p class="fw-medium mb-0 text-danger">3,274.85 <span class="text-danger text-opacity-75">-0.24%</span></p>
                                        </div>
                                    </div>
                                    <div>
                                        <img class="down-candle" alt="" src="{{ asset('assets1/images/icon/down.svg') }}" width="30">
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link text-sm" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="false" tabindex="-1" aria-disabled="true">
                                <div class="d-flex flex-row justify-content-between gap-3 align-items-center">
                                    <div class="d-flex flex-row align-items-center gap-2">
                                        <img alt="" src="{{ asset('assets1/images/coin/bnb.svg') }}" width="20">
                                        <div class="d-flex flex-column justify-content-start align-items-start text-start">
                                            <p class="fw-medium mb-0">BNB/USDT <span class="verified text-sm">24h</span></p>
                                            <p class="fw-medium mb-0 text-success">634.56 <span class="text-success text-opacity-75">+2.75%</span></p>
                                        </div>
                                    </div>
                                    <div>
                                        <img class="up-candle" alt="" src="{{ asset('assets1/images/icon/up.svg') }}" width="30">
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link text-sm" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                <div class="d-flex flex-row justify-content-between gap-3 align-items-center">
                                    <div class="d-flex flex-row align-items-center gap-2">
                                        <img alt="" src="{{ asset('assets1/images/coin/sol.svg') }}" width="20">
                                        <div class="d-flex flex-column justify-content-start align-items-start text-start">
                                            <p class="fw-medium mb-0">SOL/USDT <span class="verified text-sm">24h</span></p>
                                            <p class="fw-medium mb-0 text-success">214.56 <span class="text-success text-opacity-75">+4.89%</span></p>
                                        </div>
                                    </div>
                                    <div>
                                        <img class="up-candle" alt="" src="{{ asset('assets1/images/icon/up.svg') }}" width="30">
                                    </div>
                                </div>
                            </button>
                        </div>
                        <!-- TradingView Advanced Real-Time Chart -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                                {
                                    "autosize": true,
                                    "symbol": "BINANCE:BTCUSDT",
                                    "interval": "D",
                                    "timezone": "Etc/UTC",
                                    "theme": "dark",
                                    "style": "1",
                                    "locale": "en",
                                    "enable_publishing": false,
                                    "allow_symbol_change": true,
                                    "calendar": false,
                                    "support_host": "https://www.tradingview.com"
                                }
                            </script>
                        </div>
                    </div>
                    <!-- Buy/Sell Tabs -->
                    <div class="tab-content table-responsive card-bs p-2 mt-2">
                        <!-- Tab -->
                        <ul class="nav nav-pills nav-justified gap-1 card-bs-tabs p-1">
                            <li class="nav-item">
                                <button class="nav-link active" id="pills-limit-tab" data-bs-toggle="pill" data-bs-target="#pills-limit" type="button" role="tab" aria-controls="pills-limit" aria-selected="true">Limit</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-market-tab" data-bs-toggle="pill" data-bs-target="#pills-market" type="button" role="tab" aria-controls="pills-market" aria-selected="false">Market</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-stop-limit-tab" data-bs-toggle="pill" data-bs-target="#pills-stop-limit" type="button" role="tab" aria-controls="pills-stop-limit" aria-selected="false">Stop-Limit</button>
                            </li>
                        </ul>
                        <!-- Limit Tabs -->
                        <div class="tab-pane fade show active" id="pills-limit" role="tabpanel" aria-labelledby="pills-limit-tab" tabindex="0">
                            <div class="d-sm-flex flex-row justify-content-between gap-3 p-1">
                                <!-- Buy Tabs -->
                                <div class="w-100 active mt-3">
                                    <form method="POST" action="{{ route('trade.buy') }}">
                                        @csrf
                                        <p class="text-sm crypt-grayscale-500">Avbl {{ number_format(auth()->user()->balance ?? 10000.25, 2) }} USDT</p>
                                        <div class="input-group mb-3 p-1">
                                            <div class="input-group-prepend input-group-text">Price</div>
                                            <input class="form-control placeholder-text" type="text" name="buy_price" placeholder="76494.88" value="76494.88">
                                            <div class="input-group-append input-group-text p-1">
                                                <select class="form-select text-sm crypt-grayscale-500" name="price_currency">
                                                    <option selected>USDT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3 p-1">
                                            <div class="input-group-prepend input-group-text">Size</div>
                                            <input class="form-control placeholder-text" type="text" name="buy_size" placeholder="0.00000000">
                                            <div class="input-group-append input-group-text p-1">
                                                <select class="form-select text-sm crypt-grayscale-500" name="size_currency">
                                                    <option selected>BTC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 p-1">
                                            <div class="percentage-buttons d-flex justify-content-between gap-1 mb-3">
                                                <button type="button" class="btn btn-outline-light btn-sm flex-fill" data-percentage="25">25%</button>
                                                <button type="button" class="btn btn-outline-light btn-sm flex-fill" data-percentage="50">50%</button>
                                                <button type="button" class="btn btn-outline-light btn-sm flex-fill" data-percentage="75">75%</button>
                                                <button type="button" class="btn btn-outline-light btn-sm flex-fill" data-percentage="100">Max</button>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3 p-1">
                                            <div class="input-group-prepend input-group-text">Total</div>
                                            <input class="form-control placeholder-text" type="text" name="buy_total" placeholder="0.00">
                                            <div class="input-group-append input-group-text p-1">
                                                <select class="form-select text-sm crypt-grayscale-500" name="total_currency">
                                                    <option selected>USDT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-up" role="button">Buy BTC</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex">
                                    <div class="vr"></div>
                                </div>
                                <!-- Sell Tabs -->
                                <div class="w-100 active mt-3">
                                    <form method="POST" action="{{ route('trade.sell') }}">
                                        @csrf
                                        <p class="text-sm crypt-grayscale-500">Avbl {{ number_format(auth()->user()->crypto_balance ?? 0.12345678, 8) }} BTC</p>
                                        <div class="input-group mb-3 p-1">
                                            <div class="input-group-prepend input-group-text">Price</div>
                                            <input class="form-control placeholder-text" type="text" name="sell_price" placeholder="76494.88" value="76494.88">
                                            <div class="input-group-append input-group-text p-1">
                                                <select class="form-select text-sm crypt-grayscale-500" name="price_currency">
                                                    <option selected>USDT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3 p-1">
                                            <div class="input-group-prepend input-group-text">Size</div>
                                            <input class="form-control placeholder-text" type="text" name="sell_size" placeholder="0.00000000">
                                            <div class="input-group-append input-group-text p-1">
                                                <select class="form-select text-sm crypt-grayscale-500" name="size_currency">
                                                    <option selected>BTC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 p-1">
                                            <div class="percentage-buttons d-flex justify-content-between gap-1 mb-3">
                                                <button type="button" class="btn btn-outline-light btn-sm flex-fill" data-percentage="25">25%</button>
                                                <button type="button" class="btn btn-outline-light btn-sm flex-fill" data-percentage="50">50%</button>
                                                <button type="button" class="btn btn-outline-light btn-sm flex-fill" data-percentage="75">75%</button>
                                                <button type="button" class="btn btn-outline-light btn-sm flex-fill" data-percentage="100">Max</button>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3 p-1">
                                            <div class="input-group-prepend input-group-text">Total</div>
                                            <input class="form-control placeholder-text" type="text" name="sell_total" placeholder="0.00">
                                            <div class="input-group-append input-group-text p-1">
                                                <select class="form-select text-sm crypt-grayscale-500" name="total_currency">
                                                    <option selected>USDT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-down" role="button">Sell BTC</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Market Tabs -->
                        <div class="tab-pane fade" id="pills-market" role="tabpanel" aria-labelledby="pills-market-tab" tabindex="0">
                            <div class="d-sm-flex flex-row justify-content-between gap-3 p-1">
                                <div class="w-100 text-center p-4">
                                    <p class="text-muted">Market orders coming soon...</p>
                                </div>
                            </div>
                        </div>
                        <!-- Stop Limit Tabs -->
                        <div class="tab-pane fade" id="pills-stop-limit" role="tabpanel" aria-labelledby="pills-stop-limit-tab" tabindex="0">
                            <div class="d-sm-flex flex-row justify-content-between gap-3 p-1">
                                <div class="w-100 text-center p-4">
                                    <p class="text-muted">Stop-limit orders coming soon...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Coin Tab -->
                <div id="third" class="col-12 col-xxl-3 col-xl-3 col-lg-6">
                    <div class="tab-content card-bs table-temp3 p-2">
                        <!-- Tab -->
                        <div class="nav nav-pills nav-justified gap-1 card-bs-tabs p-1">
                            <button class="nav-link active" id="pills-btc-tab" data-bs-toggle="pill" data-bs-target="#pills-btc" type="button" role="tab" aria-controls="pills-btc" aria-selected="true">BTC</button>
                            <button class="nav-link" id="pills-eth-tab" data-bs-toggle="pill" data-bs-target="#pills-eth" type="button" role="tab" aria-controls="pills-eth" aria-selected="false">ETH</button>
                            <button class="nav-link" id="pills-usdt-tab" data-bs-toggle="pill" data-bs-target="#pills-usdt" type="button" role="tab" aria-controls="pills-usdt" aria-selected="false">USDT</button>
                            <button class="nav-link" id="pills-xrp-tab" data-bs-toggle="pill" data-bs-target="#pills-xrp" type="button" role="tab" aria-controls="pills-xrp" aria-selected="false">XRP</button>
                        </div>
                        <!-- Search -->
                        <div class="pt-2">
                            <input type="text" class="search form-control text-sm" placeholder="Search coin">
                        </div>
                        <!-- BTC Tabs -->
                        <div class="tab-pane fade show active" id="pills-btc" role="tabpanel" aria-labelledby="pills-btc-tab" tabindex="0">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-dark table-hover crypt-tab">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pairs</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="$30.03">
                                            <td>
                                                <div class="d-flex flex-row align-items-center gap-2">
                                                    <div class="fav-btn">
                                                        <svg class="favme is_animating" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" stroke="currentColor" d="M11.173 3.007L12.768 3L15.178 8.11L20.504 8.941L21 10.436L17.11 14.449L18.005 20.085L16.707 21L11.972 18.352L7.236 21L5.94 20.077L6.886 14.445L3 10.436L3.496 8.941L8.818 8.111L11.173 3.007Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center gap-2">
                                                        <p class="fw-medium mb-0">USDT/BTC <span class="verified text-sm">5x</span></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$30.03</td>
                                            <td class="text-down">2.96% <img alt="" src="{{ asset('assets1/images/icon/down.svg') }}" width="16"></td>
                                        </tr>
                                        <tr data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="$21.12">
                                            <td>
                                                <div class="d-flex flex-row align-items-center gap-2">
                                                    <div class="fav-btn">
                                                        <svg class="favme is_animating" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" stroke="currentColor" d="M11.173 3.007L12.768 3L15.178 8.11L20.504 8.941L21 10.436L17.11 14.449L18.005 20.085L16.707 21L11.972 18.352L7.236 21L5.94 20.077L6.886 14.445L3 10.436L3.496 8.941L8.818 8.111L11.173 3.007Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center gap-2">
                                                        <p class="fw-medium mb-0">TON/BTC <span class="verified text-sm">10x</span></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$21.12</td>
                                            <td class="text-down">17.88% <img alt="" src="{{ asset('assets1/images/icon/down.svg') }}" width="16"></td>
                                        </tr>
                                        <tr data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="$0.3780">
                                            <td>
                                                <div class="d-flex flex-row align-items-center gap-2">
                                                    <div class="fav-btn">
                                                        <svg class="favme is_animating" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" stroke="currentColor" d="M11.173 3.007L12.768 3L15.178 8.11L20.504 8.941L21 10.436L17.11 14.449L18.005 20.085L16.707 21L11.972 18.352L7.236 21L5.94 20.077L6.886 14.445L3 10.436L3.496 8.941L8.818 8.111L11.173 3.007Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center gap-2">
                                                        <p class="fw-medium mb-0">ADA/BTC <span class="verified text-sm">15x</span></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$0.3780</td>
                                            <td class="text-up">12.45% <img alt="" src="{{ asset('assets1/images/icon/up.svg') }}" width="16"></td>
                                        </tr>
                                        <tr data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="$0.5621">
                                            <td>
                                                <div class="d-flex flex-row align-items-center gap-2">
                                                    <div class="fav-btn">
                                                        <svg class="favme is_animating" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" stroke="currentColor" d="M11.173 3.007L12.768 3L15.178 8.11L20.504 8.941L21 10.436L17.11 14.449L18.005 20.085L16.707 21L11.972 18.352L7.236 21L5.94 20.077L6.886 14.445L3 10.436L3.496 8.941L8.818 8.111L11.173 3.007Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center gap-2">
                                                        <p class="fw-medium mb-0">XRP/BTC <span class="verified text-sm">8x</span></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$0.5621</td>
                                            <td class="text-down">-5.32% <img alt="" src="{{ asset('assets1/images/icon/down.svg') }}" width="16"></td>
                                        </tr>
                                        <tr data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="$7.89">
                                            <td>
                                                <div class="d-flex flex-row align-items-center gap-2">
                                                    <div class="fav-btn">
                                                        <svg class="favme is_animating" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" stroke="currentColor" d="M11.173 3.007L12.768 3L15.178 8.11L20.504 8.941L21 10.436L17.11 14.449L18.005 20.085L16.707 21L11.972 18.352L7.236 21L5.94 20.077L6.886 14.445L3 10.436L3.496 8.941L8.818 8.111L11.173 3.007Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center gap-2">
                                                        <p class="fw-medium mb-0">DOT/BTC <span class="verified text-sm">12x</span></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$7.89</td>
                                            <td class="text-up">8.76% <img alt="" src="{{ asset('assets1/images/icon/up.svg') }}" width="16"></td>
                                        </tr>
                                        <tr data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="$145.67">
                                            <td>
                                                <div class="d-flex flex-row align-items-center gap-2">
                                                    <div class="fav-btn">
                                                        <svg class="favme is_animating" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" stroke="currentColor" d="M11.173 3.007L12.768 3L15.178 8.11L20.504 8.941L21 10.436L17.11 14.449L18.005 20.085L16.707 21L11.972 18.352L7.236 21L5.94 20.077L6.886 14.445L3 10.436L3.496 8.941L8.818 8.111L11.173 3.007Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center gap-2">
                                                        <p class="fw-medium mb-0">SOL/BTC <span class="verified text-sm">20x</span></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$145.67</td>
                                            <td class="text-up">15.23% <img alt="" src="{{ asset('assets1/images/icon/up.svg') }}" width="16"></td>
                                        </tr>
                                        <tr data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="$0.8934">
                                            <td>
                                                <div class="d-flex flex-row align-items-center gap-2">
                                                    <div class="fav-btn">
                                                        <svg class="favme is_animating" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" stroke="currentColor" d="M11.173 3.007L12.768 3L15.178 8.11L20.504 8.941L21 10.436L17.11 14.449L18.005 20.085L16.707 21L11.972 18.352L7.236 21L5.94 20.077L6.886 14.445L3 10.436L3.496 8.941L8.818 8.111L11.173 3.007Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center gap-2">
                                                        <p class="fw-medium mb-0">MATIC/BTC <span class="verified text-sm">7x</span></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$0.8934</td>
                                            <td class="text-down">-3.45% <img alt="" src="{{ asset('assets1/images/icon/down.svg') }}" width="16"></td>
                                        </tr>
                                        <tr data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="$34.56">
                                            <td>
                                                <div class="d-flex flex-row align-items-center gap-2">
                                                    <div class="fav-btn">
                                                        <svg class="favme is_animating" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" stroke="currentColor" d="M11.173 3.007L12.768 3L15.178 8.11L20.504 8.941L21 10.436L17.11 14.449L18.005 20.085L16.707 21L11.972 18.352L7.236 21L5.94 20.077L6.886 14.445L3 10.436L3.496 8.941L8.818 8.111L11.173 3.007Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center gap-2">
                                                        <p class="fw-medium mb-0">AVAX/BTC <span class="verified text-sm">18x</span></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$34.56</td>
                                            <td class="text-up">6.78% <img alt="" src="{{ asset('assets1/images/icon/up.svg') }}" width="16"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- ETH Tabs -->
                        <div class="tab-pane fade" id="pills-eth" role="tabpanel" aria-labelledby="pills-eth-tab" tabindex="0">
                            <div class="text-center p-4">
                                <p class="text-muted">ETH pairs coming soon...</p>
                            </div>
                        </div>
                        <!-- USDT Tabs -->
                        <div class="tab-pane fade" id="pills-usdt" role="tabpanel" aria-labelledby="pills-usdt-tab" tabindex="0">
                            <div class="text-center p-4">
                                <p class="text-muted">USDT pairs coming soon...</p>
                            </div>
                        </div>
                        <!-- XRP Tabs -->
                        <div class="tab-pane fade" id="pills-xrp" role="tabpanel" aria-labelledby="pills-xrp-tab" tabindex="0">
                            <div class="text-center p-4">
                                <p class="text-muted">XRP pairs coming soon...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- My History -->
            <div class="row g-2 animation-element">
                <div class="col-12">
                    <div class="tab-content card-bs table-temp3 p-2">
                        <!-- Tab -->
                        <div class="nav nav-pills nav-justified gap-1 card-bs-tabs p-1">
                            <button class="nav-link active" id="pills-open-order-tab" data-bs-toggle="pill" data-bs-target="#pills-open-order" type="button" role="tab" aria-controls="pills-open-order" aria-selected="true">Open Orders (0)</button>
                            <button class="nav-link" id="pills-order-history-tab" data-bs-toggle="pill" data-bs-target="#pills-order-history" type="button" role="tab" aria-controls="pills-order-history" aria-selected="false">Order History</button>
                            <button class="nav-link" id="pills-trade-history-tab" data-bs-toggle="pill" data-bs-target="#pills-trade-history" type="button" role="tab" aria-controls="pills-trade-history" aria-selected="false">Trade History</button>
                        </div>
                        <!-- Open Orders -->
                        <div class="tab-pane fade show active" id="pills-open-order" role="tabpanel" aria-labelledby="pills-open-order-tab" tabindex="0">
                            <div class="text-center p-4">
                                <img alt="" src="{{ asset('assets1/images/empty.svg') }}" width="60" class="mb-3">
                                <p class="text-muted">You have no open orders</p>
                            </div>
                        </div>
                        <!-- Order History -->
                        <div class="tab-pane fade" id="pills-order-history" role="tabpanel" aria-labelledby="pills-order-history-tab" tabindex="0">
                            <div class="text-center p-4">
                                <img alt="" src="{{ asset('assets1/images/empty.svg') }}" width="60" class="mb-3">
                                <p class="text-muted">No order history available</p>
                            </div>
                        </div>
                        <!-- Trade History -->
                        <div class="tab-pane fade" id="pills-trade-history" role="tabpanel" aria-labelledby="pills-trade-history-tab" tabindex="0">
                            <div class="text-center p-4">
                                <img alt="" src="{{ asset('assets1/images/empty.svg') }}" width="60" class="mb-3">
                                <p class="text-muted">No trade history available</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Create Futures Grid (Modal) -->
    <div class="modal fade" id="createFuturesGrid" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createFuturesGridLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createFuturesGridLabel">Create Futures Grid</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <p class="text-muted">Futures grid functionality coming soon...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Buy/Sell Modal -->
    <div class="modal fade" id="buyCrypto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="buyCryptoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="buyCryptoLabel">Quick Buy</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('trade.buy') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="quickBuyAmount" class="form-label">Amount (USDT)</label>
                            <input type="number" class="form-control" id="quickBuyAmount" name="amount" placeholder="Enter amount" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="quickBuyCurrency" class="form-label">Currency</label>
                            <select class="form-select" id="quickBuyCurrency" name="currency" required>
                                <option value="BTC" selected>Bitcoin (BTC)</option>
                                <option value="ETH">Ethereum (ETH)</option>
                                <option value="BNB">Binance Coin (BNB)</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Buy Crypto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Offcanvas Notifications -->
    <div class="offcanvas offcanvas-end" tabindex="0" id="offcanvasNotify" aria-labelledby="offcanvasNotifyLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNotifyLabel">Notifications</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="text-center p-4">
                <img alt="" src="{{ asset('assets1/images/icon/empty-list.svg') }}" width="60" class="mb-3">
                <p class="text-muted">No new notifications</p>
            </div>
        </div>
    </div>

    <!-- Transfer Modal -->
    <div class="modal fade" id="transferCrypto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="transferCryptoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="transferCryptoLabel">Transfer Crypto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <p class="text-muted">Transfer functionality coming soon...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Convert Modal -->
    <div class="modal fade" id="convertCrypto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="convertCryptoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="convertCryptoLabel">Convert Crypto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <p class="text-muted">Convert functionality coming soon...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Offcanvas Convert -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Quick Convert</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="text-center p-4">
                <p class="text-muted">Quick convert functionality coming soon...</p>
            </div>
        </div>
    </div>

    <!-- Stake Modal -->
    <div class="modal fade" id="stakeCrypto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="stakeCryptoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="stakeCryptoLabel">Stake Crypto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <p class="text-muted">Staking functionality coming soon...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- TradingView Ticker -->
    <div class="container-fluid tradingview-widget-container__widget mb-2 mt-2 card-bs">
        <script src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [
                    {
                        "proName": "FOREXCOM:SPXUSD",
                        "title": "S&P 500 Index"
                    },
                    {
                        "proName": "FOREXCOM:NSXUSD",
                        "title": "US 100 Cash CFD"
                    },
                    {
                        "proName": "FX_IDC:EURUSD",
                        "title": "EUR to USD"
                    },
                    {
                        "proName": "BITSTAMP:BTCUSD",
                        "title": "Bitcoin"
                    },
                    {
                        "proName": "BITSTAMP:ETHUSD",
                        "title": "Ethereum"
                    }
                ],
                "showSymbolLogo": true,
                "isTransparent": false,
                "displayMode": "adaptive",
                "colorTheme": "dark",
                "locale": "en"
            }
        </script>
    </div>
    <!-- Main Content End -->

    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="{{ asset('assets1/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets1/js/main.js') }}"></script>
    
    <!-- Original Theme JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dark/Light mode toggle
            const darkModeBtn = document.getElementById('darkMode');
            if (darkModeBtn) {
                darkModeBtn.addEventListener('click', function() {
                    document.body.classList.toggle('crypt-dark');
                    document.body.classList.toggle('crypt-light');
                });
            }
            
            // Sidebar collapse functionality
            const sidebarCollapse = document.getElementById('sidebar-collapse');
            const sidebarMobileToggle = document.getElementById('sidebar-mobile-toggle');
            const sidebar = document.querySelector('.sidebar');
            
            if (sidebarCollapse && sidebar) {
                sidebarCollapse.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                });
            }
            
            if (sidebarMobileToggle && sidebar) {
                sidebarMobileToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('mobile-open');
                });
            }
            
            // Enhanced Trading functionality - Order book clicks
            const orderBookRows = document.querySelectorAll('#book-tab-pane tbody tr:not(.table-active)');
            orderBookRows.forEach(row => {
                row.addEventListener('click', function() {
                    const priceCell = this.querySelector('td:first-child');
                    if (priceCell) {
                        const priceText = priceCell.textContent.trim().replace(/,/g, '');
                        const price = priceText.split('.')[0] + '.' + priceText.split('.')[1];
                        console.log('Selected price:', price);
                        // Update trading forms with selected price
                        const buyPriceInput = document.querySelector('input[name="buy_price"]');
                        const sellPriceInput = document.querySelector('input[name="sell_price"]');
                        
                        if (buyPriceInput) {
                            buyPriceInput.value = price;
                            buyPriceInput.dispatchEvent(new Event('input', { bubbles: true }));
                        }
                        if (sellPriceInput) {
                            sellPriceInput.value = price;
                            sellPriceInput.dispatchEvent(new Event('input', { bubbles: true }));
                        }
                    }
                });
            });
            
            // Watchlist switching functionality
            const watchlistTabs = document.querySelectorAll('[id^="v-pills-"]');
            watchlistTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    console.log('Switched to pair:', this.textContent.trim());
                });
            });
            
            // Market pair tabs functionality
            const marketTabs = document.querySelectorAll('.nav-pills button[id^="pills-"]');
            marketTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetId = this.getAttribute('aria-controls');
                    console.log('Switched to market:', targetId);
                });
            });
            
            // Enhanced Form calculations for new structure
            function calculateTradeTotal() {
                const priceInputs = document.querySelectorAll('input[name="buy_price"], input[name="sell_price"]');
                const sizeInputs = document.querySelectorAll('input[name="buy_size"], input[name="sell_size"]');
                const totalInputs = document.querySelectorAll('input[name="buy_total"], input[name="sell_total"]');
                
                // Buy form calculations
                const buyPrice = document.querySelector('input[name="buy_price"]');
                const buySize = document.querySelector('input[name="buy_size"]');
                const buyTotal = document.querySelector('input[name="buy_total"]');
                
                if (buyPrice && buySize && buyTotal) {
                    buyPrice.addEventListener('input', calculateBuyTotal);
                    buySize.addEventListener('input', calculateBuyTotal);
                    buyTotal.addEventListener('input', calculateBuyFromTotal);
                    
                    function calculateBuyTotal() {
                        const price = parseFloat(buyPrice.value) || 0;
                        const size = parseFloat(buySize.value) || 0;
                        buyTotal.value = (price * size).toFixed(2);
                    }
                    
                    function calculateBuyFromTotal() {
                        const price = parseFloat(buyPrice.value) || 0;
                        const total = parseFloat(buyTotal.value) || 0;
                        if (price > 0) {
                            buySize.value = (total / price).toFixed(8);
                        }
                    }
                }
                
                // Sell form calculations
                const sellPrice = document.querySelector('input[name="sell_price"]');
                const sellSize = document.querySelector('input[name="sell_size"]');
                const sellTotal = document.querySelector('input[name="sell_total"]');
                
                if (sellPrice && sellSize && sellTotal) {
                    sellPrice.addEventListener('input', calculateSellTotal);
                    sellSize.addEventListener('input', calculateSellTotal);
                    sellTotal.addEventListener('input', calculateSellFromTotal);
                    
                    function calculateSellTotal() {
                        const price = parseFloat(sellPrice.value) || 0;
                        const size = parseFloat(sellSize.value) || 0;
                        sellTotal.value = (price * size).toFixed(2);
                    }
                    
                    function calculateSellFromTotal() {
                        const price = parseFloat(sellPrice.value) || 0;
                        const total = parseFloat(sellTotal.value) || 0;
                        if (price > 0) {
                            sellSize.value = (total / price).toFixed(8);
                        }
                    }
                }
                
                // Percentage button functionality
                const percentageButtons = document.querySelectorAll('.percentage-buttons button');
                percentageButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const percentage = parseFloat(this.getAttribute('data-percentage'));
                        const form = this.closest('form');
                        const isRuyForm = form.querySelector('input[name="buy_total"]');
                        const availableBalance = isRuyForm ? 10000.25 : 0.12345678; // Mock balances
                        
                        if (isRuyForm) {
                            const totalInput = form.querySelector('input[name="buy_total"]');
                            const priceInput = form.querySelector('input[name="buy_price"]');
                            const sizeInput = form.querySelector('input[name="buy_size"]');
                            
                            const amount = (availableBalance * percentage / 100);
                            totalInput.value = amount.toFixed(2);
                            
                            const price = parseFloat(priceInput.value) || 0;
                            if (price > 0) {
                                sizeInput.value = (amount / price).toFixed(8);
                            }
                        } else {
                            const sizeInput = form.querySelector('input[name="sell_size"]');
                            const priceInput = form.querySelector('input[name="sell_price"]');
                            const totalInput = form.querySelector('input[name="sell_total"]');
                            
                            const amount = (availableBalance * percentage / 100);
                            sizeInput.value = amount.toFixed(8);
                            
                            const price = parseFloat(priceInput.value) || 0;
                            totalInput.value = (amount * price).toFixed(2);
                        }
                    });
                });
            }
            
            calculateTradeTotal();
            
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            console.log('🚀 TopHive Crypt Exchange Interface Initialized!');
            console.log('📊 Enhanced Trading Features Loaded!');
            console.log('💹 Order Book Interactive!');
            console.log('🎯 Percentage Buttons Active!');
            console.log('📈 TradingView Chart Embedded!');
            console.log('🔄 Real-time Calculations Ready!');
        });
    </script>
</body>
</html>