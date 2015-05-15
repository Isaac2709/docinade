<form role="form" action="invPublicada" method="post" class="form-horizontal">
	<br/>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@if($user->formulario->informacion_aspirante->publicaciones->isEmpty())
		<div id="formularioTrabajosPublicados1" class="row blockTrabajosPublicados">
			<div class="row">
				<div class="col-md-6">
					<input type="hidden" name="id_pub[]" class="id_pub">
					<!--Titulo de Publicacion-->
					<div class="form-group">
						<label for="tituloP" class="col-md-4 control-label labelTituloP">Título de la publicación:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputTituloP" name="titulo_publicacion[]" id="tituloP">
						</div>
					</div>

					<!--Titulo del medio de publicacion-->
					<div class="form-group">
						<label for="tituloMP" class="col-md-4 control-label labelTituloMP">Título del medio de publicación:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputTituloMP" name="titulo_medio_publicacion[]" id="tituloMP">
						</div>
					</div>
				</div>
				<!--Termina col-md-6-->

				<div class="col-md-6">
					<!--Pais de publicacion -->
					<div class="form-group">
						<label for="pais" class="col-md-4 control-label labelPais">País de publicación:</label>
						<div class="col-md-8">
							<input type="text" name="pais[]" id="pais" class="form-control typeahead tt-query inputPais" autocomplete="off" spellcheck="false">
						</div>
					</div>

					<!--Año-->
					<div class="form-group">
						<label for="año" class="col-md-4 control-label labelAño">Año:</label>
						<div class="col-md-8 " id="añoT" >
	    					<div class="input-group date año">
	    						<input type="text"  class="form-control inputAño" name="annio[]" id="año">
	    						<span class="input-group-addon "><i class="glyphicon glyphicon-th"></i></span>
							</div>
						</div>
					</div>
				</div>
				<!--Termina col-md-6-->
			</div>
			<!-- Termina row -->
			<div class="col-md-offset-11">
				<input type="checkbox" name="checkBox1" class="claseCheckboxTrabajosPublicados" id="checkboxTrabajosPublicados1" style="display:none">
			</div>
			<hr class="soften">
		</div>
		<!-- Termina formularioTrabajosPublicados1 -->
	@else
		<?php $count = 1; ?>
		@foreach($user->formulario->informacion_aspirante->publicaciones_desc as $publicacion)
			<div id="formularioTrabajosPublicados{{ $count }}" class="row blockTrabajosPublicados">
				<div class="row">
					<div class="col-md-6">
						<input type="hidden" name="id_pub[]" class="id_pub">
						<!--Titulo de Publicacion-->
						<div class="form-group">
							<label for="tituloP" class="col-md-4 control-label labelTituloP">Título de la publicación:</label>
							<div class="col-md-8">
								<input type="text" class="form-control inputTituloP" name="titulo_publicacion[]" id="tituloP" value="{{ $publicacion->Pub_Titulo }}">
							</div>
						</div>

						<!--Titulo del medio de publicacion-->
						<div class="form-group">
							<label for="tituloMP" class="col-md-4 control-label labelTituloMP">Título del medio de publicación:</label>
							<div class="col-md-8">
								<input type="text" class="form-control inputTituloMP" name="titulo_medio_publicacion[]" id="tituloMP" value="{{ $publicacion->Pub_Medio }}">
							</div>
						</div>
					</div>
					<!--Termina col-md-6-->

					<div class="col-md-6">
						<!--Pais de publicacion -->
						<div class="form-group">
							<label for="pais" class="col-md-4 control-label labelPais">País de publicación:</label>
							<div class="col-md-8">
								@if(!is_null($publicacion->Pub_ID_Pais))
									<input type="text" name="pais[]" id="pais" class="form-control typeahead tt-query inputPais" autocomplete="off" spellcheck="false" value="{{ $publicacion->pais->Pais_Nombre }}">
								@else
									<input type="text" name="pais[]" id="pais" class="form-control typeahead tt-query inputPais" autocomplete="off" spellcheck="false">
								@endif
							</div>
						</div>

						<!--Año-->
						<div class="form-group">
							<label for="año" class="col-md-4 control-label labelAño">Año:</label>
							<div class="col-md-8 " id="añoT" >
		    					<div class="input-group date año">
		    						<input type="text"  class="form-control inputAño" name="annio[]" id="año" value="{{ $publicacion->Pub_Anio }}">
		    						<span class="input-group-addon "><i class="glyphicon glyphicon-th"></i></span>
								</div>
							</div>
						</div>
					</div>
					<!--Termina col-md-6-->
				</div>
				<!-- Termina row -->
				<div class="col-md-offset-11">
					<input type="checkbox" name="checkBox1" class="claseCheckboxTrabajosPublicados" id="checkboxTrabajosPublicados{{ $count }}" @if($count == 1) style="display:none" @endif >
				</div>
				<hr class="soften">
			</div>
			<!-- Termina formularioTrabajosPublicados -->
			<?php $count = $count + 1; ?>
		@endforeach
	@endif
	<!--BOTONES para agregar y remover formulario-->
	<div  class="col-md-12">
		<div >
			<button id="btnRemoverTrabajosPublicados" type="button" class="btn btn-danger btn-lg pull-right">-</button>
		</div>
		<div class="col-md-11">
			<button id="btnAgregarTrabajosPublicados" type="button" class="btn btn-primary btn-lg pull-right">+</button>
			<input id="btnActualizarTrabajosPublicados" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">
		</div>
	</div>
	<br/>
</form>