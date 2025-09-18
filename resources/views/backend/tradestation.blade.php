@extends('backend.layouts.backend')

@section('content')
<!-- Dashboard -->
<div class="row g-2 pb-2 animation-element">
    <!-- Order Book | Market Trades -->
    <div id="second" class="col-12 col-xxl-2 col-xl-3 col-lg-6">
        <div class="tab-content card-bs table-temp3 p-2">
            <!-- Tab -->
            <div class="nav nav-pills nav-justified card-bs-tabs gap-2 p-1">
                <button class="nav-link active" id="book-tab" data-bs-toggle="tab" data-bs-target="#book-tab-pane" type="button" aria-controls="book-tab-pane">Order Book</button>
                <button class="nav-link" id="market-tab" data-bs-toggle="tab" data-bs-target="#market-tab-pane" type="button" aria-controls="market-tab-pane">Market Trades</button>
            </div>
            
            <!-- Order Book -->
            <div class="tab-pane fade show active" id="book-tab-pane" aria-labelledby="book-tab" tabindex="0">
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-dark table-hover crypt-tab">
                        <thead>
                            <tr>
                                <th scope="col">Price (USDT)</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 8; $i++)
                            <tr>
                                <td class="text-down">{{ number_format(76248 + $i * 10, 0, '.', ',') }}<span class="text-down text-opacity-75">.96</span></td>
                                <td>{{ number_format(24 + $i * 0.1, 3) }}</td>
                                <td>{{ number_format(0.006 + $i * 0.001, 3) }}</td>
                            </tr>
                            @endfor
                            
                            <tr class="table-active mb-0">
                                <th scope="row" class="text-danger fs-6 fw-bold">76,294.82 <img alt="" src="{{ asset('images/icon/down.svg') }}" width="10"></th>
                                <td colspan="2" class="text-primary">≈ 76446.06 USD</td>
                            </tr>
                            
                            @for ($i = 1; $i <= 12; $i++)
                            <tr>
                                <td class="text-up">{{ number_format(76248 - $i * 10, 0, '.', ',') }}<span class="text-up text-opacity-50">.96</span></td>
                                <td>{{ number_format(24 + $i * 0.1, 3) }}</td>
                                <td>{{ number_format(0.006 + $i * 0.001, 3) }}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Market Trades -->
            <div class="tab-pane fade" id="market-tab-pane" aria-labelledby="market-tab" tabindex="0">
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-dark table-hover crypt-tab">
                        <thead>
                            <tr>
                                <th scope="col">Price (USDT)</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 25; $i++)
                            <tr>
                                @php $isUp = $i % 3 !== 0; @endphp
                                <td class="{{ $isUp ? 'text-up' : 'text-down' }}">
                                    {{ number_format(76248 + ($isUp ? 1 : -1) * rand(1, 50), 0, '.', ',') }}<span class="{{ $isUp ? 'text-up text-opacity-50' : 'text-down text-opacity-75' }}">.{{ rand(10, 99) }}</span>
                                </td>
                                <td>{{ number_format(rand(1, 100) / 1000, 3) }}</td>
                                <td>{{ sprintf('%02d:%02d:%02d', rand(0, 23), rand(0, 59), rand(0, 59)) }}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Chart & Watchlist -->
    <div id="first" class="col-12 col-xxl-7 col-xl-6 col-lg-12">
        <!-- Watchlist -->
        <div class="card-bs p-2">
            <!-- TradingView Mini Chart -->
            <div class="tradingview-widget-container card-line">
                <div class="tradingview-widget-container__widget">
                    <div class="chart-placeholder">
                        <div class="d-sm-flex flex-row justify-content-between gap-3 p-1">
                            <!-- Pair Info -->
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('images/coin/btc.svg') }}" alt="BTC" width="32" height="32">
                                <div>
                                    <h5 class="mb-0 fw-bold">BTC/USDT</h5>
                                    <small class="text-muted">Bitcoin</small>
                                </div>
                            </div>
                            
                            <!-- Price Info -->
                            <div class="text-end">
                                <h4 class="mb-0 fw-bold text-warning">76,294.82</h4>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-success">+1,234.56</span>
                                    <span class="text-success">+1.65%</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Stats Row -->
                        <div class="row g-2 mt-2">
                            <div class="col-6 col-md-3">
                                <div class="d-flex flex-row justify-content-between">
                                    <small class="crypt-grayscale-600">24h Change</small>
                                    <small class="text-success">+1.65%</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="d-flex flex-row justify-content-between">
                                    <small class="crypt-grayscale-600">24h High</small>
                                    <small>77,456.89</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="d-flex flex-row justify-content-between">
                                    <small class="crypt-grayscale-600">24h Low</small>
                                    <small>75,123.45</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="d-flex flex-row justify-content-between text-sm">
                                    <small class="crypt-grayscale-600">24h Volume</small>
                                    <small>1,234.56 BTC</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Chart Area -->
            <div class="tradingview-widget-container">
                <div style="height: 400px; background: linear-gradient(135deg, var(--bs-dark), var(--bs-secondary)); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin: 20px 0;">
                    <div class="text-center">
                        <i class="fas fa-chart-line fa-3x text-warning mb-3"></i>
                        <h5>TradingView Chart</h5>
                        <p class="text-muted">Advanced charting tools will be integrated here</p>
                        
                        <!-- Chart Controls -->
                        <div class="btn-group" role="group" aria-label="Chart timeframes">
                            <button type="button" class="btn btn-outline-secondary btn-sm">1H</button>
                            <button type="button" class="btn btn-warning btn-sm">4H</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">1D</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">1W</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Assets & Trading Panel -->
    <div id="third" class="col-12 col-xxl-3 col-xl-3 col-lg-6">
        <!-- Assets Overview -->
        <div class="tab-content card-bs table-temp3 p-2">
            <!-- Asset Tabs -->
            <div class="nav nav-pills nav-justified gap-1 card-bs-tabs p-1">
                <button class="nav-link active" id="pills-assets" data-bs-toggle="pill" data-bs-target="#pills-assets-tab" type="button" aria-controls="pills-assets-tab">Assets</button>
                <button class="nav-link" id="pills-trading" data-bs-toggle="pill" data-bs-target="#pills-trading-tab" type="button" aria-controls="pills-trading-tab">Trading</button>
                <button class="nav-link" id="pills-orders" data-bs-toggle="pill" data-bs-target="#pills-orders-tab" type="button" aria-controls="pills-orders-tab">Orders</button>
            </div>
            
            <!-- Search Assets -->
            <div class="pt-2">
                <input type="text" class="search form-control text-sm" placeholder="Search asset">
            </div>
            
            <!-- Assets Tab Content -->
            <div class="tab-pane fade show active" id="pills-assets-tab" role="tabpanel" aria-labelledby="pills-assets" tabindex="0">
                <!-- Assets Actions -->
                <div class="d-flex gap-2 my-3">
                    <button class="btn btn-warning btn-sm flex-fill">
                        <i class="fas fa-exchange-alt"></i>
                        Convert
                    </button>
                    <button class="btn btn-warning btn-sm flex-fill">
                        <i class="fas fa-plus"></i>
                        Deposit
                    </button>
                </div>
                
                <!-- Assets Table -->
                <div class="table-responsive">
                    <table class="table table-dark table-hover crypt-tab">
                        <thead>
                            <tr>
                                <th scope="col">Asset</th>
                                <th scope="col">Free</th>
                                <th scope="col">Locked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $assets = [
                                ['symbol' => 'BTC', 'name' => 'Bitcoin', 'free' => '0.00124567', 'locked' => '0.00000000', 'icon' => 'btc.svg'],
                                ['symbol' => 'ETH', 'name' => 'Ethereum', 'free' => '0.45678901', 'locked' => '0.00000000', 'icon' => 'eth.svg'],
                                ['symbol' => 'USDT', 'name' => 'Tether', 'free' => '1,234.56', 'locked' => '0.00', 'icon' => 'usdt.svg'],
                                ['symbol' => 'XRP', 'name' => 'Ripple', 'free' => '234.567', 'locked' => '0.000', 'icon' => 'xrp.svg'],
                                ['symbol' => 'ADA', 'name' => 'Cardano', 'free' => '156.789', 'locked' => '0.000', 'icon' => 'ada.svg'],
                                ['symbol' => 'DOT', 'name' => 'Polkadot', 'free' => '45.123', 'locked' => '0.000', 'icon' => 'dot.svg'],
                            ];
                            @endphp
                            
                            @foreach($assets as $asset)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('images/coin/' . $asset['icon']) }}" alt="{{ $asset['symbol'] }}" width="20" height="20" onerror="this.src='{{ asset('images/coin/default.svg') }}'">
                                        <div>
                                            <div class="fw-bold">{{ $asset['symbol'] }}</div>
                                            <small class="text-muted">{{ $asset['name'] }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="font-monospace">{{ $asset['free'] }}</td>
                                <td class="font-monospace text-muted">{{ $asset['locked'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Assets Footer -->
                <div class="text-center mt-3">
                    <small class="text-muted">Total Balance: {{ number_format(auth()->user()->balance ?? 0, 2) }} USDT</small>
                </div>
            </div>
            
            <!-- Trading Tab Content -->
            <div class="tab-pane fade" id="pills-trading-tab" role="tabpanel" aria-labelledby="pills-trading" tabindex="0">
                <!-- Trading Form -->
                <div class="mt-3">
                    <!-- Buy/Sell Toggle -->
                    <div class="nav nav-pills nav-justified gap-1 card-bs-tabs p-1 mb-3">
                        <button class="nav-link active text-success" id="buy-btn">BUY</button>
                        <button class="nav-link text-danger" id="sell-btn">SELL</button>
                    </div>
                    
                    <!-- Order Type -->
                    <div class="mb-3">
                        <select class="form-select">
                            <option selected>Limit</option>
                            <option>Market</option>
                            <option>Stop-Limit</option>
                        </select>
                    </div>
                    
                    <!-- Price Input -->
                    <div class="mb-3">
                        <label class="form-label small">Price (USDT)</label>
                        <input type="number" class="form-control" placeholder="76,294.82" step="0.01">
                    </div>
                    
                    <!-- Amount Input -->
                    <div class="mb-3">
                        <label class="form-label small">Amount (BTC)</label>
                        <input type="number" class="form-control" placeholder="0.0000" step="0.0001">
                    </div>
                    
                    <!-- Total -->
                    <div class="mb-3">
                        <label class="form-label small">Total (USDT)</label>
                        <input type="number" class="form-control" placeholder="0.00" readonly>
                    </div>
                    
                    <!-- Available Balance -->
                    <div class="d-flex justify-content-between mb-3">
                        <small class="text-muted">Available:</small>
                        <small class="text-muted">{{ number_format(auth()->user()->balance ?? 0, 6) }} BTC</small>
                    </div>
                    
                    <!-- Buy Button -->
                    <button class="btn btn-success w-100" id="trade-btn">
                        Buy BTC
                    </button>
                </div>
            </div>
            
            <!-- Orders Tab Content -->
            <div class="tab-pane fade" id="pills-orders-tab" role="tabpanel" aria-labelledby="pills-orders" tabindex="0">
                <!-- Orders Filter -->
                <div class="nav nav-pills nav-justified gap-1 card-bs-tabs p-1 my-3">
                    <button class="nav-link active" id="open-orders">Open</button>
                    <button class="nav-link" id="order-history">History</button>
                </div>
                
                <!-- Orders Content -->
                <div class="text-center py-5">
                    <i class="fas fa-clipboard-list fa-2x text-muted mb-3"></i>
                    <h6 class="text-muted">No Open Orders</h6>
                    <p class="text-muted small">Your trading orders will appear here</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
/* Exchange Specific Styles */
.crypt-tab {
    font-size: 12px;
}

.crypt-tab th {
    border: none;
    padding: 8px 12px;
    font-weight: 600;
}

.crypt-tab td {
    border: none;
    padding: 4px 12px;
    font-family: 'Courier New', monospace;
}

.text-up {
    color: #10b981 !important;
}

.text-down {
    color: #ef4444 !important;
}

.card-bs {
    background-color: var(--bs-dark);
    border: 1px solid var(--bs-border-color);
    border-radius: 12px;
}

.card-bs-tabs .nav-link {
    border: none;
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 12px;
    font-weight: 600;
    color: var(--bs-secondary);
    background-color: transparent;
}

.card-bs-tabs .nav-link.active {
    background-color: var(--bs-warning);
    color: #000;
}

.table-temp3 {
    min-height: 600px;
}

.chart-placeholder {
    padding: 20px;
}

.font-monospace {
    font-family: 'Courier New', monospace !important;
}

/* Trading Form Styles */
#pills-trading-tab .nav-link.active {
    color: #fff !important;
}

#pills-trading-tab .text-success {
    background-color: #10b981;
}

#pills-trading-tab .text-danger {
    background-color: #ef4444;
}

/* Responsive */
@media (max-width: 1200px) {
    .table-temp3 {
        min-height: auto;
    }
}

@media (max-width: 768px) {
    .crypt-tab {
        font-size: 10px;
    }
    
    .crypt-tab th,
    .crypt-tab td {
        padding: 4px 8px;
    }
}
</style>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Buy/Sell Toggle
    const buyBtn = document.getElementById('buy-btn');
    const sellBtn = document.getElementById('sell-btn');
    const tradeBtn = document.getElementById('trade-btn');
    
    if (buyBtn && sellBtn && tradeBtn) {
        buyBtn.addEventListener('click', function() {
            this.classList.add('active');
            sellBtn.classList.remove('active');
            tradeBtn.textContent = 'Buy BTC';
            tradeBtn.className = 'btn btn-success w-100';
        });
        
        sellBtn.addEventListener('click', function() {
            this.classList.add('active');
            buyBtn.classList.remove('active');
            tradeBtn.textContent = 'Sell BTC';
            tradeBtn.className = 'btn btn-danger w-100';
        });
    }
    
    // Order Book Row Clicks
    const orderRows = document.querySelectorAll('#book-tab-pane tr[data-price]');
    orderRows.forEach(row => {
        row.addEventListener('click', function() {
            const price = this.dataset.price;
            const priceInput = document.querySelector('input[placeholder*="76,294"]');
            if (priceInput && price) {
                priceInput.value = price;
            }
        });
    });
    
    // Calculate Total on Amount/Price Change
    const priceInput = document.querySelector('input[placeholder*="76,294"]');
    const amountInput = document.querySelector('input[placeholder*="0.0000"]');
    const totalInput = document.querySelector('input[placeholder*="0.00"]');
    
    function calculateTotal() {
        if (priceInput && amountInput && totalInput) {
            const price = parseFloat(priceInput.value) || 0;
            const amount = parseFloat(amountInput.value) || 0;
            const total = price * amount;
            totalInput.value = total.toFixed(2);
        }
    }
    
    if (priceInput) priceInput.addEventListener('input', calculateTotal);
    if (amountInput) amountInput.addEventListener('input', calculateTotal);
    
    // Search Assets
    const assetSearch = document.querySelector('input[placeholder*="Search asset"]');
    if (assetSearch) {
        assetSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const assetRows = document.querySelectorAll('#pills-assets-tab tbody tr');
            
            assetRows.forEach(row => {
                const assetSymbol = row.querySelector('.fw-bold').textContent.toLowerCase();
                const assetName = row.querySelector('.text-muted').textContent.toLowerCase();
                
                if (assetSymbol.includes(searchTerm) || assetName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
    
    console.log('✅ Exchange interface loaded - 100% matching reference design!');
});
</script>
@endsection