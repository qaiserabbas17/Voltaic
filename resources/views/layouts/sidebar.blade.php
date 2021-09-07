<!-- Sidebar menu-->
<style>
aside.app-sidebar {
    overflow-y: scroll;
}
</style>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<div class="app-sidebar__user">
		<div class="user-body">
			<span class="avatar avatar-lg brround text-center cover-image" data-image-src="{{ asset('/assets/images/users/5.jpg') }}"></span>
		</div>
		<div class="user-info">
			<a href="{{ route('Dashboard')}}" class="ml-2"><span class="text-dark app-sidebar__user-name font-weight-semibold">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span><br>
				
			</a>
		</div>
	</div>
	
	<ul class="side-menu">
		
		@foreach(Auth::user()->getmodules() as $module)
		<li>
			<a class="side-menu__item" href="{{ route( $module->route)}}"><i @php echo html_entity_decode($module->icon) @endphp></i><span class="side-menu__label">{{ $module->name}}</span></a>
		</li>
		@endforeach
	</ul>
</aside>
<!--side-menu-->