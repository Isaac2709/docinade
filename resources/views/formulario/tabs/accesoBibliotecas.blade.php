<form role="form" action="#" method="post" class="form-horizontal">
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
									<tr id='addrBiblioteca0'>
										<td>
										1
										</td>
										<td>
										<input type="text" name='biblioteca0'  placeholder='Biblioteca' class="form-control"/>
										</td>
									</tr>
				                    <tr id='addrBiblioteca1'></tr>
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
									<tr id='addrProcesamientoDatos0'>
										<td>
										1
										</td>
										<td>
										<input type="text" name='procesamientoDatos0'  placeholder='Prosesamiento de Datos' class="form-control"/>
										</td>
									</tr>
				                    <tr id='addrProcesamientoDatos1'></tr>
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
	<div class="col-md-11">
		<input id="btnActualizarBibliotecasYprocesamientoDatos" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">
	</div>
	<br/>
</form>