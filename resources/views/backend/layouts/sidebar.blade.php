<aside id="sidebar-left" class="sidebar-left">

	<div class="sidebar-header">
		<div class="sidebar-title">
			Menu
		</div>
		<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<ul class="nav nav-main">
					<li>
						<a href="{{ route('backend.home') }}">
							<i class="fa fa-dashboard" aria-hidden="true"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="{{ route('backend.event.index') }}">
							<i class="fa fa-star" aria-hidden="true"></i>
							<span>Event</span>
						</a>
					</li>
					<li>
						<a href="{{ route('backend.slide.index') }}">
							<i class="fa fa-image" aria-hidden="true"></i>
							<span>Slide</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</aside>