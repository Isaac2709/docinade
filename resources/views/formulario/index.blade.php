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
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Tuvimos algunos problemas con sus entradas<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@else
						@if (session()->has('successMessage'))
							<div class="alert alert-success">
							@foreach(session('successMessage') as $message)
								<li>{{ $message }}</li>
							@endforeach
							</div>
						@endif
					@endif
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
				        <li><a data-toggle="tab" href="#trabajosPublicados">Trabajos e Investigaciones Publicadas</a></li>
				        <li><a data-toggle="tab" href="#exportar">Exportar</a></li>
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
					        			<div class="col-md-8 col-md-offset-4" style="height: 30px;">
					        				@if(!empty($user->formulario->informacion_aspirante->Asp_Pasaporte_Adj))
					        				<div class="form-group">
					        					<div class="col-md-4 show-change-button" id="id_file">
					        					<a class="btn btn-link"  target="_blank" href="{{ '/storage/images/'.$user->formulario->informacion_aspirante->Asp_Pasaporte_Adj}}">Archivo adjunto</a></div>
					        					<div class="col-md-4">
					        					<a class="btn btn-warning btn-sm btn-change">Actualizar el archivo adjunto</a>
					        					</div></div>
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
	                    			<!-- Fotografía -->
					        		<div class="form-group">
					        			<label for="id" class="col-md-4 control-label">Fotografía:</label>
					        			<div class="col-md-8" style="height: 34px;">
					        				@if(!empty($user->formulario->informacion_aspirante->Asp_Fotografia))
					        				<div class="form-group">
					        					<div class="col-md-4 show-change-button" id="photo_file">
					        					<a class="btn btn-link" target="_blank" href="{{ '/storage/images/'.$user->formulario->informacion_aspirante->Asp_Fotografia}}">Foto adjunta</a></div>
					        					<div class="col-md-4">
					        					<a class="btn btn-warning btn-sm btn-change">Actualizar la fotografía</a>
					        					</div></div>
					        				@else
                                            	<input type="file" name="photo_file" id="photo_file">
                                            @endif
                                        </div>
					        		</div>
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
					       <!--  <div class="row">
					        	<div class="form-group">
						        	<div class="col-md-2">
						        		<div class="form-group">
						        			<input type="submit" class="btn btn-success" value="Actualizar">
						        		</div>
						        	</div>
						        </div>
					        </div> -->

							<!-- BOTON ACTUALIZAR -->
					    		<div class="row">
				            		<!--BOTONES para agregar y remover formulario-->
				            		<div  class="col-md-7">
				            				<input id="btnActualizar" type="submit" class="btn btn-success btn-lg pull-right" value="Actualizar">
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
					        		<!-- End row -->
					        		<hr class="soften">
				        		</div>
				        		<!-- Termina formularioEducacionSuperior1 -->

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
			            		<!-- BOTON ACTUALIZAR -->
					    		<div class="row">
				            		<!--BOTONES para agregar y remover formulario-->
				            		<div  class="col-md-7">
				            				<button id="btnActualizar" type="button" class="btn btn-success btn-lg pull-right">Actualizar</button>
				            		</div>
			            		</div>
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
				        </div>
				        <!-- Termina  Experiencia profesional -->

						<!-- Experiencia en Investigación -->
				        <div id="experienciaEnInvestigacion" class="tab-pane fade">
					    	<form role="form" action="expInvestigacion" method="post" class="form-horizontal">
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
						    		<hr class="soften">
						    	</div>

				    			@else
				    				<?php $count = 1; ?>
				    				@foreach($user->formulario->informacion_aspirante->experiencias_investigaciones as $investigacion)
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
					    			<hr class="soften">
			            		</div>
					            		<!-- Termina row blockExpInvestigacion -->
					            		<?php $count = $count + 1; ?>
					    			@endforeach
				    			@endif

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
			            		<br />
			            		<!-- BOTON ACTUALIZAR -->
					    		<div class="row">
				            		<!--BOTONES para agregar y remover formulario-->
				            		<div  class="col-md-7">
				            				<input id="btnActualizar" type="submit" class="btn btn-success btn-lg pull-right" value="Actualizar">
				            		</div>
			            		</div>
					    	</form>
				    	</div>
				    	<!--Termina Experiencia en Investigacion-->

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
					    			<hr class="soften">
				    			</div>
				    			<!--BOTONES para agregar y remover formulario-->
					    		<div  class="col-md-12">
					    			<div >
					    				<button id="btnRemoverTrabajosPublicados" type="button" class="btn btn-danger btn-læg pull-right">-</button>
					    			</div>
					    			<div class="col-md-11">
					    				<button id="btnAgregarTrabajosPublicados" type="button" class="btn btn-primary btn-lg pull-right">+</button>
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
				    	</div>
						<div id="exportar" class="tab-pane fade in active">
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



	<script type="text/javascript">
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

	<script type="text/javascript">
$(document).ready(function(){
		var instituciones = <?php echo "".($instituciones); ?>;
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
		$('input.typeahead_institucion').typeahead({
			name: 'institucion',
			local:  instituciones
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

		// $("#informacionPersonal").find('input').change(function(){

  //       });

	});
	</script>
<script  type="text/javascript" src="typeahead.js"></script>

<script type="text/javascript">
	var institucionesGlobal = <?php echo "".($instituciones); ?>;
</script>
<script  type="text/javascript" src="js/form.js"></script>


@endsection