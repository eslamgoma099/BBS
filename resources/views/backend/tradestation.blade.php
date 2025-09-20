@extends('backend.layouts.backend')

@section('title', 'Trade Station')

@section('styles')
    <!-- TopHive Crypt Theme CSS Files - 100% Exact Match -->
    <link rel="stylesheet" href="{{ asset('assets1/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets1/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets1/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets1/css/button.css') }}">
    
    <!-- TradingView Charting Library -->
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    
    <!-- Additional Trading Station Styles -->
    <style>
        /* Trading Station Specific Styles - 100% Reference Match */
        .animation-element {
            animation: fadeInUp 0.6s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .card-bs {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: var(--card-shadow);
        }
        
        .card-bs-tabs {
            background-color: var(--bg-tertiary);
            border-radius: 8px;
        }
        
        .card-bs-tabs .nav-link {
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 13px;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }
        
        .card-bs-tabs .nav-link:hover {
            background-color: var(--hover-bg);
            color: var(--text-primary);
        }
        
        .card-bs-tabs .nav-link.active {
            background-color: var(--accent-yellow);
            color: #000000;
            font-weight: 600;
        }
        
        .table-temp3 {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
        }
        
        .crypt-tab {
            color: var(--text-primary);
            font-size: 12px;
        }
        
        .crypt-tab th {
            background-color: var(--bg-tertiary);
            border-bottom: 1px solid var(--border-color);
            color: var(--text-secondary);
            font-weight: 500;
            padding: 8px 12px;
        }
        
        .crypt-tab td {
            padding: 6px 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            vertical-align: middle;
        }
        
        .text-up {
            color: var(--accent-green) !important;
        }
        
        .text-down {
            color: var(--accent-red) !important;
        }
        
        .bg-up {
            background-color: var(--accent-green) !important;
            color: #ffffff !important;
        }
        
        .bg-down {
            background-color: var(--accent-red) !important;
            color: #ffffff !important;
        }
        
        .btn-up {
            background-color: var(--accent-green);
            border-color: var(--accent-green);
            color: #ffffff;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        
        .btn-up:hover {
            background-color: #00b894;
            border-color: #00b894;
            color: #ffffff;
            transform: translateY(-1px);
        }
        
        .btn-down {
            background-color: var(--accent-red);
            border-color: var(--accent-red);
            color: #ffffff;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        
        .btn-down:hover {
            background-color: #e55656;
            border-color: #e55656;
            color: #ffffff;
            transform: translateY(-1px);
        }
        
        .table-row-hover:hover {
            background-color: var(--hover-bg);
            cursor: pointer;
        }
        
        .cursor-pointer {
            cursor: pointer;
        }
        
        .balance-list {
            max-height: 200px;
            overflow-y: auto;
        }
        
        .smaller {
            font-size: 0.7rem;
        }
        
        .btn-xs {
            padding: 2px 8px;
            font-size: 0.7rem;
        }
        
        /* Responsive adjustments for trading layout */
        @media (max-width: 1400px) {
            #second {
                order: 1;
            }
            #third {
                order: 3;
            }
            #fourth {
                order: 2;
            }
        }
        
        @media (max-width: 992px) {
            .trading-layout {
                grid-template-columns: 1fr;
            }
            
            #second, #third, #fourth {
                order: unset;
            }
        }
        
        /* TradingView chart theming */
        #tradingview_chart {
            background-color: var(--bg-secondary);
            border-radius: 8px;
        }
        
        /* Enhanced form styling */
        .form-control-sm {
            background-color: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            font-size: 12px;
        }
        
        .form-control-sm:focus {
            background-color: var(--bg-tertiary);
            border-color: var(--accent-yellow);
            color: var(--text-primary);
            box-shadow: 0 0 0 0.1rem rgba(255, 193, 7, 0.25);
        }
        
        .input-group-sm .btn {
            font-size: 11px;
            padding: 4px 8px;
        }
        
        /* Badge enhancements */
        .badge {
            font-size: 0.7rem;
            font-weight: 600;
        }
        
        .bg-secondary.badge {
            background-color: #6c757d !important;
        }
        
        .bg-info.badge {
            background-color: #17a2b8 !important;
        }
        
        .bg-warning.badge {
            background-color: #ffc107 !important;
            color: #000000 !important;
        }
        
        /* Table enhancements for better readability */
        .table-borderless th,
        .table-borderless td {
            border: none;
        }
        
        .table-active {
            background-color: rgba(255, 193, 7, 0.1) !important;
        }
        
        /* Scroll improvements */
        .table-responsive {
            scrollbar-width: thin;
            scrollbar-color: var(--border-color) transparent;
        }
        
        .table-responsive::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }
        
        .table-responsive::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .table-responsive::-webkit-scrollbar-thumb {
            background-color: var(--border-color);
            border-radius: 2px;
        }
    </style>
