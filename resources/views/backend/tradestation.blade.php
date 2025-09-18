@extends('backend.layouts.backend')

@section('content')
<div class="container-fluid">
    <!-- Assets Section Header -->
    <div class="assets-header-section">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="assets-title">Assets</h2>
            <div class="d-flex gap-3">
                <button class="btn-orders-reference {{ \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->count() > 0 ? 'active' : '' }}">
                    Orders
                    @php
                        $openOrdersCount = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->count();
                    @endphp
                    @if($openOrdersCount > 0)
                        <span class="orders-badge">{{ $openOrdersCount }}</span>
                    @endif
                </button>
                <button class="btn-add-funds-main" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Funds</button>
            </div>
        </div>
        
        <!-- Asset Tabs -->
        <div class="asset-tabs-horizontal">
            <button class="asset-tab-btn active" data-asset="BTC">BTC</button>
            <button class="asset-tab-btn" data-asset="ETH">ETH</button>
            <button class="asset-tab-btn" data-asset="USDT">USDT</button>
            <button class="asset-tab-btn" data-asset="XRP">XRP</button>
        </div>
        
        <!-- Search Coin -->
        <div class="search-coin-container">
            <input type="text" class="search-coin-input" placeholder="Search coin">
        </div>
    </div>

    <!-- Main Trading Interface -->
    <div class="trading-interface-grid">
        <!-- Left Panel: Order Book -->
        <div class="order-book-panel">
            <div class="panel-header">
                <div class="d-flex justify-content-center">
                    <button class="btn-order-book active">Order Book</button>
                </div>
            </div>
            <div class="panel-content">
                <!-- Market Trades Header -->
                <div class="market-trades-header">
                    <button class="btn-market-trades">Market Trades</button>
                </div>
                
                <!-- Order Book Table -->
                <div class="order-book-table">
                    <!-- Table Header -->
                    <div class="order-table-header">
                        <div class="header-col">Price (USDT)</div>
                        <div class="header-col">Quantity</div>
                    </div>
                    
                    <!-- Sell Orders -->
                    <div class="sell-orders">
                        @for($i = 1; $i <= 11; $i++)
                        <div class="order-row sell-row">
                            <div class="price-col text-danger">{{ number_format(76248.95 + $i * 0.01, 2) }}</div>
                            <div class="quantity-col">{{ number_format(24.09 + $i * 0.1, 1) }}E</div>
                        </div>
                        @endfor
                    </div>
                    
                    <!-- Current Price Line -->
                    <div class="current-price-line">
                        <div class="current-price">
                            76248.95
                        </div>
                        <div class="price-usd">
                            ≈ $76248.95
                        </div>
                    </div>
                    
                    <!-- Buy Orders -->
                    <div class="buy-orders">
                        @for($i = 1; $i <= 11; $i++)
                        <div class="order-row buy-row">
                            <div class="price-col text-success">{{ number_format(76248.95 - $i * 0.01, 2) }}</div>
                            <div class="quantity-col">{{ number_format(24.09 - $i * 0.1, 1) }}E</div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Center Panel: Chart -->
        <div class="chart-panel">
            <!-- Price Info Header -->
            <div class="price-info-header">
                <div class="crypto-pair">
                    <div class="crypto-icon">
                        <i class="fab fa-bitcoin"></i>
                    </div>
                    <span class="pair-name">Cardano / TetherUS</span>
                    <i class="far fa-star star-icon"></i>
                </div>
                
                <div class="price-stats">
                    <div class="current-price-display">0.9115 <span class="price-unit">USDT</span></div>
                    <div class="price-change">+0.5674 +164.86% <span class="change-period">Past year</span></div>
                </div>
            </div>
            
            <!-- Time Frame Buttons -->
            <div class="timeframe-buttons">
                <button class="timeframe-btn">1D</button>
                <button class="timeframe-btn">1M</button>
                <button class="timeframe-btn">3M</button>
                <button class="timeframe-btn active">1Y</button>
                <button class="timeframe-btn">5Y</button>
                <button class="timeframe-btn">All</button>
            </div>
            
            <!-- Chart Area -->
            <div class="chart-area">
                <div class="chart-placeholder">
                    <div class="chart-content">
                        <!-- Y-axis price labels -->
                        <div class="price-labels">
                            <div class="price-label">1.100</div>
                            <div class="price-label">1.000</div>
                            <div class="price-label">0.900</div>
                            <div class="price-label">0.800</div>
                            <div class="price-label">0.700</div>
                        </div>
                        
                        <!-- Chart line and area -->
                        <div class="chart-line-area">
                            <svg class="chart-svg" viewBox="0 0 600 300">
                                <!-- Chart line -->
                                <path d="M 50 250 Q 100 200 150 220 T 250 180 T 350 160 T 450 140 L 500 120 L 550 100" 
                                      stroke="#00d4aa" stroke-width="2" fill="none"/>
                                <!-- Fill area under line -->
                                <path d="M 50 250 Q 100 200 150 220 T 250 180 T 350 160 T 450 140 L 500 120 L 550 100 L 550 300 L 50 300 Z" 
                                      fill="url(#chartGradient)" opacity="0.3"/>
                                <defs>
                                    <linearGradient id="chartGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" style="stop-color:#00d4aa;stop-opacity:0.3" />
                                        <stop offset="100%" style="stop-color:#00d4aa;stop-opacity:0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        
                        <!-- Volume bars at bottom -->
                        <div class="volume-bars">
                            @for($i = 0; $i < 20; $i++)
                            <div class="volume-bar" style="height: {{ rand(20, 60) }}%"></div>
                            @endfor
                        </div>
                        
                        <!-- X-axis time labels -->
                        <div class="time-labels">
                            <span>Jan</span>
                            <span>Feb</span>
                            <span>Mar</span>
                            <span>Apr</span>
                            <span>May</span>
                            <span>Jun</span>
                            <span>Jul</span>
                            <span>Aug</span>
                            <span>Sep</span>
                            <span>Oct</span>
                            <span>Nov</span>
                            <span>Dec</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Trading Buttons -->
            <div class="trading-buttons">
                <button class="trading-btn active">Limit</button>
                <button class="trading-btn">Market</button>
                <button class="trading-btn">Stop Limit</button>
            </div>
        </div>

        <!-- Right Panel: Market Data -->
        <div class="market-data-panel">
            <!-- Panel Header with Search -->
            <div class="market-panel-header">
                <div class="search-coin-right">
                    <input type="text" placeholder="Search coin">
                </div>
            </div>
            
            <!-- Market Data Table -->
            <div class="market-data-table">
                <!-- Table Header -->
                <div class="market-table-header">
                    <div class="market-header-col">Pairs</div>
                    <div class="market-header-col">Price</div>
                    <div class="market-header-col">Change</div>
                </div>
                
                <!-- Market Rows -->
                @php
                $marketData = [
                    ['pair' => 'USDT', 'symbol' => 'BTC', 'price' => 30.03, 'change' => 62.8, 'positive' => true, 'color' => '#f7931a'],
                    ['pair' => 'TON', 'symbol' => 'BTC', 'price' => 21.12, 'change' => -10.4, 'positive' => false, 'color' => '#0088cc'],
                    ['pair' => 'LSK', 'symbol' => 'BTC', 'price' => 3.53, 'change' => 19.2, 'positive' => true, 'color' => '#1a6896'],
                    ['pair' => 'POL', 'symbol' => 'BTC', 'price' => 0.49, 'change' => 10.4, 'positive' => true, 'color' => '#8247e5'],
                    ['pair' => 'XLM', 'symbol' => 'BTC', 'price' => 0.656, 'change' => 12.9, 'positive' => true, 'color' => '#14b6e7'],
                    ['pair' => 'LINK', 'symbol' => 'BTC', 'price' => 40.50, 'change' => -25.8, 'positive' => false, 'color' => '#375bd2'],
                    ['pair' => 'ROSE', 'symbol' => 'BTC', 'price' => 68.55, 'change' => 12.9, 'positive' => true, 'color' => '#ff5599'],
                    ['pair' => 'XMR', 'symbol' => 'BTC', 'price' => 30.03, 'change' => -26.8, 'positive' => false, 'color' => '#ff6600'],
                    ['pair' => 'DOGE', 'symbol' => 'BTC', 'price' => 30.03, 'change' => 68.7, 'positive' => true, 'color' => '#c2a633'],
                    ['pair' => 'XRP', 'symbol' => 'BTC', 'price' => 30.03, 'change' => -72.8, 'positive' => false, 'color' => '#23292f'],
                    ['pair' => 'EOS', 'symbol' => 'BTC', 'price' => 30.03, 'change' => 52.5, 'positive' => true, 'color' => '#000000'],
                    ['pair' => 'TRX', 'symbol' => 'BTC', 'price' => 30.03, 'change' => 12.2, 'positive' => true, 'color' => '#ff060a'],
                    ['pair' => 'DOT', 'symbol' => 'BTC', 'price' => 30.03, 'change' => -0.6, 'positive' => false, 'color' => '#e6007a']
                ];
                @endphp
                
                @foreach($marketData as $item)
                <div class="market-row">
                    <div class="market-pair">
                        <div class="pair-icon" style="background-color: {{ $item['color'] }}"></div>
                        <div class="pair-info">
                            <div class="pair-name">{{ $item['pair'] }}</div>
                            <div class="pair-symbol">{{ $item['symbol'] }}</div>
                        </div>
                    </div>
                    <div class="market-price">${{ $item['price'] < 1 ? number_format($item['price'], 3) : number_format($item['price'], 2) }}</div>
                    <div class="market-change {{ $item['positive'] ? 'positive' : 'negative' }}">
                        {{ $item['positive'] ? '+' : '' }}{{ $item['change'] }}%
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
/* Reference Design Exact Match Styles */

