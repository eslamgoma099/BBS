{{-- New Theme Alert Messages --}}
@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof toastr !== 'undefined') {
            toastr.success("{{ session('success') }}", "Success", {
                closeButton: true,
                debug: false,
                newestOnTop: true,
                progressBar: true,
                positionClass: "toast-top-right",
                preventDuplicates: true,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: true
            });
        } else {
            // Fallback to regular alert if toastr is not available
            alert("Success: {{ session('success') }}");
        }
    });
</script>
@endif

@if (session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof toastr !== 'undefined') {
            toastr.error("{{ session('error') }}", "Error", {
                closeButton: true,
                debug: false,
                newestOnTop: true,
                progressBar: true,
                positionClass: "toast-top-right",
                preventDuplicates: true,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: true
            });
        } else {
            alert("Error: {{ session('error') }}");
        }
    });
</script>
@endif

@if (session('warning'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof toastr !== 'undefined') {
            toastr.warning("{{ session('warning') }}", "Warning", {
                closeButton: true,
                debug: false,
                newestOnTop: true,
                progressBar: true,
                positionClass: "toast-top-right",
                preventDuplicates: true,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: true
            });
        } else {
            alert("Warning: {{ session('warning') }}");
        }
    });
</script>
@endif

@if (session('info'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof toastr !== 'undefined') {
            toastr.info("{{ session('info') }}", "Info", {
                closeButton: true,
                debug: false,
                newestOnTop: true,
                progressBar: true,
                positionClass: "toast-top-right",
                preventDuplicates: true,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: true
            });
        } else {
            alert("Info: {{ session('info') }}");
        }
    });
</script>
@endif

@if (session('failure'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof toastr !== 'undefined') {
            toastr.error("{{ session('failure') }}", "Failure", {
                closeButton: true,
                debug: false,
                newestOnTop: true,
                progressBar: true,
                positionClass: "toast-top-right",
                preventDuplicates: true,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: true
            });
        } else {
            alert("Failure: {{ session('failure') }}");
        }
    });
</script>
@endif

{{-- Display Laravel validation errors --}}
@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach ($errors->all() as $error)
        if (typeof toastr !== 'undefined') {
            toastr.error("{{ $error }}", "Validation Error", {
                closeButton: true,
                debug: false,
                newestOnTop: true,
                progressBar: true,
                positionClass: "toast-top-right",
                preventDuplicates: true,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: true
            });
        } else {
            alert("Error: {{ $error }}");
        }
        @endforeach
    });
</script>
@endif