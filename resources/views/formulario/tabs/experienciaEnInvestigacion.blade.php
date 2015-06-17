<form role="form" action="formulario/expInvestigacion" method="post" class="form form-horizontal">
	<br/>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@if($user->formulario->informacion_aspirante->experiencias_investigaciones->isEmpty())
	<div id="formularioExpInv1" class="blockExpInvestigacion">
		<div class="row divider-h" >
			<div class="col-lg-6">
				<input type="hidden" name="id_exp_inv[]" class="id_exp_inv">
				<!--Nombre-->
				<div class="form-group">
					<label for="nombre" class="col-md-4 control-label labelNombre">Nombre de proyecto o actividad principal:</label>
					<div class="col-md-8">
						<input type="text" class="form-control inputNombre" name="nombre[]" id="nombre">
					</div>
				</div>

				<!--Institucion-->
				<div class="form-group">
					<label for="institucion" class="col-md-4 control-label labelInstitucion">Institución:</label>
					<div class="col-md-8">
						<div class="bs-example">
    						<input type="text" name="institucion[]" class="form-control typeahead_institucion inputInstitucion tt-query" autocomplete="off" spellcheck="false" id="institucion">
							<input type="hidden" name="id_institucion[]"class="id_institucion">
    					</div>
					</div>
				</div>
			</div>
			<!--Termina col-lg-6-->

			<div class="col-lg-6">
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
    						<input type="text"  class="form-control inputAño" name="año[]" id="año">
    						<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-offset-11">
			<input type="checkbox" name="checkBox1" class="claseCheckboxExpInvestigacion" id="checkboxExpInvestigacion1" style="display:none">
		</div>
		<hr class="soften">
	</div>

	@else
		<?php $count = 1; ?>
		@foreach($user->formulario->informacion_aspirante->experiencias_investigaciones_desc as $investigacion)
			<div id="formularioExpInv{{ $count }}" class="blockExpInvestigacion">
				<div class="row divider-h" >
					<div class="col-lg-6">
						<input type="hidden" name="id_exp_inv[]" value="{{ $investigacion->Inv_ID }}" class="id_exp_inv">
						<!--Nombre-->
						<div class="form-group">
							<label for="nombre" class="col-md-4 control-label labelNombre">Nombre de proyecto o actividad principal:</label>
							<div class="col-md-8">
								<input type="text" class="form-control inputNombre" name="nombre[]" id="nombre"value="{{ $investigacion->Inv_Proyecto }}">
							</div>
						</div>

						<!--Institucion-->
						<div class="form-group">
							<label for="institucion" class="col-md-4 control-label labelInstitucion">Institución:</label>
							<div class="col-md-8">
		    					<div class="bs-example">
		    						<!-- <input type="text" class="form-control inputInstitucion" name="institucion[]" id="institucion" > -->
									@if(!is_null($investigacion->Inv_ID_Institucion))
										<input type="text" name="institucion[]" class="form-control typeahead_institucion inputInstitucion tt-query" autocomplete="off" spellcheck="false" value="{{ $investigacion->institucion->Ins_Nombre }}" id="institucion">
										<input type="hidden" name="id_institucion[]" value="{{ $investigacion->Inv_ID_Institucion }}" class="id_institucion">
									@else
										<input type="text" name="institucion[]" class="form-control typeahead_institucion inputInstitucion tt-query" autocomplete="off" spellcheck="false" id="institucion">
										<input type="hidden" name="id_institucion[]" class="id_institucion">
									@endif
								</div>
							</div>
						</div>
					</div>
					<!--Termina col-lg-6-->

					<div class="col-lg-6">
						<!--Lugar-->
						<div class="form-group">
							<label for="lugar" class="col-md-4 control-label labelLugar">Lugar:</label>
							<div class="col-md-8">
								<input type="text" class="form-control inputLugar" name="lugar[]" id="lugar" value="{{ $investigacion->Inv_Lugar }}">
							</div>
						</div>

						<!--Año-->
						<div class="form-group">
							<label for="año" class="col-md-4 control-label labelAño">Año:</label>
							<div class="col-md-8 " id="añoI" >
		    					<div class="input-group date año">
		    						<input type="text"  class="form-control inputAño" name="año[]" id="año" value="{{ $investigacion->Inv_Anio }}">
		    						<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i>
								</div>
							</div>
						</div>
					</div>
					<!--Termina col-lg-6-->
				</div>
				<!-- Termina row divider-h -->
				<div class="col-md-offset-11">
					<input type="checkbox" name="checkBox1" class="claseCheckboxExpInvestigacion" id="checkboxExpInvestigacion{{ $count }}" @if($count == 1) style="display:none" @endif >
				</div>
				<hr class="soften">
			</div>
    		<!-- Termina row blockExpInvestigacion -->
    		<?php $count = $count + 1; ?>
		@endforeach
	@endif
		<!--BOTONES para agregar y remover formulario-->
		<div  class="col-md-12">
			 <div >
				<button id="btnRemoverExpInvestigacion" type="button" class="btn btn-danger btn-lg pull-right">-</button>
			</div>
			<div class="col-md-11">
				<button id="btnAgregarExpInvestigacion" type="button" class="btn btn-primary btn-lg pull-right">+</button>
				@if($user->formulario->informacion_aspirante->Asp_Estado_Formulario != "Enviado")
					<input id="btnActualizarExpInvestigacion" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">
					<input id="btnCancelarExpInvestigacion" class="btn btn-warning btn-lg btn-cancel" type="button" onClick="cancelarActualizacion()" value="Cancelar">
				@endif
			</div>
		</div>
	<br/>
</form>