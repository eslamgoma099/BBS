@extends('backend.layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main Trading Area -->
        <div class="col-lg-9 col-xl-9">
            <div class="row g-3">
                <!-- Order Book & Recent Trades -->
                <div class="col-lg-4">
                    <!-- Order Book -->
                    <div class="card bg-dark border-secondary h-100">
                        <div class="card-header bg-transparent border-secondary">
                            <ul class="nav nav-pills nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#orderbook">Order Book</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#trades">Trades</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-0">
                            <div class="tab-content">
                                <!-- Order Book Tab -->
                                <div class="tab-pane fade show active" id="orderbook">
                                    <div class="table-responsive" style="height: 500px; overflow-y: auto;">
                                        <table class="table table-dark table-sm mb-0">
                                            <thead class="sticky-top bg-dark">
                                                <tr class="text-muted">
                                                    <th class="border-0 text-center">Price (USDT)</th>
                                                    <th class="border-0 text-center">Quantity</th>
                                                    <th class="border-0 text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Sell Orders (Red) -->
                                                @for ($i = 1; $i <= 10; $i++)
                                                <tr class="border-0">
                                                    <td class="text-danger text-center py-1">{{ number_format(76294 + $i * 10, 2) }}</td>
                                                    <td class="text-center py-1">{{ number_format(rand(10, 50) / 100, 4) }}</td>
                                                    <td class="text-center py-1">{{ number_format(rand(100, 500) / 1000, 6) }}</td>
                                                </tr>
                                                @endfor
                                                
                                                <!-- Current Price -->
                                                <tr class="bg-warning text-dark fw-bold">
                                                    <td colspan="3" class="text-center py-2">
                                                        76,294.82 USDT
                                                        <i class="fas fa-arrow-up ms-2"></i>
                                                    </td>
                                                </tr>
                                                
                                                <!-- Buy Orders (Green) -->
                                                @for ($i = 1; $i <= 10; $i++)
                                                <tr class="border-0">
                                                    <td class="text-success text-center py-1">{{ number_format(76294 - $i * 10, 2) }}</td>
                                                    <td class="text-center py-1">{{ number_format(rand(10, 50) / 100, 4) }}</td>
                                                    <td class="text-center py-1">{{ number_format(rand(100, 500) / 1000, 6) }}</td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <!-- Recent Trades Tab -->
                                <div class="tab-pane fade" id="trades">
                                    <div class="table-responsive" style="height: 500px; overflow-y: auto;">
                                        <table class="table table-dark table-sm mb-0">
                                            <thead class="sticky-top bg-dark">
                                                <tr class="text-muted">
                                                    <th class="border-0">Price (USDT)</th>
                                                    <th class="border-0">Quantity</th>
                                                    <th class="border-0">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for ($i = 0; $i < 30; $i++)
                                                @php $isBuy = $i % 3 !== 0; @endphp
                                                <tr class="border-0">
                                                    <td class="{{ $isBuy ? 'text-success' : 'text-danger' }} py-1">
                                                        {{ number_format(76294 + ($isBuy ? 1 : -1) * rand(1, 30), 2) }}
                                                    </td>
                                                    <td class="py-1">{{ number_format(rand(10, 100) / 1000, 4) }}</td>
                                                    <td class="text-muted py-1">{{ sprintf('%02d:%02d:%02d', rand(0, 23), rand(0, 59), rand(0, 59)) }}</td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Chart Area -->
                <div class="col-lg-8">
                    <div class="row g-3 h-100">
                        <!-- Price Info -->
                        <div class="col-12">
                            <div class="card bg-dark border-secondary">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('images/coin/btc.svg') }}" alt="BTC" width="32" height="32" class="me-2" onerror="this.style.display='none'">
                                                <div>
                                                    <h4 class="mb-0 text-warning">BTC/USDT</h4>
                                                    <small class="text-muted">Bitcoin</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h3 class="mb-0 text-warning">76,294.82</h3>
                                            <span class="text-success">+1,234.56 (+1.65%)</span>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-3">
                                        <div class="col-3">
                                            <small class="text-muted d-block">24h Change</small>
                                            <span class="text-success">+1.65%</span>
                                        </div>
                                        <div class="col-3">
                                            <small class="text-muted d-block">24h High</small>
                                            <span>77,456.89</span>
                                        </div>
                                        <div class="col-3">
                                            <small class="text-muted d-block">24h Low</small>
                                            <span>75,123.45</span>
                                        </div>
                                        <div class="col-3">
                                            <small class="text-muted d-block">24h Volume</small>
                                            <span>1,234.56 BTC</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Chart -->
                        <div class="col-12 flex-fill">
                            <div class="card bg-dark border-secondary h-100">
                                <div class="card-header bg-transparent border-secondary">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">Price Chart</h6>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary">1H</button>
                                            <button class="btn btn-warning">4H</button>
                                            <button class="btn btn-outline-secondary">1D</button>
                                            <button class="btn btn-outline-secondary">1W</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <i class="fas fa-chart-line fa-4x text-warning mb-3"></i>
                                        <h5 class="text-muted">TradingView Chart</h5>
                                        <p class="text-muted">Interactive price chart will be displayed here</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Trading Form -->
                        <div class="col-12">
                            <div class="card bg-dark border-secondary">
                                <div class="card-header bg-transparent border-secondary">
                                    <ul class="nav nav-pills nav-fill">
                                        <li class="nav-item">
                                            <a class="nav-link active bg-success text-white" data-bs-toggle="pill" href="#buy-form">Buy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-danger" data-bs-toggle="pill" href="#sell-form">Sell</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- Buy Form -->
                                        <div class="tab-pane fade show active" id="buy-form">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label text-muted small">Order Type</label>
                                                        <select class="form-select bg-dark text-white border-secondary">
                                                            <option>Limit</option>
                                                            <option>Market</option>
                                                            <option>Stop-Limit</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label text-muted small">Price (USDT)</label>
                                                        <input type="number" class="form-control bg-dark text-white border-secondary" placeholder="76,294.82" step="0.01">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label text-muted small">Amount (BTC)</label>
                                                        <input type="number" class="form-control bg-dark text-white border-secondary" placeholder="0.0000" step="0.0001">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label text-muted small">Total (USDT)</label>
                                                        <input type="number" class="form-control bg-dark text-white border-secondary" placeholder="0.00" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label text-muted small">Available</label>
                                                        <div class="form-control bg-dark text-white border-secondary">
                                                            {{ number_format(auth()->user()->balance ?? 1234.56, 2) }} USDT
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="text-muted small">Fee: 0.1%</span>
                                                <span class="text-muted small">≈ 7.63 USDT</span>
                                            </div>
                                            
                                            <button class="btn btn-success w-100">Buy BTC</button>
                                        </div>
                                        
                                        <!-- Sell Form -->
                                        <div class="tab-pane fade" id="sell-form">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label text-muted small">Order Type</label>
                                                        <select class="form-select bg-dark text-white border-secondary">
                                                            <option>Limit</option>
                                                            <option>Market</option>
                                                            <option>Stop-Limit</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label text-muted small">Price (USDT)</label>
                                                        <input type="number" class="form-control bg-dark text-white border-secondary" placeholder="76,294.82" step="0.01">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label text-muted small">Amount (BTC)</label>
                                                        <input type="number" class="form-control bg-dark text-white border-secondary" placeholder="0.0000" step="0.0001">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label text-muted small">Total (USDT)</label>
                                                        <input type="number" class="form-control bg-dark text-white border-secondary" placeholder="0.00" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label text-muted small">Available</label>
                                                        <div class="form-control bg-dark text-white border-secondary">
                                                            {{ number_format(auth()->user()->balance ?? 0.001245, 6) }} BTC
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="text-muted small">Fee: 0.1%</span>
                                                <span class="text-muted small">≈ 0.000076 BTC</span>
                                            </div>
                                            
                                            <button class="btn btn-danger w-100">Sell BTC</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Orders Section -->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card bg-dark border-secondary">
                        <div class="card-header bg-transparent border-secondary">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#open-orders">Open Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#order-history">Order History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#trade-history">Trade History</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- Open Orders -->
                                <div class="tab-pane fade show active" id="open-orders">
                                    <div class="text-center py-5">
                                        <img src="{{ asset('images/empty-state.svg') }}" alt="No orders" width="100" class="mb-3 opacity-50" onerror="this.style.display='none'">
                                        <h6 class="text-muted">No Open Orders</h6>
                                        <p class="text-muted small">Your active orders will appear here</p>
                                    </div>
                                </div>
                                
                                <!-- Order History -->
                                <div class="tab-pane fade" id="order-history">
                                    <div class="text-center py-5">
                                        <img src="{{ asset('images/empty-state.svg') }}" alt="No history" width="100" class="mb-3 opacity-50" onerror="this.style.display='none'">
                                        <h6 class="text-muted">No Order History</h6>
                                        <p class="text-muted small">Your order history will appear here</p>
                                    </div>
                                </div>
                                
                                <!-- Trade History -->
                                <div class="tab-pane fade" id="trade-history">
                                    <div class="text-center py-5">
                                        <img src="{{ asset('images/empty-state.svg') }}" alt="No trades" width="100" class="mb-3 opacity-50" onerror="this.style.display='none'">
                                        <h6 class="text-muted">No Trade History</h6>
                                        <p class="text-muted small">Your executed trades will appear here</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Sidebar - Markets & Assets -->
        <div class="col-lg-3 col-xl-3">
            <div class="row g-3">
                <!-- Account Summary -->
                <div class="col-12">
                    <div class="card bg-dark border-secondary">
                        <div class="card-header bg-transparent border-secondary">
                            <h6 class="mb-0">Account Summary</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fab fa-bitcoin text-dark"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Bitcoin BTC</h6>
                                    <small class="text-muted">{{ number_format(auth()->user()->balance ?? 0.001245, 6) }} BTC</small>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted small">USD Value</span>
                                    <span>${{ number_format((auth()->user()->balance ?? 0.001245) * 76294.82, 2) }}</span>
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button class="btn btn-warning btn-sm">Convert</button>
                                <div class="row g-1">
                                    <div class="col-6">
                                        <button class="btn btn-outline-success btn-sm w-100">Deposit</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-outline-danger btn-sm w-100">Withdraw</button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Asset Distribution -->
                            <div class="mt-3">
                                <small class="text-muted d-block mb-2">Asset Distribution</small>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="small">Spot</span>
                                    <span class="small">{{ number_format((auth()->user()->balance ?? 0.001245) * 0.8, 6) }} BTC</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="small">Earn</span>
                                    <span class="small">{{ number_format((auth()->user()->balance ?? 0.001245) * 0.2, 6) }} BTC</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Market Pairs -->
                <div class="col-12">
                    <div class="card bg-dark border-secondary">
                        <div class="card-header bg-transparent border-secondary">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Markets</h6>
                                <div class="btn-group btn-group-sm" role="group">
                                    <button class="btn btn-warning btn-sm active" data-market="BTC">BTC</button>
                                    <button class="btn btn-outline-secondary btn-sm" data-market="ETH">ETH</button>
                                    <button class="btn btn-outline-secondary btn-sm" data-market="USDT">USDT</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive" style="height: 400px; overflow-y: auto;">
                                <table class="table table-dark table-hover table-sm mb-0">
                                    <thead class="sticky-top bg-dark">
                                        <tr class="text-muted">
                                            <th class="border-0">Pairs</th>
                                            <th class="border-0 text-end">Price</th>
                                            <th class="border-0 text-end">Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $marketPairs = [
                                            ['pair' => 'BTC/USDT', 'price' => 76294.82, 'change' => 2.34, 'positive' => true],
                                            ['pair' => 'ETH/BTC', 'price' => 0.04256, 'change' => -0.87, 'positive' => false],
                                            ['pair' => 'ADA/BTC', 'price' => 0.000012, 'change' => 5.67, 'positive' => true],
                                            ['pair' => 'XRP/BTC', 'price' => 0.000008, 'change' => 1.23, 'positive' => true],
                                            ['pair' => 'DOT/BTC', 'price' => 0.000098, 'change' => -1.45, 'positive' => false],
                                            ['pair' => 'SOL/BTC', 'price' => 0.002456, 'change' => 3.21, 'positive' => true],
                                            ['pair' => 'MATIC/BTC', 'price' => 0.000011, 'change' => -2.11, 'positive' => false],
                                            ['pair' => 'AVAX/BTC', 'price' => 0.000456, 'change' => 4.56, 'positive' => true],
                                        ];
                                        @endphp
                                        
                                        @foreach($marketPairs as $market)
                                        <tr class="border-0 cursor-pointer market-row" data-pair="{{ $market['pair'] }}">
                                            <td class="py-2">
                                                <div class="d-flex align-items-center">
                                                    <small class="fw-bold">{{ $market['pair'] }}</small>
                                                </div>
                                            </td>
                                            <td class="text-end py-2">
                                                <small>{{ number_format($market['price'], 8) }}</small>
                                            </td>
                                            <td class="text-end py-2">
                                                <small class="{{ $market['positive'] ? 'text-success' : 'text-danger' }}">
                                                    {{ $market['positive'] ? '+' : '' }}{{ number_format($market['change'], 2) }}%
                                                </small>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Notifications -->
                <div class="col-12">
                    <div class="card bg-dark border-secondary">
                        <div class="card-header bg-transparent border-secondary">
                            <h6 class="mb-0">Notifications</h6>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item bg-transparent border-secondary p-2">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                                        <div>
                                            <small class="text-muted">Login successful</small>
                                            <div class="text-muted" style="font-size: 11px;">2 minutes ago</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item bg-transparent border-secondary p-2">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                                        <div>
                                            <small class="text-muted">Security alert</small>
                                            <div class="text-muted" style="font-size: 11px;">1 hour ago</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item bg-transparent border-secondary p-2">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-info rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                                        <div>
                                            <small class="text-muted">Trade executed</small>
                                            <div class="text-muted" style="font-size: 11px;">3 hours ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
