<!-- Vendor -->
<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

<script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>

<script src="{{ asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('assets/backend/js/typeahead.js') }}"></script>
<script src="{{ asset('assets/vendor/ios7-switch/ios7-switch.js') }}"></script>
<script src="{{ asset('assets/backend/js/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/summernote/summernote.js') }}"></script>

<!-- Specific Page Vendor -->
@stack('javascript')

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('assets/backend/javascripts/theme.js') }}"></script>

<!-- Theme Custom -->
<script src="{{ asset('assets/backend/javascripts/theme.custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('assets/backend/javascripts/theme.init.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function() {
	    if($('.summernote').length) {
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol']],
                    ['insert', ['link', 'picture', 'video']]
                ]
            });
        }

        const $navList = $('nav#menu a[href="{{ url()->current() }}"]').parents('li');
        if($navList.length > 0) {
            $.each($navList, function(i, nav) {
                $(nav).addClass('nav-active');
                if($(nav).hasClass('nav-parent')) $(nav).addClass('nav-expanded');
            })
        }
	});
    
</script>
