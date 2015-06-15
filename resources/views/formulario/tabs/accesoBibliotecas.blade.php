<form role="form" action="formulario/accBlibliotecaProcDatos" method="post" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div id="formularioAccesoBibliotecas1" class="row blockAccesoBibliotecas">
		<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<label>Si tiene acceso a biblioteca (s) o centros de documentación. Indique a cuáles</label>
			</div>
			<div class="col-md-6">
				<label>Si tiene acceso y conocimientos acerca de programas para el  procesamiento de datos. Nombre estos en forma  breve.</label>
			</div>
		</div>
			<div class="col-md-6">
				<div class="container">
				    <div class="row clearfix">
						<div class="col-md-12 column">
							<table class="table table-bordered table-hover" id="tab_logic_biblioteca">
								<thead>
									<tr >
										<th class="text-center">
											#
										</th>
										<th class="text-center">
											Bibliotecas
										</th>
									</tr>
								</thead>
								<tbody>
									<?php $count = 1; ?>
									@if($user->formulario->informacion_aspirante->acceso_bibliotecas->isEmpty())
										<tr id='addrBiblioteca0'>
											<td>
												1
											</td>
											<td>
												<input type="text" name='biblioteca[]'  placeholder='Biblioteca' class="form-control"/>
											</td>
										</tr>
										<?php $count = $count + 1; ?>
									@else
										@foreach($user->formulario->informacion_aspirante->acceso_bibliotecas as $acceso_biblioteca)
										<tr id='addrBiblioteca{{ $count-1 }}'>
											<td>
												{{ $count }}
											</td>
											<td>
												<input type="text" name='biblioteca[]'  placeholder='Biblioteca' class="form-control" value="{{ $acceso_biblioteca->Bib_Nombre }}" />
											</td>
										</tr>
											<?php $count = $count + 1; ?>
										@endforeach
									@endif
									<tr id='addrBiblioteca{{ $count-1 }}'></tr>
								</tbody>
							</table>
						</div>
					</div>
					<a id="add_row_biblioteca" class="btn btn-primary pull-left">+</a><a id='delete_row_biblioteca' class="col-md-offset-1 btn btn-danger">-</a>
				</div>
			</div>
			<!-- Termina col-md-6-->

			<div class="col-md-6">
				<div class="container">
				    <div class="row clearfix">
						<div class="col-md-12 column">
							<table class="table table-bordered table-hover" id="tab_logic_procesamientoDatos">
								<thead>
									<tr >
										<th class="text-center">
											#
										</th>
										<th class="text-center">
											Procesamiento de Datos
										</th>
									</tr>
								</thead>
								<tbody>
									<?php $count = 1; ?>
									@if($user->formulario->informacion_aspirante->acceso_procesamiento_datos->isEmpty())
										<tr id='addrProcesamientoDatos0'>
											<td>
											1
											</td>
											<td>
											<input type="text" name='procesamiento_datos[]'  placeholder='Prosesamiento de Datos' class="form-control"/>
											</td>
										</tr>
										<?php $count = $count + 1; ?>
									@else
										@foreach($user->formulario->informacion_aspirante->acceso_procesamiento_datos as $acceso_procesamiento_datos)
											<tr id='addrProcesamientoDatos{{ $count-1 }}'>
												<td>
													{{ $count }}
												</td>
												<td>
													<input type="text" name='procesamiento_datos[]'  placeholder='Prosesamiento de Datos' class="form-control" value="{{ $acceso_procesamiento_datos->PDa_Nombre }}"/>
												</td>
											</tr>
											<?php $count = $count + 1; ?>
										@endforeach
									@endif
									<tr id='addrProcesamientoDatos{{ $count-1 }}'></tr>
								</tbody>
							</table>
						</div>
					</div>
					<a id="add_row_procesamientoDatos" class="btn btn-primary pull-left">+</a><a id='delete_row_procesamientoDatos' class="col-md-offset-1 btn btn-danger">-</a>
				</div>
			</div>
			<!-- Termina col-md-6-->
		</div>
		<hr class="soften">
	</div>
	<div>
		<input id="btnActualizarBibliotecasYprocesamientoDatos" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">
		<input id="btnCancelarBibliotecas" class="btn btn-warning btn-lg pull-right" type="button" onClick="cancelarActualizacion()" value="Cancelar">
	</div>
</form>