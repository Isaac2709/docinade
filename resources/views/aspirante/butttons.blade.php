<br /><br />
<hr class="soften">
<div class="row">
	<div class="form-group">
		<a class="btn btn-primary col-md-offset-8" target="_blank" href="{{'../pdfformulario/'.$user->Usu_ID}}">Generar PDF</a>
		<a class="btn btn-primary" target="_blank" href="{{'../docformulario/'.$user->Usu_ID}}">Generar Doc</a>
		<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
		@if($user->formulario->informacion_aspirante->Asp_Estado_Formulario == "Enviado")
			<a class="btn btn-success" href="{{'../revFormulario/'.$user->Usu_ID}}">
		Revisado</a>
		@endif
		</div>
</div>