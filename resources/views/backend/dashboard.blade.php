@extends('backend.layouts.backend')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1">Hello, {{ substr(auth()->user()->email, 0, 2) }}**@**.com</h4>
                    <button class="btn btn-sm btn-outline-primary">Follow</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Assets Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-4">
                    <h6 class="text-muted mb-2">Total Assets</h6>
                    <h2 class="fw-bold mb-1">${{ number_format(auth()->user()->total(), 2) }}</h2>
                    <p class="text-muted mb-3">≈ ${{ number_format(auth()->user()->total(), 2) }}</p>
                    
                    <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
                        Deposit or buy crypto
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notice Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <i class="fas fa-info-circle me-2"></i>
                <div>
                    <strong>You don't currently have assets.</strong> Deposit or buy crypto via the methods below.
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-plus-circle fa-2x text-primary mb-3"></i>
                    <h5>Deposit</h5>
                    <p class="text-muted">Deposit crypto or fiat.</p>
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
                        Deposit Now
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-exchange-alt fa-2x text-success mb-3"></i>
                    <h5>P2P</h5>
                    <p class="text-muted">Use local currency and payment method.</p>
                    <button class="btn btn-outline-success">
                        Trade P2P
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Summary -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Account</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Futures</h6>
                                    <small class="text-muted">Trading Balance</small>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold">0.00</div>
                                    <small class="text-muted">≈ 0.00 USD</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Earn</h6>
                                    <small class="text-muted">Staking Rewards</small>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold">${{ number_format(auth()->user()->bonus, 5) }}</div>
                                    <small class="text-muted">≈ ${{ number_format(auth()->user()->bonus, 2) }} USD</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Assets Table -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">My Assets</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Coin</th>
                                    <th>Amount</th>
                                    <th>Last Price</th>
                                    <th>24h Change</th>
                                    <th>Ratio</th>
                                    <th>Market Cap</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://cryptologos.cc/logos/bitcoin-btc-logo.png" alt="BTC" style="width: 24px; height: 24px;" class="me-2">
                                            <div>
                                                <div class="fw-bold">BTC</div>
                                                <small class="text-muted">Bitcoin</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="fw-bold">0.00</div>
                                            <small class="text-muted">≈ $0.00</small>
                                        </div>
                                    </td>
                                    <td>$74,491.41</td>
                                    <td><span class="text-success">+1.62%</span></td>
                                    <td>--</td>
                                    <td>$1,865.47B</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary">Stake</button>
                                            <button class="btn btn-outline-secondary">Transfer</button>
                                            <button class="btn btn-outline-success">Convert</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://cryptologos.cc/logos/ethereum-eth-logo.png" alt="ETH" style="width: 24px; height: 24px;" class="me-2">
                                            <div>
                                                <div class="fw-bold">ETH</div>
                                                <small class="text-muted">Ethereum</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="fw-bold">0.00</div>
                                            <small class="text-muted">≈ $0.00</small>
                                        </div>
                                    </td>
                                    <td>$3,073.67</td>
                                    <td><span class="text-danger">-0.26%</span></td>
                                    <td>--</td>
                                    <td>$370.25B</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary">Stake</button>
                                            <button class="btn btn-outline-secondary">Transfer</button>
                                            <button class="btn btn-outline-success">Convert</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://cryptologos.cc/logos/bnb-bnb-logo.png" alt="BNB" style="width: 24px; height: 24px;" class="me-2">
                                            <div>
                                                <div class="fw-bold">BNB</div>
                                                <small class="text-muted">BNB</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="fw-bold">0.00</div>
                                            <small class="text-muted">≈ $0.00</small>
                                        </div>
                                    </td>
                                    <td>$608.61</td>
                                    <td><span class="text-success">+3.72%</span></td>
                                    <td>--</td>
                                    <td>$87.54B</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary">Stake</button>
                                            <button class="btn btn-outline-secondary">Transfer</button>
                                            <button class="btn btn-outline-success">Convert</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order History -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Recent Orders</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Pair</th>
                                    <th>Order Type</th>
                                    <th>Side</th>
                                    <th>Price</th>
                                    <th>Avg Price</th>
                                    <th>Executed</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse(\App\Models\Trade::whereUserId(auth()->id())->latest()->take(5)->get() as $trade)
                                <tr>
                                    <td>{{ $trade->created_at->format('M d, H:i') }}</td>
                                    <td>{{ $trade->pair ?? 'BTC/USDT' }}</td>
                                    <td>{{ $trade->order_type ?? 'Limit' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $trade->type === 'buy' ? 'success' : 'danger' }}">
                                            {{ strtoupper($trade->type ?? 'BUY') }}
                                        </span>
                                    </td>
                                    <td>${{ number_format($trade->price ?? 74491, 2) }}</td>
                                    <td>${{ number_format($trade->avg_price ?? $trade->price ?? 74491, 2) }}</td>
                                    <td>{{ $trade->executed ?? '100%' }}</td>
                                    <td>{{ number_format($trade->amount ?? 0, 6) }}</td>
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
                                    <td colspan="9" class="text-center text-muted py-4">
                                        You have no order history
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Dashboard Components -->
    @if (setting('trade'))
        @include('backend.components.dashboard.trade')
    @endif

    @if (setting('invest'))
        @include('backend.components.dashboard.investment')
    @endif
</div>
@endsection

@section('styles')
{{--    <link rel="stylesheet" href="/back/vendor/waves/waves.min.css">--}}
@endsection

@section('js')

@endsection
