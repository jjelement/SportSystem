@if ($errors->any() || session('error'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		@php($errorList = session('error', $errors->all()))
		@if(is_array($errorList))
			<ul>
				@foreach($errorList as $error)
					<li>{!! $error !!}</li>
				@endforeach
			</ul>
		@else
			<p><i class="fa fa-times"></i> {!! session('error') !!}</p>
		@endif
	</div>
@endif

@if(session('success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<p><i class="fa fa-check"></i> {!! session('success') !!}</p>
	</div>
@endif