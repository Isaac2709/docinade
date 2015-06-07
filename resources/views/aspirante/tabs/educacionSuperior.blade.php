<div class="row">
    <h3 class="col-md-12"><b>EDUCACIÓN SUPERIOR:</b></h3>
    <div class="col-md-12">
		<table class="table table-striped">
		<thead>
			<tr>				
				<th class="text-center"><b>Institución, País</b></th>
				<th class="text-center"><b>Área de Especialidad</b></th>
				<th class="text-center"><b>Grado Académico</b></th>
				<th class="text-center"><b>Año de Graduación</b></th>
			</tr>
		</thead>
		<tbody>
			@foreach($user->formulario->informacion_aspirante->educacion_superior as $edSup)
				<tr>
					<td>
						@if(!is_null($edSup->Sup_ID_Institucion)) {{ $edSup->institucion->Ins_Nombre }}
						@endif
						@if(!is_null($edSup->Sup_ID_Pais)) , {{ $edSup->pais->Pais_Nombre }}
						@endif
					</td>
					<td>
						@if(!is_null($edSup->Sup_ID_Area_Esp)) {{ $edSup->area_especialidad->Esp_Area }}
						@endif
					</td>
					<td>
						@if(!is_null($edSup->Sup_ID_Grado_Acad)) {{ $edSup->grado_academico->Gra_Nombre }}
						@endif
					</td>
					<td>{{ $edSup->Sup_Anio_Grad }}</td>
				</tr>
			@endforeach
		</tbody>
		</table>
	</div>
	<br/>
</div>