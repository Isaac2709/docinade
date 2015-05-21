<form role="form" action="recomendacion" method="post" class="form-horizontal" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div id="formularioRecomendaciones1" class="row blockRecomendaciones">
		<div class="row">
			<div class="col-md-12">
				<p class="text-center"><label>Profesores o Especialistas que lo (a) podrían recomendar a este programa</label></p>
				<p class="text-center"><small>Indique el nombre y dirección de dos personas (uno de éstas debe ser un académico con nivel mínimo de Maestría) que lo (a) podrían recomendar a este  programa. Las recomendaciones deberán ser enviadas a nosotros,  por quien recomienda,  en sobre cerrado.</small></p>
			</div>
			<div class="col-md-6">

				@if(!$user->formulario->informacion_aspirante->recomendaciones->isEmpty())
					<!--Nombre-->
					<div class="form-group">
						<label for="nombre1" class="col-md-4 control-label labelNombre1">Nombre:</label>
						<div class="col-md-8">
								<input type="text" class="form-control inputNombre1" name="nombre1" id="nombre1" placeholder="Persona 1" value="{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Nombre_Completo }}">
						</div>
					</div>
					<!--Direccion-->
					<div class="form-group">
						<label for="direccion1" class="col-md-4 control-label labelDireccion1">Dirección:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputDireccion1" name="direccion1" id="direccion1" placeholder="Persona 1" value="{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Direccion }}">
						</div>
					</div>
					<!--Telefono-->
					<div class="form-group">
						<label for="telefono1" class="col-md-4 control-label labelTelefono1">Teléfono:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputTelefono1" name="telefono1" id="telefono1" placeholder="Persona 1" value="{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Telefono }}">
						</div>
					</div>

					<!--Fax-->
					<div class="form-group">
						<label for="fax1" class="col-md-4 control-label labelFax1">Fax:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputFax1" name="fax1" id="fax1" placeholder="Persona 1" value="{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Fax }}">
						</div>
					</div>

					<!--Email-->
					<div class="form-group">
						<label for="email1" class="col-md-4 control-label labelEmail1">Email:</label>
						<div class="col-md-8">
							@if(!is_null($user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_ID_Email))
								<input type="text" class="form-control inputEmail1" name="email1" id="email1" placeholder="Persona 1" value="{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->email->Email_Email }}">
							@else
								<input type="text" class="form-control inputEmail1" name="email1" id="email1" placeholder="Persona 1">
							@endif
						</div>
					</div>

					<!--Posicion-->
					<div class="form-group">
						<label for="posicion1" class="col-md-4 control-label labelPosicion1">Posición:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputPosicion1" name="posicion1" id="posicion1" placeholder="Persona 1" value="{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Ocupacion }}">
						</div>
					</div>

					<!--Carta-->
					<div class="form-group">
						<label for="archivoRecomendaciones1" class="col-md-4 control-label labelArchivoRecomendaciones1">Carta de referencia:</label>
						@if(!is_null($user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Adjunto))
						  	<div class="fileupload fileupload-exists" data-provides="fileupload" >
							    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
							    <span class="fileupload-exists">Cambiar</span><input class="input_archivo" type="file" id="archivoRecomendaciones1" name="archivo_recomendacion1" /></span>
							    <span class="fileupload-preview">
							    	<a href="{{ '/storage/letter_recommendation/'.$user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Adjunto }}" target="_blank">{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Adjunto }}</a>
							    </span>
							    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
						  	</div>
					  	@else
					  		<div class="fileupload fileupload-new col-md-8" data-provides="fileupload" >
							    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
							    <span class="fileupload-exists">Cambiar</span><input type="file" id="archivoRecomendaciones1" name="archivo_recomendacion1" /></span>
							    <span class="fileupload-preview"></span>
							    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
						  	</div>
					  	@endif
				  	</div>
				@else
					<!--Nombre-->
					<div class="form-group">
						<label for="nombre1" class="col-md-4 control-label labelNombre1">Nombre:</label>
						<div class="col-md-8">
								<input type="text" class="form-control inputNombre1" name="nombre1" id="nombre1" placeholder="Persona 1">
						</div>
					</div>
					<!--Direccion-->
					<div class="form-group">
						<label for="direccion1" class="col-md-4 control-label labelDireccion1">Dirección:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputDireccion1" name="direccion1" id="direccion1" placeholder="Persona 1">
						</div>
					</div>
					<!--Telefono-->
					<div class="form-group">
						<label for="telefono1" class="col-md-4 control-label labelTelefono1">Teléfono:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputTelefono1" name="telefono1" id="telefono1" placeholder="Persona 1">
						</div>
					</div>

					<!--Fax-->
					<div class="form-group">
						<label for="fax1" class="col-md-4 control-label labelFax1">Fax:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputFax1" name="fax1" id="fax1" placeholder="Persona 1">
						</div>
					</div>

					<!--Email-->
					<div class="form-group">
						<label for="email1" class="col-md-4 control-label labelEmail1">Email:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputEmail1" name="email1" id="email1" placeholder="Persona 1">
						</div>
					</div>

					<!--Posicion-->
					<div class="form-group">
						<label for="posicion1" class="col-md-4 control-label labelPosicion1">Posición:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputPosicion1" name="posicion1" id="posicion1" placeholder="Persona 1" value="{{ $user->formulario->informacion_aspirante->Rec_Nombre_Completo }}">
						</div>
					</div>

					<!--Carta-->
					<div class="form-group">
						<label for="archivoRecomendaciones1" class="col-md-4 control-label labelArchivoRecomendaciones1">Carta de referencia:</label>
	    				<div class="fileupload fileupload-new col-md-8" data-provides="fileupload" >
						    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
						    <span class="fileupload-exists">Cambiar</span><input type="file" id="archivoRecomendaciones1" name="archivoRecomendaciones1" /></span>
						    <span class="fileupload-preview"></span>
						    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
					  	</div>
				  	</div>
			  	@endif
			</div>
			<!--Termina col-md-6 -->

			<div class="col-md-6">
				@if($user->formulario->informacion_aspirante->recomendaciones()->count() > 1)
					<!--Nombre-->
					<div class="form-group">
						<label for="nombre2" class="col-md-4 control-label labelNombre2">Nombre:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputNombre2" name="nombre2" id="nombre2" placeholder="Persona 2" value="{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Nombre_Completo }}">
						</div>
					</div>
					<!--Direccion-->
					<div class="form-group">
						<label for="direccion2" class="col-md-4 control-label labelDireccion2">Dirección:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputDireccion2" name="direccion2" id="direccion2" placeholder="Persona 2" value="{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Direccion }}">
						</div>
					</div>
					<!--Telefono-->
					<div class="form-group">
						<label for="telefono2" class="col-md-4 control-label labelTelefono2">Teléfono:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputTelefono2" name="telefono2" id="telefono2" placeholder="Persona 2" value="{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Telefono }}">
						</div>
					</div>

					<!--Fax-->
					<div class="form-group">
						<label for="fax2" class="col-md-4 control-label labelFax2">Fax:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputFax2" name="fax2" id="fax2" placeholder="Persona 2" value="{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Fax }}">
						</div>
					</div>

					<!--Email-->
					<div class="form-group">
						<label for="email2" class="col-md-4 control-label labelEmail2">Email:</label>
						<div class="col-md-8">
							@if(!is_null($user->formulario->informacion_aspirante->recomendaciones[1]->Rec_ID_Email))
								<input type="text" class="form-control inputEmail2" name="email2" id="email2" placeholder="Persona 2" value="{{ $user->formulario->informacion_aspirante->recomendaciones[1]->email->Email_Email }}">
							@else
								<input type="text" class="form-control inputEmail2" name="email2" id="email2" placeholder="Persona 2">
							@endif
						</div>
					</div>

					<!--Posicion-->
					<div class="form-group">
						<label for="posicion2" class="col-md-4 control-label labelPosicion2">Posición:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputPosicion2" name="posicion2" id="posicion2" placeholder="Persona 2" value="{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Ocupacion }}">
						</div>
					</div>

					<!--Carta-->
					<div class="form-group">
						<label for="archivoRecomendaciones2" class="col-md-4 control-label labelArchivoRecomendaciones2">Carta de referencia:</label>
						@if(!is_null($user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Adjunto))
						  	<div class="fileupload fileupload-exists" data-provides="fileupload" >
							    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
							    <span class="fileupload-exists">Cambiar</span><input class="input_archivo" type="file" id="archivoRecomendaciones2" name="archivo_recomendacion2" /></span>
							    <span class="fileupload-preview"><a href="{{ '/storage/letter_recommendation/'.$user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Adjunto }}" target="_blank">{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Adjunto }}</a></span>
							    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
						  	</div>
					  	@else
					  		<div class="fileupload fileupload-new col-md-8" data-provides="fileupload" >
							    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
							    <span class="fileupload-exists">Cambiar</span><input type="file" id="archivoRecomendaciones2" name="archivo_recomendacion2" /></span>
							    <span class="fileupload-preview"></span>
							    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
						  	</div>
					  	@endif
				  	</div>
				@else
				  	<!--Nombre-->
					<div class="form-group">
						<label for="nombre2" class="col-md-4 control-label labelNombre2">Nombre:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputNombre2" name="nombre2" id="nombre2" placeholder="Persona 2">
						</div>
					</div>
					<!--Direccion-->
					<div class="form-group">
						<label for="direccion2" class="col-md-4 control-label labelDireccion2">Dirección:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputDireccion2" name="direccion2" id="direccion2" placeholder="Persona 2">
						</div>
					</div>
					<!--Telefono-->
					<div class="form-group">
						<label for="telefono2" class="col-md-4 control-label labelTelefono2">Teléfono:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputTelefono2" name="telefono2" id="telefono2" placeholder="Persona 2">
						</div>
					</div>

					<!--Fax-->
					<div class="form-group">
						<label for="fax2" class="col-md-4 control-label labelFax2">Fax:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputFax2" name="fax2" id="fax2" placeholder="Persona 2">
						</div>
					</div>

					<!--Email-->
					<div class="form-group">
						<label for="email2" class="col-md-4 control-label labelEmail2">Email:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputEmail2" name="email2" id="email2" placeholder="Persona 2">
						</div>
					</div>

					<!--Posicion-->
					<div class="form-group">
						<label for="posicion2" class="col-md-4 control-label labelPosicion2">Posición:</label>
						<div class="col-md-8">
							<input type="text" class="form-control inputPosicion2" name="posicion2" id="posicion2" placeholder="Persona 2">
						</div>
					</div>

					<!--Carta-->
					<div class="form-group">
						<label for="archivoRecomendaciones2" class="col-md-4 control-label labelArchivoRecomendaciones2">Carta de referencia:</label>
	    				<div class="fileupload fileupload-new col-md-8" data-provides="fileupload" >
						    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
						    <span class="fileupload-exists">Cambiar</span><input type="file" id="archivoRecomendaciones2" name="archivo_recomendacion2" /></span>
						    <span class="fileupload-preview"></span>
						    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
					  	</div>
				  	</div>
				@endif
			</div>
		</div>
		<hr class="soften">
	</div>
	<div class="col-md-11">
		<input id="btnActualizarRecomendaciones" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">
	</div>
	<br/>
</form>