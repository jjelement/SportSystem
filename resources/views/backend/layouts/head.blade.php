<head>
	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Backend</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}" />

	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />

	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />
	
    <link rel="stylesheet" href="{{ asset('assets/vendor/summernote/summernote.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/summernote/summernote-bs3.css') }}" />
    
	<link rel="stylesheet" href="{{ asset('assets/vendor/codemirror/lib/codemirror.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/loading.css') }}" type="text/css" />
	
	<style type="text/css">
		.clearfix.mt {
			margin-bottom: 15px;
		}
		.select2-results,
		.select2-chosen {
			font-family: 'FontAwesome', Helvetica;
		}
	</style>

	<!-- Specific Page Vendor CSS -->
	@stack('stylesheet')

	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{ asset('assets/backend/stylesheets/theme.css') }}" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="{{ asset('assets/backend/stylesheets/skins/default.css') }}" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="{{ asset('assets/backend/stylesheets/theme-custom.css') }}">

	<!-- Head Libs -->
	<script src="{{ asset('assets/vendor/modernizr/modernizr.js') }}"></script>
</head>