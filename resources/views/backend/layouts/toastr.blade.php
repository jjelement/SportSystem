
@if(session('toastr.success'))
	@push('javascript')
		<script type="text/javascript">
			toastr.success("{!! session('toastr.success') !!}");
		</script>
	@endpush
@endif

@if(session('toastr.error'))
	@push('javascript')
		<script type="text/javascript">
			toastr.error("{!! session('toastr.error') !!}");
		</script>
	@endpush
@endif