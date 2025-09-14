@extends('admin.layouts.admin-app')

@section('style')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @include('admin.partials.dt-css')

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --danger-gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            --info-gradient: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            --card-bg: rgba(255, 255, 255, 0.05);
            --card-border: rgba(255, 255, 255, 0.1);
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.7);
            --text-muted: rgba(255, 255, 255, 0.5);
        }

        .modern-container {
            margin-left: 280px;
            padding: 20px;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            color: var(--text-primary);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        @media (max-width: 768px) {
            .modern-container {
                margin-left: 0;
            }
        }

        .page-header {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            color: var(--text-secondary);
            font-size: 16px;
            margin-bottom: 20px;
        }

        .quick-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .btn-modern {
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary-modern {
            background: var(--primary-gradient);
            color: white;
        }

        .btn-success-modern {
            background: var(--success-gradient);
            color: white;
        }

        .btn-danger-modern {
            background: var(--danger-gradient);
            color: white;
        }

        .btn-warning-modern {
            background: var(--warning-gradient);
            color: white;
        }

        .btn-info-modern {
            background: var(--info-gradient);
            color: white;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            color: white;
            text-decoration: none;
        }

        .filters-section {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .form-control-modern {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--card-border);
            border-radius: 8px;
            color: var(--text-primary);
            padding: 10px 16px;
            transition: all 0.3s ease;
        }

        .form-control-modern:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #667eea;
            color: var(--text-primary);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .form-control-modern::placeholder {
            color: var(--text-muted);
        }

        .table-container {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 20px;
            overflow: hidden;
        }

        .table-modern {
            background: transparent;
            color: var(--text-primary);
            border: none;
        }

        .table-modern th {
            border: none;
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-secondary);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding: 16px 12px;
        }

        .table-modern td {
            border: none;
            border-bottom: 1px solid var(--card-border);
            padding: 16px 12px;
            vertical-align: middle;
        }

        .table-modern tbody tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .badge-modern {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.2);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .badge-danger {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .badge-warning {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .btn-group-modern {
            display: flex;
            gap: 4px;
        }

        .btn-sm-modern {
            padding: 6px 10px;
            font-size: 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-sm-modern:hover {
            transform: scale(1.05);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--card-border);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-name {
            font-weight: 600;
            color: var(--text-primary);
            text-decoration: none;
        }

        .user-name:hover {
            color: #667eea;
            text-decoration: none;
        }

        .status-indicators {
            display: flex;
            gap: 6px;
            margin-top: 4px;
        }

        .modal-content-modern {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            color: var(--text-primary);
        }

        .modal-header-modern {
            border-bottom: 1px solid var(--card-border);
            padding: 20px 24px;
        }

        .modal-title-modern {
            font-weight: 700;
            color: var(--text-primary);
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background: var(--primary-gradient);
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .dataTables_paginate {
            display: none;
        }
        .dataTables_info {
            display: none;
        }

        .pagination-modern {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 16px;
            margin-top: 20px;
        }

        .search-highlight {
            background: rgba(102, 126, 234, 0.2);
            padding: 2px 4px;
            border-radius: 4px;
        }

        .loading-spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
@endsection

@section('content')
    <div class="modern-container" id="vue-content">

        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">{{ ucfirst($title) }} Management</h1>
            <p class="page-subtitle">Manage and monitor your {{ $title }} accounts</p>

            <!-- Quick Action Buttons -->
            <div class="quick-actions">
                <a class="btn-modern btn-primary-modern" href="{{ route('admin.users.ids') }}">
                    <i class="fas fa-id-card"></i>
                    KYC Verifications
                </a>
                <a class="btn-modern btn-info-modern" href="{{ route('admin.plans.index') }}">
                    <i class="fas fa-layer-group"></i>
                    Plans
                </a>
                <a class="btn-modern btn-success-modern" href="{{ route('admin.deposits.index') }}">
                    <i class="fas fa-arrow-down"></i>
                    Deposits
                </a>
                <a class="btn-modern btn-warning-modern" href="{{ route('admin.withdrawals.index') }}">
                    <i class="fas fa-arrow-up"></i>
                    Withdrawals
                </a>
                <a class="btn-modern btn-primary-modern" href="{{ route('admin.transactions') }}">
                    <i class="fas fa-exchange-alt"></i>
                    Transactions
                </a>
            </div>

            <!-- Management Actions -->
            <div class="quick-actions">
                @if(check_permission('update-customers'))
                <button class="btn-modern btn-success-modern" data-toggle="modal" data-target="#bulkAction">
                    <i class="fas fa-tasks"></i>
                    Bulk Action
                </button>
                @endif

                @if(check_permission('verify-all-emails'))
                <a href="{{ route('admin.verify.accounts') }}" class="btn-modern btn-success-modern">
                    <i class="fas fa-check-circle"></i>
                    Verify All Emails
                </a>
                @endif

                @if(check_permission('create-admin') && $title == 'admin')
                <a href="{{ route('admin.users.create') }}?r=admin" class="btn-modern btn-danger-modern">
                    <i class="fas fa-user-shield"></i>
                    Add Admin
                </a>
                @endif

                @if(check_permission('create-manager') && $title == 'manager')
                <a href="{{ route('admin.users.create') }}?r=manager" class="btn-modern btn-warning-modern">
                    <i class="fas fa-user-tie"></i>
                    Add Manager
                </a>
                @endif

                @if(check_permission('create-retention') && $title == 'retention')
                <a href="{{ route('admin.users.create') }}?r=retention" class="btn-modern btn-warning-modern">
                    <i class="fas fa-user-friends"></i>
                    Add Retention
                </a>
                @endif

                @if (setting('autotrader'))
                <a href="{{ route('admin.users.create') }}?r=autotrader" class="btn-modern btn-primary-modern">
                    <i class="fas fa-robot"></i>
                    Add Autotrader
                </a>
                @endif
            </div>
        </div>

        @include('notification')

        <!-- Filters Section -->
        <div class="filters-section">
            <form action="{{ route('admin.users.index') }}" method="get">
                <div class="row">
                    @if(is_active('admin.users.index'))
                    <div class="col-md-3">
                        <select class="form-control form-control-modern" name="manager">
                            <option value="" class="text-muted">Filter by Manager</option>
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}" @if (Request::get('manager') == $manager->id ) selected @endif>{{ $manager->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-modern" name="q" value="{{ Request::get('q') }}" placeholder="Search by name, email, phone...">
                    </div>
                    <div class="col-md-3">
                        <div class="btn-group-modern">
                            <button class="btn-modern btn-primary-modern" type="submit">
                                <i class="fas fa-search"></i>
                                Search
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="btn-modern btn-danger-modern">
                                <i class="fas fa-times"></i>
                                Clear
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Users Table -->
        <div class="table-container">
            <div class="table-responsive">
                <table id="datatable" class="table table-modern">
                    <thead>
                        <tr>
                            @if (check_permission('update-'.$title))
                            <th width="50">
                                <input type="checkbox" v-model="selectAllUsers"/>
                            </th>
                            @endif
                            <th>ID</th>
                            <th>User Info</th>
                            <th>Contact</th>
                            <th>Fund Privilege</th>
                            @if (setting('invest'))
                            <th>Invested</th>
                            @endif
                            <th>Trades</th>
                            <th>Finance</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            @if (check_permission('update-'.$title))
                            <td>
                                <input type="checkbox" value="{{ $user->id }}" v-model="selected_users"/>
                            </td>
                            @endif

                            <td>
                                <span class="badge badge-modern badge-primary">#{{ $user->id }}</span>
                            </td>

                            <td>
                                <div class="user-info">
                                    <div>
                                        <a class="user-name" href="{{ route('admin.users.show', $user->id) }}">
                                            {{ $user->name }}
                                        </a>
                                        <div class="status-indicators">
                                            @if ($user->email_verified_at)
                                                <span class="badge-modern badge-success">Verified</span>
                                            @else
                                                <span class="badge-modern badge-danger">Unverified</span>
                                            @endif

                                            @if ($user['last_seen'] >= \Carbon\Carbon::now('Europe/London'))
                                                <span class="badge-modern badge-success">Online</span>
                                            @else
                                                <span class="badge-modern badge-danger">Offline</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div>
                                    <strong>{{ $user->email }}</strong><br>
                                    <a href="tel:{{ $user->phone }}">@{{showPhone({!! $user->id !!})}}</a>
                                    <a href="#" data-toggle="modal" data-target="#changePhone" v-on:click="setPhoneUpdateData({{ $user }})">
                                        <i class="fas fa-edit text-info"></i>
                                    </a>
                                    @if ($user->country)
                                    <br><small class="text-muted">{{ $user->country }} {{ $user->phone_code }}</small>
                                    @endif
                                </div>
                                <div class="btn-group-modern mt-2">
                                    <a href="#" data-toggle="modal" data-target="#notes" v-on:click="createNote({{ $user }})" class="btn-sm-modern btn-info-modern">
                                        <i class="fas fa-sticky-note"></i>
                                        Notes (@{{ noteCount({!! $user->id !!}) }})
                                    </a>

                                    @if(check_permission('delete-'.$title))
                                    <a href="{{ route('admin.user.toggle', $user->id) }}" class="btn-sm-modern {{ $user->is_active ? 'btn-danger-modern' : 'btn-success-modern' }}">
                                        <i class="fas {{ $user->is_active ? 'fa-times' : 'fa-check' }}"></i>
                                    </a>
                                    @endif

                                    @if(check_permission('update-'.$title))
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-sm-modern btn-warning-modern">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                    @if (check_permission('assign-user-to-manager'))
                                    <a href="{{ route('admin.assignUsers', $user->id) }}" class="btn-sm-modern btn-primary-modern">
                                        <i class="fas fa-user-plus"></i>
                                    </a>
                                    @endif

                                    @if (check_permission('login-as-'.$title) && $user->id != 1)
                                    <a href="{{ route('admin.user.gainaccess', $user->id) }}"
                                       onclick="alert('You are about to login as a Normal User that means you will be logged out as an admin on this browser')"
                                       target="_blank"
                                       class="btn-sm-modern btn-success-modern">
                                        <i class="fas fa-sign-in-alt"></i>
                                        Login as {{ $user->first_name }}
                                    </a>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <label class="switch">
                                    <input {{ $user->can_add_fund ? 'checked' : '' }} @change="updateFund({{$user->id}})" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </td>

                            @if (setting('invest'))
                            <td>
                                <span class="badge-modern badge-success">${{ $user->invested() }}</span>
                            </td>
                            @endif

                            <td>
                                <div>
                                    <div class="mb-1">
                                        <span class="badge-modern badge-warning">Open:</span>
                                        <a href="{{ route('admin.trades.index') }}?user={{$user->id}}">
                                            {{ \App\Models\Trade::whereUserId($user->id)->whereStatus(0)->count() }}
                                        </a>
                                    </div>
                                    <div>
                                        <span class="badge-modern badge-success">Closed:</span>
                                        <a href="{{ route('admin.trades.index') }}?user={{$user->id}}">
                                            {{ \App\Models\Trade::whereUserId($user->id)->whereStatus(1)->count() }}
                                        </a>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div>
                                    <div class="mb-1">
                                        <strong>Balance:</strong> {{ amt($user->balance) }}
                                    </div>
                                    <div>
                                        <strong>Bonus:</strong> {{ amt($user->bonus) }}
                                    </div>
                                </div>
                            </td>

                            <td>
                                <small class="text-muted">{{ $user->created_at->format('M d, Y') }}</small>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-users fa-3x mb-3"></i>
                                    <h5>No Records Found</h5>
                                    <p>Try adjusting your search criteria</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-modern">
            {{ $users->links() }}
        </div>

        <!-- Bulk Action Modal -->
        <div class="modal fade" id="bulkAction">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal-content-modern">
                    <div class="modal-header modal-header-modern">
                        <h4 class="modal-title modal-title-modern">Bulk Action</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form @submit.prevent="submitBulkAction">
                        <div class="modal-body">
                            <ul class="alert alert-danger" v-if="errors">
                                <li v-for="(value, key, index) in validationErrors">@{{ value }}</li>
                            </ul>
                            <div class="row">
                                <div class="form-group form-check col-12">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" v-model="bulkAction.delete"> Mass Delete
                                    </label>
                                </div>
                            </div>
                            <div class="row" v-show="bulkAction.delete">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="password" class="form-control form-control-modern" type="password" placeholder="Enter Admin Password" v-model="bulkAction.admin_password" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" v-model="bulkAction.convertTo"> Revert to lead
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Change Password</label>
                                <input class="form-control form-control-modern mb-2" type="password" v-model="bulkAction.password" placeholder="Enter new password">
                                <input class="form-control form-control-modern" type="password" v-model="bulkAction.confirm_password" placeholder="Repeat password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-modern btn-danger-modern" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn-modern btn-success-modern" :disabled="isLoading">
                                Confirm
                                <span v-if="isLoading" class="loading-spinner"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Change Phone Modal -->
        <div class="modal fade" id="changePhone" tabindex="0" aria-labelledby="changePhone" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md">
                <div class="modal-content modal-content-modern">
                    <div class="modal-header modal-header-modern">
                        <h5 class="modal-title modal-title-modern">Update @{{ updatePhoneData.name }} Phone</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" @submit.prevent="updatePhone">
                        <div class="modal-body">
                            <div class="row">
                                <div v-if="errors" class="col-12">
                                    <ul class="alert alert-danger">
                                        <li class="alert alert-danger" v-for="(value, key, index) in validationErrors">@{{ value }}</li>
                                    </ul>
                                </div>
                                <div v-if="phoneUpdateSuccess" class="col-12 alert alert-success">
                                    Phone Updated successfully!
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Phone Number: <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Phone" class="form-control form-control-modern" v-model="updatePhoneData.phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-modern btn-danger-modern" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn-modern btn-success-modern" :disabled="isLoading">
                                Update
                                <span v-if="isLoading" class="loading-spinner"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Notes Modal -->
        <div class="modal fade" id="notes" tabindex="0" aria-labelledby="Notes" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal-content-modern">
                    <div class="modal-header modal-header-modern">
                        <h5 class="modal-title modal-title-modern">Notes - @{{newNote.user}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" @submit.prevent="addNote">
                        <div class="modal-body">
                            <div class="row">
                                <div v-if="errors" class="col-12">
                                    <ul class="alert alert-danger">
                                        <li class="alert alert-danger" v-for="(value, key, index) in validationErrors">@{{ value }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Note:</label>
                                    <textarea class="form-control form-control-modern" placeholder="Add your note here..." v-model="newNote.content" required rows="4"></textarea>
                                </div>
                                <div class="col-12 mb-3" v-if="newNote.contacted">
                                    <label class="form-label">Date Contacted:</label>
                                    <input type="datetime-local" class="form-control form-control-modern" v-model="newNote.contacted_at" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" v-bind:value="true" v-model="newNote.contacted" id="contacted1">
                                        <label class="form-check-label" for="contacted1">I have contacted this user</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" v-bind:value="false" v-model="newNote.contacted" id="contacted2">
                                        <label class="form-check-label" for="contacted2">I have NOT contacted this user</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-modern btn-danger-modern" data-dismiss="modal">Close</button>
                            <button type="submit" :disabled="addingNote" class="btn-modern btn-success-modern">
                                Add Note
                                <span v-if="addingNote" class="loading-spinner"></span>
                            </button>
                        </div>
                        <div class="px-4 mb-3" v-for="(note, index) in userNotes" :key="index">
                            <div class="card bg-dark border-secondary mb-2">
                                <div class="card-body">
                                    <h6 class="card-title text-info">@{{ note.writer_name || 'Unknown' }}</h6>
                                    <p class="card-text">@{{ note.content }}</p>
                                    <small class="text-muted" v-if="note.contacted_at">Contacted @ @{{ note.contacted_at }}</small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    @include('admin.partials.dt-js')

    <script>
        $(function(){ $('#toggle').bootstrapToggle() });

        let generateAccessTokenUrl = "{{ route('backend.user.token.generate') }}";
        let bulkActionUrl = "{{ route('admin.users.bulkaction') }}";
        let updateCanFundUrl = "{{ route('admin.users.can_fund') }}";
        let saveUserUrl = "{{ route('admin.lead.store') }}";
        let deleteCustomersUrl = "{{ route('admin.user.deleteMultiple') }}";
        let addNoteUrl = "{{ route('admin.lead.addNote') }}";
        let updatePhoneUrl = "{{ route('admin.lead.updatePhone') }}";

        document.addEventListener('DOMContentLoaded', function () {
            new Vue({
                el: '#vue-content',
                data() {
                    return {
                        fetchingAccessToken: false,
                        generatedAccessToken: '',
                        copied: false,
                        bulkAction: {
                            delete: false,
                            convertTo: null,
                            password: '',
                            confirm_password: '',
                            admin_password: '',
                        },
                        selectAllUsers: false,
                        asset: '',
                        isLoading: false,
                        errors: null,
                        error: null,
                        form: {
                            password: '',
                            confirm: '',
                            user_id: '',
                        },
                        data: {
                            first_name: '',
                            source: '',
                            last_name: '',
                            email: '',
                            username: '',
                            manager_id: '',
                            country: ''
                        },
                        selected_users: [],
                        newNote: {
                            user: '',
                            user_id: '',
                            content: '',
                            contacted_at: null,
                            contacted: true
                        },
                        addingNote: false,
                        userNotes: [],
                        customers: {!! json_encode($users) !!},
                        updatePhoneData: {
                            phone: '',
                        },
                        phoneUpdateSuccess: false
                    }
                },
                mounted() {
                    $('#datatable').DataTable({
                        iDisplayLength: 100,
                        language: {
                            searchPlaceholder: 'Search...',
                            sSearch: '',
                            lengthMenu: '_MENU_ items/page',
                        }
                    });
                },
                methods: {
                    updateStatus(userId, statusId, newStatus) {
                        this.$refs[`changingStatus${userId}`].innerHTML = `<i class="fa fa-spinner fa-spin"></i>`;

                        axios.post(bulkActionUrl, {selected_users: [userId], status: statusId, direct: 'yes'}).then((res)=>{
                            this.customers.data.find((u) => u.id == userId).statusrecord = res.data[0].statusrecord;
                            this.$refs[`changingStatus${userId}`].innerHTML = '';
                            toastr.success('Status Updated!', 'Success', {
                                "positionClass": "toast-top-right"
                            })
                        }).catch((error)=>{
                            this.$refs[`changingStatus${userId}`].innerHTML = '';
                            if(error.response) {
                                if (error.response.status === 422){
                                    this.errors = error.response.data.errors;
                                    console.log(this.errors);
                                } else if (error.response.status === 500){
                                    toastr.error(error.response.data.message, 'Error',{
                                        "positionClass": "toast-top-right"
                                    })
                                }
                            }
                        })
                    },
                    updateSource(userId, sourceId) {
                        this.$refs[`changingSource${userId}`].innerHTML = `<i class="fa fa-spinner fa-spin"></i>`;

                        axios.post(bulkActionUrl, {
                            selected_users: [userId],
                            source: sourceId,
                            direct: 'yes'
                        }).then((res) => {
                            this.customers.data.find((u) => u.id == userId).sourcerecord = res.data[0].sourcerecord;
                            this.$refs[`changingSource${userId}`].innerHTML = '';
                            toastr.success('Source Updated!', 'Success', {
                                "positionClass": "toast-top-right"
                            })
                        }).catch((error) => {
                            this.$refs[`changingSource${userId}`].innerHTML = '';
                            if (error.response) {
                                if (error.response.status === 422) {
                                    this.errors = error.response.data.errors;
                                    console.log(this.errors);
                                } else if (error.response.status === 500) {
                                    toastr.error(error.response.data.message, 'Error', {
                                        "positionClass": "toast-top-right"
                                    })
                                }
                            }
                        })
                    },
                    updateFund(id){
                        axios.post(updateCanFundUrl, {id: id}).then((res)=>{
                        });
                    },
                    generateAccessToken(user_id) {
                        this.fetchingAccessToken = true;
                        this.error = null;
                        this.errors = null;
                        axios.post(generateAccessTokenUrl, {user_id}).then((res)=>{
                            this.fetchingAccessToken = false
                            this.generatedAccessToken = res.data

                        }).catch((error)=>{
                            this.fetchingAccessToken = false
                            if (error.response) {
                                if (error.response.status === 422){
                                    this.errors = error.response.data.errors;
                                } else if (error.response.status === 500){
                                    alert(error.response.data.message);
                                } else {
                                    alert(error.response.statusText);
                                }
                            }
                        })
                    },
                    submitBulkAction() {
                        if (this.selected_users.length < 1) { alert('No User is selected'); return; }
                        if(!confirm('Are you sure you want to apply the selected changes?')) return ;

                        if (this.bulkAction.convertTo) this.bulkAction.convertTo = 'lead'
                        this.bulkAction.selected_users = this.selected_users

                        this.isLoading = true;
                        this.error = null;
                        this.errors = null;
                        this.errors = null;
                        axios.post(bulkActionUrl, this.bulkAction).then((res)=>{
                            this.isLoading = false;
                            this.reg_success = true;
                            window.location.reload();
                        }).catch((error)=>{
                            this.isLoading = false
                            if (error.response.status === 422){
                                this.errors = error.response.data.errors;
                            } else if (error.response.status === 500){
                                alert(error.response.data.message);
                        }
                        })
                    },
                    setPhoneUpdateData(user) {
                        this.updatePhoneData.name = user.name
                        this.updatePhoneData.phone = user.phone;
                        this.updatePhoneData.user_id = user.id;
                    },
                    updatePhone() {
                        this.isLoading = true;
                        this.error = null;
                        this.phoneUpdateSuccess = false;
                        axios.post(updatePhoneUrl, this.updatePhoneData).then((res)=>{
                            this.isLoading = false;
                            this.customers.data.find((u) => u.id == res.data.id).phone = res.data.phone;
                            this.phoneUpdateSuccess = true;
                        }).catch((error)=>{
                            this.isLoading = false;
                            this.phoneUpdateSuccess = false;
                            if (error.response) {
                                if (error.response.status === 422){
                                    this.errors = error.response.data.errors;
                                } else if (error.response.status === 500){
                                    alert(error.response.data.message);
                                }
                            }
                        })
                    },
                    deleteCustomers() {
                        if (this.selected_users.length < 1) { alert('No User is selected'); return; }
                        if(!confirm('Are you sure you want to delete this customer?\nThis action CANNOT be reversed!')) return ;

                            this.deletingCustomers = true;
                            this.error = null;
                            axios.post(deleteCustomersUrl, {selected_users: this.selected_users}).then((res)=>{
                                this.deletingCustomers = false;
                                window.location.reload();
                            }).catch((error)=>{
                                this.deletingCustomers = false
                                if (error.response.status === 422){
                                    this.errors = error.response.data.errors;
                                } else if (error.response.status === 500){
                                    alert(error.response.data.message);
                                }
                            })
                    },
                    noteCount(userId) {
                        return this.customers.data.find((user) => user.id == userId).notes.length;
                    },
                    showPhone(userId) {
                        return this.customers.data.find((user) => user.id == userId).phone;
                    },
                    showStatus(userId) {
                        var statusrecord = this.customers.data.find((user) => user.id == userId).statusrecord;
                        return statusrecord != null ? statusrecord.name : 'NA';
                    },
                    showSource(userId) {
                        var sourcerecord = this.customers.data.find((user) => user.id == userId).sourcerecord;
                        return sourcerecord != null ? sourcerecord.name : 'NA';
                    },
                    createNote(user) {
                        this.newNote = {
                            user: user.name,
                            user_id: user.id,
                            content: '',
                            contacted_at: null,
                            contacted: true
                        }
                        this.userNotes = this.customers.data.find((u) => u.id == user.id).notes;
                    },
                    addNote() {
                        if (!this.newNote.contacted) {
                            this.newNote.contacted_at = null
                        }

                        this.addingNote = true;
                        axios.post(addNoteUrl, this.newNote).then((res) => {
                            this.addingNote = false;
                            console.log(res.data);
                            this.customers.data.find((u) => u.id == res.data.user_id).notes.unshift(res.data);
                        }).catch((error) =>{
                            this.addingNote = false;
                            if (error.response.status === 422) {
                                this.errors = error.response.data.errors;
                            } else if (error.response.status === 500){
                                alert(error.response.data.message);
                            }
                        })
                    },
                    submitForm(){
                        this.isLoading = true;
                        this.errors = null;
                        this.reg_success = false;
                        axios.post(saveUserUrl, this.data).then((res)=>{
                            this.isLoading = false;
                            this.reg_success = true;
                            window.location.reload();
                        }).catch((error)=>{
                            this.isLoading = false
                            if (error.response.status === 422){
                                this.errors = error.response.data.errors;
                            }
                        })
                    },
                },

                computed: {
                    validationErrors(){
                        let errors = Object.values(this.errors);
                        errors = errors.flat();
                        return errors;
                    },
                },

                watch: {
                    selectAllUsers: function (newValue, oldValue) {
                        if (newValue > oldValue) {
                            this.selected_users = []
                            this.customers.data.forEach((user) => {
                                this.selected_users.push(user.id);
                            });
                        } else {
                            this.selected_users = []
                        }
                    }
                }
            })
        })
    </script>
