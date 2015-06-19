<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<label><b>a. ¿TIENE ACCESO A WINDOWS? </b>
				@if((!is_null($user->formulario->informacion_aspirante->Asp_Acceso_Windows)) 
				|| ($user->formulario->informacion_aspirante->Asp_Acceso_Windows)) Sí.
				@else No.
				@endif
			</label>
			<br />
			<label><b>a. ¿TIENE ACCESO A CORREO ELECTRÓNICO? </b>
				@if((!is_null($user->formulario->informacion_aspirante->Asp_Acceso_Email))
				|| ($user->formulario->informacion_aspirante->Asp_Acceso_Email)) Sí.				
				@else No.
				@endif
			</label>
		</div>
		<div class="col-md-6">			
			<div class="row clearfix">
				<div class="col-md-12 column">
					<table class="table table-bordered table-hover" id="tab_logic_biblioteca">
						<thead>
							<tr><th class="text-center"><b>Programas de computación que utiliza</b></th></tr>
						</thead>
						<tbody>
							@if(!$user->formulario->informacion_aspirante->acceso_programas_computacionales->isEmpty())	
								@foreach($user->formulario->informacion_aspirante->acceso_programas_computacionales as $acceso_programas)
									<tr><td>{{ $acceso_programas->Prog_Nombre }}</td></tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<br/>