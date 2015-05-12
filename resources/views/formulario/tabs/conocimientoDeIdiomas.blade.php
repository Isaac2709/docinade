<form role="form" action="#" method="post" class="form-horizontal">
	<br/>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div id="formularioConocimientoDeIdiomas1" class="row blockconocimientoDeIdiomas">
		<div class="row">
			<div class="col-md-6">
				<!--Nombre-->
				<div class="form-group">
					<label for="nombre" class="col-md-4 control-label labelNombre">Idioma:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputNombre" name="nombre" id="nombre">
					</div>
				</div>

				<!--Nivel de escritura-->
				<div class="form-group">
				<label for="nivelEscritura" class="col-md-4 control-label labelNivelEscritura">Nivel de escritura:</label>
					<div class="col-md-8">
						<select name="nivelEscritura" id="nivelEscritura" class="form-control comboboxNivelEscritura combobox">
								<option value="0" selected>Nivel</option>
								<option value="">Basico</option>
			        			<option value="">Itermedio</option>
			        			<option value="">Avanzado</option>
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
						<select name="nivelLectura" id="nivelLectura" class="form-control comboboxNivelLectura combobox">
								<option value="0" selected>Nivel</option>
								<option value="">Basico</option>
			        			<option value="">Itermedio</option>
			        			<option value="">Avanzado</option>
					    </select>
					</div>
				</div>

				<!--Nivel conversacional-->
				<div class="form-group">
				<label for="nivelConversacional" class="col-md-4 control-label labelNivelConversacional">Nivel conversacional:</label>
					<div class="col-md-8">
						<select name="nivelCoversacional" id="nivelConversacional" class="form-control comboboxNivelConversacional combobox">
								<option value="0" selected>Nivel</option>
								<option value="">Basico</option>
			        			<option value="">Itermedio</option>
			        			<option value="">Avanzado</option>
					    </select>
					</div>
				</div>

				</div>
			<!--Termina col-md-6-->
		</div>
		<!--Archivo-->
			<div class="form-group col-md-12 seleccionArchivoConocimientoDeIdiomas">
				<!-- <label for="archivoConocimientoDeIdiomas" class="labelArchivoConocimientoDeIdiomas">Con relación al dominio del idioma inglés, adjunte documentos que certifiquen los cursos y programas estudiados, según el Marco Común Europeo de Referencia para las Lenguas (MCERL) o su equivalente certificado por una universidad o institución reconocida.</label>-->
				<p class="text-center"><small>Adjunte documentos que certifiquen los cursos y programas estudiados, según el <em> Marco Común Europeo de Referencia para las Lenguas</em> (MCERL) o su equivalente certificado por una universidad o institución reconocida.</small></p>
				<div class="fileupload fileupload-new text-center " data-provides="fileupload" id="fileupload1">
				    <span class="btn btn-default btn-file"><span class="fileupload-new">Buscar Archivo</span>
				    <span class="fileupload-exists">Cambiar</span><input type="file" id="archivoConocimientoDeIdiomas" name="archivoConocimientoDeIdiomas" /></span>
				    <span class="fileupload-preview"></span>
				    <a href="#" class="close fileupload-exists claseArchivoConocimientoDeIdiomas" data-dismiss="fileupload" style="float: none">×</a>
			  	</div>
		  	</div>
		<div class="col-md-offset-11">
			<!-- <span class="glyphicon glyphicon-remove-sign"></span>-->
			<input type="checkbox" name="checkBox1" class="claseCheckboxConocimientoDeIdiomas" id="checkboxConocimientoDeIdiomas1" style="display:none">
		</div>
		<hr class="soften">
	</div>
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