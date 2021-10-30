<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin') }}/js/adminlte.min.js"></script>
<script src="{{ asset('admin') }}/js/bs-custom-file-input.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script')
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif
    $(document).ready(function () {
        bsCustomFileInput.init()
    })
</script>
</body>
</html>
