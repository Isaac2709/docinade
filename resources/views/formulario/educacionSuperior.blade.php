<form role="form" action="#" method="post" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-12">
		<h1><small> Educación Superior</small></h1>
	</div>
	<div id="formularioEducacionSuperior1" class="row blockEducacionSuperior">
		<div class="row">
			<div class="col-lg-6">
				<!--Institucion -->
				<div class="form-group">
					<label for="institucion" class="col-md-4 control-label labelInstitucion">Institución:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputInstitucion" name="institucion" id="institucion">
					</div>
				</div>

				<!--Pais-->
				<div class="form-group">
					<label for="pais" class="col-md-4 control-label labelPais">País:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputPais" name="pais" id="pais">
					</div>
				</div>

				<!--Año de graduacion-->
				<div class="form-group">
					<label for="añoG" class="col-md-4 control-label labelAñoG">Año de graduación:</label>
					<div class="col-md-8 ">
    					<div class="input-group date año">
    						<input type="text" class="form-control inputAñoG" name="añoG" id="añoG">
    						<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i>
						</div>
					</div>
				</div>
			</div>
			<!--Termina class="col-lg-6"-->

			<div class="col-lg-6">
				<!--Titulo obtenido -->
				<div class="form-group">
					<label for="titulo" class="col-md-4 control-label labelTituloObtenido">Título obtenido:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputTituloObtenido" name="titulo" id="titulo">
					</div>
				</div>

				<!-- Grado academico -->
				<div class="form-group">
					<label for="gradoA" class="col-md-4 control-label labelGradoA">Grado académico:</label>
					<div class="col-md-8">
						<select id="gradoA" name="gradoA" class="form-control comboboxGradoAcademico">
							<option value="z" selected> Seleccione su género</option>
                            <option value="a">Bachiller</option>
                            <option value="b">Doctorado</option>
                            <option value="c">Maestría</option>
                        </select>
                    </div>
        		</div>

			</div>
			<!--termina col-lg-6 -->
		</div>
		<!-- End row -->
		<hr class="soften">
	</div>
	<!-- Termina formularioEducacionSuperior1 -->

	<!--BOTONES para agregar y remover formulario-->
	<div  class="col-md-12">
		<div >
			<button id="btnRemoverEducacionSuperior" type="button" class="btn btn-danger btn-lg pull-right">-</button>
		</div>
		<div class="col-md-11">
			<button id="btnAgregarEducacionSuperior" type="button" class="btn btn-primary btn-lg pull-right">+</button>
		</div>
	</div>
	<br/>
	<!-- BOTON ACTUALIZAR -->
	<div class="row">
		<!--BOTONES para agregar y remover formulario-->
		<div  class="col-md-7">
				<button id="btnActualizar" type="button" class="btn btn-success btn-lg pull-right">Actualizar</button>
		</div>
	</div>
</form>