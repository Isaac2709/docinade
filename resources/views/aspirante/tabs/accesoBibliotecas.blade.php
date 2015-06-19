<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<label><b>a. ¿TIENE ACCESO A BIBLIOTECA(S) O CENTRO(S) DE DOCUMENTACIÓN? </b>
			@if(!is_null($user->formulario->informacion_aspirante->acceso_procesamiento_datos)) Sí.
			@else No.
			@endif</label>
		</div>
		<div class="col-md-6">
			<label><b>b. ¿TIENE ACCESO Y CONOCIMIENTOS ACERCA DE PROGRAMAS PARA PROCESAMIENTO DE DATOS? </b>
			@if(!is_null($user->formulario->informacion_aspirante->acceso_programas_computacionales)) Sí.
			@else No.
			@endif</label>
		</div>
	</div>			
	<div class="col-md-6">		
		<div class="row clearfix">
			<div class="col-md-12 column">
				<table class="table table-bordered table-hover" id="tab_logic_biblioteca">
				<thead>
					<tr><th class="text-center"><b>Biblioteca/Centro Documentación</b></th></tr>
				</thead>
				<tbody>
					@if(!$user->formulario->informacion_aspirante->acceso_bibliotecas->isEmpty())
						@foreach($user->formulario->informacion_aspirante->acceso_bibliotecas as $acceso_biblioteca)
							<tr><td>{{ $acceso_biblioteca->Bib_Nombre }}</td></tr>
						@endforeach
					@endif
				</tbody>
				</table>
			</div>
		</div>
	</div>	
	<div class="col-md-6">		
		<div class="row clearfix">
			<div class="col-md-12 column">
				<table class="table table-bordered table-hover" id="tab_logic_biblioteca">
				<thead>
					<tr><th class="text-center"><b>Programas para Procesamiento de Datos</b></th></tr>
				</thead>
				<tbody>
					@if(!$user->formulario->informacion_aspirante->acceso_programas_computacionales->isEmpty())
						@foreach($user->formulario->informacion_aspirante->acceso_procesamiento_datos as $acceso_programas)
							<tr><td>{{ $acceso_programas->PDa_Nombre }}</td></tr>
						@endforeach
					@endif
				</tbody>
				</table>
			</div>
		</div>
	</div>
	<br/>
</div>