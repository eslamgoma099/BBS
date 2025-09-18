@extends('backend.layouts.backend')

@section('content')
<div class="container-fluid p-0">
    <div class="row g-3">
        <!-- Left Panel - Order Book -->
        <div class="col-lg-3 col-md-4">
            <!-- Order Book Section -->
            <div class="card border-0 h-100" style="background: #1a1a1a; border-radius: 12px;">
                <div class="card-header border-0 bg-transparent px-3 py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-white fw-bold">Order Book</h6>
                        <div class="dropdown">
                            <button class="btn btn-sm text-warning fw-bold dropdown-toggle border-0 bg-transparent" type="button" data-bs-toggle="dropdown">
                                BTC/USDT
                            </button>
                            <ul class="dropdown-menu bg-dark border-secondary">
                                <li><a class="dropdown-item text-white" href="#">BTC/USDT</a></li>
                                <li><a class="dropdown-item text-white" href="#">ETH/USDT</a></li>
                                <li><a class="dropdown-item text-white" href="#">BNB/USDT</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Market Trading Header -->
                <div class="px-3 mb-2">
                    <div class="btn-group w-100" role="group">
                        <button type="button" class="btn btn-sm text-warning fw-bold border-0" style="background: #2a2a2a;">Market Trading</button>
                    </div>
                </div>

                <div class="card-body p-0">
                    <!-- Order Book Header -->
                    <div class="px-3 py-2 border-bottom border-secondary">
                        <div class="row text-muted small">
                            <div class="col-4 text-start">Price (USDT)</div>
                            <div class="col-4 text-center">Quantity</div>
                            <div class="col-4 text-end">Total</div>
                        </div>
                    </div>

                    <!-- Sell Orders (Red) -->
                    <div class="order-book-sells px-3 py-1">
                        <div class="row py-1 small text-danger">
                            <div class="col-4 text-start fw-bold">76,249.95</div>
                            <div class="col-4 text-center">24.098</div>
                            <div class="col-4 text-end">---</div>
                        </div>
                        <div class="row py-1 small text-danger">
                            <div class="col-4 text-start fw-bold">76,249.95</div>
                            <div class="col-4 text-center">24.098</div>
                            <div class="col-4 text-end">---</div>
                        </div>
                        <div class="row py-1 small text-danger">
                            <div class="col-4 text-start fw-bold">76,249.95</div>
                            <div class="col-4 text-center">24.098</div>
                            <div class="col-4 text-end">---</div>
                        </div>
                        <div class="row py-1 small text-danger">
                            <div class="col-4 text-start fw-bold">76,249.95</div>
                            <div class="col-4 text-center">24.098</div>
                            <div class="col-4 text-end">---</div>
                        </div>
                        <div class="row py-1 small text-danger">
                            <div class="col-4 text-start fw-bold">76,249.95</div>
                            <div class="col-4 text-center">24.098</div>
                            <div class="col-4 text-end">---</div>
                        </div>
                        <div class="row py-1 small text-danger">
                            <div class="col-4 text-start fw-bold">76,249.95</div>
                            <div class="col-4 text-center">24.098</div>
                            <div class="col-4 text-end">---</div>
                        </div>
                        <div class="row py-1 small text-danger">
                            <div class="col-4 text-start fw-bold">76,249.95</div>
                            <div class="col-4 text-center">24.098</div>
                            <div class="col-4 text-end">---</div>
                        </div>
                        <div class="row py-1 small text-danger">
                            <div class="col-4 text-start fw-bold">76,249.95</div>
                            <div class="col-4 text-center">24.098</div>
                            <div class="col-4 text-end">---</div>
                        </div>
                        <div class="row py-1 small text-danger">
                            <div class="col-4 text-start fw-bold">76,249.95</div>
                            <div class="col-4 text-center">24.098</div>
                            <div class="col-4 text-end">---</div>
                        </div>
                    </div>

                    <!-- Current Price -->
                    <div class="current-price text-center py-2 border-top border-bottom border-secondary">
                        <div class="text-warning fw-bold h6 mb-0">76,249.95 ≈ $76,249.95</div>
                    </div>

                    <!-- Buy Orders (Green) - Only show first one highlighted -->
                    <div class="order-book-buys px-3 py-1">
                        <div class="row py-1 small text-success" style="background: rgba(0, 255, 0, 0.1);">
                            <div class="col-4 text-start fw-bold">76,249.95</div>
                            <div class="col-4 text-center">24.098</div>
                            <div class="col-4 text-end">---</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Center Panel - Chart Area -->
        <div class="col-lg-6 col-md-8">
            <div class="card border-0" style="background: #1a1a1a; border-radius: 12px;">
                <div class="card-header border-0 bg-transparent px-3 py-3">
                    <!-- Cryptocurrency Info -->
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center me-3">
                            <div class="crypto-icon me-2" style="width: 24px; height: 24px; background: #f7931a; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-bitcoin text-white" style="font-size: 14px;"></i>
                            </div>
                            <span class="text-white fw-bold me-2">Cardano / TetherUS</span>
                            <i class="fas fa-star text-muted"></i>
                        </div>
                    </div>

                    <!-- Price and Change Info -->
                    <div class="row mb-3">
                        <div class="col-auto">
                            <div class="text-white display-6 fw-bold mb-0">0.9088 <span class="small text-muted">USDT</span></div>
                            <div class="text-success small">+0.5647 +164.11% <span class="text-muted">Past year</span></div>
                        </div>
                    </div>

                    <!-- Timeframe Buttons -->
                    <div class="d-flex gap-2 mb-3">
                        <button class="btn btn-sm text-muted border-0 bg-transparent">1D</button>
                        <button class="btn btn-sm text-muted border-0 bg-transparent">1W</button>
                        <button class="btn btn-sm text-muted border-0 bg-transparent">3M</button>
                        <button class="btn btn-sm text-white fw-bold border-0" style="background: #2a2a2a;">1Y</button>
                        <button class="btn btn-sm text-muted border-0 bg-transparent">5Y</button>
                        <button class="btn btn-sm text-muted border-0 bg-transparent">All</button>
                    </div>
                </div>

                <!-- Chart Container -->
                <div class="card-body px-3 pb-3">
                    <div class="chart-area" style="height: 400px; background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%); border-radius: 8px; position: relative; overflow: hidden;">
                        <!-- Mock Chart -->
                        <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <div style="width: 100%; height: 300px; background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 400 200\"><path d=\"M 0 150 Q 50 120 100 130 T 200 110 T 300 90 L 400 80\" fill=\"none\" stroke=\"%23f7931a\" stroke-width=\"2\"/></svg>'); background-repeat: no-repeat; background-position: center; background-size: cover;"></div>
                            </div>
                        </div>
                        
                        <!-- Price Labels on Y-axis -->
                        <div class="position-absolute" style="left: 10px; top: 20px;">
                            <div class="text-muted small mb-4">1.1000</div>
                            <div class="text-muted small mb-4">1.0500</div>
                            <div class="text-muted small mb-4">1.0000</div>
                            <div class="text-muted small mb-4">0.9500</div>
                            <div class="text-muted small mb-4">0.9000</div>
                            <div class="text-muted small mb-4">0.8500</div>
                            <div class="text-muted small mb-4">0.8000</div>
                        </div>
                        
                        <!-- Time Labels on X-axis -->
                        <div class="position-absolute w-100 d-flex justify-content-between" style="bottom: 10px; left: 40px; right: 20px;">
                            <span class="text-muted small">Jan</span>
                            <span class="text-muted small">Feb</span>
                            <span class="text-muted small">Mar</span>
                            <span class="text-muted small">Apr</span>
                            <span class="text-muted small">May</span>
                            <span class="text-muted small">Jun</span>
                            <span class="text-muted small">Jul</span>
                            <span class="text-muted small">Aug</span>
                            <span class="text-muted small">Sep</span>
                            <span class="text-muted small">Oct</span>
                            <span class="text-muted small">Nov</span>
                            <span class="text-muted small">Dec</span>
                        </div>
                        
                        <!-- Volume Chart at bottom -->
                        <div class="position-absolute w-100" style="bottom: 40px; left: 40px; right: 20px; height: 50px;">
                            <div class="d-flex align-items-end h-100 gap-1">
                                <div style="background: #4a4a4a; width: 8px; height: 20%;"></div>
                                <div style="background: #4a4a4a; width: 8px; height: 40%;"></div>
                                <div style="background: #4a4a4a; width: 8px; height: 60%;"></div>
                                <div style="background: #4a4a4a; width: 8px; height: 30%;"></div>
                                <div style="background: #4a4a4a; width: 8px; height: 80%;"></div>
                                <div style="background: #4a4a4a; width: 8px; height: 50%;"></div>
                                <div style="background: #4a4a4a; width: 8px; height: 70%;"></div>
                                <div style="background: #4a4a4a; width: 8px; height: 45%;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Type Buttons -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="btn-group w-100" role="group">
                                <button type="button" class="btn btn-warning fw-bold py-2">Limit</button>
                                <button type="button" class="btn btn-outline-warning py-2">Market</button>
                                <button type="button" class="btn btn-outline-warning py-2">Stop Limit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel - Market Data -->
        <div class="col-lg-3 col-md-12">
            <div class="card border-0 h-100" style="background: #1a1a1a; border-radius: 12px;">
                <div class="card-header border-0 bg-transparent px-3 py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-white fw-bold">Assets</h6>
                        <div class="d-flex gap-2">
                            <span class="badge bg-warning text-dark">Orders</span>
                            <button class="btn btn-warning btn-sm fw-bold">Add Funds</button>
                        </div>
                    </div>
                </div>

                <!-- Crypto Tabs -->
                <div class="px-3 mb-2">
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-warning fw-bold">BTC</button>
                        <button class="btn btn-sm btn-outline-secondary text-muted">ETH</button>
                        <button class="btn btn-sm btn-outline-secondary text-muted">USDT</button>
                        <button class="btn btn-sm btn-outline-secondary text-muted">XRP</button>
                    </div>
                </div>

                <div class="card-body p-0">
                    <!-- Search -->
                    <div class="px-3 mb-3">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="Search coin" style="border-radius: 20px;">
                        </div>
                    </div>

                    <!-- Market Data Headers -->
                    <div class="px-3 py-2 border-bottom border-secondary">
                        <div class="row text-muted small">
                            <div class="col-4 text-start">Pair</div>
                            <div class="col-4 text-center">Price</div>
                            <div class="col-4 text-end">Change</div>
                        </div>
                    </div>

                    <!-- Market List -->
                    <div class="market-list">
                        <!-- USDT/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-bitcoin text-warning me-2"></i>
                                        <div>
                                            <div class="text-white fw-bold">USDT</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$30.03</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-success">62.8%</span>
                                </div>
                            </div>
                        </div>

                        <!-- TON/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #0088cc; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">TON</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$5.12</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-danger">-19.4%</span>
                                </div>
                            </div>
                        </div>

                        <!-- LSK/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #1a6896; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">LSK</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$3.55</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-success">19.2%</span>
                                </div>
                            </div>
                        </div>

                        <!-- POL/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #8247e5; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">POL</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$0.49</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-success">10.4%</span>
                                </div>
                            </div>
                        </div>

                        <!-- XLM/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #14b6e7; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">XLM</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$0.656</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-success">12.9%</span>
                                </div>
                            </div>
                        </div>

                        <!-- LINK/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #375bd2; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">LINK</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$40.50</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-danger">-25.8%</span>
                                </div>
                            </div>
                        </div>

                        <!-- ROSE/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #ff5599; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">ROSE</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$68.55</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-success">12.9%</span>
                                </div>
                            </div>
                        </div>

                        <!-- XMR/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #ff6600; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">XMR</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$30.03</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-danger">-26.8%</span>
                                </div>
                            </div>
                        </div>

                        <!-- DOGE/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #c2a633; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">DOGE</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$30.03</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-success">68.7%</span>
                                </div>
                            </div>
                        </div>

                        <!-- XRP/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #23292f; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">XRP</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$30.03</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-danger">-72.8%</span>
                                </div>
                            </div>
                        </div>

                        <!-- EOS/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #000000; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">EOS</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$30.03</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-success">52.5%</span>
                                </div>
                            </div>
                        </div>

                        <!-- TRX/BTC -->
                        <div class="px-3 py-2 border-bottom border-dark">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #ff060a; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">TRX</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$30.03</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-success">12.2%</span>
                                </div>
                            </div>
                        </div>

                        <!-- DOT/BTC -->
                        <div class="px-3 py-2">
                            <div class="row align-items-center small">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 16px; height: 16px; background: #e6007a; border-radius: 50%;" class="me-2"></div>
                                        <div>
                                            <div class="text-white fw-bold">DOT</div>
                                            <div class="text-muted">BTC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-white fw-bold">$30.03</div>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-danger">-0.6%</span>
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
body.crypt-dark {
    background-color: #000000 !important;
}

