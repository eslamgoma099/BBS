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
    
    <!-- Other Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    
    <!-- New Theme CSS Files -->
    <link rel="stylesheet" href="{{ asset('new-theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('new-theme/css/button.css') }}">
    <link rel="stylesheet" href="{{ asset('new-theme/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('new-theme/css/gsap.css') }}">
    <link rel="stylesheet" href="{{ asset('new-theme/css/particle-canvas.css') }}">

    <!-- Legacy CSS for compatibility -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- Custom Styles for Backend -->
    <style>
        :root {
            --sidebar-width: 220px;
        }

        /* Header fixes */
        .crypt-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background: var(--card-color);
            border-bottom: 1px solid var(--border-color);
            backdrop-filter: blur(10px);
        }

        /* Adjust body padding for fixed header */
        body {
            padding-top: 70px;
        }

        /* Sidebar improvements */
        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: var(--card-color);
            border-right: 1px solid var(--border-color);
            overflow-y: auto;
            z-index: 1020;
        }

        /* Main content area */
        .wrapper {
            margin-left: var(--sidebar-width);
            min-height: calc(100vh - 70px);
            padding: 20px;
            background: var(--color-bg);
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                width: 50px;
            }
            .wrapper {
                margin-left: 50px;
            }
            .sidebar-link span {
                display: none;
            }
        }

        /* Card styling */
        .card {
            background: var(--card-color);
            border: 1px solid var(--border-color);
            border-radius: 10px;
        }

        /* Table styling */
        .table-dark {
            --bs-table-bg: var(--card-color);
            --bs-table-color: var(--color-primary-300);
        }

        /* Form styling */
        .form-control {
            background-color: var(--color-input-field);
            border: 1px solid var(--border-color);
            color: var(--color-primary-100);
        }

        .form-control:focus {
            background-color: var(--color-input-field);
            border-color: var(--brand-color);
            color: var(--color-primary-100);
            box-shadow: 0 0 0 0.2rem rgba(250, 204, 21, 0.25);
        }

        /* Button improvements */
        .btn-primary {
            background-color: var(--brand-color);
            border-color: var(--brand-color);
            color: var(--color-dark);
        }

        .btn-primary:hover {
            background-color: var(--brand-hover-color);
            border-color: var(--brand-hover-color);
        }

        /* Alert styling */
        .alert {
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        /* Modal styling */
        .modal-content {
            background: var(--card-color);
            border: 1px solid var(--border-color);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
        }
    </style>

    @yield('styles')
</head>

<body class="crypt-dark">
    <!-- Canvas for particle effects -->
    <canvas id="particleCanvas"></canvas>
    
    <!-- Header -->
    @include('partials.backend.header')
    
    <section class="d-flex">
        <!-- Sidebar -->
        @include('partials.backend.sidebar')
        
        <!-- Main Content -->
        <div class="wrapper">
            <!-- Page Content -->
            @yield('content')
            
            <!-- Modals -->
            @include('backend.inc.modals')
        </div>
    </section>

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
    <a href="#" class="scrollup text-center position-fixed" style="bottom: 20px; right: 20px; z-index: 1000;">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- JavaScript Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- New Theme Bootstrap JS -->
    <script src="{{ asset('new-theme/bootstrap/bootstrap.bundle.min.js') }}"></script>
    
    <!-- New Theme JavaScript -->
    <script src="{{ asset('new-theme/js/particle-canvas.js') }}"></script>
    <script src="{{ asset('new-theme/js/main.js') }}"></script>
    
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

    <!-- Theme Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize theme
            const savedTheme = localStorage.getItem('theme') || 'dark';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
            document.body.className = savedTheme === 'dark' ? 'crypt-dark' : 'crypt-light';

            // Theme toggle functionality
            const toggleTheme = () => {
                const currentTheme = document.documentElement.getAttribute('data-bs-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                document.documentElement.setAttribute('data-bs-theme', newTheme);
                document.body.className = newTheme === 'dark' ? 'crypt-dark' : 'crypt-light';
                localStorage.setItem('theme', newTheme);
            };

            // Add event listener to theme toggle button if it exists
            const themeToggleBtn = document.querySelector('.controller');
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', toggleTheme);
            }

            // Initialize particle canvas if available
            if (typeof initParticleCanvas === 'function') {
                initParticleCanvas();
            }

            // Sidebar collapse functionality
            const sidebarToggle = document.querySelector('#sidebar-collapse');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    document.body.classList.toggle('sidebar-close');
                });
            }

            // Mobile sidebar toggle
            const mobileSidebarToggle = document.querySelector('#sidebar-mobile-toggle');
            if (mobileSidebarToggle) {
                mobileSidebarToggle.addEventListener('click', function() {
                    document.body.classList.toggle('sidebar-mobile-close');
                });
            }
        });
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