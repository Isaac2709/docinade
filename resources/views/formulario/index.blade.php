@extends('index')

@section('styles')
	<link href="{{ asset('/css/custom_styles.css') }}" rel="stylesheet">
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

				<div class="panel-heading"><h2>Datos Personales</h2></div>

				<div class="panel-body">
					<!-- TABS -->
					<ul class="nav nav-tabs" id="myTab">
				        <li class="active"><a data-toggle="tab" href="#informacionPersonal">Informacion Personal</a></li>
				        <li class="dropdown">
				            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Edu. Superior / Exp. Profesional<b class="caret"></b></a>
				            <ul class="dropdown-menu">
				                <li><a data-toggle="tab" href="#educacionSuperior">Educacion Superior</a></li>
				                <li><a data-toggle="tab" href="#experienciaProfesional">Experiencia Profesional</a></li>
				            </ul>
				        </li>
				        <li><a data-toggle="tab" href="#experienciaEnInvestigacion">Experiencia en Investigación</a></li>
				    </ul>
				    <div class="tab-content" id="myTabContent">
				    	<!-- PERSONAL INFO -->
				        <div id="informacionPersonal" class="tab-pane fade in active">
				        	<form role="form" action="#" method="post" class="form-horizontal" enctype="multipart/form-data"><!-- class="form-horizontal" -->
				        	<br/>
				        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
				        	<div class="row">
		                    	<div class="col-lg-6">
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
					        			<div class="col-md-4 col-md-offset-4">
					        				@if(!empty($user->formulario->informacion_aspirante->Asp_Pasaporte_Adj))
					        					<a class="btn btn-link"  target="_blank" href="{{ '/storage/images/'.$user->formulario->informacion_aspirante->Asp_Pasaporte_Adj}}">{{ $user->formulario->informacion_aspirante->Asp_Pasaporte_Adj }}</a>
					        				@else
                                            	<input type="file" name="id_file" id="id_file">
                                            @endif
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
									<!--Emil-->
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
					        			<button id="agregarNuevoEmail" type="button" class="btn btn-primary btn-sm">+</button>
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
					        		<h4><u>Dirección actual</u></h4>

		                    		<!-- Pais de Residencia -->
		                    		<div class="form-group">
		                    			<label for="pais_residencia" class="col-md-4 control-label">País de residencia:</label>
		                    			<div class="col-md-8">
		                    				<!-- <input type="text" class="form-control" name="pais_residencia"> -->
		                    				<!-- <div id="prefetch">
											  	<input class="typeahead form-control" type="text" placeholder="Countries" data-provide="typeahead" name="pais_residencia">
											</div> -->
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

				        <!-- Educacioin Superior-->
				        <div id="educacionSuperior" class="tab-pane fade">
				            <form role="form" action="#" method="post" class="form-horizontal">
				        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
				        		<div class="col-md-12">
				        			<h1><small> Educación Superior</small></h1>
				        		</div>
				        		<div class="row">
				        			<div class="col-lg-6">
				        				<!--Institucion -->
				        				<div class="form-group">
				        					<label for="institucion" class="col-md-4 control-label">Institución:</label>
				        					<div class="col-md-8">
				        						<input type="text" class="form-control" name="institucion">
				        					</div>
				        				</div>

				        				<!--Pais-->
				        				<div class="form-group">
				        					<label for="pais" class="col-md-4 control-label">País:</label>
				        					<div class="col-md-8">
				        						<input type="text" class="form-control" name="pais">
				        					</div>
				        				</div>

				        				<!--Año de graduacion-->
				        				<div class="form-group">
				        					<label for="añoG" class="col-md-4 control-label">Año de graduación:</label>

				        					<div class="col-md-8 ">
				        					<div class="input-group date año">
				        						<input type="text" class="form-control " name="añoG">
				        						<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i>
			        						</div>
				        					</div>
				        				</div>
			        				</div>
			        				<!--Termina class="col-lg-6"-->

			        				<div class="col-lg-6">
				        				<!--Titulo obtenido -->
				        				<div class="form-group">
				        					<label for="titulo" class="col-md-4 control-label">Título obtenido:</label>
				        					<div class="col-md-8">
				        						<input type="text" class="form-control" name="titulo">
				        					</div>
				        				</div>

				        				<!-- Grado academico -->
										<div class="form-group">
											<label for="gradoA" class="col-md-4 control-label">Grado académico:</label>
											<div class="col-md-8">
												<select name="gradoA" class="form-control">
													<option value="z" selected> Seleccione su género</option>
					                                <option value="a">Bachiller</option>
					                                <option value="b">Doctorado</option>
					                                <option value="c">Maestría</option>
					                            </select>
				                            </div>
						        		</div>

				        			</div>
				        			<!--termina col-lg-6 -->

				        			<div class="col-md-6">
					        			<button id="agregarEduSup" type="button" class="btn btn-primary btn-lg pull-right">+</button>
				        			</div>
				        		</div>
				        		<!-- End row -->
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
				            	<div class="row" id="jeank">
				            		<div class="col-md-6">
				            			<!--Empresa centro o institucion-->
				            			<div class="form-group">
				            				<label for="empresa" class="col-md-4 control-label">Empresa, centro o institución:</label>
				            				<div class="col-md-8">
				            					<input type="text" class="form-control" name="empresa">
				            				</div>
				            			</div>

				            			<!--Ocupacion o posicion-->
				            			<div class="form-group">
				            				<label for="ocupacion" class="col-md-4 control-label">Ocupación o posición:</label>
				            				<div class="col-md-8">
				            					<input type="text" class="form-control" name="ocupacion">
				            				</div>
				            			</div>

				            			<!--Años de experiencia -->
				            			<div class="form-group">
				            				<label for="añosExp" class="col-md-4 control-label">Años de experiencia:</label>
				            				<div class="col-md-8 ">
					            			<div class="input-group" name="añosExp">
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
				            			<label for="descripcion" class="control-label">Para el trabajo actual, describa brevemente las funciones que realiza:</label>
				            			<div class="form-group">
				            				<div class="col-md-12">
				            					<textarea  class="form-control" name="descripcion" rows="4"></textarea>
				            				</div>
				            			</div>
				            		</div>
				            		<!--Termina col-md-6 -->

				            		<div class="col-md-6 ">
				            			<button id="btnAgregarExpProfesional" type="button" class="btn btn-primary btn-lg pull-right">+</button>
				            		</div>
				            	</div>
				            </form>
				        </div>
				        <!--Termina  Experiencia profesional-->

				        <div id="experienciaEnInvestigacion" class="tab-pane fade">
					    	<form role="form" action="expInvestigacion" method="post" class="form-horizontal">
					    		<br/>
					    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					    		<div id="formularioExpInv1" class="blockExpInvestigacion">
					    			<div class="row divider-h" >
						    			<div class="col-lg-6">
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

				    					<div class="col-lg-6">
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
							    						<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i>
						    						</div>
						    					</div>
						    				</div>
				    					</div>
					    				<!--Termina col-md-6-->
					    			</div>
					    			<!-- Termina row divider-h -->
			            		</div>
			            		<!-- Termina row blockExpInvestigacion -->
			            		<div class="row">
			            		<!--BOTONES para agregar y remover formulario-->
			            		<div  class="col-md-12">
			            			<div >
			            				<button id="btnRemoverExpInvestigacion" type="button" class="btn btn-danger btn-lg pull-right">-</button>
			            			</div>
			            			<div class="col-md-11">
			            				<button id="btnAgregarExpInvestigacion" type="button" class="btn btn-primary btn-lg pull-right">+</button>
			            			</div>
			            		</div>
			            		</div>

			            		<br/>
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

	<!--para agregar y remover divs-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

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
	// CHANGE
		// $(document).ready(function(){
		// 	$('.combobox').combobox();
		// });
	// END
		// http://eternicode.github.io/bootstrap-datepicker/?markup=input&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&todayBtn=false&clearBtn=false&language=en&orientation=auto&multidate=&multidateSeparator=&keyboardNavigation=on&forceParse=on#sandbox
	 	$('.datepicker_control').datepicker({
		    language: "es",
		    autoclose: true,
		    todayHighlight: true
		});


	</script>

	<!-- -->
	<script type="text/javascript">
        $('.inputAño').datepicker( {
	    format: ' yyyy',
	    viewMode: 'years',
	    minViewMode: 'years',
	    autoclose:true
	  });

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

		// <!--metodo para mostrar y esconder el input para el segundo email-->
		$("#agregarNuevoEmail").click(function(){
			$("#email2").fadeToggle("slow");
			$("#email2").val(null);
		});
		if($("#email2").val()==null || $("#email2").val()==""){
			$("#email2").hide();
		}
		else{
			$("#email2").show();
		}
	});
	</script>

	<!-- <script type="text/javascript">
		var countries = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		limit: 10,
		prefetch: {
			// url points to a json file that contains an array of country names, see
			// https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
			url: '../data/countries.json',
			// the json file contains an array of strings, but the Bloodhound
			// suggestion engine expects JavaScript objects so this converts all of
			// those strings
			filter: function(list) {
				return $.map(list, function(country) { return { name: country }; });
			}
		}
		});

		// kicks off the loading/processing of `local` and `prefetch`
		countries.initialize();

		// passing in `null` for the `options` arguments will result in the default
		// options being used
		$('#prefetch .typeahead').typeahead(null, {
			name: 'countries',
			displayKey: 'name',
			// `ttAdapter` wraps the suggestion engine in an adapter that
			// is compatible with the typeahead jQuery plugin
			source: countries.ttAdapter()
		});
	</script> -->




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
		        newElem.find('.inputNombre').attr('id','ID'+newNum+'_nombre').val('');

		        //Institucion - text
		        newElem.find('.labelInstitucion').attr('for','ID'+newNum+'_institucion');
		        newElem.find('.inputInstitucion').attr('id','ID'+newNum+'_institucion').val('');

		 		//Lugar - text
		        newElem.find('.labelLugar').attr('for','ID'+newNum+'_lugar');
		        newElem.find('.inputLugar').attr('id','ID'+newNum+'_lugar').val('');

		        //Año - text
		        newElem.find('.labelAño').attr('for','ID'+newNum+'_año');
		        newElem.find('.inputAño').attr('id','ID'+newNum+'_año').val('');


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
			    $('.inputAño').datepicker( {
				    format: ' yyyy',
				    viewMode: 'years',
				    minViewMode: 'years',
				    autoclose:true
				  });
		    });

		    $('#btnRemoverExpInvestigacion').click(function () {
		        if (confirm("¿Esta seguro(a) que quiere remover esta sección?"))
		            {
		                var num = $('.blockExpInvestigacion').length;
		                // cuantos inputs duplicados se tiene hasta el momento
		                $('#formularioExpInv' + num).slideUp('slow', function () {$(this).remove();

		                    if (num -1 === 1)
		                		$('#btnRemoverExpInvestigacion').attr('disabled', true);

			                $('#btnAgregarExpInvestigacion').attr('disabled', false).prop('value', "add section");});
		            }
		        return false;

		        $('#btnAgregarExpInvestigacion').attr('disabled', false);
		    });

		    $('#btnRemoverExpInvestigacion').attr('disabled', true);});
	</script>
@endsection