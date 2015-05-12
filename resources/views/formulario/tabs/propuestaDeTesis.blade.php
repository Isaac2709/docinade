<form role="form" action="#" method="post" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div id="formularioPropuestaTesis" class="blockPropuestaTesis">
		<div class="row">
			<div class="col-md-12">
				
			<!--Definicion del problema-->
			<label for="definicion" class="control-label labelDefinicion">Definición y pertenencia del problema:</label>
			<div class="form-group">
				<div class="col-md-12">
					<textarea  class="form-control textareaDefinicion" name="definicion" id="definicion" rows="5"></textarea>
				</div>
			</div>
			<!--Termian definicion del problema-->

			<!--Marco teorico-->
			<label for="marco" class="control-label labelMarco">Marco Teórico:</label>
			<div class="form-group">
				<div class="col-md-12">
					<textarea  class="form-control textareaMarco" name="marco" id="marco" rows="5"></textarea>
				</div>
			</div>
			<!-- Termina Marco teorico-->

			<!-- Objetivos-->
			<label for="objetivos" class="control-label labeObjetivos">Objetivos:</label>
			<div class="form-group">
				<div class="col-md-12">
					<textarea  class="form-control textareaObjetivos" name="objetivos" id="objetivos" rows="5"></textarea>
				</div>
			</div>
			<!--Termina Objetivos -->

			<!--Metodologia -->
			<label for="metodologia" class="control-label labeMetodologia">Metodología:</label>
			<div class="form-group">
				<div class="col-md-12">
					<textarea  class="form-control textareaMetodologia" name="metodologia" id="metodologia" rows="5"></textarea>
				</div>
			</div>
			<!-- Termina Metodologia -->

			<!-- Bibliografia-->
			<label for="bibliografia" class="control-label labelBibliografia">Bibliografía:</label>
			<div class="form-group">
				<div class="col-md-12">
					<textarea  class="form-control textareaBibliografia" name="bibliografia" id="bibliografia" rows="5"></textarea>
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