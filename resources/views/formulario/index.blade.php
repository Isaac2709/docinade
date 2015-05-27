@extends('index')

@section('styles')

	<!-- Para el input de archivo -->
  	<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet"> -->
  	<!-- para los checkbox animados -->
  	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
  	<link href="{{ asset('/css/custom_styles.css') }}" rel="stylesheet">

  	<style type="text/css">
		textarea
		  {
		    resize: vertical;
		  }
/*bloque que se usa para cambiar color y tamaño de los botones para cargar archivos*/
	.claseBtnArchivoCedula {
		width: 30%;
		color: #000000;
		background-color: #FFFFFF;
		font-size: 10px;
	}
	.btn-file{
		color: #000000;
		background-color: #FFFFFF;
	}
/*---------------------------------------------------------------------*/

	/*bloque para cambiar el color de pestaña de los checkbox personalizados*/
	.toggle-handle{
		background-color: #FFFFFF;
	}


	/*bloque para cambiar el tamaño de las letras de los tabs cuando se acitva y sobrepone*/
	.nav-pills > li.active > a > font{
		font-size: 120%;
	}
	.nav-pills > li > a :hover{
		font-size: 120%;
	}
	/*---------------------------------------*/

	/*bloque q centra todas las etiquetas <td>*/
	td{
		text-align: center;
	}

	/*bloque q sobreescribe stilos de typeahead para poder arreglar el problema de despliegue*/
	.twitter-typeahead .tt-hint
	{
	    height: 37px;

	}




  	</style>

@endsection

@section('page_title')
	Formulario de admisión
@endsection

@section('content')
<!-- <div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1"> -->
		<div class="post-45 page type-page status-publish hentry">
	    <div class="widget-main2">
	    <!-- <div class="widget-inner"> -->
			<div class="panel panel-default">
<!-- display: none; -->
				<div class="panel-heading">
					<div>
						<label class="control-label"><h2>Formulario de Aspirante a Doctorado</h2></label>
						@if($user->formulario->informacion_aspirante->Asp_Estado_Formulario == "No enviado")
						<div class="form-group md-3 pull-right" style="margin-top: 15px;">
							<form method="POST" action="formulario/envFormulario" style="">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<input type="submit" value="Enviar Formulario" class="btn btn-success">
								</div>
							</form>
						</div>
						@endif
					</div>
				</div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title" id="myModalLabel">Datos faltantes</h3>
                            </div>
                            <div class="modal-body">
                            	Es necesario que complete los siguientes datos para poder enviar el formulario:
                            	<ul>
                                @foreach($user->formulario->ConsultarDatosFaltantes() as $dato_faltante)
									<li>{{ $dato_faltante->Res_Campo }}</li>
                                @endforeach
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->


				<div class="panel-body ">
				<?php $porcentaje_completado = $user->formulario->porcentajeFinalizado(); ?>
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="{{ $porcentaje_completado }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $porcentaje_completado }}%;">
						   @if($porcentaje_completado > 5)
								<span class="">
									{{$user->formulario->porcentajeFinalizado()}}% completado
								</span>
								<!-- <a href="" class=""></a> -->
								<a href="" class="fa fa-info-circle fa-info-custom" data-toggle="modal" data-target="#myModal">

                				</a>
							@endif
						</div>
					</div>


					@if(count($user->formulario->ConsultarDatosFaltantes()) > 0)
						<div class="alert alert-info">Datos faltantes:
						{{ count($user->formulario->ConsultarDatosFaltantes()) }}
						</div>
					@endif
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Tuvimos algunos problemas con sus entradas<br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@else
						@if (session()->has('successMessage'))
							<div class="alert alert-success">
							<!-- <ul> -->
								@foreach(session('successMessage') as $message)
									<center><strong>{{ $message }}</strong></center>
								@endforeach
							<!-- </ul> -->
							</div>
						@endif
					@endif
					<!-- TABS -->
					<ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
				        <li class="active"><a data-toggle="tab" href="#informacionPersonal"><font size="1">Información Personal</font></a></li>
				        <li class="dropdown">
				            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><font size="1">Edu. Superior / Exp. Profesional</font><b class="caret"></b></a>
				            <ul class="dropdown-menu">
				                <li><a data-toggle="tab" href="#educacionSuperior">Educacion Superior</a></li>
				                <li><a data-toggle="tab" href="#experienciaProfesional">Experiencia Profesional</a></li>
				            </ul>
				        </li>
				        <li><a class="pesta" data-toggle="tab" href="#experienciaEnInvestigacion"><font  size="1">Experiencia en Investigación</font></a></li>
				        <li><a data-toggle="tab" href="#trabajosPublicados"><font size="1">Trabajos e Investigaciones Publicadas</font></a></li>
				        <li><a data-toggle="tab" href="#cursosMasRelevantes"><font size="1">Cursos y Seminarios más Relevantes</font></a></li>
				        <li><a data-toggle="tab" href="#conocimientoDeIdiomas"><font size="1">Conocimiento de Idiomas Distintos al Materno</font></a></li>
				        <li><a data-toggle="tab" href="#accesoBibliotecas"><font size="1">Acceso a Bibliotecas / Prosesamiento de Datos</font></a></li>
				        <li><a data-toggle="tab" href="#manejoDeProgramas"><font size="1">Manejo de Programas de Computación</font></a></li>
				        <li><a data-toggle="tab" href="#recomendaciones"><font size="1">Recomendaciones</font></a></li>
				        <li><a data-toggle="tab" href="#exportar"><font size="1">Exportar</font></a></li>
				        <li><a data-toggle="tab" href="#propuestaDeTesis"><font size="1">Propuesta de Tesis</font></a></li>
				    </ul>
				    <div class="tab-content" id="myTabContent">
				    	<!-- PERSONAL INFO -->
				        <div id="informacionPersonal" class="tab-pane fade in active">

							@include('formulario.tabs.informacionPersonal')
				        </div>

				        <!-- Educacion Superior-->
				        <div id="educacionSuperior" class="tab-pane fade">
							@include('formulario.tabs.educacionSuperior')
				        </div>
				        <!-- Termina Educacion Superior-->

				        <!--Experiencia profesional-->
				        <div id="experienciaProfesional" class="tab-pane fade">
				        	@include('formulario.tabs.experienciaProfesional')
				        </div>
				        <!-- Termina  Experiencia profesional -->


						<!-- Experiencia en Investigación -->
				        <div id="experienciaEnInvestigacion" class="tab-pane fade">
					    	@include('formulario.tabs.experienciaEnInvestigacion')
				    	</div>
				    	<!--Termina Experiencia en Investigacion-->

						<!-- Trabajos Publicados -->
				    	<div id="trabajosPublicados" class="tab-pane fade">
				    		@include('formulario.tabs.trabajosPublicados')
				    	</div>
						<!--Termina Trabajos Publicados-->

				    	<!--Cursos mas relevantes-->
				    	<div id="cursosMasRelevantes" class="tab-pane fade">
				    		@include('formulario.tabs.cursosRelevantes')
				    	</div>
				    	<!--Termina Cursos mas Relevantes -->

				    	<!-- Conocimiento de idiomas-->
				    	<div id="conocimientoDeIdiomas" class="tab-pane fade">
				    		@include('formulario.tabs.conocimientoDeIdiomas')
				    	</div>
				    	<!-- Termina Conocimiento de Idiomas-->

				    	<!-- Acceso a bibliotecas y Procesamiento de datos-->
				    	<div id="accesoBibliotecas" class="tab-pane fade">
				    		@include('formulario.tabs.accesoBibliotecas')
				    	</div>
				    	<!--Termina Acceso a bibliotecas y Procesamiento de datos -->

				    	<!-- Manejo de Programas de Computacion-->
				    	<div id="manejoDeProgramas" class="tab-pane fade">
				    		@include('formulario.tabs.manejoDeProgramas')
				    	</div>
				    	<!-- Termina Manejo de Programas de Computacion-->

				    	<!-- Recomendaciones-->
				    	<div id="recomendaciones" class="tab-pane fade">
				    		@include('formulario.tabs.recomendaciones')
				    	</div>
				    	<!-- Termina Recomendaciones-->

				    	<!--Propuesta de tesis-->
				    	<div id="propuestaDeTesis" class="tab-pane fade">
				    		@include('formulario.tabs.propuestaDeTesis')
				    	</div>
				    	<!--Termina Propuesta de tesis-->

				    	<!--Exportar-->
						<div id="exportar" class="tab-pane fade">
							<div class="form-group">
								<a class="btn btn-success btn-lg" href="formulario/pdfformulario" target="_blank" >Exportar formulario</a>
							</div>
						</div>
						<!--Termina exportar-->
				    </div>
					<!-- End Tabs -->
				</div>
			</div>
		<!-- </div>
	</div>
