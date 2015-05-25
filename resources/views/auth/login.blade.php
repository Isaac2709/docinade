@extends('index')

@section('parent_pages')
<h6><a href="/formulario">Formulario de admisión</a></h6>
@endsection


@section('page_title')
	Iniciar sesión
@endsection

@section('content')
<div class="post-45 page type-page status-publish hentry">
    <div class="widget-main2">
		<div class="panel panel-default">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading">Login</div>
							<div class="panel-body">
								@if (count($errors) > 0)
									<div class="alert alert-danger">
										<strong>Whoops!</strong> Hubieron algunos problemas con las entradas.<br><br>
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

								<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="form-group">
										<label class="col-md-4 control-label">Correo Electrónico</label>
										<div class="col-md-6">
											<input type="email" class="form-control" name="email" value="{{ old('email') }}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Contraseña</label>
										<div class="col-md-6">
											<input type="password" class="form-control" name="password">
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="remember"> Recuérdame
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-primary">Iniciar Sesión</button>

											<a class="btn btn-link" href="{{ url('/password/email') }}">¿Olvidó su Contraseña?</a>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											¿No tienes una cuenta?

											<a class="btn btn-link" href="{{ url('/auth/register') }}">Regístrate</a>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection