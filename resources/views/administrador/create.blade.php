@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Crear Administrador</div>

				<div class="panel-body">
					@if (count($errors) > 0)
						@include('administrador.partials.alert_danger')
					@else
						@include('administrador.partials.alert_success')
					@endif

					<form class="form-horizontal" method="post" action="{{url('/admin/users') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<!-- Nombre Completo -->
						<div class="form-group">
							<label for="nombre_completo" class="col-md-4 control-label">Nombre Completo: </label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre_completo">
							</div>
						</div>

						<!-- Email -->
						<div class="form-group">
							<label for="email" class="col-md-4 control-label">Correo Electrónico: </label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="email">
							</div>
						</div>

						<!-- Contraseña -->
						<div class="form-group">
							<label for="password" class="col-md-4 control-label">Contraseña: </label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<!-- Confirmación de Contraseña -->
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
@endsection