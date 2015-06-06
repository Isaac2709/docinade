<form role="form" action="formulario/accProgramasComputo" method="post" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div id="formularioManejoDeProgramas1" class="row blockManejoDeProgramas">
		<div class="row">
			<div class="col-md-6">
				<h2>Acceso y manejo de:</h2>
				<div class="form-group">
					<label for="windows" class="col-md-4 control-label labelWindows">Ambiente Windows:</label>
					<div class="col-md-8">
						<input type="checkbox" @if($user->formulario->informacion_aspirante->Asp_Acceso_Windows) checked @endif data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="primary" data-offstyle="danger" name="windows" id="windows">
					</div>
				</div>

				<div class="form-group">
					<label for="correoElectronico" class="col-md-4 control-label labelWindows">Correo Electrónico:</label>
					<div class="col-md-8">
						<input type="checkbox" @if($user->formulario->informacion_aspirante->Asp_Acceso_Email) checked @endif data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="primary" data-offstyle="danger" name="correoElectronico" id="correoElectronico">
					</div>
				</div>
			</div>
			 <div class="col-md-6">
			 	<label>Si utiliza programas de computación indique cuáles.</label>
				<div class="container">
				    <div class="row clearfix">
						<div class="col-md-12 column">
							<table class="table table-bordered table-hover" id="tab_logic_programas">
								<thead>
									<tr >
										<th class="text-center">
											#
										</th>
										<th class="text-center">
											Programas
										</th>
									</tr>
								</thead>
								<tbody>
									@if($user->formulario->informacion_aspirante->acceso_programas_computacionales->isEmpty())
										<tr id='addrProgramas0'>
											<td>
											1
											</td>
											<td>
											<input type="text" name='programa[]'  placeholder='Programa' class="form-control"/>
											</td>
										</tr>
										<tr id='addrProgramas1'></tr>
									@else
										<?php $count = 1; ?>
										@foreach($user->formulario->informacion_aspirante->acceso_programas_computacionales as $acceso_programa_computacional)
										<tr id='addrProgramas{{ $count-1 }}'>
											<td>
												{{ $count }}
											</td>
											<td>
												<input type="text" name='programa[]'  placeholder='Programa' class="form-control" value="{{ $acceso_programa_computacional->Prog_Nombre }}" />
											</td>
										</tr>
											<?php $count = $count + 1; ?>
										@endforeach
										<tr id='addrProgramas{{ $count-1 }}'></tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
					<a id="add_row_programas" class="btn btn-primary pull-left">+</a><a id='delete_row_programas' class="col-md-offset-1 btn btn-danger">-</a>
				</div>
			</div>
		</div>
		<hr class="soften">
	</div>
	<div class="col-md-11">
		<input id="btnActualizarBibliotecasYprocesamientoDatos" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">
		<input id="btnCancelarManejoDeProgamas" class="btn btn-warning btn-lg pull-right" type="button" onClick="cancelarActualizacion()" value="Cancelar">
	</div>
	<br/>
</form>