body.crypt-light {
    background-color: #ffffff !important;
}

.card {
    box-shadow: 0 2px 10px rgba(0,0,0,0.3) !important;
}

.text-success {
    color: #00d4aa !important;
}

.text-danger {
    color: #ff6b6b !important;
}

.text-warning {
    color: #ffd700 !important;
}

.btn-warning {
    background-color: #ffd700;
    border-color: #ffd700;
    color: #000000;
    font-weight: bold;
}

.btn-warning:hover {
    background-color: #ffed4a;
    border-color: #ffed4a;
    color: #000000;
}

.btn-outline-warning {
    color: #ffd700;
    border-color: #ffd700;
    background-color: transparent;
}

.btn-outline-warning:hover {
    background-color: #ffd700;
    border-color: #ffd700;
    color: #000000;
}

.border-secondary {
    border-color: #333333 !important;
}

.border-dark {
    border-color: #2a2a2a !important;
}

.bg-dark {
    background-color: #1a1a1a !important;
}

.form-control {
    background-color: #2a2a2a !important;
    border-color: #444444 !important;
    color: #ffffff !important;
}

.form-control:focus {
    background-color: #2a2a2a !important;
    border-color: #ffd700 !important;
    color: #ffffff !important;
    box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25) !important;
}

.dropdown-menu {
    background-color: #1a1a1a !important;
    border-color: #333333 !important;
}

