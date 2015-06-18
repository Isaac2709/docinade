@extends('administrador.dashboard')

@section('admin_active')
	class="active"
@endsection

@section('page_title')
	Editar Administrador
@endsection

@section('parent_pages')
	<li><a href="{{ url('/admin/admins')}}">Administradores</a></li>
@endsection

@section('page_header')
	Editar Administrador
@endsection
@section('content')
	<div class="panel-body">
		@if (count($errors) > 0)
			@include('administrador.partials.alert_danger')
		@else
			@include('administrador.partials.alert_success')
		@endif

		<form class="form-horizontal" method="POST" action="{{ route('admin.admins.update', $admin->Usu_ID) }}">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<!-- Nombre Completo -->
			<div class="form-group">
				<label for="nombre_completo" class="col-md-4 control-label">Nombre Completo: </label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="nombre_completo" value="{{ $admin->Usu_Nombre }}">
				</div>
			</div>

			<!-- Email -->
			<div class="form-group">
				<label for="email" class="col-md-4 control-label">Correo Electrónico: </label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="email" value="{{ $admin->email }}">
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
					<input type="submit" class="btn btn-primary" value="Editar">
				</div>
			</div>
		</form>
	</div>
@endsection