@endsection

@section('content')
    <!-- Main Dashboard: 4-Column Layout - 100% Exact Design Match -->
    <div class="row g-2 pb-2 animation-element">
        <!-- Order Book | Market Trades -->
        <div id="second" class="col-12 col-xxl-2 col-xl-3 col-lg-6">
            <div class="tab-content card-bs table-temp3 p-2">
                <!-- Tab -->
                <div class="nav nav-pills nav-justified card-bs-tabs gap-2 p-1">
                    <button class="nav-link active" id="book-tab" data-bs-toggle="tab" data-bs-target="#book-tab-pane">Order Book</button>
                    <button class="nav-link" id="market-tab" data-bs-toggle="tab" data-bs-target="#market-tab-pane">Market Trades</button>
                </div>
                
                <!-- Order Book -->
                <div class="tab-pane fade show active" id="book-tab-pane">
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
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-down">76,2<span class="text-down text-opacity-75">48.96</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-down">76,2<span class="text-down text-opacity-75">48.95</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-down">76,2<span class="text-down text-opacity-75">48.94</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-down">76,2<span class="text-down text-opacity-75">48.93</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-down">76,2<span class="text-down text-opacity-75">48.92</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-down">76,2<span class="text-down text-opacity-75">48.91</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-down">76,2<span class="text-down text-opacity-75">48.90</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr class="table-active mb-0">
                                    <th scope="row" class="text-danger fs-6 fw-bold">76,248.96 <img alt="" src="{{ asset('assets1/images/icon/down.svg') }}" width="10"></th>
                                    <td colspan="2" class="text-primary">≈ 76.706,32 USD</td>
                                </tr>
                                <tr>
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">48.97</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">48.98</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">48.99</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">49.00</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">49.01</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">49.02</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                                <tr>
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">49.03</span></td>
                                    <td>0.536</td>
                                    <td>6.345</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Market Trades -->
                <div class="tab-pane fade" id="market-tab-pane">
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
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">48.96</span></td>
                                    <td>0.045</td>
                                    <td>04:32:56</td>
                                </tr>
                                <tr>
                                    <td class="text-down">76,2<span class="text-down text-opacity-75">48.96</span></td>
                                    <td>0.045</td>
                                    <td>04:32:56</td>
                                </tr>
                                <tr>
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">48.96</span></td>
                                    <td>0.045</td>
                                    <td>04:32:56</td>
                                </tr>
                                <tr>
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">48.96</span></td>
                                    <td>0.045</td>
                                    <td>04:32:56</td>
                                </tr>
                                <tr>
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">48.96</span></td>
                                    <td>0.045</td>
                                    <td>04:32:56</td>
                                </tr>
                                <tr>
                                    <td class="text-down">76,2<span class="text-down text-opacity-75">48.96</span></td>
                                    <td>0.045</td>
                                    <td>04:32:56</td>
                                </tr>
                                <tr>
                                    <td class="text-up">76,2<span class="text-up text-opacity-50">48.96</span></td>
                                    <td>0.045</td>
                                    <td>04:32:56</td>
                                </tr>
                                <tr>
                                    <td class="text-down">76,2<span class="text-down text-opacity-75">48.96</span></td>
                                    <td>0.045</td>
                                    <td>04:32:56</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
               </div>
            </div>
        </div>

        <!-- Central Column: TradingView Charts & Buy/Sell Forms -->
        <div id="third" class="col-12 col-xxl-5 col-xl-6 col-lg-12">
            <div class="row g-0 h-100">
                <!-- Top Section: Watchlist/Favorites -->
                <div class="col-12">
                    <div class="card-bs p-2 mb-2">
                        <div class="nav nav-pills nav-justified card-bs-tabs gap-2 p-1 mb-2">
                            <button class="nav-link active" id="favorites-tab" data-bs-toggle="tab" data-bs-target="#favorites-tab-pane">Favorites</button>
                            <button class="nav-link" id="spot-tab" data-bs-toggle="tab" data-bs-target="#spot-tab-pane">Spot</button>
                            <button class="nav-link" id="futures-tab" data-bs-toggle="tab" data-bs-target="#futures-tab-pane">Futures</button>
                        </div>
                        
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="favorites-tab-pane">
                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless text-center">
                                        <thead>
                                            <tr class="text-muted">
                                                <th>Pair</th>
                                                <th>Price</th>
                                                <th>Change</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-row-hover cursor-pointer">
                                                <td><strong>BTC/USDT</strong></td>
                                                <td>43,248.96</td>
                                                <td class="text-up">+2.45%</td>
                                            </tr>
                                            <tr class="table-row-hover cursor-pointer">
                                                <td><strong>ETH/USDT</strong></td>
                                                <td>2,548.73</td>
                                                <td class="text-down">-1.23%</td>
                                            </tr>
                                            <tr class="table-row-hover cursor-pointer">
                                                <td><strong>XRP/USDT</strong></td>
                                                <td>0.6234</td>
                                                <td class="text-up">+5.67%</td>
                                            </tr>
                                            <tr class="table-row-hover cursor-pointer">
                                                <td><strong>ADA/USDT</strong></td>
                                                <td>0.4523</td>
                                                <td class="text-down">-0.89%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="spot-tab-pane">
                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless text-center">
                                        <thead>
                                            <tr class="text-muted">
                                                <th>Pair</th>
                                                <th>Price</th>
                                                <th>Change</th>
                                                <th>Volume</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-row-hover cursor-pointer">
                                                <td><strong>BTC/USDT</strong></td>
                                                <td>43,248.96</td>
                                                <td class="text-up">+2.45%</td>
                                                <td>1.2B</td>
                                            </tr>
                                            <tr class="table-row-hover cursor-pointer">
                                                <td><strong>ETH/USDT</strong></td>
                                                <td>2,548.73</td>
                                                <td class="text-down">-1.23%</td>
                                                <td>845M</td>
                                            </tr>
                                            <tr class="table-row-hover cursor-pointer">
                                                <td><strong>BNB/USDT</strong></td>
                                                <td>312.45</td>
                                                <td class="text-up">+3.21%</td>
                                                <td>234M</td>
                                            </tr>
                                            <tr class="table-row-hover cursor-pointer">
                                                <td><strong>SOL/USDT</strong></td>
                                                <td>89.67</td>
                                                <td class="text-up">+7.89%</td>
                                                <td>456M</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="futures-tab-pane">
                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless text-center">
                                        <thead>
                                            <tr class="text-muted">
                                                <th>Symbol</th>
                                                <th>Mark Price</th>
                                                <th>Change</th>
                                                <th>Funding</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-row-hover cursor-pointer">
                                                <td><strong>BTCUSDT</strong></td>
                                                <td>43,251.20</td>
                                                <td class="text-up">+2.47%</td>
                                                <td class="text-up">0.0125%</td>
                                            </tr>
                                            <tr class="table-row-hover cursor-pointer">
                                                <td><strong>ETHUSDT</strong></td>
                                                <td>2,549.45</td>
                                                <td class="text-down">-1.21%</td>
                                                <td class="text-down">-0.0089%</td>
                                            </tr>
                                            <tr class="table-row-hover cursor-pointer">
                                                <td><strong>ADAUSDT</strong></td>
                                                <td>0.4525</td>
                                                <td class="text-down">-0.87%</td>
                                                <td class="text-up">0.0156%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Chart Section: TradingView Widget -->
                <div class="col-12">
                    <div class="card-bs p-2 mb-2" style="height: 500px;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 me-3">BTC/USDT</h5>
                                <span class="badge bg-up me-2">43,248.96</span>
                                <span class="text-up">+2.45%</span>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-secondary btn-sm active">1m</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">5m</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">15m</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">1h</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">4h</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">1d</button>
                            </div>
                        </div>
                        
                        <!-- TradingView Chart Container -->
                        <div id="tradingview_chart" style="height: calc(100% - 50px); width: 100%;"></div>
                    </div>
                </div>
                
                <!-- Trading Forms Section -->
                <div class="col-12">
                    <div class="card-bs p-2">
                        <div class="nav nav-pills nav-justified card-bs-tabs gap-2 p-1 mb-3">
                            <button class="nav-link active" id="limit-tab" data-bs-toggle="tab" data-bs-target="#limit-tab-pane">Limit</button>
                            <button class="nav-link" id="market-order-tab" data-bs-toggle="tab" data-bs-target="#market-tab-pane">Market</button>
                            <button class="nav-link" id="stop-limit-tab" data-bs-toggle="tab" data-bs-target="#stop-limit-tab-pane">Stop-Limit</button>
                        </div>
                        
                        <div class="tab-content">
                            <!-- Limit Order Tab -->
                            <div class="tab-pane fade show active" id="limit-tab-pane">
                                <div class="row g-2">
                                    <!-- Buy Form -->
                                    <div class="col-6">
                                        <div class="border-end pe-2">
                                            <h6 class="text-up mb-2">Buy BTC</h6>
                                            <div class="mb-2">
                                                <label class="form-label small">Available</label>
                                                <div class="text-muted small">2,548.73 USDT</div>
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Price (USDT)</label>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" id="price" value="43,248.96">
                                                    <button class="btn btn-outline-secondary" type="button">Market</button>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Amount (BTC)</label>
                                                <input type="text" class="form-control form-control-sm" id="amount" placeholder="0.00">
                                            </div>
                                            
                                            <div class="mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <button class="btn btn-outline-secondary btn-sm percentage-btn" data-percentage="25">25%</button>
                                                    <button class="btn btn-outline-secondary btn-sm percentage-btn" data-percentage="50">50%</button>
                                                    <button class="btn btn-outline-secondary btn-sm percentage-btn" data-percentage="75">75%</button>
                                                    <button class="btn btn-outline-secondary btn-sm percentage-btn" data-percentage="100">100%</button>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label small">Total (USDT)</label>
                                                <input type="text" class="form-control form-control-sm" id="total" placeholder="0.00">
                                            </div>
                                            
                                            <button class="btn btn-up w-100">Buy BTC</button>
                                        </div>
                                    </div>
                                    
                                    <!-- Sell Form -->
                                    <div class="col-6">
                                        <div class="ps-2">
                                            <h6 class="text-down mb-2">Sell BTC</h6>
                                            <div class="mb-2">
                                                <label class="form-label small">Available</label>
                                                <div class="text-muted small available-balance">0.00524 BTC</div>
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Price (USDT)</label>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" value="43,248.96">
                                                    <button class="btn btn-outline-secondary" type="button">Market</button>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Amount (BTC)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <div class="mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <button class="btn btn-outline-secondary btn-sm">25%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">50%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">75%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">100%</button>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label small">Total (USDT)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <button class="btn btn-down w-100">Sell BTC</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Market Order Tab -->
                            <div class="tab-pane fade" id="market-tab-pane">
                                <div class="row g-2">
                                    <!-- Market Buy Form -->
                                    <div class="col-6">
                                        <div class="border-end pe-2">
                                            <h6 class="text-up mb-2">Buy BTC</h6>
                                            <div class="mb-2">
                                                <label class="form-label small">Available</label>
                                                <div class="text-muted small">2,548.73 USDT</div>
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Amount (BTC)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <div class="mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <button class="btn btn-outline-secondary btn-sm">25%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">50%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">75%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">100%</button>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label small">Est. Total (USDT)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00" readonly>
                                            </div>
                                            
                                            <button class="btn btn-up w-100">Buy BTC</button>
                                        </div>
                                    </div>
                                    
                                    <!-- Market Sell Form -->
                                    <div class="col-6">
                                        <div class="ps-2">
                                            <h6 class="text-down mb-2">Sell BTC</h6>
                                            <div class="mb-2">
                                                <label class="form-label small">Available</label>
                                                <div class="text-muted small">0.00524 BTC</div>
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Amount (BTC)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <div class="mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <button class="btn btn-outline-secondary btn-sm">25%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">50%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">75%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">100%</button>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label small">Est. Total (USDT)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00" readonly>
                                            </div>
                                            
                                            <button class="btn btn-down w-100">Sell BTC</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Stop-Limit Order Tab -->
                            <div class="tab-pane fade" id="stop-limit-tab-pane">
                                <div class="row g-2">
                                    <!-- Stop-Limit Buy Form -->
                                    <div class="col-6">
                                        <div class="border-end pe-2">
                                            <h6 class="text-up mb-2">Buy BTC</h6>
                                            <div class="mb-2">
                                                <label class="form-label small">Available</label>
                                                <div class="text-muted small">2,548.73 USDT</div>
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Stop Price (USDT)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Limit Price (USDT)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Amount (BTC)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <div class="mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <button class="btn btn-outline-secondary btn-sm">25%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">50%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">75%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">100%</button>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label small">Total (USDT)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <button class="btn btn-up w-100">Buy BTC</button>
                                        </div>
                                    </div>
                                    
                                    <!-- Stop-Limit Sell Form -->
                                    <div class="col-6">
                                        <div class="ps-2">
                                            <h6 class="text-down mb-2">Sell BTC</h6>
                                            <div class="mb-2">
                                                <label class="form-label small">Available</label>
                                                <div class="text-muted small">0.00524 BTC</div>
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Stop Price (USDT)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Limit Price (USDT)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label small">Amount (BTC)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <div class="mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <button class="btn btn-outline-secondary btn-sm">25%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">50%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">75%</button>
                                                    <button class="btn btn-outline-secondary btn-sm">100%</button>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label small">Total (USDT)</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="0.00">
                                            </div>
                                            
                                            <button class="btn btn-down w-100">Sell BTC</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Balance, Orders, History -->
        <div id="fourth" class="col-12 col-xxl-3 col-xl-3 col-lg-6">
            <div class="row g-0 h-100">
                <!-- Balance Section -->
                <div class="col-12">
                    <div class="card-bs p-2 mb-2">
                        <h6 class="mb-2">Spot Wallet</h6>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Total Balance</span>
                            <span class="fw-bold">≈ 2,774.52 USDT</span>
                        </div>
                        
                        <div class="balance-list">
                            <div class="d-flex justify-content-between align-items-center py-1">
                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-2">BTC</small>
                                </div>
                                <div class="text-end">
                                    <div class="small">0.00524000</div>
                                    <div class="text-muted smaller">≈ 226.42 USDT</div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center py-1">
                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-2">ETH</small>
                                </div>
                                <div class="text-end">
                                    <div class="small">0.12450000</div>
                                    <div class="text-muted smaller">≈ 317.32 USDT</div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center py-1">
                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-2">USDT</small>
                                </div>
                                <div class="text-end">
                                    <div class="small">2,230.78000</div>
                                    <div class="text-muted smaller">≈ 2,230.78 USDT</div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center py-1">
                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-2">BNB</small>
                                </div>
                                <div class="text-end">
                                    <div class="small">0.00000000</div>
                                    <div class="text-muted smaller">≈ 0.00 USDT</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2 mt-3">
                            <button class="btn btn-primary btn-sm flex-fill">Deposit</button>
                            <button class="btn btn-outline-secondary btn-sm flex-fill">Withdraw</button>
                            <button class="btn btn-outline-secondary btn-sm flex-fill">Transfer</button>
                        </div>
                    </div>
                </div>
                
                <!-- Orders & History Section -->
                <div class="col-12 flex-fill">
                    <div class="card-bs table-temp3 p-2 h-100">
                        <div class="nav nav-pills nav-justified card-bs-tabs gap-2 p-1 mb-2">
                            <button class="nav-link active" id="open-orders-tab" data-bs-toggle="tab" data-bs-target="#open-orders-tab-pane">Open Orders</button>
                            <button class="nav-link" id="order-history-tab" data-bs-toggle="tab" data-bs-target="#order-history-tab-pane">Order History</button>
                            <button class="nav-link" id="trade-history-tab" data-bs-toggle="tab" data-bs-target="#trade-history-tab-pane">Trade History</button>
                        </div>
                        
                        <div class="tab-content h-100">
                            <!-- Open Orders Tab -->
                            <div class="tab-pane fade show active h-100" id="open-orders-tab-pane">
                                <div class="table-responsive h-100">
                                    <table class="table table-sm table-borderless">
                                        <thead>
                                            <tr class="text-muted small">
                                                <th>Date</th>
                                                <th>Pair</th>
                                                <th>Type</th>
                                                <th>Side</th>
                                                <th>Amount</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="small">2024-01-15<br><span class="text-muted smaller">14:32</span></td>
                                                <td class="small">BTC/USDT</td>
                                                <td><span class="badge bg-secondary">Limit</span></td>
                                                <td><span class="text-up">Buy</span></td>
                                                <td class="small">0.0025</td>
                                                <td class="small">42,500.00</td>
                                                <td>
                                                    <button class="btn btn-outline-danger btn-xs">Cancel</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small">2024-01-15<br><span class="text-muted smaller">13:45</span></td>
                                                <td class="small">ETH/USDT</td>
                                                <td><span class="badge bg-secondary">Limit</span></td>
                                                <td><span class="text-down">Sell</span></td>
                                                <td class="small">0.1</td>
                                                <td class="small">2,600.00</td>
                                                <td>
                                                    <button class="btn btn-outline-danger btn-xs">Cancel</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="small">2024-01-15<br><span class="text-muted smaller">12:15</span></td>
                                                <td class="small">XRP/USDT</td>
                                                <td><span class="badge bg-warning">Stop</span></td>
                                                <td><span class="text-up">Buy</span></td>
                                                <td class="small">1000</td>
                                                <td class="small">0.6500</td>
                                                <td>
                                                    <button class="btn btn-outline-danger btn-xs">Cancel</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <!-- Order History Tab -->
                            <div class="tab-pane fade h-100" id="order-history-tab-pane">
                                <div class="table-responsive h-100">
                                    <table class="table table-sm table-borderless">
                                        <thead>
                                            <tr class="text-muted small">
                                                <th>Date</th>
                                                <th>Pair</th>
                                                <th>Type</th>
                                                <th>Side</th>
                                                <th>Amount</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="small">2024-01-14<br><span class="text-muted smaller">16:22</span></td>
                                                <td class="small">BTC/USDT</td>
                                                <td><span class="badge bg-secondary">Limit</span></td>
                                                <td><span class="text-up">Buy</span></td>
                                                <td class="small">0.002</td>
                                                <td class="small">43,100.00</td>
                                                <td><span class="badge bg-success">Filled</span></td>
                                            </tr>
                                            <tr>
                                                <td class="small">2024-01-14<br><span class="text-muted smaller">15:18</span></td>
                                                <td class="small">ETH/USDT</td>
                                                <td><span class="badge bg-info">Market</span></td>
                                                <td><span class="text-down">Sell</span></td>
                                                <td class="small">0.05</td>
                                                <td class="small">2,540.50</td>
                                                <td><span class="badge bg-success">Filled</span></td>
                                            </tr>
                                            <tr>
                                                <td class="small">2024-01-14<br><span class="text-muted smaller">14:45</span></td>
                                                <td class="small">ADA/USDT</td>
                                                <td><span class="badge bg-secondary">Limit</span></td>
                                                <td><span class="text-up">Buy</span></td>
                                                <td class="small">500</td>
                                                <td class="small">0.4500</td>
                                                <td><span class="badge bg-danger">Cancelled</span></td>
                                            </tr>
                                            <tr>
                                                <td class="small">2024-01-14<br><span class="text-muted smaller">13:30</span></td>
                                                <td class="small">BNB/USDT</td>
                                                <td><span class="badge bg-info">Market</span></td>
                                                <td><span class="text-up">Buy</span></td>
                                                <td class="small">1.5</td>
                                                <td class="small">310.25</td>
                                                <td><span class="badge bg-success">Filled</span></td>
                                            </tr>
                                            <tr>
                                                <td class="small">2024-01-13<br><span class="text-muted smaller">17:22</span></td>
                                                <td class="small">SOL/USDT</td>
                                                <td><span class="badge bg-secondary">Limit</span></td>
                                                <td><span class="text-down">Sell</span></td>
                                                <td class="small">5</td>
                                                <td class="small">95.75</td>
                                                <td><span class="badge bg-success">Filled</span></td>
                                            </tr>
                                            <tr>
                                                <td class="small">2024-01-13<br><span class="text-muted smaller">16:10</span></td>
                                                <td class="small">DOT/USDT</td>
                                                <td><span class="badge bg-warning">Stop</span></td>
                                                <td><span class="text-up">Buy</span></td>
                                                <td class="small">25</td>
                                                <td class="small">7.50</td>
                                                <td><span class="badge bg-warning">Expired</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <!-- Trade History Tab -->
                            <div class="tab-pane fade h-100" id="trade-history-tab-pane">
                                <div class="table-responsive h-100">
                                    <table class="table table-sm table-borderless">
                                        <thead>
                                            <tr class="text-muted small">
                                                <th>Date</th>
                                                <th>Pair</th>
                                                <th>Side</th>
                                                <th>Amount</th>
                                                <th>Price</th>
                                                <th>Fee</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="small">2024-01-14<br><span class="text-muted smaller">16:22</span></td>
                                                <td class="small">BTC/USDT</td>
                                                <td><span class="text-up">Buy</span></td>
                                                <td class="small">0.002</td>
                                                <td class="small">43,100.00</td>
                                                <td class="small">0.086 USDT</td>
                                                <td class="small">86.20 USDT</td>
                                            </tr>
                                            <tr>
                                                <td class="small">2024-01-14<br><span class="text-muted smaller">15:18</span></td>
                                                <td class="small">ETH/USDT</td>
                                                <td><span class="text-down">Sell</span></td>
                                                <td class="small">0.05</td>
                                                <td class="small">2,540.50</td>
                                                <td class="small">0.127 USDT</td>
                                                <td class="small">127.03 USDT</td>
                                            </tr>
                                            <tr>
                                                <td class="small">2024-01-14<br><span class="text-muted smaller">13:30</span></td>
                                                <td class="small">BNB/USDT</td>
                                                <td><span class="text-up">Buy</span></td>
                                                <td class="small">1.5</td>
                                                <td class="small">310.25</td>
                                                <td class="small">0.465 USDT</td>
                                                <td class="small">465.38 USDT</td>
                                            </tr>
                                            <tr>
                                                <td class="small">2024-01-13<br><span class="text-muted smaller">17:22</span></td>
                                                <td class="small">SOL/USDT</td>
                                                <td><span class="text-down">Sell</span></td>
                                                <td class="small">5</td>
                                                <td class="small">95.75</td>
                                                <td class="small">0.479 USDT</td>
                                                <td class="small">478.75 USDT</td>
                                            </tr>
                                            <tr>
                                                <td class="small">2024-01-13<br><span class="text-muted smaller">14:45</span></td>
                                                <td class="small">LINK/USDT</td>
                                                <td><span class="text-up">Buy</span></td>
                                                <td class="small">20</td>
                                                <td class="small">14.85</td>
                                                <td class="small">0.297 USDT</td>
                                                <td class="small">297.00 USDT</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Auto-calculate total when price or amount changes
            $('#price, #amount').on('input', function() {
                const price = parseFloat($('#price').val()) || 0;
                const amount = parseFloat($('#amount').val()) || 0;
                const total = price * amount;
                $('#total').val(total.toFixed(8));
            });

            // Percentage Buttons
            $('.percentage-btn').click(function() {
                const percentage = parseFloat($(this).data('percentage'));
                const available = parseFloat($('.available-balance').text()) || 0;
                const price = parseFloat($('#price').val()) || 0;
                
                if (price > 0) {
                    const amount = (available * percentage / 100) / price;
                    $('#amount').val(amount.toFixed(8));
                    $('#total').val((amount * price).toFixed(8));
                }
            });

            // Market Data Updates
            function updateMarketData() {
                $('.market-row').each(function() {
                    const changeElement = $(this).find('.change-percent');
                    const currentChange = parseFloat(changeElement.text().replace('%', ''));
                    const newChange = currentChange + (Math.random() - 0.5) * 2;
                    
                    changeElement.text(newChange.toFixed(2) + '%');
                    
                    if (newChange > 0) {
                        changeElement.removeClass('text-down').addClass('text-up');
                    } else {
                        changeElement.removeClass('text-up').addClass('text-down');
                    }
                });
            }

            setInterval(updateMarketData, 5000);

            // Initialize TradingView Chart
            function initTradingViewChart() {
                if (typeof TradingView !== 'undefined') {
                    new TradingView.widget({
                        "autosize": true,
                        "symbol": "BINANCE:BTCUSDT",
                        "interval": "1",
                        "timezone": "Etc/UTC",
                        "theme": "dark",
                        "style": "1",
                        "locale": "en",
                        "toolbar_bg": "#f1f3f6",
                        "enable_publishing": false,
                        "withdateranges": true,
                        "range": "YTD",
                        "hide_side_toolbar": false,
                        "allow_symbol_change": true,
                        "details": true,
                        "hotlist": true,
                        "calendar": false,
                        "container_id": "tradingview_chart"
                    });
                }
            }

            // Initialize chart after a short delay
            setTimeout(initTradingViewChart, 1000);
        });
    </script>
@endsection