</div> -->
</div></div>
@endsection


@section('scripts')
	<!--Para los inputs de tipo archivo (ESTA LIBRERIA PRODUCE ERROR EN LOS DROPDOWN)-->
	<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>-->



	<!--para agregar y remover divs-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<!-- Lista desplegable -->
	<script src="/js/bootstrap-combobox.js"></script>
	<!-- Calendario -->
	<script src="/js/bootstrap-datepicker.js"></script>
	<!-- Diccionario en español para el calendario -->
	<script src="/js/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>

	<!-- Para los checkbox animados-->
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>

	<script  type="text/javascript" src="typeahead.js"></script>


	<script type="text/javascript">
		$(document).ready(function(){
			var instituciones = <?php echo "".($instituciones); ?>;
			var paises = <?php echo "".($paises); ?>;
			var nacionalidades = <?php echo "".($nacionalidades); ?>;
			var areas_especialidad = <?php echo "".($areas_especialidad); ?>;
			var ocupaciones = <?php echo "".($ocupaciones); ?>;

			$('input.typeahead').typeahead({
				name: 'pais_residencia',
				local:  paises
			});
			$('input.typeahead2').typeahead({
				name: 'nacionalidad',
				local:  nacionalidades
			});
			$('input.typeahead_institucion').typeahead({
				name: 'institucion',
				local:  instituciones
			});
			$('input.typeahead_area_especialidad').typeahead({
				name: 'area_especialidad',
				local:  areas_especialidad
			});
			$('input.typeahead_ocupacion').typeahead({
				name: 'ocupacion',
				local:  ocupaciones
			});
			if($("#email2").val()==null || $("#email2").val()==""){
				$("#email2").hide();
				$("#agregarNuevoEmail").removeClass("btn-danger").addClass("btn-primary");
				$("#agregarNuevoEmail").text('+');
			}
			else{
				$("#email2").show();
				$("#agregarNuevoEmail").removeClass("btn-primary").addClass("btn-danger");
				$("#agregarNuevoEmail").text('-');
			}
		});
	</script>


<script type="text/javascript">
	var institucionesGlobal = <?php echo "".($instituciones); ?>;
	var areas_especialidadGlobal = <?php echo "".($areas_especialidad); ?>;
	var paisesGlobal = <?php echo "".($paises); ?>;
	var institucionesGlobal = <?php echo "".($instituciones); ?>;
	var ocupacionesGlobal = <?php echo "".($ocupaciones); ?>;
</script>
<script  type="text/javascript" src="js/form.js"></script>

@endsection