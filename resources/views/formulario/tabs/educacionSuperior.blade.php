<form role="form" action="eduSuperior" method="post" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-12">
		<h1><small> Educación Superior</small></h1>
	</div>
	@if($user->formulario->informacion_aspirante->educacion_superior->isEmpty())
	<div id="formularioEducacionSuperior1" class="row blockEducacionSuperior">
		<div class="row">
			<div class="col-lg-6">
				<input type="hidden" name="id_edu_sup[]" class="id_exp_inv">
				<!--Institucion -->
				<div class="form-group">
					<label for="institucion" class="col-md-4 control-label labelInstitucion">Institución:</label>
					<div class="col-md-8">
						<div class="bs-example">
    						<input type="text" name="institucion[]" class="form-control typeahead_institucion inputInstitucion tt-query" autocomplete="off" spellcheck="false" id="institucion">
							<input type="hidden" name="id_institucion[]"class="id_institucion">
    					</div>
					</div>
				</div>

				<!--Pais-->
				<div class="form-group">
					<label for="pais" class="col-md-4 control-label labelPais">País:</label>
					<div class="col-md-8">
						<input type="text" name="pais[]" id="pais" class="form-control typeahead tt-query" autocomplete="off" spellcheck="false">
					</div>
				</div>

				<!--Año de graduacion-->
				<div class="form-group">
					<label for="añoG" class="col-md-4 control-label labelAñoG">Año de graduación:</label>
					<div class="col-md-8 ">
    					<div class="input-group date año">
    						<input type="text" class="form-control inputAñoG" name="añoG[]" id="añoG">
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
						<input type="text" class="form-control inputTituloObtenido" name="titulo[]" id="titulo">
					</div>
				</div>

				<!-- Grado academico -->
				<div class="form-group">
					<label for="gradoA" class="col-md-4 control-label labelGradoA">Grado académico:</label>
					<div class="col-md-8">
						<select id="gradoA" name="gradoA[]" class="form-control comboboxGradoAcademico">
							<option value="" selected> Seleccione un grado académico</option>
							@foreach($grados_academicos as $grado)
								<option value="{{ $grado->Gra_ID }}"> {{ $grado->Gra_Nombre }}</option>
							@endforeach
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
	@else
		<?php $count = 1; ?>
		@foreach($user->formulario->informacion_aspirante->experiencias_investigaciones as $investigacion)
			<?php $count = 1; ?>
		@endforeach
	@endif

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
				<input id="btnActualizar" type="submit" class="btn btn-success btn-lg pull-right" value="Actualizar">
		</div>
	</div>
</form>