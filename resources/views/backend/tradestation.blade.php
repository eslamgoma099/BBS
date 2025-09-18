@extends('backend.layouts.backend')

@section('content')
<div class="container-fluid">
    <!-- Exchange Main Layout - 3 Column Grid -->
    <div class="exchange-main-grid">
        
        <!-- Left Column: Markets & Balances -->
        <aside class="exchange-left-panel">
            <!-- Markets Section -->
            <section class="markets-panel">
                <header class="panel-head">
                    <h4 class="panel-title">Markets</h4>
                    <div class="panel-controls">
                        <input type="search" class="search-input" placeholder="Search pairs" aria-label="Search markets">
                    </div>
                </header>
                
                <div class="markets-list">
                    @php
                    $marketPairs = [
                        ['pair' => 'BTC/USDT', 'price' => '51,423.00', 'change' => '+2.96%', 'positive' => true],
                        ['pair' => 'ETH/USDT', 'price' => '3,245.67', 'change' => '-1.24%', 'positive' => false],
                        ['pair' => 'ADA/USDT', 'price' => '0.9115', 'change' => '+5.43%', 'positive' => true],
                        ['pair' => 'XRP/USDT', 'price' => '0.6234', 'change' => '+0.89%', 'positive' => true],
                        ['pair' => 'DOT/USDT', 'price' => '7.432', 'change' => '-2.18%', 'positive' => false],
                    ];
                    @endphp
                    
                    @foreach($marketPairs as $market)
                    <div class="market-item">
                        <div class="market-pair">{{ $market['pair'] }}</div>
                        <div class="market-price">{{ $market['price'] }}</div>
                        <div class="market-change {{ $market['positive'] ? 'positive' : 'negative' }}">
                            {{ $market['change'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            
            <!-- Mini Balances -->
            <section class="mini-balances-panel">
                <header class="panel-head">
                    <h4 class="panel-title">Quick Balances</h4>
                </header>
                <div class="quick-balances">
                    <div class="balance-item">
                        <span class="balance-coin">BTC</span>
                        <span class="balance-amount">{{ number_format(auth()->user()->balance ?? 0, 6) }}</span>
                    </div>
                    <div class="balance-item">
                        <span class="balance-coin">USDT</span>
                        <span class="balance-amount">{{ number_format(auth()->user()->balance ?? 0, 2) }}</span>
                    </div>
                </div>
            </section>
        </aside>
        
        <!-- Center Column: Chart & Order Book -->
        <section class="exchange-center-panel">
            <!-- Price Header -->
            <div class="price-header">
                <div class="pair-info">
                    <div class="pair-selector">
                        <button class="pair-current">BTC / USDT</button>
                        <i class="fas fa-star star-icon"></i>
                    </div>
                    <div class="pair-stats">
                        <span class="current-price">51,423.00</span>
                        <span class="price-change positive">+1,234.56 (+2.96%)</span>
                    </div>
                </div>
            </div>
            
            <!-- Chart Panel -->
            <div class="chart-panel">
                <div class="chart-controls">
                    <div class="timeframe-controls">
                        <button class="tf-btn">1H</button>
                        <button class="tf-btn active">4H</button>
                        <button class="tf-btn">1D</button>
                        <button class="tf-btn">1W</button>
                    </div>
                    <div class="chart-tools">
                        <button class="chart-tool">📊</button>
                        <button class="chart-tool">📈</button>
                    </div>
                </div>
                
                <div class="chart-area">
                    <!-- Chart placeholder -->
                    <div class="chart-placeholder">
                        <i class="fas fa-chart-line"></i>
                        <p>Trading Chart</p>
                        <small>BTC/USDT Price Chart</small>
                    </div>
                </div>
            </div>
            
            <!-- Order Book & Recent Trades -->
            <div class="orderbook-trades-panel">
                <div class="orderbook-section">
                    <header class="panel-head">
                        <h4 class="panel-title">Order Book</h4>
                    </header>
                    
                    <div class="orderbook-table">
                        <!-- Sell Orders -->
                        <div class="orders-section sell-orders">
                            @for($i = 1; $i <= 8; $i++)
                            <div class="order-row">
                                <span class="order-price sell">{{ number_format(51423 + $i * 10, 2) }}</span>
                                <span class="order-amount">{{ number_format(0.1234 + $i * 0.01, 4) }}</span>
                            </div>
                            @endfor
                        </div>
                        
                        <!-- Current Price -->
                        <div class="current-price-row">
                            <span class="current-price-value">51,423.00</span>
                            <span class="price-direction">↗</span>
                        </div>
                        
                        <!-- Buy Orders -->
                        <div class="orders-section buy-orders">
                            @for($i = 1; $i <= 8; $i++)
                            <div class="order-row">
                                <span class="order-price buy">{{ number_format(51423 - $i * 10, 2) }}</span>
                                <span class="order-amount">{{ number_format(0.1234 + $i * 0.01, 4) }}</span>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                
                <div class="recent-trades-section">
                    <header class="panel-head">
                        <h4 class="panel-title">Recent Trades</h4>
                    </header>
                    
                    <div class="trades-list">
                        @for($i = 0; $i < 6; $i++)
                        <div class="trade-row">
                            <span class="trade-price {{ $i % 2 == 0 ? 'buy' : 'sell' }}">
                                {{ number_format(51423 + ($i % 2 == 0 ? 1 : -1) * rand(10, 50), 2) }}
                            </span>
                            <span class="trade-amount">{{ number_format(rand(1, 100) / 1000, 4) }}</span>
                            <span class="trade-time">{{ sprintf('%02d:%02d:%02d', rand(0, 23), rand(0, 59), rand(0, 59)) }}</span>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Right Column: Trading Forms & Assets -->
        <aside class="exchange-right-panel">
            <!-- Trading Panel -->
            <section class="trading-panel">
                <header class="panel-head">
                    <div class="trading-tabs" role="tablist">
                        <button class="trading-tab active" role="tab" aria-selected="true">Limit</button>
                        <button class="trading-tab" role="tab">Market</button>
                        <button class="trading-tab" role="tab">Stop</button>
                    </div>
                </header>
                
                <div class="trading-form">
                    <div class="trade-type-toggle">
                        <button class="trade-type-btn active buy-btn">Buy</button>
                        <button class="trade-type-btn sell-btn">Sell</button>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Price (USDT)</label>
                        <input type="number" class="form-input" placeholder="51,423.00" step="0.01">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Amount (BTC)</label>
                        <input type="number" class="form-input" placeholder="0.0000" step="0.0001">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Total (USDT)</label>
                        <input type="number" class="form-input" readonly placeholder="0.00">
                    </div>
                    
                    <div class="fee-info">
                        <span>Fee: 0.1%</span>
                        <span class="fee-amount">≈ 5.14 USDT</span>
                    </div>
                    
                    <button class="submit-order-btn buy-order">
                        Buy BTC
                    </button>
                </div>
            </section>
            
            <!-- Assets Panel - THIS IS WHERE ASSETS SHOULD BE -->
            <section class="assets-panel">
                <header class="panel-head">
                    <h4 class="panel-title">Assets</h4>
                    
                    <!-- Assets Controls - CORRECT PLACEMENT -->
                    <div class="assets-controls">
                        <input type="search" class="search-input" placeholder="Search asset" aria-label="Search assets">
                        <div class="assets-actions">
                            <button class="assets-btn" title="Convert">
                                <i class="fas fa-exchange-alt"></i>
                                Convert
                            </button>
                            <button class="assets-btn" title="Deposit">
                                <i class="fas fa-plus"></i>
                                Deposit
                            </button>
                        </div>
                    </div>
                </header>
                
                <!-- Assets Table -->
                <div class="assets-table-wrap">
                    <table class="assets-table">
                        <thead>
                            <tr>
                                <th>Coin</th>
                                <th>Total Balance</th>
                                <th>Available</th>
                                <th>In Order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $assets = [
                                ['coin' => 'BTC', 'name' => 'Bitcoin', 'balance' => '0.00124567', 'available' => '0.00124567', 'inOrder' => '0.00000000', 'icon' => 'bitcoin', 'color' => '#f7931a'],
                                ['coin' => 'ETH', 'name' => 'Ethereum', 'balance' => '0.45678901', 'available' => '0.45678901', 'inOrder' => '0.00000000', 'icon' => 'ethereum', 'color' => '#627eea'],
                                ['coin' => 'USDT', 'name' => 'Tether', 'balance' => '1,234.56', 'available' => '1,234.56', 'inOrder' => '0.00', 'icon' => 'dollar-sign', 'color' => '#26a17b'],
                                ['coin' => 'ADA', 'name' => 'Cardano', 'balance' => '156.789', 'available' => '156.789', 'inOrder' => '0.000', 'icon' => 'coins', 'color' => '#0033ad'],
                            ];
                            @endphp
                            
                            @foreach($assets as $asset)
                            <tr class="asset-row" data-coin="{{ $asset['coin'] }}">
                                <td class="coin-cell">
                                    <div class="coin-info">
                                        <div class="coin-icon" style="background-color: {{ $asset['color'] }}">
                                            <i class="fab fa-{{ $asset['icon'] }}"></i>
                                        </div>
                                        <div class="coin-details">
                                            <span class="coin-symbol">{{ $asset['coin'] }}</span>
                                            <small class="coin-name">{{ $asset['name'] }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="balance-cell">{{ $asset['balance'] }}</td>
                                <td class="available-cell">{{ $asset['available'] }}</td>
                                <td class="in-order-cell">{{ $asset['inOrder'] }}</td>
                                <td class="action-cell">
                                    <div class="asset-actions">
                                        <button class="asset-action-btn deposit" data-coin="{{ $asset['coin'] }}">
                                            Deposit
                                        </button>
                                        <button class="asset-action-btn withdraw" data-coin="{{ $asset['coin'] }}">
                                            Withdraw
                                        </button>
                                        <button class="asset-action-btn convert" data-coin="{{ $asset['coin'] }}">
                                            Convert
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <footer class="panel-foot">
                    <small class="text-muted">Data of last 6 months</small>
                </footer>
            </section>
            
            <!-- Orders History Panel -->
            <section class="orders-panel">
                <header class="panel-head">
                    <div class="orders-tabs">
                        <button class="orders-tab active">Open Orders</button>
                        <button class="orders-tab">Order History</button>
                    </div>
                </header>
                
                <div class="orders-content">
                    <div class="no-orders">
                        <i class="fas fa-clipboard-list"></i>
                        <p>No open orders</p>
                        <small>Your trading orders will appear here</small>
                    </div>
                </div>
            </section>
        </aside>
    </div>
</div>
@endsection

@section('styles')
<style>
/* Exchange Layout - Matching New Theme Design */

.exchange-main-grid {
    display: grid;
    grid-template-columns: 280px 1fr 360px;
    gap: 20px;
    min-height: calc(100vh - 100px);
}

/* Panel Base Styles */
.panel-head {
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
    background-color: var(--bg-tertiary);
}

.panel-title {
    font-size: 16px;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
}

.panel-controls,
.assets-controls {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 12px;
}

.search-input {
    flex: 1;
    padding: 8px 12px;
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 6px;
    color: var(--text-primary);
    font-size: 14px;
    outline: none;
}

.search-input:focus {
    border-color: var(--accent-yellow);
}

.search-input::placeholder {
    color: var(--text-muted);
}

/* Left Panel: Markets & Balances */
.exchange-left-panel {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.markets-panel,
.mini-balances-panel {
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    overflow: hidden;
}

.markets-list {
    max-height: 400px;
    overflow-y: auto;
}

.market-item {
    display: grid;
    grid-template-columns: 1fr auto auto;
    gap: 10px;
    padding: 12px 20px;
    border-bottom: 1px solid var(--border-color);
    transition: background-color 0.2s ease;
}

.market-item:hover {
    background-color: var(--hover-bg);
    cursor: pointer;
}

.market-pair {
    font-weight: 600;
    color: var(--text-primary);
}

.market-price {
    color: var(--text-primary);
    font-family: monospace;
}

.market-change {
    font-size: 12px;
    font-weight: 500;
}

.market-change.positive {
    color: var(--accent-green);
}

.market-change.negative {
    color: var(--accent-red);
}

.quick-balances {
    padding: 20px;
}

.balance-item {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid var(--border-color);
}

.balance-item:last-child {
    border-bottom: none;
}

.balance-coin {
    font-weight: 600;
    color: var(--text-primary);
}

.balance-amount {
    font-family: monospace;
    color: var(--text-secondary);
}

/* Center Panel: Chart & Order Book */
.exchange-center-panel {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.price-header {
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 20px;
}

.pair-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.pair-selector {
    display: flex;
    align-items: center;
    gap: 10px;
}

.pair-current {
    background: none;
    border: none;
    color: var(--text-primary);
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
}

.star-icon {
    color: var(--text-muted);
    cursor: pointer;
}

.pair-stats {
    text-align: right;
}

.current-price {
    display: block;
    font-size: 24px;
    font-weight: bold;
    color: var(--text-primary);
    font-family: monospace;
}

.price-change {
    font-size: 14px;
    font-weight: 500;
}

.price-change.positive {
    color: var(--accent-green);
}

.price-change.negative {
    color: var(--accent-red);
}

.chart-panel {
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    overflow: hidden;
    flex: 1;
}

.chart-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
}

.timeframe-controls {
    display: flex;
    gap: 5px;
}

.tf-btn {
    padding: 6px 12px;
    background: none;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    color: var(--text-secondary);
    font-size: 12px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.tf-btn:hover,
.tf-btn.active {
    background-color: var(--accent-yellow);
    color: #000000;
    border-color: var(--accent-yellow);
}

.chart-tools {
    display: flex;
    gap: 5px;
}

.chart-tool {
    padding: 6px 10px;
    background: none;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    color: var(--text-secondary);
    cursor: pointer;
    transition: all 0.2s ease;
}

.chart-tool:hover {
    background-color: var(--hover-bg);
    color: var(--text-primary);
}

.chart-area {
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--bg-primary), var(--bg-tertiary));
}

.chart-placeholder {
    text-align: center;
    color: var(--text-muted);
}

.chart-placeholder i {
    font-size: 48px;
    margin-bottom: 16px;
    opacity: 0.5;
}

.orderbook-trades-panel {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.orderbook-section,
.recent-trades-section {
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    overflow: hidden;
}

.orderbook-table {
    padding: 0;
}

.orders-section {
    padding: 0;
}

.order-row {
    display: flex;
    justify-content: space-between;
    padding: 4px 20px;
    font-size: 12px;
    font-family: monospace;
}

.order-row:hover {
    background-color: var(--hover-bg);
    cursor: pointer;
}

.order-price.sell {
    color: var(--accent-red);
}

.order-price.buy {
    color: var(--accent-green);
}

.order-amount {
    color: var(--text-secondary);
}

.current-price-row {
    padding: 12px 20px;
    background: linear-gradient(90deg, rgba(255, 193, 7, 0.1), transparent);
    border-top: 1px solid var(--accent-yellow);
    border-bottom: 1px solid var(--accent-yellow);
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
}

.current-price-value {
    font-weight: bold;
    color: var(--accent-yellow);
    font-family: monospace;
}

.price-direction {
    color: var(--accent-green);
}

.trades-list {
    max-height: 200px;
    overflow-y: auto;
}

.trade-row {
    display: flex;
    justify-content: space-between;
    padding: 6px 20px;
    font-size: 12px;
    font-family: monospace;
    border-bottom: 1px solid var(--border-color);
}

.trade-price.buy {
    color: var(--accent-green);
}

.trade-price.sell {
    color: var(--accent-red);
}

.trade-amount,
.trade-time {
    color: var(--text-secondary);
}

/* Right Panel: Trading & Assets */
.exchange-right-panel {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.trading-panel,
.assets-panel,
.orders-panel {
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    overflow: hidden;
}

/* Trading Form */
.trading-tabs {
    display: flex;
    border-bottom: 1px solid var(--border-color);
}

.trading-tab {
    flex: 1;
    padding: 12px;
    background: none;
    border: none;
    color: var(--text-secondary);
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.trading-tab.active {
    background-color: var(--accent-yellow);
    color: #000000;
    font-weight: 600;
}

.trading-form {
    padding: 20px;
}

.trade-type-toggle {
    display: flex;
    margin-bottom: 20px;
    border-radius: 6px;
    overflow: hidden;
}

.trade-type-btn {
    flex: 1;
    padding: 12px;
    border: none;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.trade-type-btn.buy-btn {
    background-color: var(--accent-green);
    color: #000000;
}

.trade-type-btn.sell-btn {
    background-color: var(--bg-tertiary);
    color: var(--text-secondary);
}

.trade-type-btn.sell-btn.active {
    background-color: var(--accent-red);
    color: #ffffff;
}

.form-group {
    margin-bottom: 16px;
}

.form-label {
    display: block;
    margin-bottom: 6px;
    font-size: 12px;
    color: var(--text-muted);
    font-weight: 500;
}

.form-input {
    width: 100%;
    padding: 12px;
    background-color: var(--bg-tertiary);
    border: 1px solid var(--border-color);
    border-radius: 6px;
    color: var(--text-primary);
    font-size: 14px;
    outline: none;
}

.form-input:focus {
    border-color: var(--accent-yellow);
}

.form-input::placeholder {
    color: var(--text-muted);
}

.fee-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    font-size: 12px;
    color: var(--text-muted);
}

.submit-order-btn {
    width: 100%;
    padding: 14px;
    background-color: var(--accent-green);
    color: #000000;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.submit-order-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

/* Assets Panel - CORRECT STYLING */
.assets-actions {
    display: flex;
    gap: 8px;
}

.assets-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 12px;
    background-color: var(--accent-yellow);
    color: #000000;
    border: none;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.assets-btn:hover {
    background-color: var(--accent-yellow-hover);
    transform: translateY(-1px);
}

.assets-table-wrap {
    max-height: 300px;
    overflow-y: auto;
}

.assets-table {
    width: 100%;
    font-size: 12px;
}

.assets-table th {
    padding: 12px 16px;
    background-color: var(--bg-tertiary);
    color: var(--text-muted);
    font-weight: 500;
    border-bottom: 1px solid var(--border-color);
    text-align: left;
}

.asset-row {
    border-bottom: 1px solid var(--border-color);
    transition: background-color 0.2s ease;
}

.asset-row:hover {
    background-color: var(--hover-bg);
}

.assets-table td {
    padding: 12px 16px;
    color: var(--text-primary);
}

.coin-info {
    display: flex;
    align-items: center;
    gap: 8px;
}

.coin-icon {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 12px;
}

.coin-details {
    display: flex;
    flex-direction: column;
}

.coin-symbol {
    font-weight: 600;
    color: var(--text-primary);
}

.coin-name {
    color: var(--text-muted);
    font-size: 10px;
}

.balance-cell,
.available-cell,
.in-order-cell {
    font-family: monospace;
    color: var(--text-primary);
}

.asset-actions {
    display: flex;
    gap: 4px;
}

.asset-action-btn {
    padding: 4px 8px;
    background: none;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    color: var(--text-secondary);
    font-size: 10px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.asset-action-btn:hover {
    background-color: var(--accent-yellow);
    color: #000000;
    border-color: var(--accent-yellow);
}

.panel-foot {
    padding: 12px 20px;
    background-color: var(--bg-tertiary);
    border-top: 1px solid var(--border-color);
}

/* Orders Panel */
.orders-tabs {
    display: flex;
}

.orders-tab {
    flex: 1;
    padding: 12px;
    background: none;
    border: none;
    color: var(--text-secondary);
    cursor: pointer;
    border-bottom: 2px solid transparent;
    transition: all 0.2s ease;
}

.orders-tab.active {
    color: var(--accent-yellow);
    border-bottom-color: var(--accent-yellow);
}

.orders-content {
    padding: 20px;
}

.no-orders {
    text-align: center;
    color: var(--text-muted);
    padding: 40px 20px;
}

.no-orders i {
    font-size: 32px;
    margin-bottom: 12px;
    opacity: 0.5;
}

.no-orders p {
    font-weight: 500;
    margin-bottom: 6px;
}

.no-orders small {
    font-size: 12px;
}

/* Responsive Design */
@media (max-width: 1400px) {
    .exchange-main-grid {
        grid-template-columns: 260px 1fr 340px;
    }
}

@media (max-width: 1200px) {
    .exchange-main-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto auto auto;
    }
    
    .orderbook-trades-panel {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .exchange-main-grid {
        gap: 15px;
    }
    
    .panel-head {
        padding: 12px 16px;
    }
    
    .trading-form,
    .orders-content {
        padding: 16px;
    }
    
    .pair-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .assets-controls {
        flex-direction: column;
        align-items: stretch;
        gap: 8px;
    }
    
    .assets-actions {
        justify-content: stretch;
    }
    
    .assets-btn {
        flex: 1;
        justify-content: center;
    }
}
</style>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Trading tabs functionality
    const tradingTabs = document.querySelectorAll('.trading-tab');
    tradingTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tradingTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Trade type toggle
    const tradeTypeBtns = document.querySelectorAll('.trade-type-btn');
    tradeTypeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tradeTypeBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const submitBtn = document.querySelector('.submit-order-btn');
            if (this.classList.contains('buy-btn')) {
                submitBtn.textContent = 'Buy BTC';
                submitBtn.style.backgroundColor = 'var(--accent-green)';
            } else {
                submitBtn.textContent = 'Sell BTC';
                submitBtn.style.backgroundColor = 'var(--accent-red)';
            }
        });
    });
    
    // Timeframe controls
    const tfBtns = document.querySelectorAll('.tf-btn');
    tfBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tfBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Orders tabs
    const ordersTabs = document.querySelectorAll('.orders-tab');
    ordersTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            ordersTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Market pair selection
    const marketItems = document.querySelectorAll('.market-item');
    marketItems.forEach(item => {
        item.addEventListener('click', function() {
            const pairText = this.querySelector('.market-pair').textContent;
            document.querySelector('.pair-current').textContent = pairText;
            console.log(`Selected pair: ${pairText}`);
        });
    });
    
    // Asset action buttons
    const assetActionBtns = document.querySelectorAll('.asset-action-btn');
    assetActionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.textContent.trim();
            const coin = this.dataset.coin;
            console.log(`${action} ${coin}`);
            // Here you can implement the actual action logic
        });
    });
    
    // Order book row clicks
    const orderRows = document.querySelectorAll('.order-row');
    orderRows.forEach(row => {
        row.addEventListener('click', function() {
            const price = this.querySelector('.order-price').textContent;
            const priceInput = document.querySelector('input[placeholder*="51,423"]');
            if (priceInput) {
                priceInput.value = price;
            }
        });
    });
    
    // Real-time price updates simulation
    function updatePrices() {
        const priceElements = document.querySelectorAll('.market-price, .current-price, .current-price-value');
        priceElements.forEach(element => {
            const currentPrice = parseFloat(element.textContent.replace(/[,$]/g, ''));
            if (!isNaN(currentPrice)) {
                const change = (Math.random() - 0.5) * 0.02;
                const newPrice = Math.max(0, currentPrice * (1 + change));
                element.textContent = newPrice.toLocaleString('en-US', {
                    minimumFractionDigits: element.textContent.includes('.') ? 2 : 0,
                    maximumFractionDigits: element.textContent.includes('.') ? 2 : 0
                });
            }
        });
    }
    
    // Update prices every 5 seconds
    setInterval(updatePrices, 5000);
    
    console.log('✅ Exchange interface initialized with correct Assets panel layout!');
});
</script>
@endsection