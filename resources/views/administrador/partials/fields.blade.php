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