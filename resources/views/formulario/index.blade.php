@extends('index')

@section('styles')
	<style type="text/css">
/*.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 100px;
}*/

.espacio {
	margin-bottom: 6px;
}

/*bloque para usar los iconos*/
@font-face {
  font-family: 'Glyphicons Halflings';
  src: url('../fonts/glyphicons-halflings-regular.eot');
  src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
}
.glyphicon {
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: normal;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.glyphicon-th-large:before {
  content: "\e010";
}
.glyphicon-th:before {
  content: "\e011";
}
.glyphicon-th-list:before {
  content: "\e012";
}

/*funcion para la etiqueta <hr> personalizada*/
hr.soften {
  height: 1px;
  background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(67, 168, 22, 0.9), rgba(0,0,0,0));
  background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(67, 168, 22, 0.9), rgba(0,0,0,0));
  background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(67, 168, 22, 0.9), rgba(0,0,0,0));
  background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(67, 168, 22, 0.9), rgba(0,0,0,0));
  border: 0;
}

.typeahead, .typeahead2, .tt-query, .tt-hint {
	border: 1px solid #CCCCCC;
	/*border-radius: 8px;*/
	font-size: 14px;
	/*height: 30px;*/
	/*line-height: 30px;*/
	outline: medium none;

	/*width: 148%;*/
}
.twitter-typeahead{
	width: 100%;
}
.tt-query, .tt-hint {
	padding: 4px 12px;
	width: 100%;
}
.typeahead, .typeahead2 {
	background-color: #FFFFFF;
}
/*.typeahead:focus {
	border: 2px solid #0097CF;
}*/
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	/*padding: 4px 0;*/
	width: 422px;
}
.tt-suggestion {
	font-size: 16px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;border-radius: 8px;
}
.tt-suggestion p {
	margin: 0;
}
.widget-main2{
	margin-top: 30px;
}

