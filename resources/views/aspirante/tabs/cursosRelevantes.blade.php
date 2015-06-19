<div class="row">
    <h3 class="col-md-12"><b>CURSOS Y SEMINARIOS MÁS RELEVANTES:</b></h3>    
    <div class="col-md-12">
		<table class="table table-striped">
		<thead>
			<tr>				
				<th class="text-center"><b>Nombre de Actividad</b></th>
				<th class="text-center"><b>Institución y Lugar</b></th>
				<th class="text-center"><b>Año</b></th>
			</tr>
		</thead>
		<tbody>
			@foreach($user->formulario->informacion_aspirante->cursos_seminarios as $public)
				<tr>
					<td>{{ $public->CSe_Actividad }}</td>
					<td>
						{{ $public->CSe_Institucion }}					
						@if(!is_null($public->CSe_Lugar)) ,{{ $public->CSe_Lugar }}
						@endif
					</td>
					<td>{{ $public->CSe_Annio }}</td>
				</tr>
			@endforeach
		</tbody>
		</table>
	</div>
	<br/>
</div>