@extends('index')

@section('parent_pages')
<h6><a href="/formulario">Formulario de admisión</a></h6>
@endsection


@section('page_title')
	Registrarse
@endsection

@section('content')
<div class="post-45 page type-page status-publish hentry">
    <div class="widget-main2">
		<div class="panel panel-default">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading">Registrarse</div>
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

								<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="form-group">
										<label class="col-md-4 control-label">Nombre</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="name" value="{{ old('name') }}">
										</div>
									</div>

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
										<label class="col-md-4 control-label">Confirmar Contraseña</label>
										<div class="col-md-6">
											<input type="password" class="form-control" name="password_confirmation">
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-primary">
												Registrar
											</button>
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