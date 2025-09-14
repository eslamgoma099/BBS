@extends('admin.layouts.admin-app')

@section('style')
    <link href="{{ asset('lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --card-bg: rgba(255, 255, 255, 0.05);
            --card-border: rgba(255, 255, 255, 0.1);
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.7);
            --text-muted: rgba(255, 255, 255, 0.5);
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #3b82f6;
        }

        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: var(--text-primary);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
        }

        .br-mainpanel {
            background: transparent;
            margin-left: 20px;
            margin-right: 20px;
        }

        .br-pageheader {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item {
            color: var(--text-secondary);
        }

        .breadcrumb-item.active {
            color: var(--text-primary);
        }

        .card-bs {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 24px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary-gradient);
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-modern {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .table-modern {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            overflow: hidden;
        }

        .table-modern table {
            margin-bottom: 0;
        }

        .table-modern thead {
            background: rgba(255, 255, 255, 0.05);
        }

        .table-modern th {
            border-color: var(--card-border);
            color: var(--text-primary);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding: 16px;
        }

        .table-modern td {
            border-color: var(--card-border);
            color: var(--text-secondary);
            padding: 16px;
        }

        .table-modern tbody tr:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .coin-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .coin-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
        }

        .coin-name {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 2px;
        }

        .coin-symbol {
            font-size: 12px;
            color: var(--text-muted);
        }

        .text-up {
            color: var(--success-color);
        }

        .text-down {
            color: var(--danger-color);
        }

        .badge-modern {
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.2);
            color: var(--success-color);
        }

        .badge-danger {
            background: rgba(239, 68, 68, 0.2);
            color: var(--danger-color);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-action {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.2s ease;
            text-decoration: none;
            border: 1px solid var(--card-border);
            background: transparent;
            color: var(--text-secondary);
        }

        .btn-action:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-primary);
            transform: translateY(-1px);
        }

        .btn-action.btn-trade {
            border-color: var(--info-color);
            color: var(--info-color);
        }

        .btn-action.btn-edit {
            border-color: var(--warning-color);
            color: var(--warning-color);
        }

        .btn-action.btn-delete {
            border-color: var(--danger-color);
            color: var(--danger-color);
        }

        .modal-content {
            background: #1a1a2e;
            border: 1px solid var(--card-border);
            border-radius: 16px;
        }

        .modal-header {
            border-bottom: 1px solid var(--card-border);
        }

        .modal-footer {
            border-top: 1px solid var(--card-border);
        }

        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--card-border);
            color: var(--text-primary);
            border-radius: 8px;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            color: var(--text-primary);
        }

        .form-label {
            color: var(--text-secondary);
            font-weight: 500;
            margin-bottom: 8px;
        }

        .collapse-section {
            margin-bottom: 24px;
        }

        .total-assets-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .total-assets-value {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .total-assets-value h2 {
            font-size: 36px;
            font-weight: 700;
            margin: 0;
        }

        .currency-selector {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--card-border);
            border-radius: 8px;
            padding: 4px 12px;
            color: var(--text-primary);
        }
    </style>
@endsection

@section('content')
@include('sweetalert::alert')

<div class="br-mainpanel">
    <div class="br-pageheader">
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="breadcrumb-item active">Currency Pairs Management</span>
        </nav>
    </div>

    <!-- Total Assets Section -->
    <div class="card-bs">
        <div class="total-assets-header">
            <div>
                <h5 style="color: var(--text-secondary); margin-bottom: 8px;">Total Assets</h5>
                <div class="total-assets-value">
                    <h2>{{ number_format($currency_pairs->count()) }}</h2>
                    <span style="color: var(--text-muted);">Currency Pairs</span>
                </div>
            </div>
            <div class="action-buttons">
                @if(check_permission('create-currency-pair'))
                <button class="btn-modern btn-primary-modern" type="button" data-toggle="collapse" data-target="#collapseExample">
                    <i class="fa fa-plus"></i> Add Currency Pair
                </button>
                @endif
                @if(check_permission('update-leverage'))
                <button class="btn-modern btn-primary-modern" type="button" data-toggle="collapse" data-target="#update_leverage">
                    <i class="fa fa-chart-line"></i> Update Leverage
                </button>
                @endif
                @if(check_permission('update-buy'))
                <button class="btn-modern btn-primary-modern" type="button" data-toggle="collapse" data-target="#buy_update">
                    <i class="fa fa-arrow-up"></i> Update Buy
                </button>
                @endif
                @if(check_permission('update-sell'))
                <button class="btn-modern btn-primary-modern" type="button" data-toggle="collapse" data-target="#sell_update">
                    <i class="fa fa-arrow-down"></i> Update Sell
                </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Statistics Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Crypto Pairs</div>
            <div class="stat-value">{{ $currency_pairs->where('type', 'crypto')->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Forex Pairs</div>
            <div class="stat-value">{{ $currency_pairs->where('type', 'forex')->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Active Pairs</div>
            <div class="stat-value">{{ $currency_pairs->where('disabled', 0)->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Disabled Pairs</div>
            <div class="stat-value">{{ $currency_pairs->where('disabled', 1)->count() }}</div>
        </div>
    </div>

    @include('notification')

    <!-- Add Currency Pair Form -->
    @if(check_permission('create-currency-pair'))
    <div class="collapse collapse-section" id="collapseExample">
        <div class="card-bs">
            <h6 style="color: var(--text-primary); margin-bottom: 24px;">Add Currency Pair</h6>

            <form action="{{ route('admin.currencies.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Title / Name <span class="text-danger">*</span></label>
                        <input class="form-control" required type="text" name="name" placeholder="Enter Name">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Exchange & Symbol <span class="text-danger">*</span></label>
                        <input class="form-control" required type="text" name="ex_sym" placeholder="COINBASE:BTCUSD">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Symbol <span class="text-danger">*</span></label>
                        <input class="form-control" required type="text" name="sym" placeholder="BTC">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Base Currency</label>
                        <input value="{{ old('base','USD') }}" class="form-control" type="text" name="base" placeholder="USD">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Type <span class="text-danger">*</span></label>
                        <select class="form-select" name="type">
                            @foreach($types as $item)
                            <option value="{{ $item }}">{{ ucfirst($item) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Image <span class="text-danger">*</span></label>
                        @include('admin.partials.image-upload',['field' => 'image','id' => 'image'])
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Leverage <span class="text-danger">*</span></label>
                        <input class="form-control" value="{{ old('leverage',400)}}" required type="number" step="any" name="leverage">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Commission (%) <span class="text-danger">*</span></label>
                        <input class="form-control" value="{{ old('com',4)}}" required type="number" step="any" name="com">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Buy Spread (%) <span class="text-danger">*</span></label>
                        <input class="form-control" value="{{ old('buy_spread',0)}}" min="0" required type="number" step="any" name="buy_spread">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Sell Spread (%) <span class="text-danger">*</span></label>
                        <input class="form-control" value="{{ old('sell_spread',0)}}" min="0" required type="number" step="any" name="sell_spread">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Can be traded <span class="text-danger">*</span></label>
                        <select name="disabled" class="form-select">
                            <option selected value="0">Yes</option>
                            <option value="1">No</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <button class="btn-modern btn-primary-modern" type="submit">
                            <i class="fa fa-check"></i> Submit Form
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif

    <!-- Currency Pairs Table -->
    <div class="table-modern">
        <div style="padding: 24px;">
            <h6 style="color: var(--text-primary); margin-bottom: 24px;">Currency Pairs List</h6>

            <div class="table-responsive">
                <table id="datatable1" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Currency</th>
                            <th>Type</th>
                            <th>Leverage</th>
                            <th>Commission</th>
                            <th>Spreads</th>
                            <th>Rate</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($currency_pairs as $currency_pair)
                        <tr>
                            <td>{{ $currency_pair->id }}</td>
                            <td>
                                <div class="coin-info">
                                    <div class="coin-icon">
                                        <img src="{{ $currency_pair->image }}" height="24" alt="{{ $currency_pair->name }}">
                                    </div>
                                    <div>
                                        <div class="coin-name">{{ $currency_pair->name }}</div>
                                        <div class="coin-symbol">{{ $currency_pair->sym }} / {{ $currency_pair->ex_sym }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge-modern badge-{{ $currency_pair->type == 'crypto' ? 'success' : 'info' }}">
                                    {{ ucfirst($currency_pair->type) }}
                                </span>
                            </td>
                            <td style="color: var(--text-primary); font-weight: 600;">{{ $currency_pair->leverage }}x</td>
                            <td>{{ $currency_pair->com }}%</td>
                            <td>
                                <div style="font-size: 12px;">
                                    <span class="text-up">Buy: {{ $currency_pair->buy_spread }}%</span><br>
                                    <span class="text-down">Sell: {{ $currency_pair->sell_spread }}%</span>
                                </div>
                            </td>
                            <td style="color: var(--text-primary); font-weight: 600;">{{ $currency_pair->rate }}</td>
                            <td>
                                @if($currency_pair->disabled)
                                    <span class="badge-modern badge-danger">Disabled</span>
                                @else
                                    <span class="badge-modern badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="btn-action btn-trade">Trade</a>

                                    @if(check_permission('update-currency-pair'))
                                    <a href="{{ route('admin.currencies.edit', $currency_pair->id) }}" class="btn-action btn-edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(check_permission('delete-currency-pair'))
                                    <form method="POST" action="{{ route('admin.currencies.destroy', $currency_pair->id) }}" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this currency pair?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
@if(check_permission('update-leverage'))
<div class="modal fade" id="update_leverage" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update All Leverage</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Leverage</label>
                    <input class="form-control" type="number" step=".01" id="leverage_update">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="save_form('#leverage_update','{{route('admin.leverage_update')}}')" class="btn-modern btn-primary-modern">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

@if(check_permission('update-buy'))
<div class="modal fade" id="buy_update" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update All Buy Spread</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Buy Spread</label>
                    <input class="form-control" type="number" step=".01" id="update_bue">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="save_form('#update_bue','{{route('admin.buy_update')}}')" class="btn-modern btn-primary-modern">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

@if(check_permission('update-sell'))
<div class="modal fade" id="sell_update" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update All Sell Spread</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Sell Spread</label>
                    <input class="form-control" type="number" step=".01" id="update_sell">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="save_form('#update_sell','{{route('admin.sell_update')}}')" class="btn-modern btn-primary-modern">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('js')
<script src="{{ asset('lib/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lib/datatables-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>

<script>
    function save_form(element, url) {
        var value = $(element).val();

        if (value >= 0 && value.length > 0) {
            $.ajax({
                type: "get",
                url: url,
                data: {id: value},
                success: function(data) {
                    $('.modal').modal('hide');
                    location.reload();
                }
            });
        }
    }

    $(function() {
        'use strict';

        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            },
            "ordering": true,
            "pageLength": 10
        });

        // Animate numbers on load
        $('.stat-value').each(function() {
            var $this = $(this);
            var countTo = parseInt($this.text());

            $({countNum: 0}).animate({countNum: countTo}, {
                duration: 1000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    });
</script>
@endsection
