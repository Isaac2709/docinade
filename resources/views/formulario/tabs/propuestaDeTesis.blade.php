<form role="form" action="formulario/proTesis" method="post" class="form-horizontal" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div id="formularioPropuestaTesis" class="blockPropuestaTesis">
		<div class="row">
			<div class="col-md-12">
				<!-- Título de la propuesta de tesis -->
				<label for="definicion" class="control-label labelDefinicion">Definición y pertenencia del problema:</label>
				<div class="form-group">
					<div class="col-md-12">
						<input type="text" name="titulo_propuesta" class="form-control" value="{{ $user->formulario->informacion_aspirante->propuesta_tesis->PTe_Titulo or '' }}">
					</div>
				</div>
				<!--Termian Título de la propuesta de tesis-->

				<!--Definicion del problema-->
				<label for="definicion" class="control-label labelDefinicion">Definición y pertenencia del problema:</label>
				<div class="form-group">
					<div class="col-md-12">
						<textarea  class="form-control textareaDefinicion" name="definicion" id="definicion" rows="5">{{ $user->formulario->informacion_aspirante->propuesta_tesis->PTe_Definicion or '' }}</textarea>
					</div>
				</div>
				<!--Termian definicion del problema-->

				<!--Marco teorico-->
				<label for="marco" class="control-label labelMarco">Marco Teórico:</label>
				<div class="form-group">
					<div class="col-md-12">
						<textarea  class="form-control textareaMarco" name="marco_teorico" id="marco" rows="5">{{ $user->formulario->informacion_aspirante->propuesta_tesis->PTe_Marco_Teorico or ''}}</textarea>
					</div>
				</div>
				<!-- Termina Marco teorico-->

				<!-- Objetivos-->
				<label for="objetivos" class="control-label labeObjetivos">Objetivos:</label>
				<div class="form-group">
					<div class="col-md-12">
						<textarea  class="form-control textareaObjetivos" name="objetivos" id="objetivos" rows="5">{{ $user->formulario->informacion_aspirante->propuesta_tesis->PTe_Objetivos or ''}}</textarea>
					</div>
				</div>
				<!--Termina Objetivos -->

				<!--Metodologia -->
				<label for="metodologia" class="control-label labeMetodologia">Metodología:</label>
				<div class="form-group">
					<div class="col-md-12">
						<textarea  class="form-control textareaMetodologia" name="metodologia" id="metodologia" rows="5">{{ $user->formulario->informacion_aspirante->propuesta_tesis->PTe_Metodologia or ''}}</textarea>
					</div>
				</div>
				<!-- Termina Metodologia -->

				<!-- Bibliografia-->
				<label for="bibliografia" class="control-label labelBibliografia">Bibliografía:</label>
				<div class="form-group">
					<div class="col-md-12">
						<textarea  class="form-control textareaBibliografia" name="bibliografia" id="bibliografia" rows="5">{{ $user->formulario->informacion_aspirante->propuesta_tesis->PTe_Bibliografia or ''}}</textarea>
					</div>
				</div>
				<!-- Termina Bibliografia-->
			</div>
		</div>
		<hr class="soften">
	</div>
	<div class="col-md-11">
		<input id="btnActualizarPropuestaDeTesis" class="btn btn-success btn-lg imagenSubmit" type="submit" value="&#xf0c7; Actualizar">
	</div>
	<br/>
</form>