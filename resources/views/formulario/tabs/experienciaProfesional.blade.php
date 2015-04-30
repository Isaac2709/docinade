<form role="form" action="#" method="post" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-12">
		<h1><small>Experiencia Profesional</small></h1>
	</div>
	<div id="formularioExpProfesional1" class="row blockExpProfesional">
    	<div class="row">
    		<div class="col-md-6">
    			<!--Empresa centro o institucion-->
    			<div class="form-group">
    				<label for="empresa" class="col-md-4 control-label labelEmpresa">Empresa, centro o institución:</label>
    				<div class="col-md-8">
    					<input type="text" class="form-control inputEmpresa" name="empresa" id="empresa">
    				</div>
    			</div>

    			<!--Ocupacion o posicion-->
    			<div class="form-group">
    				<label for="ocupacion" class="col-md-4 control-label labelOcupacion">Ocupación o posición:</label>
    				<div class="col-md-8">
    					<input type="text" class="form-control inputOcupacion" name="ocupacion" id="ocupacion">
    				</div>
    			</div>

    			<!--Años de experiencia -->
    			<div class="form-group">
    				<label for="añosExp" class="col-md-4 control-label labelAñosExp">Años de experiencia:</label>
    				<div class="col-md-8 ">
        			<div class="input-group inputAñosExp" name="añosExp" id="añosExp">
        				<span class="input-group-addon" >Del</span>
        				<input type"text" class="form-control año"  >
        				<span class="input-group-addon" >a</span>
        				<input type"text" class="form-control año" >
        			</div>
        			</div>
    			</div>
			</div>
			<!--Termina col-md-6 -->

			<div class="col-md-6">
    			<!--Descripcion-->
    			<label for="descripcion" class="control-label labelDescripcion">Para el trabajo actual, describa brevemente las funciones que realiza:</label>
    			<div class="form-group">
    				<div class="col-md-12">
    					<textarea  class="form-control textareaDescripcion" name="descripcion" id="descripcion" rows="4"></textarea>
    				</div>
    			</div>
    		</div>
    		<!--Termina col-md-6 -->
    	</div>
    	<hr class="soften">
	</div>
	<!--BOTONES para agregar y remover formulario-->
	<div  class="col-md-12">
		<div >
			<button id="btnRemoverExpProfesional" type="button" class="btn btn-danger btn-lg pull-right">-</button>
		</div>
		<div class="col-md-11">
			<button id="btnAgregarExpProfesional" type="button" class="btn btn-primary btn-lg pull-right">+</button>
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