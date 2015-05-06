@extends('index')

@section('styles')
	<link href="{{ asset('/css/custom_styles.css') }}" rel="stylesheet">
	<!-- Para el input de archivo -->
  	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
  	<!-- para los checkbox animados -->
  	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
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

				<div class="panel-heading"><h2>Formulario de Aspirante a Doctorado</h2></div>
				<div class="panel-body">
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
					<ul class="nav nav-pills nav-justified" id="myTab">
				        <li class="active"><a data-toggle="tab" href="#informacionPersonal">Informacion Personal</a></li>
				        <li class="dropdown">
				            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Edu. Superior / Exp. Profesional<b class="caret"></b></a>
				            <ul class="dropdown-menu">
				                <li><a data-toggle="tab" href="#educacionSuperior">Educacion Superior</a></li>
				                <li><a data-toggle="tab" href="#experienciaProfesional">Experiencia Profesional</a></li>
				            </ul>
				        </li>
				        <li><a data-toggle="tab" href="#experienciaEnInvestigacion">Experiencia en Investigación</a></li>
				        <li><a data-toggle="tab" href="#trabajosPublicados">Trabajos e Investigaciones Publicadas</a></li>
				        <li><a data-toggle="tab" href="#cursosMasRelevantes">Cursos y Seminarios más Relevantes</a></li>
				        <li><a data-toggle="tab" href="#conocimientoDeIdiomas">Conocimiento de Idiomas Distintos al Materno</a></li>
				        <li><a data-toggle="tab" href="#accesoBibliotecas">Acceso a Bibliotecas / Prosesamiento de Datos</a></li>
				        <li><a data-toggle="tab" href="#manejoDeProgramas">Manejo de Programas de Computación</a></li>
				        <li><a data-toggle="tab" href="#recomendaciones">Recomendaciones</a></li>
				        <li><a data-toggle="tab" href="#exportar">Exportar</a></li>
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

						<div id="exportar" class="tab-pane fade">
							<div class="form-group">
								<a class="btn btn-success btn-lg" href="formulario/pdfformulario" target="_blank" >Exportar formulario</a>
							</div>
						</div>
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

<script  type="text/javascript" src="typeahead.js"></script>

<script type="text/javascript">
	var institucionesGlobal = <?php echo "".($instituciones); ?>;
	var areas_especialidadGlobal = <?php echo "".($areas_especialidad); ?>;
	var paisesGlobal = <?php echo "".($paises); ?>;
	var institucionesGlobal = <?php echo "".($instituciones); ?>;
	var ocupacionesGlobal = <?php echo "".($ocupaciones); ?>;
</script>
<script  type="text/javascript" src="js/form.js"></script>

@endsection