.dropdown-item {
    color: #ffffff !important;
}

.dropdown-item:hover {
    background-color: #2a2a2a !important;
    color: #ffd700 !important;
}

.market-list {
    max-height: 400px;
    overflow-y: auto;
}

.market-list::-webkit-scrollbar {
    width: 4px;
}

.market-list::-webkit-scrollbar-track {
    background: #1a1a1a;
}

.market-list::-webkit-scrollbar-thumb {
    background: #444444;
    border-radius: 2px;
}

.market-list::-webkit-scrollbar-thumb:hover {
    background: #666666;
}

/* Order book styling */
.order-book-sells .row:hover,
.order-book-buys .row:hover {
    background-color: rgba(255, 255, 255, 0.05) !important;
}

/* Current price highlight */
.current-price {
    background: linear-gradient(90deg, rgba(255, 215, 0, 0.1) 0%, rgba(255, 215, 0, 0.05) 100%) !important;
}

/* Chart area styling */
.chart-area {
    border: 1px solid #333333;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .col-lg-3 {
        order: 3;
    }
    
    .col-lg-6 {
        order: 1;
    }
    
    .market-list {
        max-height: 200px;
    }
}
</style>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Simulate real-time price updates
    function updatePrices() {
        const priceElements = document.querySelectorAll('.market-list .text-white.fw-bold');
        priceElements.forEach(element => {
            if (element.textContent.includes('$')) {
                const currentPrice = parseFloat(element.textContent.replace('$', ''));
                const change = (Math.random() - 0.5) * 0.1; // Random change between -0.05 and +0.05
                const newPrice = Math.max(0.01, currentPrice + change);
                element.textContent = '$' + newPrice.toFixed(2);
            }
        });
    }

    // Update prices every 3 seconds
    setInterval(updatePrices, 3000);

    // Handle order book interactions
    document.querySelectorAll('.order-book-sells .row, .order-book-buys .row').forEach(row => {
        row.addEventListener('click', function() {
            const price = this.querySelector('.col-4').textContent.trim();
            // Here you could populate trading forms with the clicked price
            console.log('Selected price:', price);
        });
    });

    // Handle timeframe button clicks
    document.querySelectorAll('.card-header .btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active state from all buttons
            this.parentElement.querySelectorAll('.btn').forEach(b => {
                b.classList.remove('btn-white', 'fw-bold');
                b.classList.add('text-muted', 'bg-transparent');
            });
            
            // Add active state to clicked button
            this.classList.remove('text-muted', 'bg-transparent');
            this.classList.add('btn-white', 'fw-bold');
            this.style.background = '#2a2a2a';
        });
    });

    // Handle order type button clicks
    document.querySelectorAll('.btn-group .btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active state from siblings
            this.parentElement.querySelectorAll('.btn').forEach(b => {
                b.classList.remove('btn-warning');
                b.classList.add('btn-outline-warning');
            });
            
            // Add active state to clicked button
            this.classList.remove('btn-outline-warning');
            this.classList.add('btn-warning');
        });
    });

    // Auto-refresh current price
    setInterval(function() {
        const currentPriceElement = document.querySelector('.current-price .text-warning');
        if (currentPriceElement) {
            const price = parseFloat(currentPriceElement.textContent.split(' ')[0]);
            const change = (Math.random() - 0.5) * 10; // Random change
            const newPrice = Math.max(10000, price + change);
            currentPriceElement.innerHTML = newPrice.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + ' ≈ $' + newPrice.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }
    }, 2000);

    console.log('Exchange interface initialized');
});
</script>
@endsection