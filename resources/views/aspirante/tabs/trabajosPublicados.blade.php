<div class="row">
    <h3 class="col-md-12"><b>TRABAJOS E INVESTIGACIONES PUBLICADAS:</b></h3>
	<div class="col-md-12">
		<table class="table table-striped">
		<thead>
			<tr>
				<th><b>Título de la Publicación</b></th>
				<th><b>Título del Medio de Publicación<br />y País de Publicación</b></th>
				<th><b>Año</b></th>
			</tr>
		</thead>
		<tbody>
			@foreach($user->formulario->informacion_aspirante->publicaciones_desc as $public)
				<tr>
					<td>{{ $public->Pub_Titulo }}</td>
					<td>{{ $public->Pub_Medio }}
						@if(!is_null($public->Pub_ID_Pais)) ,{{ $public->pais->Pais_Nombre }}
						@endif
					</td>
					<td>{{ $public->Inv_Anio }}</td>
				</tr>
			@endforeach
		</tbody>
		</table>
	</div>
<br/>
</div>