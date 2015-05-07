<form role="form" action="#" method="post" class="form-horizontal">
	<br/>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@if($user->formulario->informacion_aspirante->cursos_seminarios->isEmpty())
		<div id="formularioCursosMasRelevantes1" class="row blockCursosMasRelevantes">
			<div class="row">
				<div class="col-md-6">
					<!--Nombre de actividad-->
					<div class="form-group">
						<label for="nombre" class="col-md-4 control-label labelNombre">Nombre de actividad:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputNombre" name="nombre[]" id="nombre">
						</div>
					</div>

					<!--Institucion-->
					<div class="form-group">
						<label for="institucion" class="col-md-4 control-label labelInstitucion">Institución:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputInstitucion" name="institucion[]" id="institucion">
							<!-- <div class="bs-example">
	    						<input type="text" name="institucion[]" class="form-control typeahead_institucion inputInstitucion tt-query" autocomplete="off" spellcheck="false" id="institucion">
	    					</div> -->
						</div>
					</div>
				</div>
				<!--Termina col-md6-->

				<div class="col-md-6">
					<!--Lugar-->
					<div class="form-group">
						<label for="lugar" class="col-md-4 control-label labelLugar">Lugar:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputLugar" name="lugar[]" id="lugar">
						</div>
					</div>

					<!--Año-->
					<div class="form-group">
						<label for="año" class="col-md-4 control-label labelAño">Año:</label>
						<div class="col-md-8 " id="añoI" >
	    					<div class="input-group date año">
	    						<input type="text"  class="form-control inputAño" name="annio[]" id="año">
	    						<span class="input-group-addon "><i class="glyphicon glyphicon-th"></i></span>
							</div>
						</div>
					</div>
				</div>
				<!--Termina col-md-6-->
			</div>
			<div class="col-md-offset-11">
				<input type="checkbox" name="checkBox1" class="claseCheckboxCursosMasRelevantes" id="checkboxCursosMasRelevantes1" style="display:none">
			</div>
			<hr class="soften">
		</div>
	@else
		<?php $count = 1; ?>
		@foreach($user->formulario->informacion_aspirante->cursos_seminarios_desc as $curso_seminario)
			<div id="formularioCursosMasRelevantes{{ $count }}" class="row blockCursosMasRelevantes">
				<div class="row">
					<div class="col-md-6">
						<!--Nombre de actividad-->
						<div class="form-group">
							<label for="nombre" class="col-md-4 control-label labelNombre">Nombre de actividad:</label>
							<div class="col-md-8">
								<input type="text" class="form-control inputNombre" name="nombre[]" id="nombre" value="{{ $curso_seminario->CSe_Actividad }}">
							</div>
						</div>

						<!--Institucion-->
						<div class="form-group">
							<label for="institucion" class="col-md-4 control-label labelInstitucion">Institución:</label>
							<div class="col-md-8">
								<input type="text" class="form-control inputInstitucion" name="institucion[]" id="institucion" value="{{ $curso_seminario->CSe_Institucion }}">
								<!-- <div class="bs-example">
		    						<input type="text" name="institucion[]" class="form-control typeahead_institucion inputInstitucion tt-query" autocomplete="off" spellcheck="false" id="institucion">
		    					</div> -->
							</div>
						</div>
					</div>
					<!--Termina col-md6-->

					<div class="col-md-6">
						<!--Lugar-->
						<div class="form-group">
							<label for="lugar" class="col-md-4 control-label labelLugar">Lugar:</label>
							<div class="col-md-8">
								<input type="text" class="form-control inputLugar" name="lugar[]" id="lugar" value="{{ $curso_seminario->CSe_Lugar }}">
							</div>
						</div>

						<!--Año-->
						<div class="form-group">
							<label for="año" class="col-md-4 control-label labelAño">Año:</label>
							<div class="col-md-8 " id="añoI" >
		    					<div class="input-group date año">
		    						<input type="text"  class="form-control inputAño" name="annio[]" id="año" value="{{ $curso_seminario->CSe_Annio }}">
		    						<span class="input-group-addon "><i class="glyphicon glyphicon-th"></i></span>
								</div>
							</div>
						</div>
					</div>
					<!--Termina col-md-6-->
				</div>
				<div class="col-md-offset-11">
					<input type="checkbox" name="checkBox1" class="claseCheckboxCursosMasRelevantes" id="checkboxCursosMasRelevantes{{ $count }}" style="display:none">
				</div>
				<hr class="soften">
			</div>
			<?php $count = $count + 1; ?>
		@endforeach
	@endif
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