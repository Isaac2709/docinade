<form role="form" action="#" method="post" class="form-horizontal">
	<br/>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div id="formularioTrabajosPublicados1" class="row blockTrabajosPublicados">
		<div class="row">
			<div class="col-md-6">
				<!--Titulo de Publicacion-->
				<div class="form-group">
					<label for="tituloP" class="col-md-4 control-label labelTituloP">Título de la publicación:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputTituloP" name="tituloP" id="tituloP">
					</div>
				</div>

				<!--Titulo del medio de publicacion-->
				<div class="form-group">
					<label for="tituloMP" class="col-md-4 control-label labelTituloMP">Título del medio de publicación:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputTituloMP" name="tituloMP" id="tituloMP">
					</div>
				</div>
			</div>
			<!--Termina col-md-6-->

			<div class="col-md-6">
				<!--Pais de publicacion-->
				<div class="form-group">
					<label for="pais" class="col-md-4 control-label labelPais">País de publicación:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputPais" name="pais" id="pais">
					</div>
				</div>

				<!--Año-->
				<div class="form-group">
					<label for="año" class="col-md-4 control-label labelAño">Año:</label>
					<div class="col-md-8 " id="añoT" >
    					<div class="input-group date año">
    						<input type="text"  class="form-control inputAño" name="año" id="año">
    						<span class="input-group-addon "><i class="glyphicon glyphicon-th"></i></span>
						</div>
					</div>
				</div>
			</div>
			<!--Termina col-md-6-->
		</div>
		<!-- Termina row -->
		<hr class="soften">
	</div>
	<!-- Termina formularioTrabajosPublicados1 -->

	<!--BOTONES para agregar y remover formulario-->
	<div class="col-md-12">
		<div >
			<button id="btnRemoverTrabajosPublicados" type="button" class="btn btn-danger btn-læg pull-right">-</button>
		</div>
		<div class="col-md-11">
			<button id="btnAgregarTrabajosPublicados" type="button" class="btn btn-primary btn-lg pull-right">+</button>
		</div>
	</div>
	<br/>
	<!-- BOTON ACTUALIZAR -->
	<div class="row">
		<div  class="col-md-7">
				<button id="btnActualizar" type="button" class="btn btn-success btn-lg pull-right">Actualizar</button>
		</div>
	</div>
</form>