.nav-pills > li.active > a, .nav-pills>li.active>a:hover,.nav-pills>li.active>a:focus {
    background-color:#6A913E;
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

				<div class="panel-heading"><h2>Formulario de Aspirante a Doctorado</h2></div>

				<div class="panel-body">
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
				    </ul>
				    <div class="tab-content" id="myTabContent">
				    	<!-- PERSONAL INFO -->
				        <div id="informacionPersonal" class="tab-pane fade in active">
				        	<form role="form" action="#" method="post" class="form-horizontal" enctype="multipart/form-data"><!-- class="form-horizontal" -->
				        	<br/>
				        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
				        	<div class="row">
		                    	<div class="col-lg-6">
		                    		<!--Seleccion de la foto-->
				        			<div class="col-md-5 col-md-offset-4 espacio">
				        				@if(!empty($user->formulario->informacion_aspirante->Asp_Pasaporte_Adj))
				        					<!-- <a class="btn btn-link"  target="_blank" href="{{ '/storage/images/'.$user->formulario->informacion_aspirante->Asp_Pasaporte_Adj}}">{{ $user->formulario->informacion_aspirante->Asp_Pasaporte_Adj }}</a>-->
				        					<img src="{{ '/storage/images/'.$user->formulario->informacion_aspirante->Asp_Pasaporte_Adj}}" class="img-thumbnail">
				        				@else
                                        	<input type="file" name="id_file" id="id_file">
                                        @endif
                                    </div>
					        		<!-- Name of aspirant -->
					        		<div class="form-group">
					        			<label for="name" class="col-md-4 control-label">Nombre:</label>
					        			<div class="col-md-8">
											<input type="text" class="form-control" name="nombre" value="{{ $user->formulario->IPe_Nombre }}">
										</div>
					        		</div>

					        		<!-- Apellidos del aspirante -->

					        		<div class="form-group">
					        			<label for="apellidos" class="col-md-4 control-label">Apellidos:</label>
					        			<div class="col-md-8">
											<input type="text" class="form-control" name="apellidos" value="{{ $user->formulario->IPe_Apellido }}">
										</div>
					        		</div>

					        		<!-- ID or passport of aspirant -->
					        		<div class="form-group">
					        			<label for="id" class="col-md-4 control-label">Cedula o Pasaporte:</label>
					        			<div class="col-md-8">
					        				<input type="text" class="form-control" name="id" value="{{ $user->formulario->IPe_Pasaporte }}">
					        			</div>
					        			
					        		</div>
					        		<!-- Genero del(la) aspirante -->
									<div class="form-group">
										<label for="genero" class="col-md-4 control-label">Género:</label>
										<div class="col-md-8">
											<select name="genero" id="" class="form-control">
												@if(is_null($user->formulario->IPe_Genero) || empty($user->formulario->IPe_Genero))
													<option value="" selected> Seleccione su género</option>
					                                <option value="F"> Femenino</option>
					                                <option value="M"> Másculino</option>
					                            @else
					                            	@if($user->formulario->IPe_Genero == "F")
														<option value="F" selected> Femenino</option>
						                                <option value="M"> Másculino</option>
						                            @elseif($user->formulario->IPe_Genero == "M")
						                            	<option value="F"> Femenino</option>
						                                <option value="M" selected> Másculino</option>
					                            	@endif
					                            @endif
				                            </select>
			                            </div>
					        		</div>
					        		<!-- Fecha de Nacimiento -->
					        		<div class="form-group">
					        			<label for="fecha_nacimiento" class="col-md-4 control-label">Fecha de Nacimiento</label>
					        			<div class="col-md-8">
					        				<div class="input-group date datepicker_control">
					        					@if($user->formulario->IPe_Fecha_Nac == "0000-00-00" || is_null($user->formulario->IPe_Fecha_Nac))
					        						<input type="text" class="datepicker_control form-control" name="fecha_nacimiento" value="">
					        					@else
					        						<!-- Conversión del formato de la fecha -->
					        						<?php
														$date_obj = date_create_from_format('Y-m-d',$user->formulario->IPe_Fecha_Nac);
														$fecha_nacimiento = date_format($date_obj, 'd/m/Y');
					        						?>
													<input type="text" class="datepicker_control form-control" name="fecha_nacimiento" value="{{ $fecha_nacimiento }}">
												@endif
												<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
											</div>
					        			</div>
					        		</div>
					        		<!-- Lugar de Nacimiento -->
									<div class="form-group">
										<label for="lugarNacimiento" class="col-md-4 control-label">Lugar de nacimiento:</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="lugar_nacimiento" value="{{ $user->formulario->informacion_aspirante->Asp_Lugar_Nac }}">
										</div>
									</div>
									<!-- Nacionalidad -->
									<div class="form-group">
										<label for="nacionalidad" class="col-md-4 control-label">Nacionalidad:</label>
										<div class="col-md-8">
											<div class="bs-example">
												@if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Nac))
													<input type="text" name="nacionalidad" class="form-control typeahead2 tt-query" autocomplete="off" spellcheck="false" value="{{ $user->formulario->informacion_aspirante->nacionalidad->Nac_Nombre }}" id="#nacionalidad">
												@else
													<input type="text" name="nacionalidad" class="form-control typeahead2 tt-query" autocomplete="off" spellcheck="false" id="#nacionalidad">
												@endif
										    </div>
										</div>
									</div>
									<!-- Teléfono -->
									<div class="form-group">
										<label for="telefono" class="col-md-4 control-label">Teléfono:</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="telefono" value="{{ $user->formulario->IPe_Telefono }}">
										</div>
									</div>									
									<!--Email-->
									<div class="form-group">
					        			<label for="email" class="col-md-4 control-label">Email:</label>
					        			<div class="col-md-7">
					        					@if(!$user->formulario->emails->isEmpty())
						        					<input type="email" class="form-control" name="email" value="{{ $user->formulario->emails()->first()->Email_Email }}">						        				
						        				@else
						        					<input type="email" class="form-control" name="email">
						        				@endif
						        				<br>
						        				@if(!is_null($user->formulario->emails) && $user->formulario->emails()->count() > 1)
						        					<input id="email2" type="email" class="form-control" name="email2" value="{{ $user->formulario->emails[1]->Email_Email }}">
						        				@else
						        					<input id="email2" type="email" class="form-control" name="email2">
						        				@endif
					        			</div>
					        			<button id="agregarNuevoEmail" type="button" class="btn btn-primary btn-sm agregarQuitarNuevoMail" onClick="cambiarTextoDeBoton(this.id)">+</button>
					        		</div>

									<!-- Fax -->
									<div class="form-group">
										<label for="fax" class="col-md-4 control-label">Fax:</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="fax" value="{{ $user->formulario->IPe_Fax }}">
										</div>
									</div>
								</div>
								<!-- End col-lg-6 -->

	                    		<div class="col-lg-6">
	                    			<!-- Enfasis de interes -->
									<div class="form-group">
										<label for="enfasis" class="col-md-4 control-label">Énfasis de interes:</label>
										<div class="col-md-8">
											<select name="enfasis" id="" class="form-control">
												@if(is_null($user->formulario->informacion_aspirante->Asp_ID_Enfasis) || empty($user->formulario->informacion_aspirante->Asp_ID_Enfasis))
													<option value="" selected> Énfasis</option>
													@foreach($enfasis as $enfasi)
														<option value="{{ $enfasi->Enf_ID }}"> {{ $enfasi->Enf_Nombre }}</option>
													@endforeach
					                            @else
					                            	@foreach($enfasis as $enfasi)
					                            		@if($enfasi->Enf_ID == $user->formulario->informacion_aspirante->Asp_ID_Enfasis)
					                            			<option value="{{ $enfasi->Enf_ID }}" selected> {{ $enfasi->Enf_Nombre }}</option>
					                            		@else
					                            			<option value="{{ $enfasi->Enf_ID }}"> {{ $enfasi->Enf_Nombre }}</option>
					                            		@endif
													@endforeach
					                            @endif
				                            </select>
										</div>
									</div>
									<!-- Área en que le interesa desarrollar el tema de investigación -->
									<div class="form-group">
					        			<label for="area_investigacion" class="col-md-4 control-label">Aréa en que le interesaría desarrollar el tema de investigación:</label>
					        			<div class="col-md-8">
											<textarea name="area_investigacion" class="form-control " rows="3">{{ $user->formulario->informacion_aspirante->Asp_Area_Interes }}</textarea>
										</div>
					        		</div>
					        		<h3><u>Dirección actual</u></h3>

		                    		<!-- Pais de Residencia -->
		                    		<div class="form-group">
		                    			<label for="pais_residencia" class="col-md-4 control-label">País de residencia:</label>
		                    			<div class="col-md-8">
											<div class="bs-example">
												@if(!is_null($user->formulario->informacion_aspirante->direccion_actual->pais_residencia))
													<input type="text" name="pais_residencia" class="form-control typeahead tt-query" autocomplete="off" spellcheck="false" value="{{ $user->formulario->informacion_aspirante->direccion_actual->pais_residencia->Pais_Nombre }}" id="pais_residencia">
												@else
													<input type="text" name="pais_residencia" class="form-control typeahead tt-query" autocomplete="off" spellcheck="false">
												@endif
										    </div>
		                    			</div>
		                    		</div>
		                    		<!-- Ciudad -->
		                    		<div class="form-group">
		                    			<label for="ciudad" class="col-md-4 control-label">Ciudad:</label>
		                    			<div class="col-md-8">
		                    				<input type="text" class="form-control" name="ciudad" value="{{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Ciudad }}">
		                    			</div>
		                    		</div>
		                    		<!-- Codigo Postal -->
		                    		<div class="form-group">
		                    			<label for="codigo_postal" class="col-md-4 control-label">Código postal:</label>
		                    			<div class="col-md-8">
		                    				<input type="text" class="form-control" name="codigo_postal" value="{{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Cod_Postal }}">
		                    			</div>
		                    		</div>
		                    		<!-- Direccion para el envio de correspondencia -->
		                    		<div class="form-group">
		                    			<label for="direccion_correspondencia" class="col-md-4 control-label">Dirección para el envío de correspondencia:</label>
		                    			<div class="col-md-8">
		                    				<textarea name="direccion_correspondencia" class="form-control " rows="2">{{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Dir_Corresp }}</textarea>
		                    			</div>
		                    		</div>
	                    		</div>
	                    		<br/>
	                    		<!-- End col-lg-6 -->
					        </div>
					        <!-- End row -->
					        <div class="row">
					        	<div class="form-group">
						        	<label for="direccion_correspondencia" class="col-md-10 control-label"></label>
						        	<!-- name_control -->
						        	<div class="col-md-2">
						        		<div class="form-group">
						        			<input type="submit" class="btn btn-success" value="Actualizar">
						        		</div>
						        	</div>
		                    		<!-- <div class="col-md-6">
					        			<button type="submit" class="btn btn-success btn-lg pull-right">Guardar</button>
						        	</div> -->
						        </div>
					        </div>
					        <!-- End row -->
				        	</form>
				        	<!-- End Form -->
				        </div>

				        <!-- Educacion Superior-->
				        <div id="educacionSuperior" class="tab-pane fade">
				            <form role="form" action="#" method="post" class="form-horizontal">
				        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
				        		<div class="col-md-12">
				        			<h1><small> Educación Superior</small></h1>
				        		</div>
			        		<div id="formularioEducacionSuperior1" class="row blockEducacionSuperior">
				        		<div class="row">
				        			<div class="col-lg-6">
				        				<!--Institucion -->
				        				<div class="form-group">
				        					<label for="institucion" class="col-md-4 control-label labelInstitucion">Institución:</label>
				        					<div class="col-md-8">
				        						<input type="text" class="form-control inputInstitucion" name="institucion" id="institucion">
				        					</div>
				        				</div>

				        				<!--Pais-->
				        				<div class="form-group">
				        					<label for="pais" class="col-md-4 control-label labelPais">País:</label>
				        					<div class="col-md-8">
				        						<input type="text" class="form-control inputPais" name="pais" id="pais">
				        					</div>
				        				</div>

				        				<!--Año de graduacion-->
				        				<div class="form-group">
				        					<label for="añoG" class="col-md-4 control-label labelAñoG">Año de graduación:</label>
				        					<div class="col-md-8 ">
				        					<div class="input-group date año">
				        						<input type="text" class="form-control inputAñoG" name="añoG" id="añoG">
				        						<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i>
			        						</div>
				        					</div>
				        				</div>
			        				</div>
			        				<!--Termina class="col-lg-6"-->

			        				<div class="col-lg-6">
				        				<!--Titulo obtenido -->
				        				<div class="form-group">
				        					<label for="titulo" class="col-md-4 control-label labelTituloObtenido">Título obtenido:</label>
				        					<div class="col-md-8">
				        						<input type="text" class="form-control inputTituloObtenido" name="titulo" id="titulo">
				        					</div>
				        				</div>

				        				<!-- Grado academico -->
										<div class="form-group">
											<label for="gradoA" class="col-md-4 control-label labelGradoA">Grado académico:</label>
											<div class="col-md-8">
												<select id="gradoA" name="gradoA" class="form-control comboboxGradoAcademico">
													<option value="z" selected> Seleccione su género</option>
					                                <option value="a">Bachiller</option>
					                                <option value="b">Doctorado</option>
					                                <option value="c">Maestría</option>
					                            </select>
				                            </div>
						        		</div>

				        			</div>
				        			<!--termina col-lg-6 -->
				        		</div>
				        		<div class="col-md-offset-11">
				    				<input type="checkbox" name="checkBox1" class="claseCheckboxEduSuperior" id="checkboxEduSuperior1" style="display:none">
				    			</div>
				        		<hr class="soften">
			        		</div>
			        		<!--BOTONES para agregar y remover formulario-->
			            		<div  class="col-md-12">
			            			<div >
			            				<button id="btnRemoverEducacionSuperior" type="button" class="btn btn-danger btn-lg pull-right">-</button>
			            			</div>
			            			<div class="col-md-11">
			            				<button id="btnAgregarEducacionSuperior" type="button" class="btn btn-primary btn-lg pull-right">+</button>
			            			</div>
			            		</div>
			            		<br/>
				            </form>
				        </div>
				        <!-- Termina Educacion Superior-->

				        <!--Experiencia profesional-->
				        <div id="experienciaProfesional" class="tab-pane fade">
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
				            	<div class="col-md-offset-11">
				    				<input type="checkbox" name="checkBox1" class="claseCheckboxExpProfesional" id="checkboxExpProfesional1" style="display:none">
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
			            </form>
				        </div>
				        <!--Termina  Experiencia profesional-->

				        <!--Experiencia en Investigacion-->
				        <div id="experienciaEnInvestigacion" class="tab-pane fade">
					    	<form role="form" action="#" method="post" class="form-horizontal">
					    		<br/>
					    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					    		<div id="formularioExpInv1" class="row blockExpInvestigacion">
					    			<div class="row" >
					    			<div  class="col-md-6">
					    				<!--Nombre-->
					    				<div class="form-group">
					    					<label for="nombre" class="col-md-4 control-label labelNombre">Nombre de proyecto o actividad principal:</label>
					    					<div class="col-md-8">
					    						<input type="text" class="form-control inputNombre" name="nombre" id="nombre">
					    					</div>
					    				</div>

					    				<!--Institucion-->
					    				<div class="form-group">
					    					<label for="institucion" class="col-md-4 control-label labelInstitucion">Institución:</label>
					    					<div class="col-md-8">
					    						<input type="text" class="form-control inputInstitucion" name="institucion" id="institucion">
					    					</div>
					    				</div>
				    				</div>
				    				<!--Termina col-md-6-->

				    				<div class="col-md-6">
					    				<!--Lugar-->
					    				<div class="form-group">
					    					<label for="lugar" class="col-md-4 control-label labelLugar">Lugar:</label>
					    					<div class="col-md-8">
					    						<input type="text" class="form-control inputLugar" name="lugar" id="lugar">
					    					</div>
					    				</div>

					    				<!--Año-->
					    				<div class="form-group">
					    					<label for="año" class="col-md-4 control-label labelAño">Año:</label>
					    					<div class="col-md-8 " id="añoI" >
						    					<div class="input-group date año">
						    						<input type="text"  class="form-control inputAño" name="año" id="año">
						    						<span class="input-group-addon "><i class="glyphicon glyphicon-th"></i></span>
					    						</div>
					    					</div>
					    				</div>

				    				</div>
					    			<!--Termina col-md-6-->

					    			</div>
					    			<div class="col-md-offset-11">
					    				<input type="checkbox" name="checkBox1" class="claseCheckboxExpInvestigacion" id="checkboxExpInvestigacion1" style="display:none">
					    			</div>
					    			<hr class="soften">
			            		</div>
			            		<!--BOTONES para agregar y remover formulario-->
			            		<div  class="col-md-12">
			            			 <div >
			            				<button id="btnRemoverExpInvestigacion" type="button" class="btn btn-danger btn-lg pull-right">-</button>
			            			</div>
			            			<div class="col-md-11">
			            				<button id="btnAgregarExpInvestigacion" type="button" class="btn btn-primary btn-lg pull-right">+</button>
			            			</div>
			            		</div>

			            		<br/>
					    	</form>
				    	</div>
				    	<!--Termina Experiencia en Investigacion-->

				    	<!--Trabajos publicados-->
				    	<div id="trabajosPublicados" class="tab-pane fade">
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
					    			<div class="col-md-offset-11">
					    				<input type="checkbox" name="checkBox1" class="claseCheckboxTrabajosPublicados" id="checkboxTrabajosPublicados1" style="display:none">
					    			</div>
					    			<hr class="soften">
				    			</div>
				    			<!--BOTONES para agregar y remover formulario-->
					    		<div  class="col-md-12">
					    			<div >
					    				<button id="btnRemoverTrabajosPublicados" type="button" class="btn btn-danger btn-lg pull-right">-</button>
					    			</div>
					    			<div class="col-md-11">
					    				<button id="btnAgregarTrabajosPublicados" type="button" class="btn btn-primary btn-lg pull-right">+</button>
					    			</div>
					    		</div>
					    		<br/>
				    		</form>
				    	</div>
				    	<!--Termina Trabajos Publicados-->

				    	<!--Cursos mas relevantes-->
				    	<div id="cursosMasRelevantes" class="tab-pane fade">
				    		<form role="form" action="#" method="post" class="form-horizontal">
				    			<br/>
				    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				    			<div id="formularioCursosMasRelevantes1" class="row blockCursosMasRelevantes">
				    				<div class="row">
				    					<div class="col-md-6">
				    						<!--Nombre de actividad-->
				    						<div class="form-group">
				    							<label for="nombre" class="col-md-4 control-label labelNombre">Nombre de actividad:</label>
				    							<div class="col-md-8">
				    								<input type="text" class="form-control inputNombre" name="nombre" id="nombre">
				    							</div>
				    						</div>

				    						<!--Institucion-->
											<div class="form-group">
												<label for="institucion" class="col-md-4 control-label labelInstitucion">Institución:</label>
												<div class="col-md-8">
													<input type="text" class="form-control inputInstitucion" name="institucion" id="institucion">
												</div>
											</div>
										</div>
										<!--Termina col-md6-->

										<div class="col-md-6">
											<!--Lugar-->
											<div class="form-group">
												<label for="lugar" class="col-md-4 control-label labelLugar">Lugar:</label>
												<div class="col-md-8">
													<input type="text" class="form-control inputLugar" name="lugar" id="lugar">
												</div>
											</div>

											<!--Año-->
											<div class="form-group">
												<label for="año" class="col-md-4 control-label labelAño">Año:</label>
												<div class="col-md-8 " id="añoI" >
							    					<div class="input-group date año">
							    						<input type="text"  class="form-control inputAño" name="año" id="año">
							    						<span class="input-group-addon "><i class="glyphicon glyphicon-th"></i></span>
													</div>
												</div>
											</div>
										</div>
										<!--Termina col-md-6-->
				    				</div>	
				    				<div class="col-md-offset-11">
					    				<input type="checkbox" name="checkBox1" class="claseCheckboxCursosMasRelevantes" id="checkboxCursosMasRelevantes1" style="display:none">
					    			</div>
				    				<hr class="soften">
				    			</div>
				    			<!--BOTONES para agregar y remover formulario-->
								<div  class="col-md-12">
									<div >
										<button id="btnRemoverCursosMasRelevantes" type="button" class="btn btn-danger btn-lg pull-right">-</button>
									</div>
									<div class="col-md-11">
										<button id="btnAgregarCursosMasRelevantes" type="button" class="btn btn-primary btn-lg pull-right">+</button>
									</div>
								</div>
								<br/>
				    		</form>
				    	</div>
				    	<!--Termina Cursos mas Relevantes -->

				    	<!-- Conocimiento de idiomas-->
				    	<div id="conocimientoDeIdiomas" class="tab-pane fade">
				    		<form role="form" action="#" method="post" class="form-horizontal">
					    		<br/>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">	
								<div id="formularioConocimientoDeIdiomas1" class="row blockconocimientoDeIdiomas">
									<div class="row">
										<div class="col-md-6">
											<!--Nombre-->
											<div class="form-group">
												<label for="nombre" class="col-md-4 control-label labelNombre">Nombre de proyecto o actividad principal:</label>
												<div class="col-md-8">
													<input type="text" class="form-control inputNombre" name="nombre" id="nombre">
												</div>
											</div>

											<!--Nivel de escritura-->
											<div class="form-group">
											<label for="nivelEscritura" class="col-md-4 control-label labelNivelEscritura">Nivel de escritura:</label>
												<div class="col-md-8">
													<select name="nivelEscritura" id="nivelEscritura" class="form-control comboboxNivelEscritura">
															<option value="" selected>Nivel</option>
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
													<select name="nivelLectura" id="nivelLectura" class="form-control comboboxNivelLectura">
															<option value="" selected>Nivel</option>
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
													<select name="nivelCoversacional" id="nivelConversacional" class="form-control comboboxNivelConversacional">
															<option value="" selected>Nivel</option>
															<option value="">Basico</option>
										        			<option value="">Itermedio</option>
										        			<option value="">Avanzado</option>
												    </select>
												</div>
											</div>	
										</div>
										<!--Termina col-md-6-->
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
									</div>
								</div>
								<br/>
				    		</form>
				    	</div>
				    	<!-- Termina Conocimiento de Idiomas-->
				    </div>
					<!-- End Tabs -->
				</div>
			</div>
		<!-- </div>
	</div>