/* Exchange Custom Styles */
.cursor-pointer {
    cursor: pointer;
}

.market-row:hover {
    background-color: rgba(255, 193, 7, 0.1) !important;
}

.nav-pills .nav-link.active {
    background-color: var(--bs-warning);
    color: var(--bs-dark);
}

.card {
    backdrop-filter: blur(10px);
}

.table-dark {
    --bs-table-bg: transparent;
}

.sticky-top {
    z-index: 1020;
}

/* Trading Form Styles */
.tab-pane .btn.nav-link.active.bg-success {
    background-color: var(--bs-success) !important;
    border-color: var(--bs-success) !important;
}

.tab-pane .btn.nav-link.text-danger:hover {
    background-color: var(--bs-danger) !important;
    color: white !important;
}

/* Responsive adjustments */
@media (max-width: 991px) {
    .col-lg-9 {
        margin-bottom: 2rem;
    }
}

@media (max-width: 767px) {
    .card-body {
        padding: 1rem;
    }
    
    .table-responsive {
        height: 300px !important;
    }
}

/* Animation for price updates */
@keyframes priceFlash {
    0% { background-color: rgba(255, 193, 7, 0.3); }
    100% { background-color: transparent; }
}

.price-updated {
    animation: priceFlash 0.5s ease-out;
}
</style>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Trading form functionality
    const buyTab = document.querySelector('a[href="#buy-form"]');
    const sellTab = document.querySelector('a[href="#sell-form"]');
    
    if (buyTab && sellTab) {
        buyTab.addEventListener('click', function() {
            this.classList.add('bg-success', 'text-white');
            this.classList.remove('text-success');
            sellTab.classList.remove('bg-danger', 'text-white');
            sellTab.classList.add('text-danger');
        });
        
        sellTab.addEventListener('click', function() {
            this.classList.add('bg-danger', 'text-white');
            this.classList.remove('text-danger');
            buyTab.classList.remove('bg-success', 'text-white');
            buyTab.classList.add('text-success');
        });
    }
    
    // Market pair selection
    const marketRows = document.querySelectorAll('.market-row');
    marketRows.forEach(row => {
        row.addEventListener('click', function() {
            const pair = this.dataset.pair;
            console.log(`Selected market pair: ${pair}`);
            
            // Update pair display
            const pairDisplay = document.querySelector('h4.text-warning');
            if (pairDisplay) {
                pairDisplay.textContent = pair;
            }
            
            // Highlight selected row
            marketRows.forEach(r => r.classList.remove('table-active'));
            this.classList.add('table-active');
        });
    });
    
    // Market filter buttons
    const marketButtons = document.querySelectorAll('[data-market]');
    marketButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active button
            marketButtons.forEach(b => {
                b.classList.remove('btn-warning', 'active');
                b.classList.add('btn-outline-secondary');
            });
            this.classList.remove('btn-outline-secondary');
            this.classList.add('btn-warning', 'active');
            
            const market = this.dataset.market;
            console.log(`Switched to ${market} market`);
        });
    });
    
    // Order book price clicks
    const orderBookRows = document.querySelectorAll('#orderbook tbody tr:not(.bg-warning)');
    orderBookRows.forEach(row => {
        row.addEventListener('click', function() {
            const priceCell = this.querySelector('td:first-child');
            if (priceCell) {
                const price = priceCell.textContent.trim();
                const priceInputs = document.querySelectorAll('input[placeholder*="76,294"]');
                priceInputs.forEach(input => {
                    input.value = price;
                    input.classList.add('price-updated');
                    setTimeout(() => input.classList.remove('price-updated'), 500);
                });
            }
        });
    });
    
    // Calculate total on price/amount change
    function calculateTotal() {
        const priceInputs = document.querySelectorAll('input[placeholder*="76,294"]');
        const amountInputs = document.querySelectorAll('input[placeholder*="0.0000"]');
        const totalInputs = document.querySelectorAll('input[placeholder*="0.00"]');
        
        priceInputs.forEach((priceInput, index) => {
            const amountInput = amountInputs[index];
            const totalInput = totalInputs[index];
            
            if (amountInput && totalInput) {
                const price = parseFloat(priceInput.value) || 0;
                const amount = parseFloat(amountInput.value) || 0;
                const total = price * amount;
                totalInput.value = total.toFixed(2);
            }
        });
    }
    
    // Add event listeners for calculation
    document.querySelectorAll('input[placeholder*="76,294"], input[placeholder*="0.0000"]').forEach(input => {
        input.addEventListener('input', calculateTotal);
    });
    
    // Simulate real-time price updates
    function updatePrices() {
        const priceElements = document.querySelectorAll('#orderbook tbody tr:not(.bg-warning) td:first-child');
        priceElements.forEach(element => {
            const currentPrice = parseFloat(element.textContent.replace(/,/g, ''));
            if (!isNaN(currentPrice)) {
                const change = (Math.random() - 0.5) * 0.001;
                const newPrice = currentPrice * (1 + change);
                element.textContent = newPrice.toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
                element.classList.add('price-updated');
                setTimeout(() => element.classList.remove('price-updated'), 500);
            }
        });
    }
    
    // Update prices every 3 seconds
    setInterval(updatePrices, 3000);
    
    console.log('✅ Exchange interface loaded - Matching live demo layout!');
});
</script>
@endsection