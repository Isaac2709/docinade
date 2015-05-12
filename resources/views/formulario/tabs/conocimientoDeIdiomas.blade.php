<form role="form" action="conIdioma" method="post" class="form-horizontal" enctype="multipart/form-data">
	<br/>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@if($user->formulario->informacion_aspirante->conocimiento_idiomas->isEmpty())
	<div id="formularioConocimientoDeIdiomas1" class="row blockconocimientoDeIdiomas">
		<div class="row">
			<div class="col-md-6">
				<input type="hidden" name="id_con_idioma[]" class="id_cur_sem">
				<!--Nombre-->
				<div class="form-group">
					<label for="nombre" class="col-md-4 control-label labelNombre">Idioma:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputNombre" name="idioma[]" id="nombre">
					</div>
				</div>

				<!--Nivel de escritura-->
				<div class="form-group">
				<label for="nivelEscritura" class="col-md-4 control-label labelNivelEscritura">Nivel de escritura:</label>
					<div class="col-md-8">
						<select name="nivelEscritura[]" id="nivelEscritura" class="form-control comboboxNivelEscritura combobox">
							<option value="" selected>Nivel</option>
							@foreach($niveles_idioma as $nivel)
								<option value="{{ $nivel->Niv_ID }}"> {{ $nivel->Niv_Nombre }}</option>
							@endforeach
					    </select>
					</div>
				</div>
			</div>
			<!--Termina col-md-6-->


			<div class="col-md-6">
				<!--Nivel de lectura-->
				<div class="form-group">
				<label for="nivelLectura" class="col-md-4 control-label labelNivelLectura">Nivel de lectura:</label>
					<div class="col-md-8">
						<select name="nivelLectura[]" id="nivelLectura" class="form-control comboboxNivelLectura combobox">
							<option value="" selected>Nivel</option>
							@foreach($niveles_idioma as $nivel)
								<option value="{{ $nivel->Niv_ID }}"> {{ $nivel->Niv_Nombre }}</option>
							@endforeach
					    </select>
					</div>
				</div>

				<!--Nivel conversacional-->
				<div class="form-group">
				<label for="nivelConversacional" class="col-md-4 control-label labelNivelConversacional">Nivel conversacional:</label>
					<div class="col-md-8">
						<select name="nivelCoversacional[]" id="nivelConversacional" class="form-control comboboxNivelConversacional combobox">
							<option value="" selected>Nivel</option>
							@foreach($niveles_idioma as $nivel)
								<option value="{{ $nivel->Niv_ID }}"> {{ $nivel->Niv_Nombre }}</option>
							@endforeach
					    </select>
					</div>
				</div>

				</div>
			<!--Termina col-md-6-->
		</div>
		<!--Archivo-->
			<div class="form-group col-md-12 seleccionArchivoConocimientoDeIdiomas">
				<!-- <label for="archivoConocimientoDeIdiomas" class="labelArchivoConocimientoDeIdiomas">Con relación al dominio del idioma inglés, adjunte documentos que certifiquen los cursos y programas estudiados, según el Marco Común Europeo de Referencia para las Lenguas (MCERL) o su equivalente certificado por una universidad o institución reconocida.</label>-->
				<p class="text-center"><small>Con relación al dominio del idioma inglés, adjunte documentos que certifiquen los cursos y programas estudiados, según el <em> Marco Común Europeo de Referencia para las Lenguas</em> (MCERL) o su equivalente certificado por una universidad o institución reconocida.</small></p>
				<div class="fileupload fileupload-new " data-provides="fileupload">
				    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
				    <span class="fileupload-exists">Cambiar</span><input type="file" class="input_archivo" id="archivoConocimientoDeIdiomas" name="archivo[]"/></span>
				    <span class="fileupload-preview"></span>
				    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
			  	</div>
		  	</div>
		<div class="col-md-offset-11">
			<!-- <span class="glyphicon glyphicon-remove-sign"></span>-->
			<input type="checkbox" name="checkBox1" class="claseCheckboxConocimientoDeIdiomas" id="checkboxConocimientoDeIdiomas1" style="display:none">
		</div>
		<hr class="soften">
	</div>
	<!-- Termina formularioConocimientoDeIdiomas -->
	@else
		<?php $count = 1; ?>
		@foreach($user->formulario->informacion_aspirante->conocimiento_idiomas as $idioma)
			<div id="formularioConocimientoDeIdiomas{{ $count }}" class="row blockconocimientoDeIdiomas">
				<div class="row">
					<div class="col-md-6">
						<input type="hidden" name="id_con_idioma[]" class="id_con_idioma" value="{{ $idioma->Idm_ID }}">
						<!--Nombre-->
						<div class="form-group">
							<label for="nombre" class="col-md-4 control-label labelNombre">Idioma:</label>
							<div class="col-md-8">
								<input type="text" class="form-control inputNombre" name="idioma[]" id="nombre" value="{{ $idioma->Idm_Idioma }}">
							</div>
						</div>

						<!--Nivel de escritura-->
						<div class="form-group">
						<label for="nivelEscritura" class="col-md-4 control-label labelNivelEscritura">Nivel de escritura:</label>
							<div class="col-md-8">
								<select name="nivelEscritura[]" id="nivelEscritura" class="form-control comboboxNivelEscritura combobox">
									@if(is_null($idioma->Idm_ID_Niv_Escr) || empty($idioma->Idm_ID_Niv_Escr))
										<option value="" selected> Nivel</option>
										@foreach($niveles_idioma as $nivel)
											<option value="{{ $nivel->Niv_ID }}"> {{ $nivel->Niv_Nombre }}</option>
										@endforeach
			                        @else
			                        	@foreach($niveles_idioma as $nivel)
			                        		@if($nivel->Niv_ID == $idioma->Idm_ID_Niv_Escr)
			                        			<option value="{{ $nivel->Niv_ID }}" selected> {{ $nivel->Niv_Nombre }}</option>
			                        		@else
			                        			<option value="{{ $nivel->Niv_ID }}"> {{ $nivel->Niv_Nombre }}</option>
			                        		@endif
										@endforeach
			                        @endif
							    </select>
							</div>
						</div>
					</div>
					<!--Termina col-md-6-->

					<div class="col-md-6">
						<!--Nivel de lectura-->
						<div class="form-group">
						<label for="nivelLectura" class="col-md-4 control-label labelNivelLectura">Nivel de lectura:</label>
							<div class="col-md-8">
								<select name="nivelLectura[]" id="nivelLectura" class="form-control comboboxNivelLectura combobox">
									@if(is_null($idioma->Idm_ID_Niv_Lect) || empty($idioma->Idm_ID_Niv_Lect))
										<option value="" selected> Nivel</option>
										@foreach($niveles_idioma as $nivel)
											<option value="{{ $nivel->Niv_ID }}"> {{ $nivel->Niv_Nombre }}</option>
										@endforeach
			                        @else
			                        	@foreach($niveles_idioma as $nivel)
			                        		@if($nivel->Niv_ID == $idioma->Idm_ID_Niv_Lect)
			                        			<option value="{{ $nivel->Niv_ID }}" selected> {{ $nivel->Niv_Nombre }}</option>
			                        		@else
			                        			<option value="{{ $nivel->Niv_ID }}"> {{ $nivel->Niv_Nombre }}</option>
			                        		@endif
										@endforeach
			                        @endif
							    </select>
							</div>
						</div>

						<!--Nivel conversacional-->
						<div class="form-group">
						<label for="nivelConversacional" class="col-md-4 control-label labelNivelConversacional">Nivel conversacional:</label>
							<div class="col-md-8">
								<select name="nivelCoversacional[]" id="nivelConversacional" class="form-control comboboxNivelConversacional combobox">
									@if(is_null($idioma->Idm_ID_Niv_Conv) || empty($idioma->Idm_ID_Niv_Conv))
										<option value="" selected> Nivel</option>
										@foreach($niveles_idioma as $nivel)
											<option value="{{ $nivel->Niv_ID }}"> {{ $nivel->Niv_Nombre }}</option>
										@endforeach
			                        @else
			                        	@foreach($niveles_idioma as $nivel)
			                        		@if($nivel->Niv_ID == $idioma->Idm_ID_Niv_Conv)
			                        			<option value="{{ $nivel->Niv_ID }}" selected> {{ $nivel->Niv_Nombre }}</option>
			                        		@else
			                        			<option value="{{ $nivel->Niv_ID }}"> {{ $nivel->Niv_Nombre }}</option>
			                        		@endif
										@endforeach
			                        @endif
							    </select>
							</div>
						</div>

						</div>
					<!--Termina col-md-6-->
				</div>
				<!--Archivo-->
					<div class="form-group col-md-12 seleccionArchivoConocimientoDeIdiomas">
						<!-- <label for="archivoConocimientoDeIdiomas" class="labelArchivoConocimientoDeIdiomas">Con relación al dominio del idioma inglés, adjunte documentos que certifiquen los cursos y programas estudiados, según el Marco Común Europeo de Referencia para las Lenguas (MCERL) o su equivalente certificado por una universidad o institución reconocida.</label>-->
						<p class="text-center"><small>Con relación al dominio del idioma inglés, adjunte documentos que certifiquen los cursos y programas estudiados, según el <em> Marco Común Europeo de Referencia para las Lenguas</em> (MCERL) o su equivalente certificado por una universidad o institución reconocida.</small></p>
						@if(!is_null($idioma->Idm_Adjunto))
							<div class="fileupload fileupload-exists" data-provides="fileupload">
							    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
							    <span class="fileupload-exists">Cambiar</span><input class="input_archivo" type="file" id="archivoConocimientoDeIdiomas"/ name="archivo[]"></span>
							    <span class="fileupload-preview"><a href="{{ '/storage/certificates/'.$idioma->Idm_Adjunto }}" target="_blank">{{ $idioma->Idm_Adjunto }}</a></span>
							    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
						  	</div>
					  	@else
					  		<div class="fileupload fileupload-new" data-provides="fileupload">
							    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
							    <span class="fileupload-exists">Cambiar</span><input class="input_archivo" type="file" id="archivoConocimientoDeIdiomas" name="archivo[]" value="{{ $idioma->Idm_Adjunto }}"/></span>
							    <span class="fileupload-preview"></span>
							    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
						  	</div>
					  	@endif
				  	</div>
				<div class="col-md-offset-11">
					<!-- <span class="glyphicon glyphicon-remove-sign"></span>-->
					<input type="checkbox" name="checkBox{{ $count }}" class="claseCheckboxConocimientoDeIdiomas" id="checkboxConocimientoDeIdiomas{{ $count }}" style="display:none">
				</div>
				<hr class="soften">
			</div>
			<!-- Termina formularioConocimientoDeIdiomas -->
			<?php $count = $count + 1; ?>
		@endforeach
	@endif
	<!--BOTONES para agregar y remover formulario-->
	<div  class="col-md-12">
		<div >
			<button id="btnRemoverConocimientoDeIdiomas" type="button" class="btn btn-danger btn-lg pull-right">-</button>
		</div>
		<div class="col-md-11">
			<button id="btnAgregarConocimientoDeIdiomas" type="button" class="btn btn-primary btn-lg pull-right">+</button>
			<input id="btnActualizarConocimientoDeIdiomas" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">
		</div>
	</div>
	<br/>
</form>