<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif
    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif
    @if (session('info'))
        toastr.info("{{ session('info') }}");
    @endif
    @if (session('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000"
    };
</script>