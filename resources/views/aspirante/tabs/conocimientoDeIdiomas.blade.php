<br/>
<div class="row">
    <h3 class="col-md-12"><b>CONOCIMIENTO DE IDIOMAS DISTINTOS AL MATERNO:</b></h3>
</div>
<div class="col-md-12">
	<table class="table table-striped">
	<thead>
		<tr>
			<th><b>Idioma</b></th>
			<th><b>Nivel de Escritura</b></th>
			<th><b>Nivel de Lectura</b></th>
			<th><b>Nivel Conversacional</b></th>
			<th><b>¿Posee MCA?</b></th>
		</tr>
	</thead>
	<tbody>
		@foreach($user->formulario->informacion_aspirante->conocimiento_idiomas as $public)
			<tr>
				<td>{{ $public->Idm_Idioma }}</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		@endforeach
	</tbody>
	</table>
</div>
<br/>