.assets-header-section {
    margin-bottom: 20px;
}

.assets-title {
    font-size: 24px;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
}

.btn-orders-reference {
    background: none;
    border: 1px solid var(--border-color);
    color: var(--text-secondary);
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    position: relative;
    transition: all 0.2s ease;
}

.btn-orders-reference.active {
    background-color: var(--accent-yellow);
    color: #000000;
    border-color: var(--accent-yellow);
    font-weight: 600;
}

.orders-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background-color: var(--accent-red);
    color: white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.btn-add-funds-main {
    background-color: var(--accent-yellow);
    color: #000000;
    padding: 8px 20px;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-add-funds-main:hover {
    background-color: var(--accent-yellow-hover);
    transform: translateY(-1px);
}

.asset-tabs-horizontal {
    display: flex;
    gap: 8px;
    margin-bottom: 16px;
}

.asset-tab-btn {
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    color: var(--text-secondary);
    padding: 8px 20px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.asset-tab-btn:hover {
    background-color: var(--hover-bg);
    color: var(--text-primary);
}

.asset-tab-btn.active {
    background-color: var(--accent-yellow);
    color: #000000;
    border-color: var(--accent-yellow);
    font-weight: 600;
}

.search-coin-container {
    margin-bottom: 20px;
}

.search-coin-input {
    width: 100%;
    padding: 12px 16px;
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    color: var(--text-primary);
    font-size: 14px;
    outline: none;
}

.search-coin-input:focus {
    border-color: var(--accent-yellow);
    box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.1);
}

.search-coin-input::placeholder {
    color: var(--text-muted);
}

/* Trading Interface Grid */
.trading-interface-grid {
    display: grid;
    grid-template-columns: 300px 1fr 320px;
    gap: 20px;
    min-height: 700px;
}

/* Order Book Panel */
.order-book-panel {
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    overflow: hidden;
}

.panel-header {
    padding: 16px;
    border-bottom: 1px solid var(--border-color);
}

.btn-order-book {
    background-color: var(--accent-yellow);
    color: #000000;
    padding: 8px 24px;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
}

.panel-content {
    padding: 0;
}

.market-trades-header {
    padding: 12px 16px;
    border-bottom: 1px solid var(--border-color);
}

.btn-market-trades {
    background: none;
    border: none;
    color: var(--text-secondary);
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
}

.order-book-table {
    height: 600px;
    overflow: hidden;
}

.order-table-header {
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 12px 16px;
    border-bottom: 1px solid var(--border-color);
    background-color: var(--bg-tertiary);
}

.header-col {
    font-size: 12px;
    color: var(--text-muted);
    font-weight: 500;
}

.order-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 4px 16px;
    font-size: 12px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.order-row:hover {
    background-color: var(--hover-bg);
    cursor: pointer;
}

.price-col {
    font-weight: 600;
}

.quantity-col {
    color: var(--text-secondary);
    text-align: right;
}

.sell-orders .order-row {
    color: var(--accent-red);
}

.buy-orders .order-row {
    color: var(--accent-green);
}

.current-price-line {
    padding: 12px 16px;
    background: linear-gradient(90deg, rgba(255, 193, 7, 0.15), rgba(255, 193, 7, 0.05), transparent);
    border-top: 2px solid var(--accent-yellow);
    border-bottom: 2px solid var(--accent-yellow);
    text-align: center;
    margin: 2px 0;
}

.current-price {
    color: var(--accent-yellow);
    font-weight: 700;
    font-size: 15px;
    margin-bottom: 2px;
}

.price-usd {
    color: var(--text-muted);
    font-size: 11px;
}

/* Chart Panel */
.chart-panel {
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 20px;
}

.price-info-header {
    margin-bottom: 20px;
}

.crypto-pair {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
}

.crypto-icon {
    width: 24px;
    height: 24px;
    background: linear-gradient(135deg, var(--accent-yellow), #ffb300);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #000000;
}

.pair-name {
    font-size: 16px;
    font-weight: 600;
    color: var(--text-primary);
}

.star-icon {
    color: var(--text-muted);
    cursor: pointer;
}

.price-stats {
    margin-bottom: 20px;
}

.current-price-display {
    font-size: 28px;
    font-weight: bold;
    color: var(--text-primary);
    margin-bottom: 8px;
}

.price-unit {
    font-size: 16px;
    color: var(--text-muted);
    font-weight: 500;
}

.price-change {
    color: var(--accent-green);
    font-size: 14px;
}

.change-period {
    color: var(--text-muted);
}

.timeframe-buttons {
    display: flex;
    gap: 8px;
    margin-bottom: 20px;
}

.timeframe-btn {
    background: none;
    border: none;
    color: var(--text-secondary);
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.timeframe-btn:hover {
    background-color: var(--hover-bg);
    color: var(--text-primary);
}

.timeframe-btn.active {
    background-color: var(--bg-tertiary);
    color: var(--text-primary);
    font-weight: 600;
}

.chart-area {
    height: 400px;
    margin-bottom: 20px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    position: relative;
    overflow: hidden;
    background-color: var(--bg-secondary);
}

.chart-placeholder {
    width: 100%;
    height: 100%;
    position: relative;
}

.chart-content {
    width: 100%;
    height: 100%;
    position: relative;
}

.price-labels {
    position: absolute;
    left: 10px;
    top: 20px;
    height: calc(100% - 60px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.price-label {
    font-size: 12px;
    color: var(--text-muted);
}

.chart-line-area {
    position: absolute;
    left: 40px;
    top: 20px;
    right: 20px;
    height: calc(100% - 60px);
}

.chart-svg {
    width: 100%;
    height: 100%;
}

.volume-bars {
    position: absolute;
    bottom: 40px;
    left: 40px;
    right: 20px;
    height: 40px;
    display: flex;
    align-items: end;
    gap: 2px;
}

.volume-bar {
    flex: 1;
    background-color: var(--text-muted);
    opacity: 0.3;
    min-height: 2px;
}

.time-labels {
    position: absolute;
    bottom: 10px;
    left: 40px;
    right: 20px;
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    color: var(--text-muted);
}

.trading-buttons {
    display: flex;
    gap: 0;
    border-radius: 6px;
    overflow: hidden;
    border: 1px solid var(--border-color);
}

.trading-btn {
    flex: 1;
    padding: 12px;
    border: none;
    background-color: var(--bg-secondary);
    color: var(--text-secondary);
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    border-right: 1px solid var(--border-color);
}

.trading-btn:last-child {
    border-right: none;
}

.trading-btn:hover {
    background-color: var(--hover-bg);
    color: var(--text-primary);
}

.trading-btn.active {
    background-color: var(--accent-yellow);
    color: #000000;
    font-weight: 600;
}

/* Market Data Panel */
.market-data-panel {
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    overflow: hidden;
}

.market-panel-header {
    padding: 16px;
    border-bottom: 1px solid var(--border-color);
}

.search-coin-right input {
    width: 100%;
    padding: 10px 12px;
    background-color: var(--bg-tertiary);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    color: var(--text-primary);
    font-size: 14px;
    outline: none;
}

.search-coin-right input:focus {
    border-color: var(--accent-yellow);
}

.search-coin-right input::placeholder {
    color: var(--text-muted);
}

.market-data-table {
    max-height: 600px;
    overflow-y: auto;
}

.market-data-table::-webkit-scrollbar {
    width: 4px;
}

.market-data-table::-webkit-scrollbar-track {
    background: var(--bg-secondary);
}

.market-data-table::-webkit-scrollbar-thumb {
    background: var(--border-color);
    border-radius: 2px;
}

.market-table-header {
    display: grid;
    grid-template-columns: 1fr 80px 80px;
    padding: 12px 16px;
    border-bottom: 1px solid var(--border-color);
    background-color: var(--bg-tertiary);
    position: sticky;
    top: 0;
    z-index: 10;
}

.market-header-col {
    font-size: 12px;
    color: var(--text-muted);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.market-header-col:nth-child(2),
.market-header-col:nth-child(3) {
    text-align: right;
}

.market-row {
    display: grid;
    grid-template-columns: 1fr 80px 80px;
    padding: 10px 16px;
    border-bottom: 1px solid var(--border-color);
    align-items: center;
    transition: all 0.2s ease;
    min-height: 56px;
}

.market-row:hover {
    background-color: var(--hover-bg);
    cursor: pointer;
    transform: translateX(2px);
}

.market-row:last-child {
    border-bottom: none;
}

.market-pair {
    display: flex;
    align-items: center;
    gap: 8px;
}

.pair-icon {
    width: 16px;
    height: 16px;
    border-radius: 50%;
}

.pair-info {
    display: flex;
    flex-direction: column;
}

.pair-name {
    font-size: 14px;
    font-weight: 600;
    color: var(--text-primary);
    line-height: 1.2;
}

.pair-symbol {
    font-size: 12px;
    color: var(--text-muted);
    line-height: 1.2;
}

.market-price {
    font-size: 14px;
    font-weight: 600;
    color: var(--text-primary);
    text-align: right;
}

.market-change {
    font-size: 12px;
    font-weight: 500;
    text-align: right;
}

.market-change.positive {
    color: var(--accent-green);
}

.market-change.negative {
    color: var(--accent-red);
}

/* Responsive Design */
@media (max-width: 1400px) {
    .trading-interface-grid {
        grid-template-columns: 280px 1fr 300px;
    }
}

@media (max-width: 1200px) {
    .trading-interface-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto auto auto;
        gap: 15px;
    }
    
    .order-book-panel,
    .market-data-panel {
        max-height: 400px;
    }
}

@media (max-width: 768px) {
    .trading-interface-grid {
        gap: 12px;
    }
    
    .asset-tabs-horizontal {
        flex-wrap: wrap;
        gap: 6px;
    }
    
    .assets-header-section .d-flex {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .chart-area {
        height: 250px;
    }
    
    .price-info-header .crypto-pair {
        flex-wrap: wrap;
        gap: 6px;
    }
    
    .current-price-display {
        font-size: 24px;
    }
    
    .timeframe-buttons {
        flex-wrap: wrap;
        gap: 4px;
    }
    
    .trading-buttons {
        flex-direction: column;
        gap: 1px;
    }
    
    .trading-btn {
        border-radius: 0 !important;
        border-right: none !important;
        border-bottom: 1px solid var(--border-color);
    }
    
    .trading-btn:last-child {
        border-bottom: none;
    }
}

@media (max-width: 480px) {
    .assets-title {
        font-size: 20px;
    }
    
    .btn-orders-reference,
    .btn-add-funds-main {
        font-size: 13px;
        padding: 6px 12px;
    }
    
    .asset-tab-btn {
        padding: 6px 14px;
        font-size: 13px;
    }
}

/* Dark/Light theme specific overrides */
body.crypt-light .market-row:hover {
    background-color: rgba(0, 0, 0, 0.04);
}

body.crypt-dark .market-row:hover {
    background-color: rgba(255, 255, 255, 0.08);
}

body.crypt-light .order-row:hover {
    background-color: rgba(0, 0, 0, 0.04);
}

body.crypt-dark .order-row:hover {
    background-color: rgba(255, 255, 255, 0.08);
}

/* Enhanced focus states */
.asset-tab-btn:focus,
.timeframe-btn:focus,
.trading-btn:focus {
    outline: 2px solid var(--accent-yellow);
    outline-offset: 2px;
}

/* Smooth transitions for all interactive elements */
.asset-tab-btn,
.timeframe-btn,
.trading-btn,
.market-row,
.order-row {
    transition: all 0.2s cubic-bezier(0.4, 0.0, 0.2, 1);
}

/* Loading states */
.trading-interface-grid.loading {
    opacity: 0.7;
    pointer-events: none;
}

/* Enhanced scrollbar styling */
.order-book-table::-webkit-scrollbar,
.market-data-table::-webkit-scrollbar {
    width: 6px;
}

.order-book-table::-webkit-scrollbar-track,
.market-data-table::-webkit-scrollbar-track {
    background: var(--bg-secondary);
    border-radius: 3px;
}

.order-book-table::-webkit-scrollbar-thumb,
.market-data-table::-webkit-scrollbar-thumb {
    background: var(--border-color);
    border-radius: 3px;
}

.order-book-table::-webkit-scrollbar-thumb:hover,
.market-data-table::-webkit-scrollbar-thumb:hover {
    background: var(--text-muted);
}
</style>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Asset tabs functionality
    const assetTabs = document.querySelectorAll('.asset-tab-btn');
    assetTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            assetTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            console.log(`Selected asset: ${this.dataset.asset}`);
        });
    });

    // Timeframe buttons functionality
    const timeframeBtns = document.querySelectorAll('.timeframe-btn');
    timeframeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            timeframeBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Trading buttons functionality
    const tradingBtns = document.querySelectorAll('.trading-btn');
    tradingBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tradingBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Order book row click functionality
    const orderRows = document.querySelectorAll('.order-row');
    orderRows.forEach(row => {
        row.addEventListener('click', function() {
            const price = this.querySelector('.price-col').textContent;
            console.log(`Selected order price: ${price}`);
            // Here you can implement order selection logic
        });
    });

    // Market row click functionality
    const marketRows = document.querySelectorAll('.market-row');
    marketRows.forEach(row => {
        row.addEventListener('click', function() {
            const pairName = this.querySelector('.pair-name').textContent;
            console.log(`Selected market pair: ${pairName}`);
            // Here you can implement market pair selection logic
        });
    });

    // Real-time price updates simulation
    function updatePrices() {
        const marketPrices = document.querySelectorAll('.market-price');
        const orderPrices = document.querySelectorAll('.price-col');
        
        marketPrices.forEach(price => {
            const currentPrice = parseFloat(price.textContent.replace('$', ''));
            const change = (Math.random() - 0.5) * 0.02; // Small random change
            const newPrice = Math.max(0.01, currentPrice + change);
            price.textContent = '$' + newPrice.toFixed(price.textContent.includes('.') && price.textContent.split('.')[1].length > 2 ? 3 : 2);
        });
        
        orderPrices.forEach(price => {
            const currentPrice = parseFloat(price.textContent);
            const change = (Math.random() - 0.5) * 0.02;
            const newPrice = Math.max(10000, currentPrice + change);
            price.textContent = newPrice.toFixed(2);
        });
    }

    // Update prices every 3 seconds
    setInterval(updatePrices, 3000);
    
    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey || e.metaKey) {
            switch(e.key) {
                case '1':
                    e.preventDefault();
                    document.querySelector('[data-asset="BTC"]')?.click();
                    break;
                case '2':
                    e.preventDefault();
                    document.querySelector('[data-asset="ETH"]')?.click();
                    break;
                case '3':
                    e.preventDefault();
                    document.querySelector('[data-asset="USDT"]')?.click();
                    break;
                case '4':
                    e.preventDefault();
                    document.querySelector('[data-asset="XRP"]')?.click();
                    break;
            }
        }
    });

    console.log('Trading interface initialized successfully with real-time updates');
});
</script>
@endsection