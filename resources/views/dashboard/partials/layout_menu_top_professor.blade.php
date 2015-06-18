<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!-- <a class="navbar-brand" href="#"><span>Lumino</span>Admin</a> -->
			<img class="navbar-brand" src="{{ url('http://docinade.com/wp-content/uploads/2014/10/docinade_logo2.png') }}" alt="Doctorado en Ciencias Naturales para el Desarrollo Logo">
			<ul class="user-menu">
				<li class="dropdown pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->Usu_Nombre }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ URL::route('profesor.perfil.show', Auth::user()->Usu_ID) }}"><span class="glyphicon glyphicon-user"></span> {{ trans('dashboard.top_menu.profile') }}</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-cog"></span> {{ trans('dashboard.top_menu.settings') }}</a></li>
						<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> {{ trans('dashboard.top_menu.logout') }}</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.container-fluid -->
</nav>