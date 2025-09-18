@extends('backend.layouts.backend')

@section('content')
<div class="container-fluid">
    <!-- Trading Interface -->
    <div class="row">
        <!-- Left Side - Order Book & Trades -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <!-- Order Book -->
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title mb-0">Order Book</h6>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            BTC/USDT
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">BTC/USDT</a></li>
                            <li><a class="dropdown-item" href="#">ETH/USDT</a></li>
                            <li><a class="dropdown-item" href="#">BNB/USDT</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>Price (USDT)</th>
                                    <th class="text-end">Amount (BTC)</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sell Orders -->
                                <tr class="text-danger">
                                    <td>74,525.67</td>
                                    <td class="text-end">0.15420</td>
                                    <td class="text-end">11,490.25</td>
                                </tr>
                                <tr class="text-danger">
                                    <td>74,520.34</td>
                                    <td class="text-end">0.08975</td>
                                    <td class="text-end">6,688.20</td>
                                </tr>
                                <tr class="text-danger">
                                    <td>74,515.89</td>
                                    <td class="text-end">0.22350</td>
                                    <td class="text-end">16,664.30</td>
                                </tr>
                                <!-- Current Price -->
                                <tr class="bg-primary bg-opacity-10">
                                    <td colspan="3" class="text-center fw-bold">
                                        <span class="text-success">74,491.41</span> ≈ $74,491.41
                                    </td>
                                </tr>
                                <!-- Buy Orders -->
                                <tr class="text-success">
                                    <td>74,485.22</td>
                                    <td class="text-end">0.18640</td>
                                    <td class="text-end">13,890.45</td>
                                </tr>
                                <tr class="text-success">
                                    <td>74,480.11</td>
                                    <td class="text-end">0.31250</td>
                                    <td class="text-end">23,275.03</td>
                                </tr>
                                <tr class="text-success">
                                    <td>74,475.66</td>
                                    <td class="text-end">0.45890</td>
                                    <td class="text-end">34,162.18</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Trades -->
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Recent Trades</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>Price (USDT)</th>
                                    <th class="text-end">Amount (BTC)</th>
                                    <th class="text-end">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-success">
                                    <td>74,491.41</td>
                                    <td class="text-end">0.01250</td>
                                    <td class="text-end">15:45:23</td>
                                </tr>
                                <tr class="text-danger">
                                    <td>74,485.67</td>
                                    <td class="text-end">0.03420</td>
                                    <td class="text-end">15:45:18</td>
                                </tr>
                                <tr class="text-success">
                                    <td>74,492.15</td>
                                    <td class="text-end">0.00890</td>
                                    <td class="text-end">15:45:12</td>
                                </tr>
                                <tr class="text-danger">
                                    <td>74,488.33</td>
                                    <td class="text-end">0.02150</td>
                                    <td class="text-end">15:45:05</td>
                                </tr>
                                <tr class="text-success">
                                    <td>74,495.78</td>
                                    <td class="text-end">0.01680</td>
                                    <td class="text-end">15:44:58</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Center - Chart -->
        <div class="col-xl-6 col-lg-8 col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <h5 class="mb-0">BTC/USDT</h5>
                        <span class="badge bg-success">+1.62%</span>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-secondary">1m</button>
                        <button class="btn btn-sm btn-outline-secondary">5m</button>
                        <button class="btn btn-sm btn-primary">1h</button>
                        <button class="btn btn-sm btn-outline-secondary">4h</button>
                        <button class="btn btn-sm btn-outline-secondary">1d</button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Price Stats -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-6">
                            <div class="text-muted small">Last Price</div>
                            <div class="fw-bold text-success">74,491.41</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="text-muted small">24h Change</div>
                            <div class="fw-bold text-success">+1,188.25 (+1.62%)</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="text-muted small">24h High</div>
                            <div class="fw-bold">75,125.89</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="text-muted small">24h Low</div>
                            <div class="fw-bold">73,245.12</div>
                        </div>
                    </div>
                    
                    <!-- Chart Placeholder -->
                    <div class="chart-container" style="height: 400px; background: linear-gradient(45deg, var(--card-color), var(--tab-bg-color)); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <div class="text-center">
                            <i class="fas fa-chart-line fa-3x text-muted mb-3"></i>
                            <h6 class="text-muted">Trading Chart</h6>
                            <small class="text-muted">Interactive candlestick chart will be displayed here</small>
                        </div>
                    </div>

                    <!-- Volume Stats -->
                    <div class="row mt-3">
                        <div class="col-md-4 col-4">
                            <div class="text-muted small">24h Volume (BTC)</div>
                            <div class="fw-bold">2,845.67</div>
                        </div>
                        <div class="col-md-4 col-4">
                            <div class="text-muted small">24h Volume (USDT)</div>
                            <div class="fw-bold">211.8M</div>
                        </div>
                        <div class="col-md-4 col-4">
                            <div class="text-muted small">Market Cap</div>
                            <div class="fw-bold">$1,865.47B</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Trading Panel -->
        <div class="col-xl-3 col-lg-12">
            <!-- Buy/Sell Panel -->
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills w-100" id="tradingTab" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link active w-100 text-success" id="buy-tab" data-bs-toggle="pill" data-bs-target="#buy-panel" type="button">
                                Buy BTC
                            </button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 text-danger" id="sell-tab" data-bs-toggle="pill" data-bs-target="#sell-panel" type="button">
                                Sell BTC
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="tradingTabContent">
                        <!-- Buy Panel -->
                        <div class="tab-pane fade show active" id="buy-panel" role="tabpanel">
                            <form action="{{ route('backend.trades.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="buy">
                                <input type="hidden" name="pair" value="BTC/USDT">
                                
                                <div class="mb-3">
                                    <label class="form-label">Price (USDT)</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="price" value="74491.41" step="0.01">
                                        <button class="btn btn-outline-secondary" type="button">Market</button>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Amount (BTC)</label>
                                    <input type="number" class="form-control" name="amount" step="0.00000001" placeholder="0.00000000">
                                    <div class="form-text d-flex justify-content-between">
                                        <span>Available: {{ number_format(auth()->user()->balance, 2) }} USDT</span>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted small">Percentage</span>
                                    </div>
                                    <div class="btn-group w-100" role="group">
                                        <button type="button" class="btn btn-outline-secondary btn-sm percent-btn" data-percent="25">25%</button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm percent-btn" data-percent="50">50%</button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm percent-btn" data-percent="75">75%</button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm percent-btn" data-percent="100">100%</button>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Total (USDT)</label>
                                    <input type="number" class="form-control" name="total" step="0.01" readonly>
                                </div>
                                
                                <button type="submit" class="btn btn-success w-100">Buy BTC</button>
                            </form>
                        </div>
                        
                        <!-- Sell Panel -->
                        <div class="tab-pane fade" id="sell-panel" role="tabpanel">
                            <form action="{{ route('backend.trades.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="sell">
                                <input type="hidden" name="pair" value="BTC/USDT">
                                
                                <div class="mb-3">
                                    <label class="form-label">Price (USDT)</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="price" value="74491.41" step="0.01">
                                        <button class="btn btn-outline-secondary" type="button">Market</button>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Amount (BTC)</label>
                                    <input type="number" class="form-control" name="amount" step="0.00000001" placeholder="0.00000000">
                                    <div class="form-text d-flex justify-content-between">
                                        <span>Available: 0.00000000 BTC</span>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted small">Percentage</span>
                                    </div>
                                    <div class="btn-group w-100" role="group">
                                        <button type="button" class="btn btn-outline-secondary btn-sm percent-btn" data-percent="25">25%</button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm percent-btn" data-percent="50">50%</button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm percent-btn" data-percent="75">75%</button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm percent-btn" data-percent="100">100%</button>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Total (USDT)</label>
                                    <input type="number" class="form-control" name="total" step="0.01" readonly>
                                </div>
                                
                                <button type="submit" class="btn btn-danger w-100">Sell BTC</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Account Balance -->
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="card-title mb-0">Account Balance</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>USDT</span>
                        <span class="fw-bold">${{ number_format(auth()->user()->balance, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>BTC</span>
                        <span class="fw-bold">0.00000000</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>ETH</span>
                        <span class="fw-bold">0.00000000</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Open Orders & Order History -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="ordersTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="open-orders-tab" data-bs-toggle="tab" data-bs-target="#open-orders" type="button">
                                Open Orders
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="order-history-tab" data-bs-toggle="tab" data-bs-target="#order-history" type="button">
                                Order History
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="trade-history-tab" data-bs-toggle="tab" data-bs-target="#trade-history" type="button">
                                Trade History
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="ordersTabContent">
                        <!-- Open Orders -->
                        <div class="tab-pane fade show active" id="open-orders" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Pair</th>
                                            <th>Type</th>
                                            <th>Side</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                            <th>Filled</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\App\Models\Trade::whereUserId(auth()->id())->whereStatus(0)->latest()->get() as $trade)
                                        <tr>
                                            <td>{{ $trade->created_at->format('Y-m-d H:i') }}</td>
                                            <td>{{ $trade->pair ?? 'BTC/USDT' }}</td>
                                            <td>{{ $trade->order_type ?? 'Limit' }}</td>
                                            <td>
                                                <span class="badge bg-{{ $trade->type === 'buy' ? 'success' : 'danger' }}">
                                                    {{ strtoupper($trade->type ?? 'BUY') }}
                                                </span>
                                            </td>
                                            <td>${{ number_format($trade->price ?? 74491.41, 2) }}</td>
                                            <td>{{ number_format($trade->amount ?? 0, 8) }}</td>
                                            <td>{{ $trade->filled ?? '0%' }}</td>
                                            <td>${{ number_format($trade->total ?? 0, 2) }}</td>
                                            <td>
                                                <span class="badge bg-warning">Open</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-danger">Cancel</button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-muted">No open orders</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Order History -->
                        <div class="tab-pane fade" id="order-history" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Pair</th>
                                            <th>Type</th>
                                            <th>Side</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                            <th>Filled</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\App\Models\Trade::whereUserId(auth()->id())->latest()->take(10)->get() as $trade)
                                        <tr>
                                            <td>{{ $trade->created_at->format('Y-m-d H:i') }}</td>
                                            <td>{{ $trade->pair ?? 'BTC/USDT' }}</td>
                                            <td>{{ $trade->order_type ?? 'Limit' }}</td>
                                            <td>
                                                <span class="badge bg-{{ $trade->type === 'buy' ? 'success' : 'danger' }}">
                                                    {{ strtoupper($trade->type ?? 'BUY') }}
                                                </span>
                                            </td>
                                            <td>${{ number_format($trade->price ?? 74491.41, 2) }}</td>
                                            <td>{{ number_format($trade->amount ?? 0, 8) }}</td>
                                            <td>{{ $trade->filled ?? '100%' }}</td>
                                            <td>${{ number_format($trade->total ?? 0, 2) }}</td>
                                            <td>
                                                @if($trade->status == 1)
                                                    <span class="badge bg-success">Completed</span>
                                                @elseif($trade->status == 0)
                                                    <span class="badge bg-warning">Pending</span>
                                                @else
                                                    <span class="badge bg-danger">Cancelled</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9" class="text-center text-muted">No order history</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Trade History -->
                        <div class="tab-pane fade" id="trade-history" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Pair</th>
                                            <th>Side</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                            <th>Fee</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\App\Models\Trade::whereUserId(auth()->id())->whereStatus(1)->latest()->take(10)->get() as $trade)
                                        <tr>
                                            <td>{{ $trade->created_at->format('Y-m-d H:i') }}</td>
                                            <td>{{ $trade->pair ?? 'BTC/USDT' }}</td>
                                            <td>
                                                <span class="badge bg-{{ $trade->type === 'buy' ? 'success' : 'danger' }}">
                                                    {{ strtoupper($trade->type ?? 'BUY') }}
                                                </span>
                                            </td>
                                            <td>${{ number_format($trade->price ?? 74491.41, 2) }}</td>
                                            <td>{{ number_format($trade->amount ?? 0, 8) }}</td>
                                            <td>{{ number_format($trade->fee ?? 0, 8) }} BTC</td>
                                            <td>${{ number_format($trade->total ?? 0, 2) }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">No trade history</td>
                                        </tr>
                                        @endforelse
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
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Calculate total based on price and amount
    const priceInputs = document.querySelectorAll('input[name="price"]');
    const amountInputs = document.querySelectorAll('input[name="amount"]');
    const totalInputs = document.querySelectorAll('input[name="total"]');
    
    function calculateTotal() {
        priceInputs.forEach((priceInput, index) => {
            const amountInput = amountInputs[index];
            const totalInput = totalInputs[index];
            
            const price = parseFloat(priceInput.value) || 0;
            const amount = parseFloat(amountInput.value) || 0;
            const total = price * amount;
            
            totalInput.value = total.toFixed(2);
        });
    }
    
    // Add event listeners for price and amount changes
    priceInputs.forEach(input => {
        input.addEventListener('input', calculateTotal);
    });
    
    amountInputs.forEach(input => {
        input.addEventListener('input', calculateTotal);
    });
    
    // Handle percentage buttons
    document.querySelectorAll('.percent-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const percent = parseInt(this.dataset.percent);
            const tabPane = this.closest('.tab-pane');
            const amountInput = tabPane.querySelector('input[name="amount"]');
            const available = {{ auth()->user()->balance }}; // Available USDT
            const price = parseFloat(tabPane.querySelector('input[name="price"]').value) || 74491.41;
            
            // Calculate amount based on percentage of available balance
            const usdtToSpend = (available * percent) / 100;
            const amount = usdtToSpend / price;
            
            amountInput.value = amount.toFixed(8);
            calculateTotal();
        });
    });
    
    // Auto-refresh order book and recent trades every 5 seconds
    setInterval(function() {
        // Here you would typically make AJAX calls to update the order book and recent trades
        // For demo purposes, we'll just update the timestamp
        console.log('Refreshing market data...');
    }, 5000);
});
</script>
@endsection

@section('styles')
<style>
.table th {
    border-top: none;
    font-weight: 600;
    font-size: 0.875rem;
    color: var(--color-primary-300);
}

.table td {
    font-size: 0.875rem;
    vertical-align: middle;
}

.nav-pills .nav-link.active {
    background-color: transparent;
    border: 1px solid currentColor;
}

.chart-container {
    position: relative;
    overflow: hidden;
}

.percent-btn {
    flex: 1;
}

.btn-group .btn {
    border-radius: 0;
}

.btn-group .btn:first-child {
    border-top-left-radius: 0.375rem;
    border-bottom-left-radius: 0.375rem;
}

.btn-group .btn:last-child {
    border-top-right-radius: 0.375rem;
    border-bottom-right-radius: 0.375rem;
}

.text-success {
    color: var(--color-data-up) !important;
}

.text-danger {
    color: var(--color-data-down) !important;
}
</style>
@endsection