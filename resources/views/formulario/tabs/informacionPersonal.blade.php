<form role="form" action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
	<br/>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row">
    	<div class="col-lg-6">
    		<!-- Name of aspirant -->
    		<div class="form-group">
    			<label for="name" class="col-md-4 control-label">Nombre:</label>
    			<div class="col-md-8">
					<input type="text" class="form-control" name="nombre" value="{{ $user->formulario->IPe_Nombre }}">
				</div>
    		</div>
    		<!-- Apellidos del aspirante -->
    		<div class="form-group">
    			<label for="apellidos" class="col-md-4 control-label">Apellidos:</label>
    			<div class="col-md-8">
					<input type="text" class="form-control" name="apellidos" value="{{ $user->formulario->IPe_Apellido }}">
				</div>
    		</div>

    		<!-- ID or passport of aspirant -->
    		<div class="form-group">
    			<label for="id" class="col-md-4 control-label">Cédula o Pasaporte:</label>
    			<div class="col-md-8">
    				<input type="text" class="form-control" name="id" value="{{ $user->formulario->IPe_Pasaporte }}">
                    <div class="fileupload fileupload-new text-center" data-provides="fileupload" id="fileupload1">
                        <span class="btn btn-default btn-file claseBtnArchivoCedula" ><span class="fileupload-new">Buscar Archivo</span>
                        <span class="fileupload-exists">Cambiar</span><input type="file" id="archivoCedula" name="archivoCedula"  /></span>
                        <span class="fileupload-preview"></span>
                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                </div>
    			</div>
                
    		</div>
    		<!-- Genero del(la) aspirante -->
			<div class="form-group">
				<label for="genero" class="col-md-4 control-label">Género:</label>
				<div class="col-md-8">
					<select name="genero" id="" class="form-control">
						@if(is_null($user->formulario->IPe_Genero) || empty($user->formulario->IPe_Genero))
							<option value="" selected> Seleccione su género</option>
                            <option value="F"> Femenino</option>
                            <option value="M"> Másculino</option>
                        @else
                        	@if($user->formulario->IPe_Genero == "F")
								<option value="F" selected> Femenino</option>
                                <option value="M"> Másculino</option>
                            @elseif($user->formulario->IPe_Genero == "M")
                            	<option value="F"> Femenino</option>
                                <option value="M" selected> Másculino</option>
                        	@endif
                        @endif
                    </select>
                </div>
    		</div>
    		<!-- Fecha de Nacimiento -->
    		<div class="form-group">
    			<label for="fecha_nacimiento" class="col-md-4 control-label">Fecha de Nacimiento</label>
    			<div class="col-md-8">
    				<div class="input-group date datepicker_control">
    					@if($user->formulario->IPe_Fecha_Nac == "0000-00-00" || is_null($user->formulario->IPe_Fecha_Nac))
    						<input type="text" class="datepicker_control form-control" name="fecha_nacimiento" value="">
    					@else
    						<!-- Conversión del formato de la fecha -->
    						<?php
								$date_obj = date_create_from_format('Y-m-d',$user->formulario->IPe_Fecha_Nac);
								$fecha_nacimiento = date_format($date_obj, 'd/m/Y');
    						?>
							<input type="text" class="datepicker_control form-control" name="fecha_nacimiento" value="{{ $fecha_nacimiento }}">
						@endif
						<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
					</div>
    			</div>
    		</div>
    		<!-- Lugar de Nacimiento -->
			<div class="form-group">
				<label for="lugarNacimiento" class="col-md-4 control-label">Lugar de nacimiento:</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="lugar_nacimiento" value="{{ $user->formulario->informacion_aspirante->Asp_Lugar_Nac }}">
				</div>
			</div>
			<!-- Nacionalidad -->
			<div class="form-group">
				<label for="nacionalidad" class="col-md-4 control-label">Nacionalidad:</label>
				<div class="col-md-8">
					<div class="bs-example">
						@if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Nac))
							<input type="text" name="nacionalidad" class="form-control typeahead2 tt-query" autocomplete="off" spellcheck="false" value="{{ $user->formulario->informacion_aspirante->nacionalidad->Nac_Nombre }}" id="#nacionalidad">
						@else
							<input type="text" name="nacionalidad" class="form-control typeahead2 tt-query" autocomplete="off" spellcheck="false" id="#nacionalidad">
						@endif
				    </div>
				</div>
			</div>
			<!-- Teléfono -->
			<div class="form-group">
				<label for="telefono" class="col-md-4 control-label">Teléfono:</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="telefono" value="{{ $user->formulario->IPe_Telefono }}">
				</div>
			</div>
			<!--Email-->
			<div class="form-group">
    			<label for="email" class="col-md-4 control-label">Email:</label>
    			<div class="col-md-7">
    					@if(!$user->formulario->emails->isEmpty())
        					<input type="email" class="form-control" name="email" value="{{ $user->formulario->emails()->first()->Email_Email }}">
        				@else
							<input type="email" class="form-control" name="email">
        				@endif
        				<br>
        				@if(!is_null($user->formulario->emails) && $user->formulario->emails()->count() > 1)
        					<input id="email2" type="email" class="form-control" name="email2" value="{{ $user->formulario->emails[1]->Email_Email }}">
        				@else
        					<input id="email2" type="email" class="form-control" name="email2">
        				@endif
    			</div>
    			<button id="agregarNuevoEmail" type="button" class="btn btn-primary btn-sm agregarQuitarNuevoMail" onClick="cambiarTextoDeBoton(this.id)">+</button>
    		</div>

			<!-- Fax -->
			<div class="form-group">
				<label for="fax" class="col-md-4 control-label">Fax:</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="fax" value="{{ $user->formulario->IPe_Fax }}">
				</div>
			</div>
		</div>
		<!-- End col-lg-6 -->

		<div class="col-lg-6">
			<!-- Fotografía -->
            <div class="form-group">
                <label for="archivoFoto1" class="col-md-4 control-label labelArchivoFoto1">Fotografía:</label>
                <div class="fileupload fileupload-new col-md-8" data-provides="fileupload" >
                    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
                    <span class="fileupload-exists">Cambiar</span><input type="file" id="archivoFoto1" name="archivoFoto1" /></span>
                    <span class="fileupload-preview"></span>
                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                </div>
            </div>
			<!-- Enfasis de interes -->
			<div class="form-group">
				<label for="enfasis" class="col-md-4 control-label">Énfasis de interes:</label>
				<div class="col-md-8">
					<select name="enfasis" id="" class="form-control">
						@if(is_null($user->formulario->informacion_aspirante->Asp_ID_Enfasis) || empty($user->formulario->informacion_aspirante->Asp_ID_Enfasis))
							<option value="" selected> Énfasis</option>
							@foreach($enfasis as $enfasi)
								<option value="{{ $enfasi->Enf_ID }}"> {{ $enfasi->Enf_Nombre }}</option>
							@endforeach
                        @else
                        	@foreach($enfasis as $enfasi)
                        		@if($enfasi->Enf_ID == $user->formulario->informacion_aspirante->Asp_ID_Enfasis)
                        			<option value="{{ $enfasi->Enf_ID }}" selected> {{ $enfasi->Enf_Nombre }}</option>
                        		@else
                        			<option value="{{ $enfasi->Enf_ID }}"> {{ $enfasi->Enf_Nombre }}</option>
                        		@endif
							@endforeach
                        @endif
                    </select>
				</div>
			</div>
			<!-- Área en que le interesa desarrollar el tema de investigación -->
			<div class="form-group">
    			<label for="area_investigacion" class="col-md-4 control-label">Aréa en que le interesaría desarrollar el tema de investigación:</label>
    			<div class="col-md-8">
					<textarea name="area_investigacion" class="form-control " rows="3">{{ $user->formulario->informacion_aspirante->Asp_Area_Interes }}</textarea>
				</div>
    		</div>

    		<h3><u>Dirección actual</u></h3>

    		<!-- Pais de Residencia -->
    		<div class="form-group">
    			<label for="pais_residencia" class="col-md-4 control-label">País de residencia:</label>
    			<div class="col-md-8">
					<div class="bs-example">
						@if(!is_null($user->formulario->informacion_aspirante->direccion_actual->pais_residencia))
							<input type="text" name="pais_residencia" class="form-control typeahead tt-query" autocomplete="off" spellcheck="false" value="{{ $user->formulario->informacion_aspirante->direccion_actual->pais_residencia->Pais_Nombre }}" id="pais_residencia">
						@else
							<input type="text" name="pais_residencia" class="form-control typeahead tt-query" autocomplete="off" spellcheck="false">
						@endif
				    </div>
    			</div>
    		</div>
    		<!-- Ciudad -->
    		<div class="form-group">
    			<label for="ciudad" class="col-md-4 control-label">Ciudad:</label>
    			<div class="col-md-8">
    				<input type="text" class="form-control" name="ciudad" value="{{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Ciudad }}">
    			</div>
    		</div>
    		<!-- Codigo Postal -->
    		<div class="form-group">
    			<label for="codigo_postal" class="col-md-4 control-label">Código postal:</label>
    			<div class="col-md-8">
    				<input type="text" class="form-control" name="codigo_postal" value="{{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Cod_Postal }}">
    			</div>
    		</div>
    		<!-- Direccion para el envio de correspondencia -->
    		<div class="form-group">
    			<label for="direccion_correspondencia" class="col-md-4 control-label">Dirección para el envío de correspondencia:</label>
    			<div class="col-md-8">
    				<textarea name="direccion_correspondencia" class="form-control " rows="2">{{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Dir_Corresp }}</textarea>
    			</div>
    		</div>
		</div>
		<br/>
		<!-- End col-lg-6 -->
    </div>
    <!-- End row -->

	<!-- BOTON ACTUALIZAR -->
	<div class="row">
		<div class="col-md-11">
            <input id="btnActualizarDatosPersonales" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">
        </div>
        <br/>
	</div>
    <!-- End row -->
</form>
<!-- End Form -->