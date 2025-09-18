@extends('backend.layouts.backend')

@section('content')
<div class="container-fluid">
    <!-- Assets Section - Reference Design Exact Match -->
    <div class="assets-section">
        <div class="section-header">
            <h2 class="section-title">Assets</h2>
            <div class="section-actions">
                <button class="nav-tab-reference active">
                    Orders
                    @php
                        $openOrdersCount = \App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->count();
                    @endphp
                    @if($openOrdersCount > 0)
                        <span class="badge">{{ $openOrdersCount }}</span>
                    @endif
                </button>
                <button class="btn-add-funds-reference" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Funds</button>
            </div>
        </div>
        
        <!-- Asset Tabs - Reference Design -->
        <div class="asset-tabs">
            <button class="asset-tab active" data-asset="BTC">BTC</button>
            <button class="asset-tab" data-asset="ETH">ETH</button>
            <button class="asset-tab" data-asset="USDT">USDT</button>
            <button class="asset-tab" data-asset="XRP">XRP</button>
        </div>
        
        <!-- Search Coin -->
        <input type="text" class="search-coin-reference" placeholder="Search coin">
    </div>

    <!-- Trading Chart - Reference Design -->
    <div class="chart-container-reference">
        <div class="chart-placeholder-reference">
            <i class="fas fa-chart-line"></i>
            <h5>BTC/USDT Trading Chart</h5>
            <p>Price: ${{ number_format(76248.96, 2) }} | 24h Change: +2.45%</p>
        </div>
    </div>

    <!-- Trading Layout - Reference Design -->
    <div class="trading-layout">
        <!-- Left Panel: Order Book -->
        <div class="trading-card">
            <div class="card-header-new">
                <h3 class="card-title-new">Order Book</h3>
            </div>
            <div class="card-body-new">
                <!-- Order Book Table -->
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Price (USDT)</th>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Quantity</th>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sell Orders (Red) -->
                        @for($i = 0; $i < 5; $i++)
                        <tr style="color: var(--accent-red);">
                            <td style="font-size: 12px;">{{ number_format(76249.95 + $i * 10, 2) }}</td>
                            <td style="font-size: 12px;">{{ number_format(24.098 + $i * 0.5, 3) }}</td>
                            <td style="font-size: 12px;">---</td>
                        </tr>
                        @endfor
                        
                        <!-- Current Price -->
                        <tr style="border-top: 2px solid var(--accent-yellow); border-bottom: 2px solid var(--accent-yellow);">
                            <td colspan="3" style="text-align: center; color: var(--accent-yellow); font-weight: 600; padding: 8px;">
                                ${{ number_format(76248.96, 2) }} ≈ ${{ number_format(76248.96, 2) }} USD
                            </td>
                        </tr>
                        
                        <!-- Buy Orders (Green) -->
                        @for($i = 0; $i < 5; $i++)
                        <tr style="color: var(--accent-green);">
                            <td style="font-size: 12px;">{{ number_format(76245.95 - $i * 10, 2) }}</td>
                            <td style="font-size: 12px;">{{ number_format(24.098 - $i * 0.3, 3) }}</td>
                            <td style="font-size: 12px;">---</td>
                        </tr>
                        @endfor
                    </tbody>
                </table>

                <div class="mt-3" style="font-size: 12px;">
                    <p style="color: var(--text-secondary);">Trade Fee: (0.1%) <strong style="color: var(--text-primary);">0.00 USDT</strong></p>
                    <button class="btn btn-sm" style="background-color: var(--accent-yellow); color: #000000; border-radius: 6px; font-weight: 600;">Buy USDT</button>
                </div>
            </div>
        </div>

        <!-- Center Panel: Trading Form & Recent Trades -->
        <div class="trading-card">
            <div class="card-header-new">
                <h3 class="card-title-new">Market Trading</h3>
            </div>
            <div class="card-body-new">
                <!-- Trading Form Tabs -->
                <div class="mb-3">
                    <div class="d-flex gap-2">
                        <button class="nav-tab-reference active">Buy</button>
                        <button class="nav-tab-reference">Sell</button>
                        <button class="nav-tab-reference">Market</button>
                        <button class="nav-tab-reference">Limit</button>
                    </div>
                </div>

                <!-- Buy Form -->
                <div class="mb-3">
                    <label class="form-label" style="font-size: 12px; color: var(--text-muted);">Price (USDT)</label>
                    <input type="text" class="form-control" value="{{ number_format(76248.96, 2) }}" style="background-color: var(--bg-tertiary); border: 1px solid var(--border-color); color: var(--text-primary);">
                </div>

                <div class="mb-3">
                    <label class="form-label" style="font-size: 12px; color: var(--text-muted);">Amount (BTC)</label>
                    <input type="text" class="form-control" placeholder="0.00" style="background-color: var(--bg-tertiary); border: 1px solid var(--border-color); color: var(--text-primary);">
                </div>

                <div class="mb-3">
                    <label class="form-label" style="font-size: 12px; color: var(--text-muted);">Total (USDT)</label>
                    <input type="text" class="form-control" placeholder="0.00" style="background-color: var(--bg-tertiary); border: 1px solid var(--border-color); color: var(--text-primary);">
                </div>

                <div class="d-grid gap-2">
                    <button class="btn" style="background-color: var(--accent-green); color: #000000; font-weight: 600; border-radius: 6px;">Buy BTC</button>
                </div>

                <!-- Recent Trades -->
                <div class="mt-4">
                    <h6 style="font-size: 14px; margin-bottom: 10px; color: var(--text-primary);">Recent Trades</h6>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th style="color: var(--text-muted); font-size: 11px;">Price</th>
                                <th style="color: var(--text-muted); font-size: 11px;">Amount</th>
                                <th style="color: var(--text-muted); font-size: 11px;">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0; $i < 4; $i++)
                            <tr>
                                <td style="color: {{ $i % 2 == 0 ? 'var(--accent-green)' : 'var(--accent-red)' }}; font-size: 11px;">{{ number_format(76248.96 + ($i % 2 == 0 ? 1 : -1) * rand(10, 50), 2) }}</td>
                                <td style="color: var(--text-secondary); font-size: 11px;">0.0{{ rand(20, 60) }}</td>
                                <td style="color: var(--text-secondary); font-size: 11px;">{{ sprintf('%02d:%02d:%02d', rand(0, 23), rand(0, 59), rand(0, 59)) }}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Panel: Market Pairs & Wallet -->
        <div class="trading-card">
            <div class="card-header-new">
                <h3 class="card-title-new">Assets</h3>
            </div>
            <div class="card-body-new">
                <!-- Pairs Table Header -->
                <div style="margin-bottom: 16px;">
                    <div style="display: flex; justify-content: space-between; color: var(--text-muted); font-size: 12px; font-weight: 500; margin-bottom: 8px;">
                        <span>Pairs</span>
                        <span>Price</span>
                        <span>Change</span>
                    </div>
                </div>
                
                <!-- Market Pairs -->
                @php
                $pairs = [
                    ['name' => 'USDT', 'symbol' => 'BTC', 'price' => 30.03, 'change' => 62.9, 'positive' => true],
                    ['name' => 'TON', 'symbol' => 'BTC', 'price' => 21.12, 'change' => -10.4, 'positive' => false],
                    ['name' => 'LSK', 'symbol' => 'BTC', 'price' => 3.53, 'change' => 19.2, 'positive' => true],
                    ['name' => 'XLM', 'symbol' => 'BTC', 'price' => 92.53, 'change' => 12.3, 'positive' => true],
                    ['name' => 'LINK', 'symbol' => 'BTC', 'price' => 40.50, 'change' => -26.3, 'positive' => false],
                ];
                @endphp

                @foreach($pairs as $pair)
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid var(--border-color);">
                    <div>
                        <h6 style="font-size: 14px; font-weight: 600; color: var(--text-primary); margin: 0 0 4px 0;">{{ $pair['name'] }}</h6>
                        <small style="font-size: 12px; color: var(--text-muted);">{{ $pair['symbol'] }}</small>
                    </div>
                    <div style="text-align: right;">
                        <div style="font-size: 14px; font-weight: 600; color: var(--text-primary);">${{ number_format($pair['price'], 2) }}</div>
                        <div style="font-size: 12px; font-weight: 500; color: {{ $pair['positive'] ? 'var(--accent-green)' : 'var(--accent-red)' }};">
                            {{ $pair['positive'] ? '+' : '' }}{{ $pair['change'] }}%
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Wallet Section -->
                <div class="mt-4">
                    <div style="padding: 16px 0; border-bottom: 1px solid var(--border-color);">
                        <h6 style="font-size: 16px; font-weight: 600; color: var(--text-primary); margin-bottom: 8px;">Wallet - Bitcoin (BTC)</h6>
                    </div>
                    <div class="d-flex align-items-center gap-3 mt-3">
                        <div style="width: 32px; height: 32px; background: linear-gradient(135deg, var(--accent-yellow), #ffb300); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fab fa-bitcoin" style="color: #000; font-size: 18px;"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: var(--text-primary);">Bitcoin BTC</div>
                            <div style="color: var(--text-muted); font-size: 12px;">{{ number_format(auth()->user()->balance ?? 0, 6) }}</div>
                            <div style="color: var(--text-muted); font-size: 11px;">${{ number_format(auth()->user()->balance ?? 0, 2) }}</div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-sm" style="background-color: var(--accent-yellow); color: #000000; border-radius: 6px; font-weight: 600;">Convert</button>
                    </div>

                    <div class="mt-2" style="font-size: 11px; color: var(--text-muted);">
                        Asset Distribution: 
                        <span class="badge" style="background-color: var(--bg-tertiary); color: var(--text-secondary); font-size: 10px;">Spot</span>
                        <span class="badge" style="background-color: var(--bg-tertiary); color: var(--text-secondary); font-size: 10px;">BTC/USDT</span>
                        <span class="badge" style="background-color: var(--bg-tertiary); color: var(--text-secondary); font-size: 10px;">Earn</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders & History Section -->
    <div class="mt-4" style="background-color: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: 12px; box-shadow: var(--card-shadow); overflow: hidden;">
        <div class="p-3">
            <div style="display: flex; border-bottom: 1px solid var(--border-color); margin-bottom: 15px;">
                <div class="nav-tab-reference active" style="margin-bottom: -1px;">Open Orders</div>
                <div class="nav-tab-reference" style="margin-bottom: -1px;">Order History</div>
                <div class="nav-tab-reference" style="margin-bottom: -1px;">Trade History</div>
                <div class="nav-tab-reference" style="margin-bottom: -1px;">Assets</div>
            </div>

            <!-- Sample Order History -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Date</th>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Pair</th>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Order Type</th>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Side</th>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Price</th>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Avg Price</th>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Executed</th>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Amount</th>
                            <th style="color: var(--text-muted); font-size: 12px; font-weight: 500;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $orders = [
                            ['date' => '06-14-24 10:35:42', 'pair' => 'BTC/USDT', 'type' => 'Stop Market', 'side' => 'Sell', 'price' => '--', 'avg_price' => '51,423.00', 'executed' => '0.092', 'amount' => '0.092', 'status' => 'Filled', 'status_color' => 'success'],
                            ['date' => '06-14-24 10:35:42', 'pair' => 'BTC/USDT', 'type' => 'Market', 'side' => 'Buy', 'price' => '--', 'avg_price' => '0.00', 'executed' => '0.00', 'amount' => '0.104', 'status' => 'Canceled', 'status_color' => 'warning'],
                            ['date' => '06-14-24 10:35:42', 'pair' => 'BTC/USDT', 'type' => 'Limit', 'side' => 'Sell', 'price' => '51,982.00', 'avg_price' => '0.00', 'executed' => '0.00', 'amount' => '0.064', 'status' => 'Expired', 'status_color' => 'danger'],
                        ];
                        @endphp

                        @foreach($orders as $order)
                        <tr>
                            <td style="color: var(--text-secondary); font-size: 12px;">{{ $order['date'] }}</td>
                            <td style="color: var(--text-primary); font-size: 12px;">{{ $order['pair'] }}</td>
                            <td style="color: var(--text-secondary); font-size: 12px;">{{ $order['type'] }}</td>
                            <td style="color: {{ $order['side'] === 'Buy' ? 'var(--accent-green)' : 'var(--accent-red)' }}; font-size: 12px;">{{ $order['side'] }}</td>
                            <td style="color: var(--text-secondary); font-size: 12px;">{{ $order['price'] }}</td>
                            <td style="color: var(--text-primary); font-size: 12px;">{{ $order['avg_price'] }}</td>
                            <td style="color: var(--text-secondary); font-size: 12px;">{{ $order['executed'] }}</td>
                            <td style="color: var(--text-secondary); font-size: 12px;">{{ $order['amount'] }}</td>
                            <td>
                                <span class="badge" style="background-color: var(--accent-{{ $order['status_color'] === 'success' ? 'green' : ($order['status_color'] === 'warning' ? 'yellow' : 'red') }}); color: {{ $order['status_color'] === 'warning' ? '#000' : '#fff' }}; font-size: 10px;">{{ $order['status'] }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Asset tabs functionality
    const assetTabs = document.querySelectorAll('.asset-tab');
    assetTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            assetTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            console.log(`Selected asset: ${this.dataset.asset}`);
        });
    });

    // Navigation tabs functionality
    const navTabs = document.querySelectorAll('.nav-tab-reference');
    navTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Only toggle within the same parent container
            const parentContainer = this.closest('.section-actions, .card-body-new, .p-3');
            if (parentContainer) {
                const siblingTabs = parentContainer.querySelectorAll('.nav-tab-reference');
                siblingTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });

    console.log('Tradestation reference design loaded successfully! ✅');
});
</script>
@endpush
@endsection