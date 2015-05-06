<form role="form" action="#" method="post" class="form-horizontal">
	<br/>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div id="formularioCursosMasRelevantes1" class="row blockCursosMasRelevantes">
		<div class="row">
			<div class="col-md-6">
				<!--Nombre de actividad-->
				<div class="form-group">
					<label for="nombre" class="col-md-4 control-label labelNombre">Nombre de actividad:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputNombre" name="nombre" id="nombre">
					</div>
				</div>

				<!--Institucion-->
				<div class="form-group">
					<label for="institucion" class="col-md-4 control-label labelInstitucion">Institución:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputInstitucion" name="institucion" id="institucion">
					</div>
				</div>
			</div>
			<!--Termina col-md6-->

			<div class="col-md-6">
				<!--Lugar-->
				<div class="form-group">
					<label for="lugar" class="col-md-4 control-label labelLugar">Lugar:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputLugar" name="lugar" id="lugar">
					</div>
				</div>

				<!--Año-->
				<div class="form-group">
					<label for="año" class="col-md-4 control-label labelAño">Año:</label>
					<div class="col-md-8 " id="añoI" >
    					<div class="input-group date año">
    						<input type="text"  class="form-control inputAño" name="año" id="año">
    						<span class="input-group-addon "><i class="glyphicon glyphicon-th"></i></span>
						</div>
					</div>
				</div>
			</div>
			<!--Termina col-md-6-->
		</div>
		<div class="col-md-offset-11">
			<!-- <span class="glyphicon glyphicon-remove-sign"></span>-->
			<input type="checkbox" name="checkBox1" class="claseCheckboxCursosMasRelevantes" id="checkboxCursosMasRelevantes1" style="display:none">
		</div>
		<hr class="soften">
	</div>
	<!--BOTONES para agregar y remover formulario-->
	<div  class="col-md-12">
		<div >
			<button id="btnRemoverCursosMasRelevantes" type="button" class="btn btn-danger btn-lg pull-right">-</button>
		</div>
		<div class="col-md-11">
			<button id="btnAgregarCursosMasRelevantes" type="button" class="btn btn-primary btn-lg pull-right">+</button>
			<input id="btnActualizarCursosMasRelevantes" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">
		</div>
	</div>
	<br/>
</form>