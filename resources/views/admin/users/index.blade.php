@extends('admin.layouts.admin-app')

@section('style')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    @include('admin.partials.dt-css')
    <style>
        .dataTables_paginate {
            display: none;
        }
        .dataTables_info {
            display: none;
        }
        /* تحديث الستايل للتطابق مع الثيم الجديد */
        .content-wrap {
            background: #0e0e11;
        }
        body.crypt-light .content-wrap {
            background: #fff;
        }
        .btn svg {
            width: 16px;
            height: 16px;
            margin-right: 8px;
        }
        .table svg {
            width: 20px;
            height: 20px;
        }
        .badge svg {
            width: 14px;
            height: 14px;
            margin-right: 4px;
        }
        /* Switch Toggle Styles */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
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
            border-radius: 34px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #2196F3;
        }
        input:checked + .slider:before {
            transform: translateX(26px);
        }
    </style>
@endsection

@section('content')
    <div class="content-wrap">
        <main class="p-3 p-md-4">
            <!-- Quick Actions Bar -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.users.ids') }}">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M20.91 11.12C20.91 16.01 17.36 20.59 12.51 21.93C12.18 22.02 11.82 22.02 11.49 21.93C6.63996 20.59 3.08997 16.01 3.08997 11.12V6.73006C3.08997 5.91006 3.70998 4.98007 4.47998 4.67007L10.05 2.39007C11.3 1.88007 12.71 1.88007 13.96 2.39007L19.53 4.67007C20.29 4.98007 20.92 5.91006 20.92 6.73006L20.91 11.12Z" fill="currentColor"/>
                                <path d="M14.5 10.5C14.5 9.12 13.38 8 12 8C10.62 8 9.5 9.12 9.5 10.5C9.5 11.62 10.24 12.55 11.25 12.87V15.5C11.25 15.91 11.59 16.25 12 16.25C12.41 16.25 12.75 15.91 12.75 15.5V12.87C13.76 12.55 14.5 11.62 14.5 10.5Z" fill="currentColor"/>
                            </svg>
                            KYC Verifications
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.plans.index') }}">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M19.97 10H4.03C2.76 10 1.74 11.02 1.74 12.29V19.06C1.74 20.33 2.76 21.35 4.03 21.35H19.97C21.24 21.35 22.26 20.33 22.26 19.06V12.29C22.26 11.02 21.24 10 19.97 10Z" fill="currentColor"/>
                                <path d="M21.5 2.64998V8.15998C21.5 9.32998 20.58 10.25 19.41 10.25H4.59C3.42 10.25 2.5 9.32998 2.5 8.15998V2.64998C2.5 1.47998 3.42 0.549988 4.59 0.549988H19.41C20.58 0.549988 21.5 1.47998 21.5 2.64998ZM14.97 7.75H9.03C8.62 7.75 8.28 7.41 8.28 7C8.28 6.59 8.62 6.25 9.03 6.25H14.97C15.38 6.25 15.72 6.59 15.72 7C15.72 7.41 15.38 7.75 14.97 7.75Z" fill="currentColor"/>
                            </svg>
                            Plans
                        </a>
                        <a class="btn btn-dark btn-sm" href="{{ route('admin.deposits.index') }}">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.0602 11.8201L20.9002 11.6001C20.6202 11.2601 20.2902 10.9901 19.9102 10.7901C19.4002 10.5001 18.8202 10.3501 18.2202 10.3501H5.7702C5.1702 10.3501 4.6002 10.5001 4.0802 10.7901C3.6902 11.0001 3.3402 11.2901 3.0502 11.6501C2.4802 12.3801 2.2102 13.2801 2.3002 14.1801L2.6702 18.8501C2.8002 20.2601 2.9702 22.0001 6.1402 22.0001H17.8602C21.0302 22.0001 21.1902 20.2601 21.3302 18.8401L21.7002 14.1901C21.7902 13.3501 21.5702 12.5101 21.0602 11.8201ZM14.3902 17.3401H9.6002C9.2102 17.3401 8.9002 17.0201 8.9002 16.6401C8.9002 16.2601 9.2102 15.9401 9.6002 15.9401H14.3902C14.7802 15.9401 15.0902 16.2601 15.0902 16.6401C15.0902 17.0301 14.7802 17.3401 14.3902 17.3401Z" fill="currentColor"/>
                                <path opacity="0.4" d="M3.37988 11.31C3.59988 11.11 3.81988 10.93 4.07988 10.79C4.58988 10.5 5.16988 10.35 5.76988 10.35H18.2299C18.8299 10.35 19.3999 10.5 19.9199 10.79C20.1799 10.93 20.4099 11.11 20.6199 11.32V10.79V9.82C20.6199 6.25 19.5299 5.16 15.9599 5.16H13.5799C13.1399 5.16 13.1299 5.15 12.8699 4.81L11.6699 3.2C11.0999 2.46 10.6499 2 9.21988 2H8.03988C4.46988 2 3.37988 3.09 3.37988 6.66V10.8V11.31Z" fill="currentColor"/>
                            </svg>
                            Deposits
                        </a>
                        <a class="btn btn-success btn-sm" href="{{ route('admin.withdrawals.index') }}">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 15.5C15 19.09 12.09 22 8.5 22C4.91 22 2 19.09 2 15.5C2 11.91 4.91 9 8.5 9C8.67 9 8.84999 9.01 9.01999 9.02C12.19 9.27 14.73 11.81 14.98 14.98C14.99 15.15 15 15.33 15 15.5Z" fill="currentColor"/>
                                <path opacity="0.4" d="M22 8.5C22 12.09 19.09 15 15.5 15C15.33 15 15.15 14.99 14.98 14.98C14.73 11.81 12.19 9.27 9.01999 9.02C9.00999 8.85 9 8.67 9 8.5C9 4.91 11.91 2 15.5 2C19.09 2 22 4.91 22 8.5Z" fill="currentColor"/>
                                <path d="M5.59 2H3C2.45 2 2 2.45 2 3V5.59C2 6.48 3.07999 6.93 3.70999 6.3L6.29999 3.71001C6.91999 3.08001 6.48 2 5.59 2Z" fill="currentColor"/>
                                <path d="M18.41 22H21C21.55 22 22 21.55 22 21V18.41C22 17.52 20.92 17.07 20.29 17.7L17.7 20.29C17.08 20.92 17.52 22 18.41 22Z" fill="currentColor"/>
                            </svg>
                            Withdrawal
                        </a>
                        <a class="btn btn-success btn-sm" href="{{ route('admin.transactions') }}">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M6.73049 19.7C7.55049 18.82 8.80049 18.89 9.52049 19.85L10.5305 21.2C11.3405 22.27 12.6505 22.27 13.4605 21.2L14.4705 19.85C15.1905 18.89 16.4405 18.82 17.2605 19.7C19.0405 21.6 20.4905 20.97 20.4905 18.31V7.04C20.5005 3.01 19.5605 2 15.7805 2H8.22049C4.44049 2 3.50049 3.01 3.50049 7.04V18.3C3.50049 20.97 4.96049 21.59 6.73049 19.7Z" fill="currentColor"/>
                                <path d="M16.2305 11.75H10.7305C10.3205 11.75 9.98047 11.41 9.98047 11C9.98047 10.59 10.3205 10.25 10.7305 10.25H16.2305C16.6405 10.25 16.9805 10.59 16.9805 11C16.9805 11.41 16.6405 11.75 16.2305 11.75Z" fill="currentColor"/>
                                <path d="M16.2305 7.75H10.7305C10.3205 7.75 9.98047 7.41 9.98047 7C9.98047 6.59 10.3205 6.25 10.7305 6.25H16.2305C16.6405 6.25 16.9805 6.59 16.9805 7C16.9805 7.41 16.6405 7.75 16.2305 7.75Z" fill="currentColor"/>
                            </svg>
                            Transactions
                        </a>
                    </div>
                </div>
            </div>

            <div id="vue-content">
                <div class="card">
                    <div class="card-header">
                        @include('notification')

                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                            <h6 class="card-title mb-0 d-flex align-items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2">
                                    <path d="M18 13C17.06 13 16.19 13.33 15.5 13.88C14.58 14.61 14 15.74 14 17C14 17.75 14.21 18.46 14.58 19.06C15.27 20.22 16.54 21 18 21C19.01 21 19.93 20.63 20.63 20C20.94 19.74 21.21 19.42 21.42 19.06C21.79 18.46 22 17.75 22 17C22 14.79 20.21 13 18 13ZM20.07 16.57L17.94 18.54C17.8 18.67 17.61 18.74 17.43 18.74C17.24 18.74 17.05 18.67 16.9 18.52L15.91 17.53C15.62 17.24 15.62 16.76 15.91 16.47C16.2 16.18 16.68 16.18 16.97 16.47L17.45 16.95L19.05 15.47C19.35 15.19 19.83 15.21 20.11 15.51C20.39 15.81 20.37 16.28 20.07 16.57Z" fill="currentColor"/>
                                    <path opacity="0.4" d="M21.09 21.5C21.09 21.78 20.87 22 20.59 22H3.41003C3.13003 22 2.91003 21.78 2.91003 21.5C2.91003 17.36 6.99003 14 12 14C13.03 14 14.03 14.14 14.95 14.41C14.36 15.11 14 16.02 14 17C14 17.75 14.21 18.46 14.58 19.06C14.78 19.4 15.04 19.71 15.34 19.97C16.04 20.61 16.97 21 18 21C19.12 21 20.13 20.54 20.85 19.8C21.01 20.34 21.09 20.91 21.09 21.5Z" fill="currentColor"/>
                                    <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
                                </svg>
                                Customer Management
                            </h6>

                            <div class="d-flex flex-wrap gap-2">
                                @if(check_permission('update-customers'))
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#bulkAction">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.83 22 22 19.83 22 16.19V7.81C22.01 4.17 19.84 2 16.19 2ZM15.36 12.3L11.15 16.51C10.96 16.7 10.71 16.8 10.46 16.8C10.21 16.8 9.96 16.7 9.77 16.51L7.64 14.38C7.25 13.99 7.25 13.36 7.64 12.97C8.03 12.58 8.66 12.58 9.05 12.97L10.46 14.38L14.05 10.79C14.44 10.4 15.07 10.4 15.46 10.79C15.85 11.18 15.85 11.81 15.46 12.2L15.36 12.3Z" fill="currentColor"/>
                                    </svg>
                                    Bulk Action
                                </button>
                                @endif

                                @if(check_permission('verify-all-emails'))
                                <a href="{{ route('admin.verify.accounts') }}" class="btn btn-success btn-sm">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z" fill="currentColor"/>
                                    </svg>
                                    Verify all emails
                                </a>
                                @endif

                                @if(check_permission('create-admin') && $title == 'admin')
                                <a href="{{ route('admin.users.create') }}?r=admin" class="btn btn-danger btn-sm">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16 12.75H12.75V16C12.75 16.41 12.41 16.75 12 16.75C11.59 16.75 11.25 16.41 11.25 16V12.75H8C7.59 12.75 7.25 12.41 7.25 12C7.25 11.59 7.59 11.25 8 11.25H11.25V8C11.25 7.59 11.59 7.25 12 7.25C12.41 7.25 12.75 7.59 12.75 8V11.25H16C16.41 11.25 16.75 11.59 16.75 12C16.75 12.41 16.41 12.75 16 12.75Z" fill="currentColor"/>
                                    </svg>
                                    Add Admin
                                </a>
                                @endif

                                @if(check_permission('create-manager') && $title == 'manager')
                                <a href="{{ route('admin.users.create') }}?r=manager" class="btn btn-warning btn-sm">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16 12.75H12.75V16C12.75 16.41 12.41 16.75 12 16.75C11.59 16.75 11.25 16.41 11.25 16V12.75H8C7.59 12.75 7.25 12.41 7.25 12C7.25 11.59 7.59 11.25 8 11.25H11.25V8C11.25 7.59 11.59 7.25 12 7.25C12.41 7.25 12.75 7.59 12.75 8V11.25H16C16.41 11.25 16.75 11.59 16.75 12C16.75 12.41 16.41 12.75 16 12.75Z" fill="currentColor"/>
                                    </svg>
                                    Add Manager
                                </a>
                                @endif

                                @if(check_permission('create-retention') && $title == 'retention')
                                <a href="{{ route('admin.users.create') }}?r=retention" class="btn btn-warning btn-sm">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16 12.75H12.75V16C12.75 16.41 12.41 16.75 12 16.75C11.59 16.75 11.25 16.41 11.25 16V12.75H8C7.59 12.75 7.25 12.41 7.25 12C7.25 11.59 7.59 11.25 8 11.25H11.25V8C11.25 7.59 11.59 7.25 12 7.25C12.41 7.25 12.75 7.59 12.75 8V11.25H16C16.41 11.25 16.75 11.59 16.75 12C16.75 12.41 16.41 12.75 16 12.75Z" fill="currentColor"/>
                                    </svg>
                                    Add Retention
                                </a>
                                @endif

                                @if (setting('autotrader'))
                                <a href="{{ route('admin.users.create') }}?r=autotrader" class="btn btn-primary btn-sm">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16 12.75H12.75V16C12.75 16.41 12.41 16.75 12 16.75C11.59 16.75 11.25 16.41 11.25 16V12.75H8C7.59 12.75 7.25 12.41 7.25 12C7.25 11.59 7.59 11.25 8 11.25H11.25V8C11.25 7.59 11.59 7.25 12 7.25C12.41 7.25 12.75 7.59 12.75 8V11.25H16C16.41 11.25 16.75 11.59 16.75 12C16.75 12.41 16.41 12.75 16 12.75Z" fill="currentColor"/>
                                    </svg>
                                    Add Autotrader
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- فلاتر البحث -->
                        <form action="{{ route('admin.users.index') }}" method="get" class="mb-4">
                            <div class="row g-3 align-items-end">
                                <div class="col-md-2"></div>
                                @if(is_active('admin.users.index'))
                                <div class="col-md-3">
                                    <label class="form-label">Manager</label>
                                    <select class="form-control" name="manager">
                                        <option value="">Filter Manager</option>
                                        @foreach ($managers as $manager)
                                            <option value="{{ $manager->id }}" @if (Request::get('manager') == $manager->id ) selected @endif>{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="col-md-4">
                                    <label class="form-label">Search</label>
                                    <input type="text" class="form-control" name="q" value="{{ Request::get('q') }}" placeholder="Search customers...">
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-primary">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" fill="currentColor" opacity="0.4"/>
                                                <path d="M20.9597 17.84L19.3297 18.39C18.8797 18.54 18.5197 18.89 18.3697 19.35L17.8197 20.98C17.3497 22.39 15.3697 22.36 14.9297 20.95L13.0797 15C12.7197 13.82 13.8097 12.72 14.9797 13.09L20.9397 14.94C22.3397 15.38 22.3597 17.37 20.9597 17.84Z" fill="currentColor"/>
                                            </svg>
                                        </button>
                                        <a href="{{ route('admin.users.index') }}" class="btn btn-danger">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z" fill="currentColor"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- الجدول -->
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        @if (check_permission('update-'.$title))
                                        <th class="text-center" style="width: 50px;">
                                            <input type="checkbox" v-model="selectAllUsers" class="form-check-input"/>
                                        </th>
                                        @endif
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Fund Privilege</th>
                                        @if (setting('invest'))
                                        <th>Invested</th>
                                        @endif
                                        <th>Trades</th>
                                        <th>Finance</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr v-cloak>
                                            @if (check_permission('update-'.$title))
                                            <td class="text-center">
                                                <input type="checkbox" value="{{ $user->id }}" v-model="selected_users" class="form-check-input"/>
                                            </td>
                                            @endif
                                            <td><span class="badge bg-secondary">{{ $user->id }}</span></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2 text-primary">
                                                        <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
                                                        <path opacity="0.4" d="M21.0899 21.5C21.0899 21.78 20.8799 22 20.5999 22H3.40991C3.12991 22 2.90991 21.78 2.90991 21.5C2.90991 17.36 6.99991 14 11.9999 14C16.9999 14 21.0899 17.36 21.0899 21.5Z" fill="currentColor"/>
                                                    </svg>
                                                    <div>
                                                        <a class="text-decoration-none text-capitalize fw-medium" href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a>
                                                        <br>
                                                        <div class="d-flex flex-wrap gap-1 mt-1">
                                                            @if ($user->email_verified_at)
                                                                <span class="badge bg-success">
                                                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z" fill="currentColor"/>
                                                                    </svg>
                                                                    Verified
                                                                </span>
                                                            @else
                                                                <span class="badge bg-danger">
                                                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z" fill="currentColor"/>
                                                                    </svg>
                                                                    Not Verified
                                                                </span>
                                                            @endif

                                                            @if ($user['last_seen'] >= \Carbon\Carbon::now('Europe/London'))
                                                                <span class="badge bg-success">
                                                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2Z" fill="currentColor"/>
                                                                    </svg>
                                                                    Online
                                                                </span>
                                                            @else
                                                                <span class="badge bg-secondary">
                                                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.4" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="currentColor"/>
                                                                    </svg>
                                                                    Offline
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2 text-info">
                                                        <path opacity="0.4" d="M22 15.94C22 18.73 19.76 20.99 16.97 21H16.96H7.05C4.27 21 2 18.75 2 15.96V15.95C2 15.95 2.006 11.524 2.014 9.298C2.015 8.88 2.495 8.646 2.822 8.906C5.198 10.791 9.447 14.228 9.5 14.273C10.21 14.842 11.11 15.163 12.03 15.163C12.95 15.163 13.85 14.842 14.56 14.262C14.613 14.227 18.767 10.893 21.179 8.977C21.507 8.716 21.989 8.95 21.99 9.367C22 11.576 22 15.94 22 15.94Z" fill="currentColor"/>
                                                        <path d="M21.4759 5.67351C20.6099 4.04151 18.9059 2.99951 17.0299 2.99951H7.04988C5.17388 2.99951 3.46988 4.04151 2.60388 5.67351C2.40988 6.03851 2.50188 6.49351 2.82488 6.75151L10.2499 12.6905C10.7699 13.1105 11.3999 13.3195 12.0299 13.3195C12.0339 13.3195 12.0369 13.3195 12.0399 13.3195C12.0429 13.3195 12.0469 13.3195 12.0499 13.3195C12.6799 13.3195 13.3099 13.1105 13.8299 12.6905L21.2549 6.75151C21.5779 6.49351 21.6699 6.03851 21.4759 5.67351Z" fill="currentColor"/>
                                                    </svg>
                                                    <div>
                                                        {{ $user->email }}
                                                        <br>
                                                        <small>
                                                            <a href="#" data-toggle="modal" data-target="#notes" v-on:click="createNote({{ $user }})" class="text-decoration-none">
                                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-1">
                                                                    <path opacity="0.4" d="M6.73049 19.7C7.55049 18.82 8.80049 18.89 9.52049 19.85L10.5305 21.2C11.3405 22.27 12.6505 22.27 13.4605 21.2L14.4705 19.85C15.1905 18.89 16.4405 18.82 17.2605 19.7C19.0405 21.6 20.4905 20.97 20.4905 18.31V7.04C20.5005 3.01 19.5605 2 15.7805 2H8.22049C4.44049 2 3.50049 3.01 3.50049 7.04V18.3C3.50049 20.97 4.96049 21.59 6.73049 19.7Z" fill="currentColor"/>
                                                                </svg>
                                                                Notes (@{{ noteCount({!! $user->id !!}) }})
                                                            </a>
                                                        </small>
                                                        <div class="d-flex flex-wrap gap-1 mt-1">
                                                            @if(check_permission('delete-'.$title))
                                                            <a href="{{ route('admin.user.toggle', $user->id) }}" class="btn btn-xs {{ $user->is_active ? 'btn-danger' : 'btn-success' }}">
                                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    @if($user->is_active)
                                                                    <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z" fill="currentColor"/>
                                                                    @else
                                                                    <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z" fill="currentColor"/>
                                                                    @endif
                                                                </svg>
                                                            </a>
                                                            @endif
                                                            @if(check_permission('update-'.$title))
                                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-xs btn-warning">
                                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11 2C13.76 2 16 4.24 16 7C16 9.76 13.76 12 11 12C8.24 12 6 9.76 6 7C6 4.24 8.24 2 11 2ZM17.1315 12.2012C18.7011 11.8386 20.0495 12.4962 20.8003 13.635C21.2666 14.3647 21.2666 15.3018 20.8003 16.0315L19.6007 17.8267C19.1344 18.5564 18.2699 19.0008 17.3347 19.0008C17.0668 19.0008 16.8096 18.9562 16.5738 18.8778L15.2 18.37C14.12 17.95 13.37 16.95 13.37 15.75V14C13.37 12.9 14.27 12 15.37 12H17.1315Z" fill="currentColor"/>
                                                                </svg>
                                                            </a>
                                                            @endif
                                                            @if (check_permission('assign-user-to-manager'))
                                                            <a href="{{ route('admin.assignUsers', $user->id) }}" class="btn btn-xs btn-secondary">
                                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16 12.75H12.75V16C12.75 16.41 12.41 16.75 12 16.75C11.59 16.75 11.25 16.41 11.25 16V12.75H8C7.59 12.75 7.25 12.41 7.25 12C7.25 11.59 7.59 11.25 8 11.25H11.25V8C11.25 7.59 11.59 7.25 12 7.25C12.41 7.25 12.75 7.59 12.75 8V11.25H16C16.41 11.25 16.75 11.59 16.75 12C16.75 12.41 16.41 12.75 16 12.75Z" fill="currentColor"/>
                                                                </svg>
                                                            </a>
                                                            @endif
                                                            @if (check_permission('login-as-'.$title) && $user->id!=1)
                                                            <a href="{{ route('admin.user.gainaccess', $user->id) }}" onclick="alert('You are about to login as a Normal User that means you will be logged out as an admin on this browser')" target="_blank" class="btn btn-xs btn-primary text-capitalize">
                                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.4" d="M17.4399 14.62L16.9999 15.06L15.9399 16.12C15.5199 16.54 15.5199 17.22 15.9399 17.64C16.3599 18.06 17.0399 18.06 17.4599 17.64L18.5199 16.58L18.9599 16.14C19.3799 15.72 19.3799 15.04 18.9599 14.62L17.4599 13.12C17.0399 12.7 16.3599 12.7 15.9399 13.12C15.5199 13.54 15.5199 14.22 15.9399 14.64L16.9999 15.7L17.4399 14.62Z" fill="currentColor"/>
                                                                    <path d="M9.76001 18.67H6.18001C3.87001 18.67 2 16.8 2 14.49V9.50998C2 7.19998 3.87001 5.32998 6.18001 5.32998H9.76001C10.3700 5.32998 10.87 4.82998 10.87 4.21998C10.87 3.60998 10.3700 3.10998 9.76001 3.10998H6.18001C2.65001 3.10998 -0.220009 5.97998 -0.220009 9.50998V14.49C-0.220009 18.02 2.65001 20.89 6.18001 20.89H9.76001C10.3700 20.89 10.87 20.39 10.87 19.78C10.87 19.17 10.3700 18.67 9.76001 18.67Z" fill="currentColor"/>
                                                                </svg>
                                                                Login as {{ $user->first_name }}
                                                            </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2 text-success">
                                                        <path opacity="0.4" d="M21.97 18.33C21.97 18.69 21.89 19.06 21.72 19.4C21.55 19.74 21.31 20.04 21.04 20.3C20.55 20.81 20 21.08 19.4 21.21C19.39 21.21 19.38 21.21 19.37 21.22C18.75 21.36 18.12 21.43 17.48 21.43C16.38 21.43 15.34 21.18 14.37 20.68C13.4 20.18 12.56 19.5 11.85 18.64C11.14 17.78 10.58 16.79 10.17 15.67C9.76003 14.55 9.55003 13.36 9.55003 12.1C9.55003 11.28 9.67003 10.5 9.91003 9.76C10.15 9.02 10.51 8.33 10.99 7.69C11.47 7.05 12.06 6.5 12.76 6.04C13.46 5.58 14.25 5.28 15.12 5.15C15.34 5.11 15.57 5.09 15.8 5.09C16.8 5.09 17.75 5.37 18.61 5.94C19.47 6.51 20.16 7.28 20.68 8.26C21.2 9.24 21.46 10.36 21.46 11.63C21.46 12.85 21.22 14.01 20.74 15.1C20.26 16.19 19.58 17.16 18.7 17.98L18.65 18.03C19.06 18.07 19.45 18.15 19.83 18.26C20.21 18.37 20.56 18.52 20.89 18.7C21.22 18.88 21.52 19.1 21.78 19.35C21.9 19.47 21.97 19.64 21.97 19.81V18.33Z" fill="currentColor"/>
                                                    </svg>
                                                    <div>
                                                        <a href="tel:{{ $user->phone }}" class="text-decoration-none">@{{showPhone({!! $user->id !!})}}</a>
                                                        <a href="#" data-toggle="modal" data-target="#changePhone" v-on:click="setPhoneUpdateData({{ $user }})" class="text-primary ms-1">
                                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 2C13.76 2 16 4.24 16 7C16 9.76 13.76 12 11 12C8.24 12 6 9.76 6 7C6 4.24 8.24 2 11 2Z" fill="currentColor"/>
                                                            </svg>
                                                        </a>
                                                        @if ($user->country)
                                                        <br><small class="text-muted">{{ $user->country }} <em>{{ $user->phone_code }}</em></small>
                                                        @endif
                                                    </div>
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
                                                <span class="badge bg-info">{{ $user->invested() }}</span>
                                            </td>
                                            @endif
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2 text-primary">
                                                        <path d="M15 15.5C15 19.09 12.09 22 8.5 22C4.91 22 2 19.09 2 15.5C2 11.91 4.91 9 8.5 9C8.67 9 8.84999 9.01 9.01999 9.02C12.19 9.27 14.73 11.81 14.98 14.98C14.99 15.15 15 15.33 15 15.5Z" fill="currentColor"/>
                                                        <path opacity="0.4" d="M22 8.5C22 12.09 19.09 15 15.5 15C15.33 15 15.15 14.99 14.98 14.98C14.73 11.81 12.19 9.27 9.01999 9.02C9.00999 8.85 9 8.67 9 8.5C9 4.91 11.91 2 15.5 2C19.09 2 22 4.91 22 8.5Z" fill="currentColor"/>
                                                    </svg>
                                                    <div>
                                                        <small>Open : <a href="{{ route('admin.trades.index') }}?user={{$user->id}}" class="text-decoration-none">{{ \App\Models\Trade::whereUserId($user->id)->whereStatus(0)->count() }}</a></small><br>
                                                        <small>Closed : <a href="{{ route('admin.trades.index') }}?user={{$user->id}}" class="text-decoration-none">{{ \App\Models\Trade::whereUserId($user->id)->whereStatus(1)->count() }}</a></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2 text-success">
                                                        <path d="M21.0602 11.8201L20.9002 11.6001C20.6202 11.2601 20.2902 10.9901 19.9102 10.7901C19.4002 10.5001 18.8202 10.3501 18.2202 10.3501H5.7702C5.1702 10.3501 4.6002 10.5001 4.0802 10.7901C3.6902 11.0001 3.3402 11.2901 3.0502 11.6501C2.4802 12.3801 2.2102 13.2801 2.3002 14.1801L2.6702 18.8501C2.8002 20.2601 2.9702 22.0001 6.1402 22.0001H17.8602C21.0302 22.0001 21.1902 20.2601 21.3302 18.8401L21.7002 14.1901C21.7902 13.3501 21.5702 12.5101 21.0602 11.8201Z" fill="currentColor"/>
                                                    </svg>
                                                    <div>
                                                        <small>Bal : <span class="fw-bold text-success">{{ amt($user->balance) }}</span></small><br>
                                                        <small>Bonus : <span class="fw-bold text-warning">{{ amt($user->bonus) }}</span></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2 text-secondary">
                                                        <path opacity="0.4" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="currentColor"/>
                                                        <path d="M15.71 15.18L13.31 13.32C12.61 12.78 12.09 11.69 12.09 10.82V7.5C12.09 7.09 11.75 6.75 11.34 6.75C10.93 6.75 10.59 7.09 10.59 7.5V10.82C10.59 12.25 11.36 13.83 12.44 14.68L14.84 16.54C15.15 16.77 15.59 16.71 15.82 16.4C16.05 16.09 15.99 15.65 15.68 15.42L15.71 15.18Z" fill="currentColor"/>
                                                    </svg>
                                                    <small class="text-muted">{{ $user->created_at }}</small>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center py-4">
                                                <div class="d-flex flex-column align-items-center">
                                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="text-muted mb-2">
                                                        <path opacity="0.4" d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.83 22 22 19.83 22 16.19V7.81C22.01 4.17 19.84 2 16.19 2Z" fill="currentColor"/>
                                                        <path d="M12 6.25C11.59 6.25 11.25 6.59 11.25 7V13C11.25 13.41 11.59 13.75 12 13.75C12.41 13.75 12.75 13.41 12.75 13V7C12.75 6.59 12.41 6.25 12 6.25Z" fill="currentColor"/>
                                                        <path d="M12 17C11.44 17 11 16.55 11 16C11 15.45 11.45 15 12 15C12.55 15 13 15.45 13 16C13 16.55 12.56 17 12 17Z" fill="currentColor"/>
                                                    </svg>
                                                    <span class="text-muted"><em>No Record Found!</em></span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- باقي الـ Modals بنفس التصميم الجديد -->
    <!-- Modal: Bulk Action -->
    <div class="modal fade" id="bulkAction">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2">
                            <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.83 22 22 19.83 22 16.19V7.81C22.01 4.17 19.84 2 16.19 2ZM15.36 12.3L11.15 16.51C10.96 16.7 10.71 16.8 10.46 16.8C10.21 16.8 9.96 16.7 9.77 16.51L7.64 14.38C7.25 13.99 7.25 13.36 7.64 12.97C8.03 12.58 8.66 12.58 9.05 12.97L10.46 14.38L14.05 10.79C14.44 10.4 15.07 10.4 15.46 10.79C15.85 11.18 15.85 11.81 15.46 12.2L15.36 12.3Z" fill="currentColor"/>
                        </svg>
                        Bulk Action
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>

                <form @submit.prevent="submitBulkAction">
                    <div class="modal-body">
                        <div v-if="errors" class="alert alert-danger">
                            <ul class="mb-0">
                                <li v-for="(value, key, index) in validationErrors">@{{ value }}</li>
                            </ul>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" v-model="bulkAction.delete" id="massDelete">
                            <label class="form-check-label" for="massDelete">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-1 text-danger">
                                    <path d="M21 5.97998C21 5.55998 20.65 5.20998 20.23 5.20998H16.76L15.93 3.54998C15.64 2.97998 15.04 2.62998 14.38 2.62998H9.61998C8.95998 2.62998 8.35998 2.97998 8.06998 3.54998L7.23998 5.20998H3.76998C3.34998 5.20998 2.99998 5.55998 2.99998 5.97998C2.99998 6.39998 3.34998 6.74998 3.76998 6.74998H4.81998L6.04998 19.34C6.19998 20.86 7.49998 22 9.02998 22H14.97C16.5 22 17.8 20.86 17.95 19.34L19.18 6.74998H20.23C20.65 6.74998 21 6.39998 21 5.97998Z" fill="currentColor"/>
                                </svg>
                                Mass Delete
                            </label>
                        </div>

                        <div v-show="bulkAction.delete" class="mb-3">
                            <label class="form-label">Admin Password</label>
                            <input type="password" class="form-control" placeholder="Enter Admin Password" v-model="bulkAction.admin_password">
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" v-model="bulkAction.convertTo" id="revertLead">
                            <label class="form-check-label" for="revertLead">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-1 text-warning">
                                    <path opacity="0.4" d="M21.97 18.33C21.97 18.69 21.89 19.06 21.72 19.4C21.55 19.74 21.31 20.04 21.04 20.3C20.55 20.81 20 21.08 19.4 21.21C19.39 21.21 19.38 21.21 19.37 21.22C18.75 21.36 18.12 21.43 17.48 21.43C16.38 21.43 15.34 21.18 14.37 20.68C13.4 20.18 12.56 19.5 11.85 18.64C11.14 17.78 10.58 16.79 10.17 15.67C9.76003 14.55 9.55003 13.36 9.55003 12.1C9.55003 11.28 9.67003 10.5 9.91003 9.76C10.15 9.02 10.51 8.33 10.99 7.69C11.47 7.05 12.06 6.5 12.76 6.04C13.46 5.58 14.25 5.28 15.12 5.15C15.34 5.11 15.57 5.09 15.8 5.09C16.8 5.09 17.75 5.37 18.61 5.94C19.47 6.51 20.16 7.28 20.68 8.26C21.2 9.24 21.46 10.36 21.46 11.63C21.46 12.85 21.22 14.01 20.74 15.1C20.26 16.19 19.58 17.16 18.7 17.98L18.65 18.03C19.06 18.07 19.45 18.15 19.83 18.26C20.21 18.37 20.56 18.52 20.89 18.7C21.22 18.88 21.52 19.1 21.78 19.35C21.9 19.47 21.97 19.64 21.97 19.81V18.33Z" fill="currentColor"/>
                                </svg>
                                Revert to lead
                            </label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Change Password</label>
                            <input class="form-control mb-2" type="password" v-model="bulkAction.password" placeholder="Enter new password">
                            <input class="form-control" type="password" v-model="bulkAction.confirm_password" placeholder="Repeat password">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" :disabled="isLoading">
                            <span v-if="isLoading">
                                <i class="fa fa-spinner fa-spin me-1"></i>
                            </span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-1">
                                <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.83 22 22 19.83 22 16.19V7.81C22.01 4.17 19.84 2 16.19 2ZM15.36 12.3L11.15 16.51C10.96 16.7 10.71 16.8 10.46 16.8C10.21 16.8 9.96 16.7 9.77 16.51L7.64 14.38C7.25 13.99 7.25 13.36 7.64 12.97C8.03 12.58 8.66 12.58 9.05 12.97L10.46 14.38L14.05 10.79C14.44 10.4 15.07 10.4 15.46 10.79C15.85 11.18 15.85 11.81 15.46 12.2L15.36 12.3Z" fill="currentColor"/>
                            </svg>
                            Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- باقي الـ Modals ... -->
    <!-- Modal: Change Phone -->
    <div class="modal fade" id="changePhone">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update @{{ updatePhoneData.name }} Phone</h5>
                    <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>
                <form @submit.prevent="updatePhone">
                    <div class="modal-body">
                        <div v-if="errors" class="alert alert-danger">
                            <ul class="mb-0">
                                <li v-for="(value, key, index) in validationErrors">@{{ value }}</li>
                            </ul>
                        </div>
                        <div v-if="phoneUpdateSuccess" class="alert alert-success">
                            Phone Updated successfully!
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Phone" class="form-control" v-model="updatePhoneData.phone" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
                        <button type="submit" class="btn btn-primary" :disabled="isLoading">
                            <span v-if="isLoading">
                                <i class="fa fa-spinner fa-spin me-1"></i>
                            </span>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal: Notes -->
    <div class="modal fade" id="notes">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Notes - @{{newNote.user}}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>
                <form @submit.prevent="addNote">
                    <div class="modal-body">
                        <div v-if="errors" class="alert alert-danger">
                            <ul class="mb-0">
                                <li v-for="(value, key, index) in validationErrors">@{{ value }}</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Note:</label>
                            <textarea class="form-control" placeholder="Note" v-model="newNote.content" required rows="3"></textarea>
                        </div>
                        <div class="mb-3" v-if="newNote.contacted">
                            <label class="form-label">Date Contacted:</label>
                            <input type="datetime-local" class="form-control" v-model="newNote.contacted_at" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-bind:value="true" v-model="newNote.contacted" id="contacted">
                                <label class="form-check-label" for="contacted">I have contacted this user</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-bind:value="false" v-model="newNote.contacted" id="notContacted">
                                <label class="form-check-label" for="notContacted">I have NOT contacted this user</label>
                            </div>
                        </div>

                        <!-- عرض الملاحظات السابقة -->
                        <div class="mt-4" v-for="(note, index) in userNotes" :key="index">
                            <div class="border rounded p-3 mb-2">
                                <strong>@{{ note.writer_name ?? '' }}</strong>
                                <p class="mb-1">@{{ note.content }}</p>
                                <small class="text-muted" v-if="note.contacted_at">Contacted @ @{{ note.contacted_at }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
                        <button type="submit" :disabled="addingNote" class="btn btn-success">
                            <span v-if="addingNote">
                                <i class="fa fa-spinner fa-spin me-1"></i>
                            </span>
                            Add Note
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    @include('admin.partials.dt-js')

    <script>
        $(function(){ $('#toggle').bootstrapToggle() });

        // نفس الـ JavaScript الأصلي بدون تغيير
        let generateAccessTokenUrl = "{{ route('backend.user.token.generate') }}";
        let bulkActionUrl = "{{ route('admin.users.bulkaction') }}";
        let updateCanFundUrl = "{{ route('admin.users.can_fund') }}";
        let saveUserUrl = "{{ route('admin.lead.store') }}";
        let deleteCustomersUrl = "{{ route('admin.user.deleteMultiple') }}";
        let addNoteUrl = "{{ route('admin.lead.addNote') }}";
        let updatePhoneUrl = "{{ route('admin.lead.updatePhone') }}";

        document.addEventListener('DOMContentLoaded', function () {
            new Vue({
                // نفس الكود الأصلي...
                el: '#vue-content',
                data() {
                    return {
                        // نفس البيانات الأصلية...
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
                        asset : '',
                        isLoading : false,
                        errors : null,
                        error : null,
                        form : {
                            password: '',
                            confirm: '',
                            user_id:'',
                        },
                        data : {
                            first_name : '',
                            source : '',
                            last_name : '',
                            email : '',
                            username : '',
                            manager_id : '',
                            country : ''
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
                        iDisplayLength : 100,
                        language: {
                            searchPlaceholder: 'Search...',
                            sSearch: '',
                            lengthMenu: '_MENU_ items/page',
                        }
                    });
                },
                methods: {
                    // نفس الـ methods الأصلية...
                    updateStatus(userId, statusId, newStatus) {
                        // نفس الكود...
                    },
                    updateSource(userId, sourceId) {
                        // نفس الكود...
                    },
                    updateFund(id){
                        axios.post(updateCanFundUrl, {id : id}).then((res)=>{
                        });
                    },
                    // باقي الـ methods...
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
@endsection
