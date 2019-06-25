@foreach($menuList as $key => $menu)
	@if(isset($menu['url']))
		@if(auth()->user()->hasPerm($menu['perm']))
		<li>
			<a href="{{ $menu['url'] }}">
				<i class="fa fa-{{ $menu['icon'] }}" aria-hidden="true"></i>
				<span>{{ $key }}</span>
			</a>
		</li>
		@endif
	@else
		<li class="nav-parent">
			<a>
				<i class="fa fa-folder" aria-hidden="true"></i>
				<span>{{ $key }}</span>
			</a>
			<ul class="nav nav-children">
				@include('backend.layouts.menu', ['menuList' => $menu])
			</ul>
		</li>
	@endif
@endforeach