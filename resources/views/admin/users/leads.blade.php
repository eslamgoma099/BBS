@extends('admin.layouts.admin-app')

@section('style')
@include('admin.partials.dt-css')
    <style>
        .dataTables_paginate {
            display: none;
        }
        .dropdown-menu {
            min-width : 100%
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
    </style>
@endsection

@section('content')
    <div class="content-wrap">
        <main class="p-3 p-md-4">
            @if (check_permission('import-leads'))
            <div class="collapse mb-2" id="importLead" >
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title d-flex align-items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2">
                                <path opacity="0.4" d="M20.5 10.19H17.61C15.24 10.19 13.31 8.26 13.31 5.89V3C13.31 2.45 12.86 2 12.31 2H8.07C4.99 2 2.5 4 2.5 7.57V16.43C2.5 20 4.99 22 8.07 22H15.93C19.01 22 21.5 20 21.5 16.43V11.19C21.5 10.64 21.05 10.19 20.5 10.19Z" fill="currentColor"/>
                                <path d="M15.8 2.20999C15.39 1.79999 14.68 2.07999 14.68 2.64999V6.13999C14.68 7.59999 15.92 8.80999 17.43 8.80999C18.38 8.81999 19.7 8.81999 20.83 8.81999C21.4 8.81999 21.7 8.14999 21.3 7.74999C19.86 6.29999 17.28 3.68999 15.8 2.20999Z" fill="currentColor"/>
                            </svg>
                            Import Lead
                        </h6>
                        <p class="text-danger">Only .csv files are accepted, remember to user the defined format below</p>
                        <p>CSV heading : [email,phone,first_name,last_name,source,country,address]</p>

                        <form method="POST" action="{{ route('admin.import.leads') }}" class="restaurant-info-form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label class="form-label" for="name">Select a csv file</label>
                                <input type="file" name="import_file" class="form-control" id="name" placeholder="CSV" required>
                                {!! $errors->first('import_file', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <p>Import csv of leads</p>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.28 14.72C11.99 14.43 11.51 14.43 11.22 14.72L10.5 15.44V11.25C10.5 10.84 10.16 10.5 9.75 10.5C9.34 10.5 9 10.84 9 11.25V15.44L8.28 14.72C7.99 14.43 7.51 14.43 7.22 14.72C6.93 15.01 6.93 15.49 7.22 15.78L9.22 17.78C9.23 17.79 9.24 17.79 9.24 17.8C9.3 17.86 9.38 17.91 9.46 17.95C9.56 17.98 9.65 18 9.75 18C9.85 18 9.94 17.98 10.03 17.94C10.12 17.9 10.2 17.85 10.28 17.78L12.28 15.78C12.57 15.49 12.57 15.01 12.28 14.72Z" fill="currentColor"/>
                                    </svg>
                                    Import
                                </button>
                                <a href="{{ asset('csv/lead_import.csv') }}" download="leadd_dwonload.csv" class="btn btn-warning">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.28 14.72C11.99 14.43 11.51 14.43 11.22 14.72L10.5 15.44V11.25C10.5 10.84 10.16 10.5 9.75 10.5C9.34 10.5 9 10.84 9 11.25V15.44L8.28 14.72C7.99 14.43 7.51 14.43 7.22 14.72C6.93 15.01 6.93 15.49 7.22 15.78L9.22 17.78C9.23 17.79 9.24 17.79 9.24 17.8C9.3 17.86 9.38 17.91 9.46 17.95C9.56 17.98 9.65 18 9.75 18C9.85 18 9.94 17.98 10.03 17.94C10.12 17.9 10.2 17.85 10.28 17.78L12.28 15.78C12.57 15.49 12.57 15.01 12.28 14.72Z" fill="currentColor"/>
                                    </svg>
                                    Download Template
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            @include('notification')

            <div id="content">
                <div class="card">
                    <div class="card-header">
                        @if (check_permission('update-leads'))
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                            <h6 class="card-title mb-0 d-flex align-items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2">
                                    <path opacity="0.4" d="M21.97 18.33C21.97 18.69 21.89 19.06 21.72 19.4C21.55 19.74 21.31 20.04 21.04 20.3C20.55 20.81 20 21.08 19.4 21.21C19.39 21.21 19.38 21.21 19.37 21.22C18.75 21.36 18.12 21.43 17.48 21.43C16.38 21.43 15.34 21.18 14.37 20.68C13.4 20.18 12.56 19.5 11.85 18.64C11.14 17.78 10.58 16.79 10.17 15.67C9.76003 14.55 9.55003 13.36 9.55003 12.1C9.55003 11.28 9.67003 10.5 9.91003 9.76C10.15 9.02 10.51 8.33 10.99 7.69C11.47 7.05 12.06 6.5 12.76 6.04C13.46 5.58 14.25 5.28 15.12 5.15C15.34 5.11 15.57 5.09 15.8 5.09C16.8 5.09 17.75 5.37 18.61 5.94C19.47 6.51 20.16 7.28 20.68 8.26C21.2 9.24 21.46 10.36 21.46 11.63C21.46 12.85 21.22 14.01 20.74 15.1C20.26 16.19 19.58 17.16 18.7 17.98L18.65 18.03C19.06 18.07 19.45 18.15 19.83 18.26C20.21 18.37 20.56 18.52 20.89 18.7C21.22 18.88 21.52 19.1 21.78 19.35C21.9 19.47 21.97 19.64 21.97 19.81V18.33Z" fill="currentColor"/>
                                </svg>
                                Lead Management
                            </h6>

                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#bulkAction">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.83 22 22 19.83 22 16.19V7.81C22.01 4.17 19.84 2 16.19 2ZM15.36 12.3L11.15 16.51C10.96 16.7 10.71 16.8 10.46 16.8C10.21 16.8 9.96 16.7 9.77 16.51L7.64 14.38C7.25 13.99 7.25 13.36 7.64 12.97C8.03 12.58 8.66 12.58 9.05 12.97L10.46 14.38L14.05 10.79C14.44 10.4 15.07 10.4 15.46 10.79C15.85 11.18 15.85 11.81 15.46 12.2L15.36 12.3Z" fill="currentColor"/>
                                    </svg>
                                    Bulk Action
                                </button>

                                @if (check_permission('assign-manager-leads'))
                                <div class="dropdown">
                                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
                                            <path opacity="0.4" d="M21.0899 21.5C21.0899 21.78 20.8799 22 20.5999 22H3.40991C3.12991 22 2.90991 21.78 2.90991 21.5C2.90991 17.36 6.99991 14 11.9999 14C16.9999 14 21.0899 17.36 21.0899 21.5Z" fill="currentColor"/>
                                        </svg>
                                        Assign Manager <i class="fa fa-spinner fa-spin" v-if="changingManager"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @forelse ($managers as $manager)
                                            <button class="dropdown-item" type="button" v-on:click="setManagerAs({{ $manager->id }})">{{ $manager->name }}</button>
                                        @empty
                                            <button class="dropdown-item" type="button">No Manager Available</button>
                                        @endforelse
                                    </div>
                                </div>
                                @endif

                                @if (check_permission('create-leads'))
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#add_lead">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16 12.75H12.75V16C12.75 16.41 12.41 16.75 12 16.75C11.59 16.75 11.25 16.41 11.25 16V12.75H8C7.59 12.75 7.25 12.41 7.25 12C7.25 11.59 7.59 11.25 8 11.25H11.25V8C11.25 7.59 11.59 7.25 12 7.25C12.41 7.25 12.75 7.59 12.75 8V11.25H16C16.41 11.25 16.75 11.59 16.75 12C16.75 12.41 16.41 12.75 16 12.75Z" fill="currentColor"/>
                                    </svg>
                                    New Lead
                                </button>
                                @endif

                                @if (check_permission('import-leads'))
                                <button class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#importLead">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.28 14.72C11.99 14.43 11.51 14.43 11.22 14.72L10.5 15.44V11.25C10.5 10.84 10.16 10.5 9.75 10.5C9.34 10.5 9 10.84 9 11.25V15.44L8.28 14.72C7.99 14.43 7.51 14.43 7.22 14.72C6.93 15.01 6.93 15.49 7.22 15.78L9.22 17.78C9.23 17.79 9.24 17.79 9.24 17.8C9.3 17.86 9.38 17.91 9.46 17.95C9.56 17.98 9.65 18 9.75 18C9.85 18 9.94 17.98 10.03 17.94C10.12 17.9 10.2 17.85 10.28 17.78L12.28 15.78C12.57 15.49 12.57 15.01 12.28 14.72Z" fill="currentColor"/>
                                    </svg>
                                    Import Lead
                                </button>
                                @endif

                                @if(check_permission('create-status-leads'))
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createStatus">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16 12.75H12.75V16C12.75 16.41 12.41 16.75 12 16.75C11.59 16.75 11.25 16.41 11.25 16V12.75H8C7.59 12.75 7.25 12.41 7.25 12C7.25 11.59 7.59 11.25 8 11.25H11.25V8C11.25 7.59 11.59 7.25 12 7.25C12.41 7.25 12.75 7.59 12.75 8V11.25H16C16.41 11.25 16.75 11.59 16.75 12C16.75 12.41 16.41 12.75 16 12.75Z" fill="currentColor"/>
                                    </svg>
                                    Create Status
                                </button>
                                @endif

                                @if(check_permission('create-source-leads'))
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#createSource">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16 12.75H12.75V16C12.75 16.41 12.41 16.75 12 16.75C11.59 16.75 11.25 16.41 11.25 16V12.75H8C7.59 12.75 7.25 12.41 7.25 12C7.25 11.59 7.59 11.25 8 11.25H11.25V8C11.25 7.59 11.59 7.25 12 7.25C12.41 7.25 12.75 7.59 12.75 8V11.25H16C16.41 11.25 16.75 11.59 16.75 12C16.75 12.41 16.41 12.75 16 12.75Z" fill="currentColor"/>
                                    </svg>
                                    Create Source
                                </button>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <!-- فلاتر البحث -->
                        <div class="row mb-4">
                            <div class="col-10">
                                <form action="{{ route('admin.users.leads') }}" method="get">
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <select class="form-control" name="source">
                                                <option value="">Filter Source</option>
                                                @foreach ($sources as $source)
                                                    <option value="{{ $source->id }}" @if (Request::get('source') == $source->id ) selected @endif>{{ $source->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control" name="status">
                                                <option value="">Filter Status</option>
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status->id }}" @if (Request::get('status') == $status->id ) selected @endif>{{ $status->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if (check_permission('assign-manager-leads'))
                                        <div class="col-md-3">
                                            <select class="form-control" name="manager">
                                                <option value="">Filter Manager</option>
                                                @foreach ($managers as $manager)
                                                    <option value="{{ $manager->id }}" @if (Request::get('manager') == $manager->id ) selected @endif>{{ $manager->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="q" value="{{ Request::get('q') }}" placeholder="Search">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="d-flex gap-1">
                                                <button class="btn btn-primary">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" fill="currentColor" opacity="0.4"/>
                                                        <path d="M20.9597 17.84L19.3297 18.39C18.8797 18.54 18.5197 18.89 18.3697 19.35L17.8197 20.98C17.3497 22.39 15.3697 22.36 14.9297 20.95L13.0797 15C12.7197 13.82 13.8097 12.72 14.9797 13.09L20.9397 14.94C22.3397 15.38 22.3597 17.37 20.9597 17.84Z" fill="currentColor"/>
                                                    </svg>
                                                </button>
                                                <a href="{{ route('admin.users.leads') }}" class="btn btn-danger">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z" fill="currentColor"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-2">
                                <form action="{{ route('admin.users.leads') }}" method="get">
                                    <div class="d-flex">
                                        <select class="form-control" name="sort" style="border-radius: 6px 0px 0px 6px;">
                                            <option value="">Sort By</option>
                                            <option value="email" @if (Request::get('sort') == "email" ) selected @endif>Email</option>
                                            <option value="source" @if (Request::get('sort') == "source" ) selected @endif>Source</option>
                                            <option value="status" @if (Request::get('sort') == "status" ) selected @endif>Status</option>
                                            <option value="phone" @if (Request::get('sort') == "phone" ) selected @endif>Phone</option>
                                            <option value="manager_id" @if (Request::get('sort') == "manager_id" ) selected @endif>Manager</option>
                                            <option value="created_at" @if (Request::get('sort') == "created_at" ) selected @endif>Date</option>
                                        </select>
                                        <button type="submit" style="border-radius: 0px 6px 6px 0px;" class="btn btn-secondary">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 7H21L19 9H5L3 7ZM6 13H18L17 15H7L6 13ZM9 19H15V21H9V19Z" fill="currentColor"/>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- الجدول -->
                        <form action="" method="post">
                            <input type="hidden" name="type" required>
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="text-center" style="width: 50px;">
                                                <input type="checkbox" v-model="selectAllUsers" class="form-check-input"/>
                                            </th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Source</th>
                                            <th>Status</th>
                                            <th>Phone</th>
                                            <th>Manager</th>
                                            @if (check_permission('users-delete'))
                                            <th>Actions</th>
                                            @endif
                                            <th>Date Added</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr v-cloak>
                                                <td class="text-center">
                                                    <input type="checkbox" value="{{ $user->id }}" v-model="selected_users" class="form-check-input"/>
                                                </td>
                                                <td><span class="badge bg-secondary">{{ $user->id }}</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2 text-primary">
                                                            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
                                                            <path opacity="0.4" d="M21.0899 21.5C21.0899 21.78 20.8799 22 20.5999 22H3.40991C3.12991 22 2.90991 21.78 2.90991 21.5C2.90991 17.36 6.99991 14 11.9999 14C16.9999 14 21.0899 17.36 21.0899 21.5Z" fill="currentColor"/>
                                                        </svg>
                                                        <a class="text-decoration-none text-capitalize fw-medium" href="#">{{ $user->name }}</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2 text-info">
                                                            <path opacity="0.4" d="M22 15.94C22 18.73 19.76 20.99 16.97 21H16.96H7.05C4.27 21 2 18.75 2 15.96V15.95C2 15.95 2.006 11.524 2.014 9.298C2.015 8.88 2.495 8.646 2.822 8.906C5.198 10.791 9.447 14.228 9.5 14.273C10.21 14.842 11.11 15.163 12.03 15.163C12.95 15.163 13.85 14.842 14.56 14.262C14.613 14.227 18.767 10.893 21.179 8.977C21.507 8.716 21.989 8.95 21.99 9.367C22 11.576 22 15.94 22 15.94Z" fill="currentColor"/>
                                                            <path d="M21.4759 5.67351C20.6099 4.04151 18.9059 2.99951 17.0299 2.99951H7.04988C5.17388 2.99951 3.46988 4.04151 2.60388 5.67351C2.40988 6.03851 2.50188 6.49351 2.82488 6.75151L10.2499 12.6905C10.7699 13.1105 11.3999 13.3195 12.0299 13.3195C12.0339 13.3195 12.0369 13.3195 12.0399 13.3195C12.0429 13.3195 12.0469 13.3195 12.0499 13.3195C12.6799 13.3195 13.3099 13.1105 13.8299 12.6905L21.2549 6.75151C21.5779 6.49351 21.6699 6.03851 21.4759 5.67351Z" fill="currentColor"/>
                                                        </svg>
                                                        {{ $user->email }}
                                                    </div>
                                                    <small>
                                                        <a href="#" data-toggle="modal" data-target="#notes" v-on:click="createNote({{ $user }})" class="text-decoration-none">
                                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-1">
                                                                <path opacity="0.4" d="M6.73049 19.7C7.55049 18.82 8.80049 18.89 9.52049 19.85L10.5305 21.2C11.3405 22.27 12.6505 22.27 13.4605 21.2L14.4705 19.85C15.1905 18.89 16.4405 18.82 17.2605 19.7C19.0405 21.6 20.4905 20.97 20.4905 18.31V7.04C20.5005 3.01 19.5605 2 15.7805 2H8.22049C4.44049 2 3.50049 3.01 3.50049 7.04V18.3C3.50049 20.97 4.96049 21.59 6.73049 19.7Z" fill="currentColor"/>
                                                                <path d="M16.2305 11.75H10.7305C10.3205 11.75 9.98047 11.41 9.98047 11C9.98047 10.59 10.3205 10.25 10.7305 10.25H16.2305C16.6405 10.25 16.9805 10.59 16.9805 11C16.9805 11.41 16.6405 11.75 16.2305 11.75Z" fill="currentColor"/>
                                                            </svg>
                                                            Notes (@{{ noteCount({!! $user->id !!}) }})
                                                        </a>
                                                    </small>
                                                </td>
                                                <td>
                                                    @if (check_permission('create-source-leads'))
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                            <span ref="changingSource{{ $user->id }}"></span> @{{showSource({!! $user->id !!})}}
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            @foreach ($sources as $source)
                                                            <li><a class="dropdown-item" href="#" v-on:click="updateSource({{ $user->id }}, {{ $source->id }})">{{ $source->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @else
                                                    <span class="badge bg-info">@{{showSource({!! $user->id !!})}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                            <span ref="changingStatus{{ $user->id }}"></span> @{{showStatus({!! $user->id !!})}}
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            @foreach ($statuses as $status)
                                                            <li><a class="dropdown-item" href="#" v-on:click="updateStatus({{ $user->id }}, {{ $status->id }})">{{ $status->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2 text-success">
                                                            <path opacity="0.4" d="M21.97 18.33C21.97 18.69 21.89 19.06 21.72 19.4C21.55 19.74 21.31 20.04 21.04 20.3C20.55 20.81 20 21.08 19.4 21.21C19.39 21.21 19.38 21.21 19.37 21.22C18.75 21.36 18.12 21.43 17.48 21.43C16.38 21.43 15.34 21.18 14.37 20.68C13.4 20.18 12.56 19.5 11.85 18.64C11.14 17.78 10.58 16.79 10.17 15.67C9.76003 14.55 9.55003 13.36 9.55003 12.1C9.55003 11.28 9.67003 10.5 9.91003 9.76C10.15 9.02 10.51 8.33 10.99 7.69C11.47 7.05 12.06 6.5 12.76 6.04C13.46 5.58 14.25 5.28 15.12 5.15C15.34 5.11 15.57 5.09 15.8 5.09C16.8 5.09 17.75 5.37 18.61 5.94C19.47 6.51 20.16 7.28 20.68 8.26C21.2 9.24 21.46 10.36 21.46 11.63C21.46 12.85 21.22 14.01 20.74 15.1C20.26 16.19 19.58 17.16 18.7 17.98L18.65 18.03C19.06 18.07 19.45 18.15 19.83 18.26C20.21 18.37 20.56 18.52 20.89 18.7C21.22 18.88 21.52 19.1 21.78 19.35C21.9 19.47 21.97 19.64 21.97 19.81V18.33Z" fill="currentColor"/>
                                                        </svg>
                                                        <div>
                                                            <a href="tel:{{ $user->phone }}" class="text-decoration-none">@{{showPhone({!! $user->id !!})}}</a>
                                                            @if (check_permission('update-leads'))
                                                            <a href="#" data-toggle="modal" data-target="#changePhone" v-on:click="setPhoneUpdateData({{ $user }})" class="text-primary ms-1">
                                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11 2C13.76 2 16 4.24 16 7C16 9.76 13.76 12 11 12C8.24 12 6 9.76 6 7C6 4.24 8.24 2 11 2ZM17.1315 12.2012C18.7011 11.8386 20.0495 12.4962 20.8003 13.635C21.2666 14.3647 21.2666 15.3018 20.8003 16.0315L19.6007 17.8267C19.1344 18.5564 18.2699 19.0008 17.3347 19.0008C17.0668 19.0008 16.8096 18.9562 16.5738 18.8778L15.2 18.37C14.12 17.95 13.37 16.95 13.37 15.75V14C13.37 12.9 14.27 12 15.37 12H17.1315ZM13.7 17.3H9.6C9.21 17.3 8.9 17.01 8.9 16.62C8.9 16.23 9.21 15.94 9.6 15.94H13.7C14.09 15.94 14.38 16.23 14.38 16.62C14.38 17.01 14.09 17.3 13.7 17.3Z" fill="currentColor"/>
                                                                </svg>
                                                            </a>
                                                            @endif
                                                            @if ($user->country)
                                                            <br><small class="text-muted">{{ $user->country }} <em>{{ $user->phone_code }}</em></small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                @if (check_permission('assign-manager-leads'))
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-2 text-warning">
                                                            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
                                                            <path opacity="0.4" d="M21.0899 21.5C21.0899 21.78 20.8799 22 20.5999 22H3.40991C3.12991 22 2.90991 21.78 2.90991 21.5C2.90991 17.36 6.99991 14 11.9999 14C16.9999 14 21.0899 17.36 21.0899 21.5Z" fill="currentColor"/>
                                                        </svg>
                                                        <span class="text-capitalize">@if($user->manager) {{ $user->manager->name }} @else <span class="text-muted">NA</span> @endif</span>
                                                    </div>
                                                </td>
                                                @endif
                                                @if (check_permission('users-delete'))
                                                <td>
                                                    <button data-toggle="modal" data-target="#convert{{ $user->id }}" type="button" class="btn btn-danger btn-sm">
                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M21 5.97998C21 5.55998 20.65 5.20998 20.23 5.20998H16.76L15.93 3.54998C15.64 2.97998 15.04 2.62998 14.38 2.62998H9.61998C8.95998 2.62998 8.35998 2.97998 8.06998 3.54998L7.23998 5.20998H3.76998C3.34998 5.20998 2.99998 5.55998 2.99998 5.97998C2.99998 6.39998 3.34998 6.74998 3.76998 6.74998H4.81998L6.04998 19.34C6.19998 20.86 7.49998 22 9.02998 22H14.97C16.5 22 17.8 20.86 17.95 19.34L19.18 6.74998H20.23C20.65 6.74998 21 6.39998 21 5.97998Z" fill="currentColor"/>
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </td>
                                                @endif
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
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- باقي الـ Modals بنفس التصميم المحدث... -->
    <!-- سأضع فقط مثال واحد للتوضيح -->

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

                        @if (check_permission('users-update'))
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
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Change Status</label>
                            <select class="form-control" v-model="bulkAction.status">
                                <option value="">Select Status</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if (check_permission('create-source-leads'))
                        <div class="mb-3">
                            <label class="form-label">Change Source</label>
                            <select class="form-control" v-model="bulkAction.source">
                                <option value="">Select Source</option>
                                @foreach ($sources as $source)
                                    <option value="{{ $source->id }}">{{ $source->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="bulkAction.convertTo" id="convertCustomer">
                            <label class="form-check-label" for="convertCustomer">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="me-1 text-success">
                                    <path d="M18 13C17.06 13 16.19 13.33 15.5 13.88C14.58 14.61 14 15.74 14 17C14 17.75 14.21 18.46 14.58 19.06C15.27 20.22 16.54 21 18 21C19.01 21 19.93 20.63 20.63 20C20.94 19.74 21.21 19.42 21.42 19.06C21.79 18.46 22 17.75 22 17C22 14.79 20.21 13 18 13ZM20.07 16.57L17.94 18.54C17.8 18.67 17.61 18.74 17.43 18.74C17.24 18.74 17.05 18.67 16.9 18.52L15.91 17.53C15.62 17.24 15.62 16.76 15.91 16.47C16.2 16.18 16.68 16.18 16.97 16.47L17.45 16.95L19.05 15.47C19.35 15.19 19.83 15.21 20.11 15.51C20.39 15.81 20.37 16.28 20.07 16.57Z" fill="currentColor"/>
                                    <path opacity="0.4" d="M21.09 21.5C21.09 21.78 20.87 22 20.59 22H3.41003C3.13003 22 2.91003 21.78 2.91003 21.5C2.91003 17.36 6.99003 14 12 14C13.03 14 14.03 14.14 14.95 14.41C14.36 15.11 14 16.02 14 17C14 17.75 14.21 18.46 14.58 19.06C14.78 19.4 15.04 19.71 15.34 19.97C16.04 20.61 16.97 21 18 21C19.12 21 20.13 20.54 20.85 19.8C21.01 20.34 21.09 20.91 21.09 21.5Z" fill="currentColor"/>
                                    <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
                                </svg>
                                Convert To Customer
                            </label>
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

    <!-- باقي الـ Modals بنفس الطريقة... -->

@endsection

@section('js')
    @include('admin.partials.dt-js')
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>

    <!-- نفس الـ JavaScript بدون تغيير -->
    <script>
        // نفس الكود الموجود...
    </script>
@endsection
