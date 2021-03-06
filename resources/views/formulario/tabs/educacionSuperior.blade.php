<form role="form" action="formulario/eduSuperior" method="post" class="form form-horizontal" enctype="multipart/form-data">
	<br/>
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
    					</div>
					</div>
				</div>

				<!--Pais-->
				<div class="form-group">
					<label for="pais" class="col-md-4 control-label labelPais">País:</label>
					<div class="col-md-8">
						<input type="text" name="pais[]" id="pais" class="form-control typeahead tt-query inputPais" autocomplete="off" spellcheck="false">
					</div>
				</div>

				<!--Año de graduacion-->
				<div class="form-group">
					<label for="añoG" class="col-md-4 control-label labelAñoG">Año de graduación:</label>
					<div class="col-md-8 ">
    					<div class="input-group date año">
    						<input type="text" class="form-control inputAñoG" name="añoG[]" id="añoG" >
    						<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i>
						</div>
					</div>
				</div>
			</div>
			<!--Termina class="col-lg-6"-->

			<div class="col-lg-6">
				<!--Titulo obtenido -->
				<div class="form-group">
					<label for="archivoTitulo1" class="col-md-4 control-label labelArchivoTitulo1">Título obtenido:</label>
    				<div class="fileupload fileupload-new col-md-8" data-provides="fileupload" id="fileupload1">
					    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
					    <span class="fileupload-exists">Cambiar</span><input type="file" id="archivoTitulo1" name="title_file[]" /></span>
					    <span class="fileupload-preview"></span>
					    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
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

        		<!--Area de Especialidad -->
				<div class="form-group">
					<label for="area_especialidad" class="col-md-4 control-label labelAreaEspecialidad">Área de especialidad:</label>
					<div class="col-md-8">
						<div class="bs-example">
    						<input type="text" name="area_especialidad[]" class="form-control typeahead_area_especialidad inputAreaEspecialidad tt-query" autocomplete="off" spellcheck="false" id="area_especialidad">
    					</div>
					</div>
				</div>

			</div>
			<!--termina col-lg-6 -->
		</div>
		<div class="col-md-offset-11">
			<input type="checkbox" name="checkBox1" class="claseCheckboxEduSuperior" id="checkboxEduSuperior1" style="display:none">
		</div>
		<!-- End row -->
		<hr class="soften">
	</div>
	<!-- Termina formularioEducacionSuperior1 -->
	@else
		<?php $count = 1; ?>
		@foreach($user->formulario->informacion_aspirante->educacion_superior as $educacion)
			<div id="formularioEducacionSuperior{{ $count }}" class="row blockEducacionSuperior">
			<div class="row">
				<div class="col-lg-6">
					<input type="hidden" name="id_edu_sup[]" class="id_edu_sup" value="{{ $educacion->Sup_ID }}">
					<!--Institucion -->
					<div class="form-group">
						<label for="institucion" class="col-md-4 control-label labelInstitucion">Institución:</label>
						<div class="col-md-8">
							<div class="bs-example">
	    						<input type="text" name="institucion[]" class="form-control typeahead_institucion inputInstitucion tt-query" autocomplete="off" spellcheck="false" id="institucion" value="{{ $educacion->institucion->Ins_Nombre }}" >
	    					</div>
						</div>
					</div>

					<!--Pais-->
					<div class="form-group">
						<label for="pais" class="col-md-4 control-label labelPais">País:</label>
						<div class="col-md-8">
							<input type="text" name="pais[]" id="pais" class="form-control typeahead tt-query inputPais" autocomplete="off" spellcheck="false" value="{{ $educacion->pais->Pais_Nombre }}">
						</div>
					</div>

					<!--Año de graduacion-->
					<div class="form-group">
						<label for="añoG" class="col-md-4 control-label labelAñoG">Año de graduación:</label>
						<div class="col-md-8 ">
	    					<div class="input-group date año">
	    						<input type="text" class="form-control inputAñoG" name="añoG[]" id="añoG" value="{{ $educacion->Sup_Anio_Grad }}">
	    						<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i>
							</div>
						</div>
					</div>
				</div>
				<!--Termina class="col-lg-6"-->

				<div class="col-lg-6">
					<!--Titulo obtenido -->
					<div class="form-group">
						<label for="archivoTitulo1" class="col-md-4 control-label labelArchivoTitulo1">Título obtenido:</label>
        				@if(!empty($educacion->Sup_Adjunto))
        					<div class="fileupload fileupload-exists col-md-8" data-provides="fileupload" >
							    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
							    <span class="fileupload-exists">Cambiar</span><input class="input_archivo" type="file" id="title_file" name="title_file[]" /></span>
							    <span class="fileupload-preview"><a href="{{ '/storage/images/'.$educacion->Sup_Adjunto}}" target="_blank">{{ $educacion->Sup_Adjunto}}</a></span>
							    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
						  	</div>
        				@else
        					<div class="fileupload fileupload-new col-md-8" data-provides="fileupload" >
							    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
							    <span class="fileupload-exists">Cambiar</span><input type="file" id="title_file" name="title_file[]" /></span>
							    <span class="fileupload-preview"></span>
							    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
						  	</div>
                        @endif
                    </div>

					<!-- Grado academico -->
					<div class="form-group">
						<label for="gradoA" class="col-md-4 control-label labelGradoA">Grado académico:</label>
						<div class="col-md-8">
							<select id="gradoA" name="gradoA[]" class="form-control comboboxGradoAcademico">
								@foreach($grados_academicos as $grado)
	                        		@if($grado->Gra_ID == $educacion->grado_academico->Asp_ID_Enfasis)
	                        			<option value="{{ $grado->Gra_ID }}" selected> {{ $grado->Gra_Nombre }}</option>
	                        		@else
	                        			<option value="{{ $grado->Gra_ID }}"> {{ $grado->Gra_Nombre }}</option>
	                        		@endif
								@endforeach
	                        </select>
	                    </div>
	        		</div>

	        		<!--Area de Especialidad -->
					<div class="form-group">
						<label for="areaEspecialidad" class="col-md-4 control-label labelAreaEspecialidad">Área de especialidad:</label>
						<div class="col-md-8">
							<div class="bs-example">
								@if(!is_null($educacion->Sup_ID_Area_Esp))
	    							<input type="text" name="area_especialidad[]" class="form-control typeahead_area_especialidad inputAreaEspecialidad tt-query" autocomplete="off" spellcheck="false" id="area_especialidad" value="{{ $educacion->area_especialidad->Esp_Area }}" >
	    						@else
	    							<input type="text" name="area_especialidad[]" class="form-control typeahead_area_especialidad inputAreaEspecialidad tt-query" autocomplete="off" spellcheck="false" id="area_especialidad">
	    						@endif
	    					</div>
						</div>
					</div>

				</div>
				<!--termina col-lg-6 -->
			</div>
			<!-- End row -->
			<div class="col-md-offset-11">
				<input type="checkbox" name="checkBox1" class="claseCheckboxEduSuperior" id="checkboxEduSuperior{{ $count }}" @if($count == 1) style="display:none" @endif >
			</div>
			<hr class="soften">
		</div>
		<!-- Termina formularioEducacionSuperior1 -->
			<?php $count = $count + 1; ?>
		@endforeach
	@endif

	<!--BOTONES para agregar y remover formulario-->
	<div  class="col-md-12">
		<div>
			<button id="btnRemoverEducacionSuperior" type="button" class="btn btn-danger btn-lg pull-right btn-delete">-</button>

		</div>
		<div class="col-md-11">
			<button id="btnAgregarEducacionSuperior" type="button" class="btn btn-primary btn-lg pull-right btn-add">+</button>
			@if($user->formulario->informacion_aspirante->Asp_Estado_Formulario != "Enviado")
				<input id="btnActualizarEducacionSuperior" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">

				<input id="btnCancelarEduSuperior" class="btn btn-warning btn-lg btn-cancel" type="button" onClick="cancelarActualizacion()" value="Cancelar">
			@endif
		</div>
	</div>
	<br/>
</form>