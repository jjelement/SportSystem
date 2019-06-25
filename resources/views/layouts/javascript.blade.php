<script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/theme-scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/theme-main.js') }}"></script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@stack('javascript')