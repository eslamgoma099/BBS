<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ setting('site_name') }}</title>
    <link rel="shortcut icon" href="{{ setting('favicon', '/asset/images/logosm.png') }}" />
    @if (setting('disable_mobile_view', 1) == 0)
        <meta name="viewport" content="width=device-width,initial-scale=1">
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Essential CSS -->
    <link rel="stylesheet" href="{{ asset('dist/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">

      <!-- Bootstrap CSS -->
      <link href="{{ asset('assets1/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
      <!-- FontAwesome Icons من CDN -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
      
      <!-- Custom Theme CSS -->
      <link href="{{ asset('assets1/css/crypt-theme.css') }}" rel="stylesheet">
      
     
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

    <!-- Crypt Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/crypt-theme.css') }}">

    @yield('styles')
</head>

<body id="main-container" class="default crypt-dark">

<div id="app_secret">
    <!-- Header -->
    @include('partials.backend.header')

    <!-- Sidebar -->
    @include('partials.backend.sidebar')

    <!-- Main Content -->
    <main>
        @yield('content')
        @include('backend.inc.modals')
    </main>
</div>

<!-- Password Change Modal -->
<div class="modal fade" id="update_bassword_model" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('backend.update_pass') }}">
                        @csrf
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach

                        <div class="form-group">
                            <input type="password" required class="form-control" name="current_password" placeholder="Current Password">
                        </div>

                        <div class="form-group">
                            <input type="password" required class="form-control" placeholder="New Password" name="new_password">
                        </div>

                        <div class="form-group">
                            <input type="password" required placeholder="New Confirm Password" class="form-control" name="new_confirm_password">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" style="width: 100%">
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
<a href="#" class="scrollup text-center">
    <i class="icon-arrow-up"></i>
</a>

<!-- JavaScript Files -->


<script src="{{ asset('assets1/js/jquery-3.6.0.min.js') }}"></script>
    
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets1/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Custom Theme JS -->
    <script src="{{ asset('assets1/js/crypt-theme.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('dist/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('dist/vendors/moment/moment.js') }}"></script>
<script src="{{ asset('dist/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/vendors/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('dist/vendors/flag-select/js/jquery.flagstrap.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('dist/js/app.js') }}"></script>
<script src="{{ asset('dist/vendors/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('dist/vendors/morris/morris.min.js') }}"></script>
<script src="{{ asset('dist/vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('dist/vendors/starrr/starrr.js') }}"></script>
<script src="{{ asset('dist/vendors/jquery-flot/jquery.canvaswrapper.js') }}"></script>
<script src="{{ asset('dist/vendors/jquery-flot/jquery.colorhelpers.js') }}"></script>
<script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.js') }}"></script>
<script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.saturated.js') }}"></script>
<script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.browser.js') }}"></script>
<script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.drawSeries.js') }}"></script>
<script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.uiConstants.js') }}"></script>
<script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.legend.js') }}"></script>
<script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('dist/vendors/bootstrap-tour/js/bootstrap-tour-standalone.min.js') }}"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.16/sorting/numeric-comma.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
<script src="{{ asset('dist/js/home.script.js') }}"></script>
<script src="{{ asset('dist/vendors/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('dist/vendors/toastr/toastr.min.js') }}"></script>

{!! setting('twak_io') !!}

<script src="{{ mix('js/app.js') }}"></script>

<!-- Crypt Theme JavaScript -->
<script src="{{ asset('js/crypt-theme.js') }}"></script>

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
