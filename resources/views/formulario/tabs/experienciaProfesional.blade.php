<form role="form" action="formulario/expProfesional" method="post" class="form-horizontal">
    <br/>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-12">
		<h1><small>Experiencia Profesional</small></h1>
	</div>
    @if($user->formulario->informacion_aspirante->experiencias_profesionales->isEmpty())
    <h2><small>Trabajo actual</small></h2>
	<div id="formularioExpProfesional1" class="row blockExpProfesional">
    	<div class="row">
    		<div class="col-md-6">
                <input type="hidden" name="id_exp_prof[]" class="id_exp_prof">
    			<!--Empresa centro o institucion-->
    			<div class="form-group">
    				<label for="empresa" class="col-md-4 control-label labelEmpresa">Empresa, centro o institución:</label>
    				<div class="col-md-8">
    					<input type="text" class="form-control inputEmpresa" name="empresa[]" id="empresa">
    				</div>
    			</div>

    			<!--Ocupacion o posicion-->
    			<div class="form-group">
    				<label for="ocupacion" class="col-md-4 control-label labelOcupacion">Ocupación o posición:</label>
    				<div class="col-md-8">
                        <div class="bs-example">
                            <input type="text" name="ocupacion[]" class="form-control typeahead_ocupacion tt-query inputOcupacion" autocomplete="off" spellcheck="false" id="ocupacion">
                        </div>
    				</div>
    			</div>

    			<!--Años de experiencia -->
    			<div class="form-group">
    				<label for="añosExp" class="col-md-4 control-label labelAñosExp">Años de experiencia:</label>
    				<div class="col-md-8 ">
        			<div class="input-group inputAñosExp" name="añosExp" id="añosExp">
        				<span class="input-group-addon" >Del</span>
        				<input type"text" class="form-control año" name="annio_inicio[]" >
        				<span class="input-group-addon" >a</span>
                        <div class="annio_fin">
                            <fieldset disabled>
                                <input type="text" class="form-control" name="annio_fin[]" placeholder="Actualidad">
                            </fieldset>
                        </div>
        				<!-- <input type"text" class="form-control año" name="annio_fin[]"> -->
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
        <div class="col-md-offset-11">
            <input type="checkbox" name="checkBox1" class="claseCheckboxExpProfesional" id="checkboxExpProfesional1" style="display:none">
        </div>
    	<hr class="soften">
	</div>
    @else
        <?php $count = 1; ?>
        @foreach($user->formulario->informacion_aspirante->experiencias_profesionales_desc as $experiencia_profesional)
            @if($count==1)
                <h2><small>Trabajo actual</small></h2>
            @endif
            <div id="formularioExpProfesional{{ $count }}" class="row blockExpProfesional">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="id_exp_prof[]" class="id_exp_prof" value="{{ $experiencia_profesional->Pro_ID }}">
                        <!--Empresa centro o institucion-->
                        <div class="form-group">
                            <label for="empresa" class="col-md-4 control-label labelEmpresa">Empresa, centro o institución:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control inputEmpresa" name="empresa[]" id="empresa" value="{{ $experiencia_profesional->Pro_Institucion }}">
                            </div>
                        </div>

                        <!--Ocupacion o posicion-->
                        <div class="form-group">
                            <label for="ocupacion" class="col-md-4 control-label labelOcupacion">Ocupación o posición:</label>
                            <div class="col-md-8">
                                <div class="bs-example">
                                    <input type="text" name="ocupacion[]" class="form-control typeahead_ocupacion inputOcupacion tt-query" autocomplete="off" spellcheck="false" id="ocupacion" value="{{ $experiencia_profesional->ocupacion->Ocu_Ocupacion }}">
                                </div>
                            </div>
                        </div>

                        <!--Años de experiencia -->
                        <div class="form-group">
                            <label for="añosExp" class="col-md-4 control-label labelAñosExp">Años de experiencia:</label>
                            <div class="col-md-8 ">
                            <div class="input-group inputAñosExp" name="añosExp" id="añosExp">
                                <span class="input-group-addon" >Del</span>
                                <input type="text" class="form-control año" name="annio_inicio[]" value="{{ $experiencia_profesional->Pro_Anio_Inicio }}">
                                <span class="input-group-addon" >a</span>
                                <div class="annio_fin">
                                @if($count==1)
                                    <fieldset disabled>
                                        <input type="text" class="form-control" name="annio_fin[]" placeholder="Actualidad">
                                    </fieldset>
                                @else
                                    <input type="text" class="form-control año" name="annio_fin[]" value="{{ $experiencia_profesional->Pro_Anio_Fin }}">
                                @endif
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!--Termina col-md-6 -->

                    <!--Funciones que realiza -->
                    @if($count==1)
                        <div class="col-md-6">
                            <label for="descripcion" class="control-label labelDescripcion">Para el trabajo actual, describa brevemente las funciones que realiza:</label>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea  class="form-control textareaDescripcion" name="descripcion_funciones" id="descripcion" rows="4">{{  $experiencia_profesional->Pro_Funciones }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!--Termina col-md-6 -->
                </div>
                @if($count != 1)
                    <div class="col-md-offset-11">
                        <input type="checkbox" name="checkBox1" class="claseCheckboxExpProfesional" id="checkboxExpProfesional{{ $count }}">
                    </div>
                @else
                    <div class="col-md-offset-11">
                        <input type="checkbox" name="checkBox1" class="claseCheckboxExpProfesional" id="checkboxExpProfesional{{ $count }}" @if($count == 1) style="display:none" @endif >
                    </div>
                @endif
                <hr class="soften">
            </div>
            <?php $count = $count + 1; ?>
        @endforeach
    @endif
	<!--BOTONES para agregar y remover formulario-->
        <div  class="col-md-12">
            <div >
                <button id="btnRemoverExpProfesional" type="button" class="btn btn-danger btn-lg pull-right">-</button>
            </div>
            <div class="col-md-11">
                <button id="btnAgregarExpProfesional" type="button" class="btn btn-primary btn-lg pull-right">+</button>
                <input id="btnActualizarExpProfesional" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">
            </div>
        </div>
    <br/>
</form>