<br/>
<div class="row">
    <h3 class="col-md-12"><b>CONOCIMIENTO DE IDIOMAS DISTINTOS AL MATERNO:</b></h3>
</div>
<div class="col-md-12">
	<table class="table table-striped">
	<thead>
		<tr>
			<th class="text-center"><b>Idioma</b></th>
			<th class="text-center"><b>Nivel de Escritura</b></th>
			<th class="text-center"><b>Nivel de Lectura</b></th>
			<th class="text-center"><b>Nivel Conversacional</b></th>
			<th class="text-center"><b>¿Posee MCA?</b></th>
		</tr>
	</thead>
	<tbody>
		@foreach($user->formulario->informacion_aspirante->conocimiento_idiomas as $idioma)
			<tr>
				<td>{{ $idioma->Idm_Idioma }}</td>
				<td>{{ $idioma->nivel_idioma_escritura->Niv_Nombre }}</td>
				<td>{{ $idioma->nivel_idioma_lectura->Niv_Nombre }}</td>
				<td>{{ $idioma->nivel_idioma_conversacional->Niv_Nombre }}</td>
				<td><a href="{{ '/storage/certificates/'.$idioma->Idm_Adjunto }}" target="_blank">{{ $idioma->Idm_Adjunto }}</a></td>
			</tr>
		@endforeach
	</tbody>
	</table>
</div>
<br/>