</div> -->
</div>
</div>
@endsection


@section('scripts')



	<!--para agregar y remover divs-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<!--el input del email2 escondido desde que se carga la pagina-->
	<!-- <script type="text/javascript">
		$("#email2").fadeOut("fast");
	</script> -->
	<!-- Lista desplegable -->
	<script src="/js/bootstrap-combobox.js"></script>
	<!-- Calendario -->
	<script src="/js/bootstrap-datepicker.js"></script>
	<!-- Diccionario en español para el calendario -->
	<script src="/js/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>

	

	<script type="text/javascript">
	 	$('.datepicker_control').datepicker({
		    language: "es",
		    autoclose: true,
		    todayHighlight: true
		});
	</script>

	<!-- -->
	<script type="text/javascript">
        $('.año').datepicker( {
	    format: ' yyyy',
	    viewMode: 'years',
	    minViewMode: 'years',
	    autoclose:true
	  });

	</script>

	<script type="text/javascript">
	//funcion para cambiar texto del boton de email
		function cambiarTextoDeBoton(button_id) 
		{
			
			   var el = document.getElementById(button_id);
			   if (el.firstChild.data == "+") 
			   {
			       el.firstChild.data = "-";
			       $(el).removeClass("btn-primary").addClass("btn-danger");
			       $("#email2").fadeToggle("slow");
					$("#email2").val(null);
			   }
			   else 
			   {
			   		if (confirm("¿Esta seguro(a) que quiere remover esta sección?")) {
					    el.firstChild.data = "+";
					    $(el).removeClass("btn-danger").addClass("btn-primary");
					    $("#email2").fadeToggle("slow");
						$("#email2").val(null);
				    };
			   }
		}
	</script>


	<script  type="text/javascript" src="typeahead.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		var paises = <?php echo "".($paises); ?>;		
		var nacionalidades = <?php echo "".($nacionalidades); ?>;
		$('input.typeahead').typeahead({
			name: 'pais_residencia',
			local:  paises
		});
		$('input.typeahead2').typeahead({
			name: 'nacionalidad',
			local:  nacionalidades
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


<!--FUNCION DE LOS BOTONES DE LA VISTA CURSOS Y SEMINARIOS MAS RELEVANTES-->
	<script type="text/javascript">
		$(function () {
		    $('#btnAgregarCursosMasRelevantes').click(function () {
		        var num     = $('.blockCursosMasRelevantes').length, // how many "duplicatable" input fields we currently have
		            newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
		            newElem = $('#formularioCursosMasRelevantes' + num).clone().attr('id', 'formularioCursosMasRelevantes' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

		    //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
		    // este no vaya con los atributos de los inputs anteriores

		        //Nombre - text
		        newElem.find('.labelNombre').attr('for','ID'+newNum+'_nombre');
		        newElem.find('.inputNombre').attr('id','ID'+newNum+'_nombre').attr('name','ID'+newNum+'_nombre').val('');

		        //Institucion - text
		        newElem.find('.labelInstitucion').attr('for','ID'+newNum+'_institucion');
		        newElem.find('.inputInstitucion').attr('id','ID'+newNum+'_institucion').attr('name','ID'+newNum+'_institucion').val('');

		 		//Lugar - text
		        newElem.find('.labelLugar').attr('for','ID'+newNum+'_lugar');
		        newElem.find('.inputLugar').attr('id','ID'+newNum+'_lugar').attr('name','ID'+newNum+'_lugar').val('');

		        //Año - text
		        newElem.find('.labelAño').attr('for','ID'+newNum+'_año');
		        newElem.find('.inputAño').attr('id','ID'+newNum+'_año').attr('name','ID'+newNum+'_año').val('');

		        //Checkbox - remover
		        newElem.find('.claseCheckboxCursosMasRelevantes').attr('style','').attr('id','checkboxCursosMasRelevantes'+newNum).attr('checked',false);


		    // insert the new element after the last "duplicatable" input field
		    //insertar nuevo elemento despues del ultimo input duplicado
		        $('#formularioCursosMasRelevantes' + num).after(newElem);
		        //$('#ID' + newNum + '_title').focus();

		    // habilita el boton de remover
		        $('#btnRemoverCursosMasRelevantes').attr('disabled', false);

		    // condicion de cuantas duplicaciones estan permitidas hacer
		        if (newNum == 5)
		        $('#btnAgregarCursosMasRelevantes').attr('disabled', true);

		    	//FUNCION QUE SE LLAMA DE NUEVO PARA QUE LOS CAMPOS DE AÑO SE PUEDAN EJECUTAR SIN PROBLEMA
			    $('.año').datepicker( {
				    format: ' yyyy',
				    viewMode: 'years',
				    minViewMode: 'years',
				    autoclose:true
			  	});
		    });

		    $('#btnRemoverCursosMasRelevantes').click(function () {
		        
		                var num = $('.blockCursosMasRelevantes').length;
		                // cuantos inputs duplicados se tiene hasta el momento
		                var eliminados=0;
		                for (var i = 2 ; i<=num; i++) {
		                	if ($('#checkboxCursosMasRelevantes'+i).is(':checked')) {
								//alert('chequeado');
								if (confirm("¿Esta seguro(a) que quiere remover esta sección?\nSeccion #"+i)){
									eliminados++;
									$('#formularioCursosMasRelevantes' + i).slideUp('slow', function () {$(this).remove();
										
						                $('#btnAgregarCursosMasRelevantes').attr('disabled', false);

						                var cont=2;
						                for (var i = 2; i <= 5; i++) {
						                	var elemento=document.getElementById('formularioCursosMasRelevantes'+i);
						                	if (elemento!=null) {
						                		nElem=$('#formularioCursosMasRelevantes'+i).attr('id', 'formularioCursosMasRelevantes' + cont);

						                		//Nombre - text
										        nElem.find('.labelNombre').attr('for','ID'+cont+'_nombre');
										        nElem.find('.inputNombre').attr('id','ID'+cont+'_nombre').attr('name','ID'+cont+'_nombre');

										        //Institucion - text
										        nElem.find('.labelInstitucion').attr('for','ID'+cont+'_institucion');
										        nElem.find('.inputInstitucion').attr('id','ID'+cont+'_institucion').attr('name','ID'+cont+'_institucion');

										 		//Lugar - text
										        nElem.find('.labelLugar').attr('for','ID'+cont+'_lugar');
										        nElem.find('.inputLugar').attr('id','ID'+cont+'_lugar').attr('name','ID'+cont+'_lugar');

										        //Año - text
										        nElem.find('.labelAño').attr('for','ID'+cont+'_año');
										        nElem.find('.inputAño').attr('id','ID'+cont+'_año').attr('name','ID'+cont+'_año');

										        //Checkbox - remover
										        nElem.find('.claseCheckboxCursosMasRelevantes').attr('style','').attr('id','checkboxCursosMasRelevantes'+cont);

						                		cont++;
		                					};

		                				};
						            });
								}
								if (num - eliminados === 1)
					                $('#btnRemoverCursosMasRelevantes').attr('disabled', true);
		                	};
		                };
		        return false;
		        $('#btnAgregarCursosMasRelevantes').attr('disabled', false);
		    });
			$('#btnRemoverCursosMasRelevantes').attr('disabled', true);});
	</script>
	</script>

<!--FUNCION DE LOS BOTONES DE LA VISTA TRABAJOS PUBLICADOS-->
	<script type="text/javascript">

		$(function () {
		    $('#btnAgregarTrabajosPublicados').click(function () {
		        var num     = $('.blockTrabajosPublicados').length, // how many "duplicatable" input fields we currently have
		            newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
		            newElem = $('#formularioTrabajosPublicados' + num).clone().attr('id', 'formularioTrabajosPublicados' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

		    //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
		    // este no vaya con los atributos de los inputs anteriores

		        //Titulo de la publicacion - text
		        newElem.find('.labelTituloP').attr('for','ID'+newNum+'_tituloP');
		        newElem.find('.inputTituloP').attr('id','ID'+newNum+'_tituloP').attr('name','ID'+newNum+'_tituloP').val('');

		        //Titulo del medio de publicacion - text
		        newElem.find('.labelTituloMP').attr('for','ID'+newNum+'_tituloMP');
		        newElem.find('.inputTituloMP').attr('id','ID'+newNum+'_tituloMP').attr('name','ID'+newNum+'_tituloMP').val('');

		 		//Pais de publicacion - text
		        newElem.find('.labelPais').attr('for','ID'+newNum+'_pais');
		        newElem.find('.inputPais').attr('id','ID'+newNum+'_pais').attr('name','ID'+newNum+'_pais').val('');

		        //Año - text
		        newElem.find('.labelAño').attr('for','ID'+newNum+'_año');
		        newElem.find('.inputAño').attr('id','ID'+newNum+'_año').attr('name','ID'+newNum+'_año').val('');

		        //Checkbox - remover
		        newElem.find('.claseCheckboxTrabajosPublicados').attr('style','').attr('id','checkboxTrabajosPublicados'+newNum).attr('checked',false);


		    // insert the new element after the last "duplicatable" input field
		    //insertar nuevo elemento despues del ultimo input duplicado
		        $('#formularioTrabajosPublicados' + num).after(newElem);
		        //$('#ID' + newNum + '_title').focus();

		    // habilita el boton de remover
		        $('#btnRemoverTrabajosPublicados').attr('disabled', false);

		    // condicion de cuantas duplicaciones estan permitidas hacer
		        if (newNum == 5)
		        $('#btnAgregarTrabajosPublicados').attr('disabled', true).prop('value', "No se puede agregar mas formularios");

		    	//FUNCION QUE SE LLAMA DE NUEVO PARA QUE LOS CAMPOS DE AÑO SE PUEDAN EJECUTAR SIN PROBLEMA
			    $('.año').datepicker( {
				    format: ' yyyy',
				    viewMode: 'years',
				    minViewMode: 'years',
				    autoclose:true
			  	});
		    });

		    $('#btnRemoverTrabajosPublicados').click(function () {
		        
		                var num = $('.blockTrabajosPublicados').length;
		                // cuantos inputs duplicados se tiene hasta el momento
		                var eliminados=0;
		                for (var i = 2 ; i<=num; i++) {
		                	if ($('#checkboxTrabajosPublicados'+i).is(':checked')) {
								//alert('chequeado');
								if (confirm("¿Esta seguro(a) que quiere remover esta sección?\nSeccion #"+i)){
									eliminados++;
									$('#formularioTrabajosPublicados' + i).slideUp('slow', function () {$(this).remove();

					                    if (num -1 === 1)
					                		$('#btnRemoverTrabajosPublicados').attr('disabled', true);

						                $('#btnAgregarTrabajosPublicados').attr('disabled', false).prop('value', "add section");

						                var cont=2;
						                for (var i = 2; i <= 5; i++) {
						                	var elemento=document.getElementById('formularioTrabajosPublicados'+i);
						                	if (elemento!=null) {
						                		nElem=$('#formularioTrabajosPublicados'+i).attr('id', 'formularioTrabajosPublicados' + cont);

						                		//Titulo de la publicacion - text
										        nElem.find('.labelTituloP').attr('for','ID'+cont+'_tituloP');
										        nElem.find('.inputTituloP').attr('id','ID'+cont+'_tituloP').attr('name','ID'+cont+'_tituloP');

										        //Titulo del medio de publicacion - text
										        nElem.find('.labelTituloMP').attr('for','ID'+cont+'_tituloMP');
										        nElem.find('.inputTituloMP').attr('id','ID'+cont+'_tituloMP').attr('name','ID'+cont+'_tituloMP');

										 		//Pais de publicacion - text
										        nElem.find('.labelPais').attr('for','ID'+cont+'_pais');
										        nElem.find('.inputPais').attr('id','ID'+cont+'_pais').attr('name','ID'+cont+'_pais');

										        //Año - text
										        nElem.find('.labelAño').attr('for','ID'+cont+'_año');
										        nElem.find('.inputAño').attr('id','ID'+cont+'_año').attr('name','ID'+cont+'_año');

										        //Checkbox - remover
										        nElem.find('.claseCheckboxTrabajosPublicados').attr('style','').attr('id','checkboxTrabajosPublicados'+cont);

						                		cont++;
		                					};

		                				};
						            });
								}
								if (num - eliminados === 1)
					                $('#btnRemoverTrabajosPublicados').attr('disabled', true);
		                	};
		                };
		        return false;
		        $('#btnAgregarTrabajosPublicados').attr('disabled', false);
		    });
			$('#btnRemoverTrabajosPublicados').attr('disabled', true);});
	</script>


<!--FUNCION DE LOS BOTONES DE LA VISTA EXPERIENCIA_EN_INVESTIGACION-->
	<script type="text/javascript">

		$(function () {
		    $('#btnAgregarExpInvestigacion').click(function () {
		        var num     = $('.blockExpInvestigacion').length, // how many "duplicatable" input fields we currently have
		            newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
		            newElem = $('#formularioExpInv' + num).clone().attr('id', 'formularioExpInv' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

		    //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
		    // este no vaya con los atributos de los inputs anteriores

		        //Nombre - text
		        newElem.find('.labelNombre').attr('for','ID'+newNum+'_nombre');
		        newElem.find('.inputNombre').attr('id','ID'+newNum+'_nombre').attr('name','ID'+newNum+'_nombre').val('');

		        //Institucion - text
		        newElem.find('.labelInstitucion').attr('for','ID'+newNum+'_institucion');
		        newElem.find('.inputInstitucion').attr('id','ID'+newNum+'_institucion').attr('name','ID'+newNum+'_institucion').val('');

		 		//Lugar - text
		        newElem.find('.labelLugar').attr('for','ID'+newNum+'_lugar');
		        newElem.find('.inputLugar').attr('id','ID'+newNum+'_lugar').attr('name','ID'+newNum+'_lugar').val('');

		        //Año - text
		        newElem.find('.labelAño').attr('for','ID'+newNum+'_año');
		        newElem.find('.inputAño').attr('id','ID'+newNum+'_año').attr('name','ID'+newNum+'_año').val('');

		        //Checkbox - remover
		        newElem.find('.claseCheckboxExpInvestigacion').attr('style','').attr('id','checkboxExpInvestigacion'+newNum).attr('checked',false);


		    // insert the new element after the last "duplicatable" input field
		    //insertar nuevo elemento despues del ultimo input duplicado
		        $('#formularioExpInv' + num).after(newElem);
		        //$('#ID' + newNum + '_title').focus();

		    // habilita el boton de remover
		        $('#btnRemoverExpInvestigacion').attr('disabled', false);

		    // condicion de cuantas duplicaciones estan permitidas hacer
		        if (newNum == 5)
		        $('#btnAgregarExpInvestigacion').attr('disabled', true).prop('value', "No se puede agregar mas formularios");

		    	//FUNCION QUE SE LLAMA DE NUEVO PARA QUE LOS CAMPOS DE AÑO SE PUEDAN EJECUTAR SIN PROBLEMA
			    $('.año').datepicker( {
				    format: ' yyyy',
				    viewMode: 'years',
				    minViewMode: 'years',
				    autoclose:true
			  	});
		    });

		$('#btnRemoverExpInvestigacion').click(function () {
		        
		                var num = $('.blockExpInvestigacion').length;
		                // cuantos inputs duplicados se tiene hasta el momento
		                var eliminados=0;
		                for (var i = 2 ; i<=num; i++) {
		                	if ($('#checkboxExpInvestigacion'+i).is(':checked')) {
								//alert('chequeado');
								if (confirm("¿Esta seguro(a) que quiere remover esta sección?\nSeccion #"+i)){
									eliminados++;
									$('#formularioExpInv' + i).slideUp('slow', function () {$(this).remove();

						                $('#btnAgregarExpInvestigacion').attr('disabled', false).prop('value', "add section");

						                var cont=2;
						                for (var i = 2; i <= 5; i++) {
						                	var elemento=document.getElementById('formularioExpInv'+i);
						                	if (elemento!=null) {
						                		nElem=$('#formularioExpInv'+i).attr('id', 'formularioExpInv' + cont);

						                		//Nombre - text
										        nElem.find('.labelNombre').attr('for','ID'+cont+'_nombre');
										        nElem.find('.inputNombre').attr('id','ID'+cont+'_nombre').attr('name','ID'+cont+'_nombre');

										        //Institucion - text
										        nElem.find('.labelInstitucion').attr('for','ID'+cont+'_institucion');
										        nElem.find('.inputInstitucion').attr('id','ID'+cont+'_institucion').attr('name','ID'+cont+'_institucion');

										 		//Lugar - text
										        nElem.find('.labelLugar').attr('for','ID'+cont+'_lugar');
										        nElem.find('.inputLugar').attr('id','ID'+cont+'_lugar').attr('name','ID'+cont+'_lugar');

										        //Año - text
										        nElem.find('.labelAño').attr('for','ID'+cont+'_año');
										        nElem.find('.inputAño').attr('id','ID'+cont+'_año').attr('name','ID'+cont+'_año');

										        //Checkbox - remover
										        nElem.find('.claseCheckboxExpInvestigacion').attr('style','').attr('id','checkboxExpInvestigacion'+cont);

						                		cont++;
		                					};

		                				};
						            });
								}
								if (num - eliminados === 1)
					                $('#btnRemoverExpInvestigacion').attr('disabled', true);
		                	};
		                };
		        return false;
		        $('#btnAgregarExpInvestigacion').attr('disabled', false);
		    });
			$('#btnRemoverExpInvestigacion').attr('disabled', true);});
	</script>


<!--FUNCION DE LOS BOTONES DE LA VISTA EDUCACION_SUPERIOR-->
  <script type="text/javascript">

		$(function () {
		    $('#btnAgregarEducacionSuperior').click(function () {
		        var num     = $('.blockEducacionSuperior').length, // how many "duplicatable" input fields we currently have
		            newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
		            newElem = $('#formularioEducacionSuperior' + num).clone().attr('id', 'formularioEducacionSuperior' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

		    //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
		    // este no vaya con los atributos de los inputs anteriores
		        //Institucion - text
		        newElem.find('.labelInstitucion').attr('for','ID'+newNum+'_institucion');
		        newElem.find('.inputInstitucion').attr('id','ID'+newNum+'_institucion').attr('name','ID'+newNum+'_institucion').val('');

		        //Pais - text
		        newElem.find('.labelPais').attr('for','ID'+newNum+'_pais');
		        newElem.find('.inputPais').attr('id','ID'+newNum+'_pais').attr('name','ID'+newNum+'_pais').val('');

		        //Año de graduacion - text
		        newElem.find('.labelAñoG').attr('for','ID'+newNum+'_añoG');
		        newElem.find('.inputAñoG').attr('id','ID'+newNum+'_añoG').attr('name','ID'+newNum+'_añoG').val('');

		 		//Titulo Obtenido - text
		        newElem.find('.labelTituloObtenido').attr('for','ID'+newNum+'_titulo');
		        newElem.find('.inputTituloObtenido').attr('id','ID'+newNum+'_titulo').attr('name','ID'+newNum+'_titulo').val('');

				//Grado academico - text
		        newElem.find('.labelGradoA').attr('for','ID'+newNum+'_gradoA');
		        newElem.find('.comboboxGradoAcademico').attr('id','ID'+newNum+'_gradoA').attr('name','ID'+newNum+'_gradoA').val('');		        

		        //Checkbox - remover
		        newElem.find('.claseCheckboxEduSuperior').attr('style','').attr('id','checkboxEduSuperior'+newNum).attr('checked',false);


		    // insert the new element after the last "duplicatable" input field
		    //insertar nuevo elemento despues del ultimo input duplicado
		        $('#formularioEducacionSuperior' + num).after(newElem);
		        //$('#ID' + newNum + '_title').focus();

		    // habilita el boton de remover
		        $('#btnRemoverEducacionSuperior').attr('disabled', false);

		    // condicion de cuantas duplicaciones estan permitidas hacer
		        if (newNum == 5)
		        $('#btnAgregarEducacionSuperior').attr('disabled', true).prop('value', "No se puede agregar mas formularios");

		    	//FUNCION QUE SE LLAMA DE NUEVO PARA QUE LOS CAMPOS DE AÑO SE PUEDAN EJECUTAR SIN PROBLEMA
			    $('.año').datepicker( {
				    format: ' yyyy',
				    viewMode: 'years',
				    minViewMode: 'years',
				    autoclose:true
			  	});
		    });

		     	$('#btnRemoverEducacionSuperior').click(function () {
		        
		                var num = $('.blockEducacionSuperior').length;
		                // cuantos inputs duplicados se tiene hasta el momento
		                var eliminados=0;
		                for (var i = 2; i <= num; i++) {
		                	if ($('#checkboxEduSuperior'+i).is(':checked')) {
		                		if (confirm("¿Esta seguro(a) que quiere remover esta sección?\nSeccion #"+i)){
		                			eliminados++;
		                			$('#formularioEducacionSuperior' + i).slideUp('slow', function () {$(this).remove();

					                $('#btnAgregarEducacionSuperior').attr('disabled', false).prop('value', "add section");
 
					                var cont=2;
					                for (var i = 2; i <= 5; i++) {
					                	var elemento=document.getElementById('formularioEducacionSuperior'+i);
					                	if (elemento!=null) {
					                		nElem=$('#formularioEducacionSuperior'+i).attr('id', 'formularioEducacionSuperior' + cont);

					                		//Institucion - text
									        nElem.find('.labelInstitucion').attr('for','ID'+cont+'_institucion');
									        nElem.find('.inputInstitucion').attr('id','ID'+cont+'_institucion').attr('name','ID'+cont+'_institucion');

									        //Pais - text
									        nElem.find('.labelPais').attr('for','ID'+cont+'_pais');
									        nElem.find('.inputPais').attr('id','ID'+cont+'_pais').attr('name','ID'+cont+'_pais');

									        //Año de graduacion - text
									        nElem.find('.labelAñoG').attr('for','ID'+cont+'_añoG');
									        nElem.find('.inputAñoG').attr('id','ID'+cont+'_añoG').attr('name','ID'+cont+'_añoG');

									 		//Titulo Obtenido - text
									        nElem.find('.labelTituloObtenido').attr('for','ID'+cont+'_titulo');
									        nElem.find('.inputTituloObtenido').attr('id','ID'+cont+'_titulo').attr('name','ID'+cont+'_titulo');

											//Grado academico - text
									        nElem.find('.labelGradoA').attr('for','ID'+cont+'_gradoA');
									        nElem.find('.comboboxGradoAcademico').attr('id','ID'+cont+'_gradoA').attr('name','ID'+cont+'_gradoA');		        

									        //Checkbox - remover
									        nElem.find('.claseCheckboxEduSuperior').attr('style','').attr('id','checkboxEduSuperior'+cont);

									        cont++;
					                	};
					                };
					            });    
	                		};
	                		if (num - eliminados === 1)
				                $('#btnRemoverEducacionSuperior').attr('disabled', true);
	                	};
	                };
		        return false;
		        $('#btnAgregarEducacionSuperior').attr('disabled', false);
		    });
			$('#btnRemoverEducacionSuperior').attr('disabled', true);});
	</script>

<!--FUNCION DE LOS BOTONES DE LA VISTA EXPERIENCIA_PROFESIONAL-->
	<script type="text/javascript">

		$(function () {
		    $('#btnAgregarExpProfesional').click(function () {
		        var num     = $('.blockExpProfesional').length, // how many "duplicatable" input fields we currently have
		            newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
		            newElem = $('#formularioExpProfesional' + num).clone().attr('id', 'formularioExpProfesional' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

			    //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
			    // este no vaya con los atributos de los inputs anteriores

		        //Empresa - text
		        newElem.find('.labelEmpresa').attr('for','ID'+newNum+'_empresa');
		        newElem.find('.inputEmpresa').attr('id','ID'+newNum+'_empresa').attr('name','ID'+newNum+'_empresa').val('');

		        //Ocupacion - text
		        newElem.find('.labelOcupacion').attr('for','ID'+newNum+'_ocupacion');
		        newElem.find('.inputOcupacion').attr('id','ID'+newNum+'_ocupacion').attr('name','ID'+newNum+'_ocupacion').val('');

		        //Años de experiencia - text
		        newElem.find('.labelAñosExp').attr('for','ID'+newNum+'_añosExp');
		        newElem.find('.año').attr('id','ID'+newNum+'_añosExp').attr('name','ID'+newNum+'_añosExp').val('');

		 		//Descripcion - text
		        newElem.find('.labelDescripcion').attr('for','ID'+newNum+'_descripcion');
		        newElem.find('.textareaDescripcion').attr('id','ID'+newNum+'_descripcion').attr('name','ID'+newNum+'_descripcion').attr('disabled',true).val('');

		        //Checkbox - remover
	        	newElem.find('.claseCheckboxExpProfesional').attr('style','').attr('id','checkboxExpProfesional'+newNum).attr('checked',false);

		    //insertar nuevo elemento despues del ultimo input duplicado
		        $('#formularioExpProfesional' + num).after(newElem);
		        //$('#ID' + newNum + '_title').focus();

		    // habilita el boton de remover
		        $('#btnRemoverExpProfesional').attr('disabled', false);

		    // condicion de cuantas duplicaciones estan permitidas hacer
		        if (newNum == 5)
		        $('#btnAgregarExpProfesional').attr('disabled', true).prop('value', "No se puede agregar mas formularios");

		    	//FUNCION QUE SE LLAMA DE NUEVO PARA QUE LOS CAMPOS DE AÑO SE PUEDAN EJECUTAR SIN PROBLEMA
			    $('.año').datepicker( {
				    format: ' yyyy',
				    viewMode: 'years',
				    minViewMode: 'years',
				    autoclose:true
			  	});
		    });

		    $('#btnRemoverExpProfesional').click(function () {
		        
		                var num = $('.blockExpProfesional').length;
		                // cuantos inputs duplicados se tiene hasta el momento
		                var eliminados=0;
		                for (var i = 2 ; i<=num; i++) {
		                	if ($('#checkboxExpProfesional'+i).is(':checked')) {
								//alert('chequeado');
								if (confirm("¿Esta seguro(a) que quiere remover esta sección?\nSeccion #"+i)){
									eliminados++;
									$('#formularioExpProfesional' + i).slideUp('slow', function () {$(this).remove();

						                $('#btnAgregarExpProfesional').attr('disabled', false).prop('value', "add section");

						                var cont=2;
						                for (var i = 2; i <= 5; i++) {
						                	var elemento=document.getElementById('formularioExpProfesional'+i);
						                	if (elemento!=null) {
						                		nElem=$('#formularioExpProfesional'+i).attr('id', 'formularioExpProfesional' + cont);

						                		//Empresa - text
										        nElem.find('.labelEmpresa').attr('for','ID'+cont+'_empresa');
										        nElem.find('.inputEmpresa').attr('id','ID'+cont+'_empresa').attr('name','ID'+cont+'_empresa');

										        //Ocupacion - text
										        nElem.find('.labelOcupacion').attr('for','ID'+cont+'_ocupacion');
										        nElem.find('.inputOcupacion').attr('id','ID'+cont+'_ocupacion').attr('name','ID'+cont+'_ocupacion');

										        //Años de experiencia - text
										        nElem.find('.labelAñosExp').attr('for','ID'+cont+'_añosExp');
										        nElem.find('.año').attr('id','ID'+cont+'_añosExp').attr('name','ID'+cont+'_añosExp');

										 		//Descripcion - text
										        nElem.find('.labelDescripcion').attr('for','ID'+cont+'_descripcion');
										        nElem.find('.textareaDescripcion').attr('id','ID'+cont+'_descripcion').attr('name','ID'+cont+'_descripcion');

										        //Checkbox - remover
										        nElem.find('.claseCheckboxExpProfesional').attr('style','').attr('id','checkboxExpProfesional'+cont);

						                		cont++;
		                					};

		                				};
						            });
								}
								if (num - eliminados === 1)
					                $('#btnRemoverExpProfesional').attr('disabled', true);
		                	};
		                };
		        return false;
		        $('#btnAgregarExpProfesional').attr('disabled', false);
		    });
			$('#btnRemoverExpProfesional').attr('disabled', true);});
	</script>




@endsection