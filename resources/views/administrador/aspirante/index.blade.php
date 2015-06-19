@extends('administrador.dashboard')

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

	/*bloque para cambiar el color de pestaña de los checkbox personalizados*/
	.toggle-handle{
		background-color: #FFFFFF;
	}


	/*bloque para cambiar el tamaño de las letras de los tabs cuando se acitva y sobrepone*/
	.nav-pills > li.active > a > font{
		font-size: 100%;
	}

	.nav-pills > li > a :hover{
		font-size: 100%;
	}

	/*bloque q sobreescribe stilos de typeahead para poder arreglar el problema de despliegue*/
	.twitter-typeahead .tt-hint
	{
	    height: 37px;
	}

	.labelLeft {
    	vertical-align: middle;
    	text-align: left;
    	font-weight: bold;
    	font-style: italic;
	}

	.labelRight {
    	vertical-align: middle;
    	text-align: left;
	}

	.imageCenter{
		vertical-align: middle;
    	text-align: center;
	}

  	</style>

@endsection

@section('form_active')
	class="active"
@endsection

@section('page_title')
	Información del formulario
@endsection

@section('page_header')
	Información del formulario
@endsection

@section('parent_pages')
	<li><a href="{{ url('/admin/')}}">Formularios</a></li>
@endsection

@section('content')
	<!-- <div class="post-45 page type-page status-publish hentry">
	<div class="widget-main2">
	<div class="panel panel-default"> -->
	<!-- <div class="panel-heading"><h2>Información Aspirante</h2></div> -->
	<div class="panel-body ">
		<!-- TABS -->
		<ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
			<li class="active"><a data-toggle="tab" href="#informacionPersonal"><font size="1">Información Personal</font></a></li>
			<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><font size="1">Educación / Exp. Prof.</font><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a data-toggle="tab" href="#educacionSuperior">Educacion Superior</a></li>
					<li><a data-toggle="tab" href="#experienciaProfesional">Experiencia Profesional</a></li>
				</ul>
			</li>
			<li><a class="pesta" data-toggle="tab" href="#experienciaEnInvestigacion"><font  size="1">Experiencia Investigación</font></a></li>
			<li><a data-toggle="tab" href="#trabajosPublicados"><font size="1">Publicaciones</font></a></li>
			<li><a data-toggle="tab" href="#cursosMasRelevantes"><font size="1">Cursos y Seminarios</font></a></li>
			<li><a data-toggle="tab" href="#conocimientoDeIdiomas"><font size="1">Conocimiento Idiomas</font></a></li>
			<li><a data-toggle="tab" href="#accesoBibliotecas"><font size="1">Bibliotecas / Proc. Datos</font></a></li>
			<li><a data-toggle="tab" href="#manejoDeProgramas"><font size="1">Programas Computación</font></a></li>
			<li><a data-toggle="tab" href="#recomendaciones"><font size="1">Recomendaciones</font></a></li>
			<li><a data-toggle="tab" href="#propuestaDeTesis"><font size="1">Propuesta de Tesis</font></a></li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<!-- PERSONAL INFO -->
			<div id="informacionPersonal" class="tab-pane fade in active">@include('aspirante.tabs.informacionPersonal')</div>
			<!-- Educacion Superior-->
			<div id="educacionSuperior" class="tab-pane fade">@include('aspirante.tabs.educacionSuperior')</div>
			<!--Experiencia profesional-->
			<div id="experienciaProfesional" class="tab-pane fade">@include('aspirante.tabs.experienciaProfesional')</div>
			<!-- Experiencia en Investigación -->
			<div id="experienciaEnInvestigacion" class="tab-pane fade">@include('aspirante.tabs.experienciaEnInvestigacion')</div>
			<!-- Trabajos Publicados -->
			<div id="trabajosPublicados" class="tab-pane fade">@include('aspirante.tabs.trabajosPublicados')</div>
			<!--Cursos mas relevantes-->
			<div id="cursosMasRelevantes" class="tab-pane fade">@include('aspirante.tabs.cursosRelevantes')</div>
			<!-- Conocimiento de idiomas-->
			<div id="conocimientoDeIdiomas" class="tab-pane fade">@include('aspirante.tabs.conocimientoDeIdiomas')</div>
			<!-- Acceso a bibliotecas y Procesamiento de datos-->
			<div id="accesoBibliotecas" class="tab-pane fade">@include('aspirante.tabs.accesoBibliotecas')</div>
			<!-- Manejo de Programas de Computacion-->
			<div id="manejoDeProgramas" class="tab-pane fade">@include('aspirante.tabs.manejoDeProgramas')</div>
			<!-- Recomendaciones-->
			<div id="recomendaciones" class="tab-pane fade">@include('aspirante.tabs.recomendaciones')</div>
			<!--Propuesta de tesis-->
			<div id="propuestaDeTesis" class="tab-pane fade">@include('aspirante.tabs.propuestaDeTesis')</div>
	</div>
	@include('aspirante.butttons')
</div>
@endsection

@section('scripts')
	<!--Para los inputs de tipo archivo (ESTA LIBRERIA PRODUCE ERROR EN LOS DROPDOWN)-->
	<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>-->

	<!--para agregar y remover divs-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script  type="text/javascript" src="js/form.js"></script>

@endsection