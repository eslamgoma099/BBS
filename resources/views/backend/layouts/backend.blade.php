<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head class="crypt-dark">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ setting('site_name', 'Crypt') }} - @yield('title', 'Dashboard')</title>
    <link rel="shortcut icon" href="{{ setting('favicon', '/asset/images/logosm.png') }}" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- New Theme Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('new-theme/bootstrap/bootstrap.min.css') }}">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="{{ asset('dist/vendors/fontawesome/css/all.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
    
    <!-- LocomotiveScroll CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.3/dist/locomotive-scroll.css">
    
    <!-- Other Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    
    <!-- New Theme CSS Files -->
    <link rel="stylesheet" href="{{ asset('new-theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('new-theme/css/button.css') }}">
    <link rel="stylesheet" href="{{ asset('new-theme/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('new-theme/css/gsap.css') }}">
    <link rel="stylesheet" href="{{ asset('new-theme/css/particle-canvas.css') }}">

    <!-- Legacy CSS for compatibility -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- Unified Layout Styles -->
    <style>
        :root {
            --sidebar-width: 200px;
            --header-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Space Grotesk', sans-serif;
            overflow-x: hidden;
        }

        /* Dark Theme Variables - Reference Design */
        body.crypt-dark {
            --bg-primary: #0f0f0f;
            --bg-secondary: #1a1a1a;
            --bg-tertiary: #2d2d2d;
            --text-primary: #ffffff;
            --text-secondary: #a0aec0;
            --text-muted: #718096;
            --border-color: #2d3748;
            --accent-yellow: #FFC107;
            --accent-yellow-hover: #ffb300;
            --accent-green: #10b981;
            --accent-red: #ef4444;
            --hover-bg: rgba(255, 255, 255, 0.06);
            --card-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        /* Light Theme Variables - Reference Design Exact Match */
        body.crypt-light {
            --bg-primary: #ffffff;
            --bg-secondary: #f8f9fa;
            --bg-tertiary: #f1f3f4;
            --text-primary: #1a1a1a;
            --text-secondary: #4a5568;
            --text-muted: #718096;
            --border-color: #e2e8f0;
            --accent-yellow: #FFC107;
            --accent-yellow-hover: #ffb300;
            --accent-green: #10b981;
            --accent-red: #ef4444;
            --hover-bg: rgba(0, 0, 0, 0.04);
            --card-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Main Container */
        .crypt-layout {
            display: flex;
            min-height: 100vh;
            background-color: var(--bg-primary);
        }

        /* Sidebar */
        .crypt-sidebar {
            width: var(--sidebar-width);
            background-color: var(--bg-secondary);
            border-right: 1px solid var(--border-color);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        /* Main Content Wrapper */
        .crypt-main {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        /* Header */
        .crypt-header {
            height: var(--header-height);
            background-color: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 999;
            display: flex;
            align-items: center;
            padding: 0 20px;
        }

        /* Content Area */
        .crypt-content {
            flex: 1;
            background-color: var(--bg-primary);
            padding: 20px;
            min-height: calc(100vh - var(--header-height));
        }

        /* Sidebar Styles */
        .sidebar-brand {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            background: none;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background-color: var(--hover-bg);
            color: var(--text-primary);
        }

        .sidebar-link svg,
        .sidebar-link i {
            margin-right: 12px;
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        /* New Header Styles - Matching Reference Design 100% */
        
        /* Left Section: Search Bar */
        .header-search-new {
            position: relative;
            width: 300px;
            margin-right: auto;
        }

        .search-container-new {
            position: relative;
        }

        .search-input-new {
            width: 100%;
            padding: 8px 40px 8px 40px;
            background-color: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            color: var(--text-primary);
            font-size: 14px;
            outline: none;
            transition: all 0.2s ease;
        }

        .search-input-new:focus {
            border-color: var(--accent-yellow);
            box-shadow: 0 0 0 2px rgba(255, 215, 0, 0.2);
        }

        .search-input-new::placeholder {
            color: var(--text-muted);
        }

        .search-icon-new {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 14px;
            pointer-events: none;
        }

        /* Center Section: Navigation */
        .header-nav-new {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-dropdown-toggle-new {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            color: var(--text-primary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-dropdown-toggle-new:hover {
            background-color: var(--hover-bg);
            color: var(--accent-yellow);
        }

        .nav-dropdown-icon-new {
            margin-left: 8px;
            font-size: 10px;
        }

        .nav-badge-new {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--accent-yellow);
            color: #000000;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Right Section: Actions */
        .header-actions-new {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-left: auto;
        }

        .btn-add-funds-new {
            background-color: var(--accent-yellow);
            color: #000000;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-add-funds-new:hover {
            background-color: #ffed4a;
        }

        .header-icon-new {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .header-icon-new:hover {
            background-color: var(--hover-bg);
        }

        .header-icon-badge-new {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--accent-yellow);
            color: #000000;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .profile-img-new {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 2px solid #444444;
            object-fit: cover;
        }

        /* Responsive Design */
        @media (max-width: 991px) {
            .header-search-new {
                width: 200px;
            }
            
            .header-nav-new {
                display: none;
            }
            
            .header-actions-new {
                gap: 10px;
            }
        }

        @media (max-width: 768px) {
            .header-search-new {
                width: 150px;
            }
            
            .search-input-new {
                padding: 6px 35px 6px 35px;
                font-size: 13px;
            }
            
            .header-actions-new {
                gap: 8px;
            }
            
            .btn-add-funds-new {
                padding: 6px 12px;
                font-size: 13px;
            }
        }

        /* Legacy Header Styles for Backward Compatibility */
        .header-search {
            flex: 1;
            max-width: 400px;
            margin-right: 20px;
        }

        .search-container {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 8px 40px 8px 15px;
            background-color: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            color: var(--text-primary);
            font-size: 14px;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--accent-yellow);
            box-shadow: 0 0 0 2px rgba(255, 215, 0, 0.2);
        }

        .search-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            pointer-events: none;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: 30px;
            margin-right: 20px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-dropdown {
            position: relative;
        }

        .nav-dropdown-toggle {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            color: var(--text-primary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .nav-dropdown-toggle:hover {
            background-color: var(--hover-bg);
            color: var(--accent-yellow);
        }

        .nav-dropdown-icon {
            margin-left: 8px;
            font-size: 10px;
        }

        .btn-add-funds {
            background-color: var(--accent-yellow);
            color: #000000;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-add-funds:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .header-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .header-icon:hover {
            background-color: var(--hover-bg);
        }

        .icon-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background-color: var(--accent-yellow);
            color: #000000;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .profile-img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid var(--border-color);
            object-fit: cover;
        }

        /* Card Styles */
        .card {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Table Styles */
        .table {
            color: var(--text-primary);
        }

        .table-dark {
            --bs-table-bg: var(--bg-secondary);
            --bs-table-color: var(--text-primary);
        }

        /* Form Styles */
        .form-control {
            background-color: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
        }

        .form-control:focus {
            background-color: var(--bg-tertiary);
            border-color: var(--accent-yellow);
            color: var(--text-primary);
            box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        }

        /* Button Styles */
        .btn-primary {
            background-color: var(--accent-yellow);
            border-color: var(--accent-yellow);
            color: #000000;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #ffed4a;
            border-color: #ffed4a;
            color: #000000;
        }

        .btn-success {
            background-color: var(--accent-green);
            border-color: var(--accent-green);
        }

        .btn-danger {
            background-color: var(--accent-red);
            border-color: var(--accent-red);
        }

        /* Dropdown Styles */
        .dropdown-menu {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .dropdown-item {
            color: var(--text-primary);
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: var(--hover-bg);
            color: var(--accent-yellow);
        }

        .dropdown-divider {
            border-color: var(--border-color);
        }

        .dropdown-header {
            color: var(--text-muted);
            font-weight: 600;
        }

        /* Modal Styles */
        .modal-content {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
        }

        /* Alert Styles */
        .alert {
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        /* Enhanced Mobile Responsiveness */
        @media (max-width: 768px) {
            .crypt-sidebar {
                transform: translateX(-100%);
                box-shadow: none;
            }
            
            .crypt-sidebar.show {
                transform: translateX(0);
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
            }
            
            .crypt-main {
                margin-left: 0;
                width: 100%;
            }
            
            .header-nav {
                display: none;
            }
            
            .header-search {
                max-width: 150px;
                margin-right: 8px;
            }
            
            .search-input {
                font-size: 13px;
                padding: 6px 32px 6px 12px;
            }
            
            .header-actions {
                gap: 8px;
            }
            
            .btn-add-funds {
                font-size: 12px;
                padding: 6px 12px;
            }
            
            .header-icon {
                width: 32px;
                height: 32px;
            }
            
            /* Mobile dropdown improvements */
            .dropdown-menu {
                min-width: 250px;
                margin-top: 8px;
            }
        }
        
        /* Tablet Responsiveness */
        @media (max-width: 1024px) and (min-width: 769px) {
            .header-search {
                max-width: 300px;
            }
            
            .header-nav {
                gap: 20px;
            }
        }

        /* Sidebar collapsed state */
        .sidebar-collapsed .crypt-sidebar {
            width: 60px;
        }
        
        .sidebar-collapsed .crypt-main {
            margin-left: 60px;
            width: calc(100% - 60px);
        }
        
        .sidebar-collapsed .sidebar-link span {
            display: none;
        }
        
        .sidebar-collapsed .nav-section-title span {
            display: none;
        }
        
        .sidebar-collapsed .nav-section-title {
            justify-content: center;
            padding: 0 10px 10px 10px;
        }
        
        .sidebar-collapsed .sidebar-brand span {
            display: none !important;
        }
        
        .sidebar-collapsed .sidebar-brand {
            padding: 20px 10px;
            text-align: center;
            justify-content: center;
        }
        
        /* Sidebar collapse button styling */
        #sidebar-collapse {
            transition: all 0.3s ease;
        }
        
        #sidebar-collapse:hover {
            background-color: var(--hover-bg);
            color: var(--accent-yellow);
        }
        
        #sidebar-collapse svg {
            transition: transform 0.3s ease;
        }
        
        .sidebar-collapsed #sidebar-collapse svg {
            transform: rotate(180deg);
        }

        /* Smooth transitions for theme switching */
        *,
        *::before,
        *::after {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }
        
        /* Remove transitions from interactive elements for better UX */
        .sidebar-link,
        .header-icon,
        .btn,
        button {
            transition: background-color 0.2s ease, color 0.2s ease, transform 0.2s ease, opacity 0.2s ease;
        }

        /* Enhanced scrollbar for all elements */
        .crypt-sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .crypt-content::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        .crypt-content::-webkit-scrollbar-track {
            background: var(--bg-primary);
        }
        
        .crypt-content::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 4px;
        }
        
        .crypt-content::-webkit-scrollbar-thumb:hover {
            background: var(--text-muted);
        }

        .crypt-sidebar::-webkit-scrollbar-track {
            background: var(--bg-secondary);
        }

        .crypt-sidebar::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 2px;
        }

        .crypt-sidebar::-webkit-scrollbar-thumb:hover {
            background: var(--text-muted);
        }
        
        /* Theme transition improvements */
        .theme-transitioning {
            pointer-events: none;
        }
        
        .theme-transitioning * {
            transition-duration: 0.1s !important;
        }
        
        /* Loading states */
        .loading-theme .header-icon {
            opacity: 0.6;
            transform: scale(0.95);
        }
        
        /* Focus improvements for accessibility */
        .sidebar-link:focus,
        .header-icon:focus,
        .search-input:focus {
            outline: 2px solid var(--accent-yellow);
            outline-offset: 2px;
        }
        
        /* Print styles */
        @media print {
            .crypt-sidebar,
            .crypt-header {
                display: none !important;
            }
            
            .crypt-main {
                margin-left: 0 !important;
                width: 100% !important;
            }
            
            .crypt-content {
                padding: 0 !important;
            }
        }
        
        /* High contrast mode support */
        @media (prefers-contrast: high) {
            :root {
                --border-color: #ffffff;
                --text-muted: #cccccc;
            }
            
            .sidebar-link:hover,
            .header-icon:hover {
                outline: 2px solid var(--accent-yellow);
            }
        }
        
        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* ========== COMPREHENSIVE THEME SUPPORT FOR ALL CONTENT ========== */
        
        /* All content containers */
        .container,
        .container-fluid,
        .row,
        .col,
        [class*="col-"] {
            color: var(--text-primary);
        }
        
        /* Ensure all main content backgrounds use theme */
        main,
        .main-content,
        .content,
        .crypt-content,
        .page-content {
            background-color: var(--bg-primary) !important;
            color: var(--text-primary) !important;
        }
        
        /* All headings */
        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
            color: var(--text-primary) !important;
        }
        
        /* All paragraphs and text elements */
        p, span, div, label, 
        .text-dark, .text-primary {
            color: var(--text-primary) !important;
        }
        
        .text-muted, .text-secondary {
            color: var(--text-muted) !important;
        }
        
        /* All cards and panels */
        .card,
        .panel,
        .widget,
        .box {
            background-color: var(--bg-secondary) !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        .card-header,
        .card-body,
        .card-footer,
        .panel-header,
        .panel-body {
            background-color: var(--bg-secondary) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        /* All tables */
        .table,
        table {
            background-color: var(--bg-secondary) !important;
            color: var(--text-primary) !important;
            border-color: var(--border-color) !important;
        }
        
        .table th,
        .table td,
        table th,
        table td {
            background-color: var(--bg-secondary) !important;
            color: var(--text-primary) !important;
            border-color: var(--border-color) !important;
        }
        
        .table-striped > tbody > tr:nth-child(odd) > td {
            background-color: var(--bg-tertiary) !important;
        }
        
        .table-hover > tbody > tr:hover > td {
            background-color: var(--hover-bg) !important;
        }
        
        /* DataTables specific */
        .dataTables_wrapper {
            background-color: var(--bg-primary) !important;
            color: var(--text-primary) !important;
        }
        
        .dataTables_info,
        .dataTables_paginate,
        .dataTables_length,
        .dataTables_filter {
            color: var(--text-primary) !important;
        }
        
        .dataTables_filter input {
            background-color: var(--bg-tertiary) !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        /* All form elements */
        .form-control,
        .form-select,
        input,
        textarea,
        select {
            background-color: var(--bg-tertiary) !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        .form-control:focus,
        .form-select:focus,
        input:focus,
        textarea:focus,
        select:focus {
            background-color: var(--bg-tertiary) !important;
            border-color: var(--accent-yellow) !important;
            color: var(--text-primary) !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25) !important;
        }
        
        .form-control::placeholder,
        input::placeholder,
        textarea::placeholder {
            color: var(--text-muted) !important;
        }
        
        .form-label,
        .control-label,
        label {
            color: var(--text-primary) !important;
        }
        
        /* All buttons - preserve styling but ensure text visibility */
        .btn-light {
            background-color: var(--bg-tertiary) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        .btn-light:hover {
            background-color: var(--hover-bg) !important;
            color: var(--text-primary) !important;
        }
        
        .btn-outline-light {
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        .btn-outline-light:hover {
            background-color: var(--bg-tertiary) !important;
            color: var(--text-primary) !important;
        }
        
        /* Alerts */
        .alert {
            border: 1px solid var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        .alert-light {
            background-color: var(--bg-secondary) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        /* List groups */
        .list-group {
            background-color: var(--bg-secondary) !important;
        }
        
        .list-group-item {
            background-color: var(--bg-secondary) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        .list-group-item:hover {
            background-color: var(--hover-bg) !important;
        }
        
        /* Navigation tabs and pills */
        .nav-tabs .nav-link {
            color: var(--text-secondary) !important;
            border-color: var(--border-color) !important;
        }
        
        .nav-tabs .nav-link.active {
            background-color: var(--bg-secondary) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        .nav-pills .nav-link {
            color: var(--text-secondary) !important;
        }
        
        .nav-pills .nav-link.active {
            background-color: var(--accent-yellow) !important;
            color: #000000 !important;
        }
        
        /* Progress bars */
        .progress {
            background-color: var(--bg-tertiary) !important;
        }
        
        /* Breadcrumbs */
        .breadcrumb {
            background-color: var(--bg-secondary) !important;
        }
        
        .breadcrumb-item {
            color: var(--text-secondary) !important;
        }
        
        .breadcrumb-item.active {
            color: var(--text-primary) !important;
        }
        
        /* Badges */
        .badge-light,
        .badge.bg-light {
            background-color: var(--bg-tertiary) !important;
            color: var(--text-primary) !important;
        }
        
        /* Wells and jumbotrons */
        .well,
        .jumbotron {
            background-color: var(--bg-secondary) !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        /* Custom content sections */
        .content-section,
        .dashboard-content,
        .main-panel,
        .content-wrapper {
            background-color: var(--bg-primary) !important;
            color: var(--text-primary) !important;
        }
        
        /* Override any remaining white backgrounds */
        [class*="bg-white"],
        .bg-light {
            background-color: var(--bg-secondary) !important;
        }
        
        /* Override dark text on light backgrounds */
        .text-dark {
            color: var(--text-primary) !important;
        }
        
        /* Search and filter elements */
        .search-box,
        .filter-box {
            background-color: var(--bg-secondary) !important;
            border: 1px solid var(--border-color) !important;
        }
        
        /* Pagination */
        .pagination .page-link {
            background-color: var(--bg-secondary) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        .pagination .page-link:hover {
            background-color: var(--hover-bg) !important;
            color: var(--text-primary) !important;
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--accent-yellow) !important;
            border-color: var(--accent-yellow) !important;
            color: #000000 !important;
        }
        
        /* Tooltips and popovers */
        .tooltip-inner {
            background-color: var(--bg-secondary) !important;
            color: var(--text-primary) !important;
        }
        
        .popover {
            background-color: var(--bg-secondary) !important;
            border-color: var(--border-color) !important;
        }
        
        .popover-body {
            color: var(--text-primary) !important;
        }
        
        /* Chart containers and legends */
        .chart-container,
        .chart-legend,
        .chart-wrapper {
            background-color: var(--bg-secondary) !important;
            color: var(--text-primary) !important;
        }
        
        /* Statistics cards */
        .stat-card,
        .metric-card,
        .info-box {
            background-color: var(--bg-secondary) !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        /* Input groups */
        .input-group-text {
            background-color: var(--bg-tertiary) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        /* Pre and code elements */
        pre, code {
            background-color: var(--bg-tertiary) !important;
            color: var(--text-primary) !important;
            border: 1px solid var(--border-color) !important;
        }
        
        /* Blockquotes */
        blockquote {
            border-left: 4px solid var(--accent-yellow) !important;
            color: var(--text-secondary) !important;
        }
        
        /* Links */
        a {
            color: var(--accent-yellow) !important;
        }
        
        a:hover {
            color: #ffed4a !important;
        }
        
        /* Special theme enforcement for stubborn elements */
        body.crypt-light * {
            --bs-body-bg: var(--bg-primary) !important;
            --bs-body-color: var(--text-primary) !important;
        }
        
        body.crypt-dark * {
            --bs-body-bg: var(--bg-primary) !important;
            --bs-body-color: var(--text-primary) !important;
        }
        
        /* Force theme on Bootstrap components */
        .btn-close {
            filter: invert(1) grayscale(100%) brightness(200%);
        }
        
        body.crypt-light .btn-close {
            filter: invert(0) grayscale(0%) brightness(100%);
        }
        
        /* Ensure scrollbars match theme */
        * {
            scrollbar-color: var(--border-color) var(--bg-primary);
        }
        
        *::-webkit-scrollbar {
            background-color: var(--bg-primary);
        }
        
        *::-webkit-scrollbar-thumb {
            background-color: var(--border-color);
        }
        
        *::-webkit-scrollbar-track {
            background-color: var(--bg-secondary);
        }

        /* ========== REFERENCE DESIGN SPECIFIC STYLES ========== */
        
        /* Asset Tabs - Reference Design */
        .asset-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 16px;
        }

        .asset-tab {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .asset-tab:hover {
            background-color: var(--hover-bg);
            color: var(--text-primary);
        }

        .asset-tab.active {
            background-color: var(--accent-yellow);
            color: #000000;
            border-color: var(--accent-yellow);
            font-weight: 600;
        }

        /* Trading Cards - Reference Design */
        .trading-layout {
            display: grid;
            grid-template-columns: 280px 1fr 320px;
            gap: 20px;
            min-height: 600px;
        }

        .trading-card {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .card-header-new {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-color);
            background-color: var(--bg-secondary);
        }

        .card-title-new {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        .card-body-new {
            padding: 20px;
        }

        /* Enhanced Button Styles - Reference Design */
        .btn-add-funds-reference {
            background-color: var(--accent-yellow);
            color: #000000;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-add-funds-reference:hover {
            background-color: var(--accent-yellow-hover);
            transform: translateY(-1px);
        }

        /* Section Headers - Reference Design */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        .section-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Asset Section - Reference Design */
        .assets-section {
            margin-bottom: 24px;
        }

        /* Search Coin - Reference Design */
        .search-coin-reference {
            width: 100%;
            padding: 12px 16px;
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--text-primary);
            font-size: 14px;
            margin-bottom: 16px;
        }

        .search-coin-reference:focus {
            outline: none;
            border-color: var(--accent-yellow);
            box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.1);
        }

        .search-coin-reference::placeholder {
            color: var(--text-muted);
        }

        /* Nav Tabs - Reference Design */
        .nav-tab-reference {
            padding: 8px 16px;
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-tab-reference:hover {
            background-color: var(--hover-bg);
            color: var(--text-primary);
        }

        .nav-tab-reference.active {
            background-color: var(--accent-yellow);
            color: #000000;
            font-weight: 600;
        }

        .nav-tab-reference .badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background-color: var(--accent-red);
            color: white;
            border-radius: 10px;
            padding: 2px 6px;
            font-size: 10px;
            font-weight: 600;
            min-width: 18px;
            text-align: center;
        }

        /* Chart Container - Reference Design */
        .chart-container-reference {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--card-shadow);
        }

        .chart-placeholder-reference {
            text-align: center;
            color: var(--text-muted);
        }

        .chart-placeholder-reference i {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        .chart-placeholder-reference h5 {
            color: var(--text-primary);
            margin-bottom: 8px;
            font-weight: 600;
        }

        .chart-placeholder-reference p {
            color: var(--text-secondary);
            font-size: 14px;
        }

        /* Responsive Grid - Reference Design */
        @media (max-width: 1200px) {
            .trading-layout {
                grid-template-columns: 1fr;
                grid-template-rows: auto auto auto;
            }
        }

        @media (max-width: 768px) {
            .trading-layout {
                gap: 15px;
            }
            
            .asset-tabs {
                flex-wrap: wrap;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
        }
    </style>

    @yield('styles')
</head>

<body class="crypt-dark">
    <!-- Canvas for particle effects -->
    <canvas id="particleCanvas"></canvas>
    
    <!-- Main Layout Container -->
    <div class="crypt-layout">
        <!-- Sidebar -->
        <nav class="crypt-sidebar" id="sidebar">
            @include('partials.backend.sidebar')
        </nav>
        
        <!-- Main Content Area -->
        <div class="crypt-main">
            <!-- Header -->
            <header class="crypt-header">
                @include('partials.backend.header')
            </header>
            
            <!-- Content -->
            <main class="crypt-content">
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- Modals -->
    @include('backend.inc.modals')

    <!-- Password Change Modal -->
    <div class="modal fade" id="update_bassword_model" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('backend.update_pass') }}">
                            @csrf
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach

                            <div class="form-group mb-3">
                                <input type="password" required class="form-control" name="current_password" placeholder="Current Password">
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" required class="form-control" placeholder="New Password" name="new_password">
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" required placeholder="New Confirm Password" class="form-control" name="new_confirm_password">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        Change Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to top -->
    <a href="#" class="scrollup text-center position-fixed" style="bottom: 20px; right: 20px; z-index: 1000; width: 40px; height: 40px; background-color: var(--accent-yellow); color: #000000; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none;">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- JavaScript Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- GSAP Animation Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <!-- LocomotiveScroll -->
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.3/dist/locomotive-scroll.min.js"></script>
    
    <!-- Chart Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    
    <!-- New Theme Bootstrap JS -->
    <script src="{{ asset('new-theme/bootstrap/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Enhanced Particle Canvas Script -->
    <script>
        // Safe particle canvas initialization
        function initParticleCanvas() {
            try {
                if (typeof gsap !== 'undefined') {
                    // Initialize particle animation with GSAP
                    console.log('Particle canvas initialized with GSAP');
                } else {
                    console.log('GSAP not available, skipping particle animation');
                }
            } catch (error) {
                console.log('Particle canvas initialization error:', error);
            }
        }
        
        function updateParticleTheme(theme) {
            try {
                console.log('Updating particle theme to:', theme);
                // Add particle theme update logic here if needed
            } catch (error) {
                console.log('Particle theme update error:', error);
            }
        }
    </script>
    
    <!-- Safe Main JS Loader -->
    <script>
        // Load main.js safely to prevent errors
        document.addEventListener('DOMContentLoaded', function() {
            // Create a safe environment for main.js
            window.gsap = window.gsap || {};
            window.LocomotiveScroll = window.LocomotiveScroll || function() { return { destroy: function() {} }; };
            window.ApexCharts = window.ApexCharts || function() { return { render: function() {} }; };
            window.am5 = window.am5 || { ready: function(fn) { fn(); } };
            
            // Load the actual main.js file
            const script = document.createElement('script');
            script.src = '{{ asset('new-theme/js/main.js') }}';
            script.onerror = function() {
                console.log('main.js not found, continuing without it');
            };
            document.head.appendChild(script);
        });
    </script>
    
    <!-- Legacy Scripts for compatibility -->
    <script src="{{ asset('dist/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/moment/moment.js') }}"></script>
    <script src="{{ asset('dist/vendors/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('dist/vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/morris/morris.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/starrr/starrr.js') }}"></script>
    <script src="{{ asset('dist/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/toastr/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>

    <!-- Main Layout Script -->
    <script>
        // Global error handler for safe theme functionality
        window.addEventListener('error', function(e) {
            // Suppress common theme-related errors that don't affect functionality
            const suppressedErrors = [
                'Cannot read properties of null',
                'Cannot set properties of null', 
                'gsap is not defined',
                'LocomotiveScroll is not defined',
                'ApexCharts is not defined',
                'AmCharts is not defined',
                'Chart.instances.forEach is not a function'
            ];
            
            if (suppressedErrors.some(err => e.message.includes(err))) {
                e.preventDefault();
                console.log('Suppressed theme error (safe to ignore):', e.message);
            }
        });
        
        document.addEventListener('DOMContentLoaded', function() {
            // Theme initialization with smooth loading
            const savedTheme = localStorage.getItem('theme') || 'dark';
            
            // Apply theme immediately to prevent flashing
            function applyTheme(theme) {
                // Remove existing theme classes
                document.body.classList.remove('crypt-dark', 'crypt-light');
                
                // Apply new theme
                document.documentElement.setAttribute('data-bs-theme', theme);
                document.body.classList.add(`crypt-${theme}`);
                
                // Force update body background
                document.body.style.backgroundColor = theme === 'dark' ? '#000000' : '#ffffff';
                document.body.style.color = theme === 'dark' ? '#ffffff' : '#000000';
                
                // Update theme icon
                const themeIcon = document.querySelector('#theme-icon');
                if (themeIcon) {
                    themeIcon.className = theme === 'dark' ? 'fas fa-moon' : 'fas fa-sun';
                }
                
                // Force update all elements that might not be using CSS variables
                forceThemeUpdate(theme);
                
                // Update any dynamic theme-dependent elements
                updateThemeDependentElements(theme);
            }
            
            // Force theme update on all elements
            function forceThemeUpdate(theme) {
                // Update main containers
                const containers = document.querySelectorAll('main, .main-content, .content, .crypt-content, .page-content');
                containers.forEach(el => {
                    el.style.backgroundColor = theme === 'dark' ? '#000000' : '#ffffff';
                    el.style.color = theme === 'dark' ? '#ffffff' : '#000000';
                });
                
                // Update all cards and panels
                const cards = document.querySelectorAll('.card, .panel, .widget, .box');
                cards.forEach(el => {
                    el.style.backgroundColor = theme === 'dark' ? '#1a1a1a' : '#f8f9fa';
                    el.style.borderColor = theme === 'dark' ? '#333333' : '#dee2e6';
                    el.style.color = theme === 'dark' ? '#ffffff' : '#000000';
                });
                
                // Update all tables
                const tables = document.querySelectorAll('.table, table');
                tables.forEach(el => {
                    el.style.backgroundColor = theme === 'dark' ? '#1a1a1a' : '#f8f9fa';
                    el.style.color = theme === 'dark' ? '#ffffff' : '#000000';
                });
                
                // Update table cells
                const tableCells = document.querySelectorAll('th, td');
                tableCells.forEach(el => {
                    el.style.backgroundColor = theme === 'dark' ? '#1a1a1a' : '#f8f9fa';
                    el.style.color = theme === 'dark' ? '#ffffff' : '#000000';
                    el.style.borderColor = theme === 'dark' ? '#333333' : '#dee2e6';
                });
                
                // Update form elements
                const formElements = document.querySelectorAll('.form-control, input, textarea, select');
                formElements.forEach(el => {
                    el.style.backgroundColor = theme === 'dark' ? '#2a2a2a' : '#ffffff';
                    el.style.borderColor = theme === 'dark' ? '#333333' : '#dee2e6';
                    el.style.color = theme === 'dark' ? '#ffffff' : '#000000';
                });
                
                // Update headings and text
                const headings = document.querySelectorAll('h1, h2, h3, h4, h5, h6, p, span, div, label');
                headings.forEach(el => {
                    // Only update if it doesn't have specific color classes
                    if (!el.classList.contains('text-success') && 
                        !el.classList.contains('text-danger') && 
                        !el.classList.contains('text-warning') &&
                        !el.classList.contains('text-info')) {
                        el.style.color = theme === 'dark' ? '#ffffff' : '#000000';
                    }
                });
                
                console.log(`Force theme update applied: ${theme}`);
            }
            
            // Function to update elements that depend on theme
            function updateThemeDependentElements(theme) {
                // Update DataTables if present
                try {
                    if (typeof $ !== 'undefined' && typeof $.fn.DataTable !== 'undefined') {
                        $('.dataTable').each(function() {
                            try {
                                const table = $(this).DataTable();
                                if (table && typeof table.draw === 'function') {
                                    table.draw(false);
                                }
                            } catch (e) {
                                // Table might not be initialized, skip
                                console.log('DataTable update skipped:', e.message);
                            }
                        });
                    }
                } catch (error) {
                    console.log('DataTable theme update error (safe to ignore):', error.message);
                }
                
                // Update charts if present
                if (typeof Chart !== 'undefined') {
                    try {
                        // Handle Chart.js instances safely
                        if (Chart.instances && Array.isArray(Chart.instances)) {
                            Chart.instances.forEach(chart => {
                                if (chart && chart.options && chart.update) {
                                    chart.update('none');
                                }
                            });
                        } else if (Chart.instances && typeof Chart.instances === 'object') {
                            // Handle object-based Chart instances
                            Object.values(Chart.instances).forEach(chart => {
                                if (chart && chart.options && chart.update) {
                                    chart.update('none');
                                }
                            });
                        }
                    } catch (error) {
                        console.log('Chart update error (safe to ignore):', error.message);
                    }
                }
                
                // Update custom elements
                const customElements = document.querySelectorAll('.theme-dependent');
                customElements.forEach(el => {
                    el.setAttribute('data-theme', theme);
                });
                
                console.log('Theme applied successfully:', theme);
            }
            
            // Initialize theme
            applyTheme(savedTheme);

            // Theme toggle functionality with improved UX
            const themeToggleBtn = document.querySelector('#theme-toggle-btn');
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', function() {
                    // Add loading state
                    this.style.opacity = '0.7';
                    this.style.pointerEvents = 'none';
                    
                    const currentTheme = localStorage.getItem('theme') || 'dark';
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    
                    // Apply theme with small delay for smooth transition
                    setTimeout(() => {
                        applyTheme(newTheme);
                        localStorage.setItem('theme', newTheme);
                        
                        // Remove loading state
                        this.style.opacity = '';
                        this.style.pointerEvents = '';
                        
                        // Dispatch custom event for other components
                        window.dispatchEvent(new CustomEvent('themeChanged', {
                            detail: { theme: newTheme }
                        }));
                    }, 50);
                });
            }

            // Mobile sidebar toggle with improved UX
            const sidebarToggle = document.querySelector('#sidebar-toggle');
            const sidebar = document.querySelector('#sidebar');
            
            if (sidebarToggle && sidebar) {
                sidebarToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    sidebar.classList.toggle('show');
                    
                    // Add overlay for mobile
                    let overlay = document.querySelector('.sidebar-overlay');
                    if (sidebar.classList.contains('show')) {
                        if (!overlay) {
                            overlay = document.createElement('div');
                            overlay.className = 'sidebar-overlay';
                            overlay.style.cssText = `
                                position: fixed;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background-color: rgba(0, 0, 0, 0.5);
                                z-index: 999;
                                display: block;
                            `;
                            document.body.appendChild(overlay);
                            
                            overlay.addEventListener('click', () => {
                                sidebar.classList.remove('show');
                                overlay.remove();
                            });
                        }
                    } else if (overlay) {
                        overlay.remove();
                    }
                });
            }

            // Sidebar collapse with animation
            const collapseToggle = document.querySelector('#sidebar-collapse');
            if (collapseToggle) {
                collapseToggle.addEventListener('click', function() {
                    document.body.classList.toggle('sidebar-collapsed');
                    
                    // Save collapse state
                    const isCollapsed = document.body.classList.contains('sidebar-collapsed');
                    localStorage.setItem('sidebar-collapsed', isCollapsed);
                    
                    // Animate icon rotation
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.style.transform = isCollapsed ? 'rotate(180deg)' : 'rotate(0deg)';
                    }
                });
                
                // Restore collapse state
                const savedCollapseState = localStorage.getItem('sidebar-collapsed');
                if (savedCollapseState === 'true') {
                    document.body.classList.add('sidebar-collapsed');
                    const icon = collapseToggle.querySelector('i');
                    if (icon) {
                        icon.style.transform = 'rotate(180deg)';
                    }
                }
            }

            // Initialize particle canvas with theme awareness
            try {
                if (typeof initParticleCanvas === 'function') {
                    initParticleCanvas();
                    
                    // Listen for theme changes to update particle colors
                    window.addEventListener('themeChanged', function(e) {
                        if (typeof updateParticleTheme === 'function') {
                            updateParticleTheme(e.detail.theme);
                        }
                    });
                } else {
                    console.log('Particle canvas not available');
                }
            } catch (error) {
                console.log('Particle canvas initialization error (safe to ignore):', error.message);
            }

            // Enhanced dropdown initialization
            try {
                if (typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
                    const dropdowns = document.querySelectorAll('[data-bs-toggle="dropdown"]');
                    dropdowns.forEach(dropdown => {
                        try {
                            new bootstrap.Dropdown(dropdown);
                        } catch (e) {
                            console.log('Dropdown initialization failed for element:', dropdown);
                        }
                    });
                } else {
                    console.log('Bootstrap not loaded, skipping dropdown initialization');
                }
            } catch (error) {
                console.log('Dropdown initialization error (safe to ignore):', error.message);
            }
            
            // Close mobile sidebar when clicking outside
            document.addEventListener('click', function(e) {
                const sidebar = document.querySelector('#sidebar');
                const sidebarToggle = document.querySelector('#sidebar-toggle');
                
                if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('show')) {
                    if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                        sidebar.classList.remove('show');
                        const overlay = document.querySelector('.sidebar-overlay');
                        if (overlay) {
                            overlay.remove();
                        }
                    }
                }
            });
            
            // Handle window resize for responsive behavior
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    const sidebar = document.querySelector('#sidebar');
                    const overlay = document.querySelector('.sidebar-overlay');
                    
                    if (sidebar) {
                        sidebar.classList.remove('show');
                    }
                    if (overlay) {
                        overlay.remove();
                    }
                }
            });

            console.log('Crypt layout initialized successfully with enhanced theme support');
        });

        // Copy to clipboard function
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                if (typeof toastr !== 'undefined') {
                    toastr.success('UID copied to clipboard!');
                } else {
                    const notification = document.createElement('div');
                    notification.textContent = 'UID copied to clipboard!';
                    notification.style.cssText = `
                        position: fixed;
                        top: 20px;
                        right: 20px;
                        background: var(--accent-green);
                        color: white;
                        padding: 10px 20px;
                        border-radius: 5px;
                        z-index: 9999;
                        font-size: 14px;
                    `;
                    document.body.appendChild(notification);
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 3000);
                }
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>

    {!! setting('twak_io') !!}

    @include('partials.alerts')

    @if (session('no_deposit'))
        <script>
            $(window).on('load', function() {
                $('#makeDeposit').modal('show');
            });
        </script>
    @endif

    @if (setting('autotrader'))
    @if (Auth()->user()->trader_request == 'pending')
        <script>
            $(window).on('load', function() {
                $('.connect').modal('show');
            });
        </script>
    @endif
    @endif

    <script>
        $(document).ready( function () {
          $('#order-table table tbody tr').each(function(){
          var count = $(this).find("td").length
           if(count==0){
            $(this).remove()
           }
          })
        })

        $(window).on('load', function() {
            $("#openDeposit").button().click(function(){
                $('#makeDeposit').modal('hide');
                $('.bd-example-modal-lg').modal('show');
            });
        });
    </script>

    @yield('js')

</body>
</html>