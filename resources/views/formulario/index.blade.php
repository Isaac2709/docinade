@extends('index')

@section('styles')
	<style type="text/css">
/*.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 100px;
}*/
.typeahead, .typeahead2, .tt-query, .tt-hint {
	border: 1px solid #CCCCCC;
	/*border-radius: 8px;*/
	font-size: 14px;
	/*height: 30px;*/
	/*line-height: 30px;*/
	outline: medium none;

	/*width: 148%;*/
}
.tt-query, .tt-hint {
	padding: 4px 12px;
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
				<!-- <div class="panel-heading">Home</div> -->

				<div class="panel-body">
					<!-- TABS -->
					<ul class="nav nav-tabs" id="myTab">
				        <li class="active"><a data-toggle="tab" href="#sectionA">Informacion Personal</a></li>
				        <li><a data-toggle="tab" href="#sectionB">Profile</a></li>
				        <li class="dropdown">
				            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <b class="caret"></b></a>
				            <ul class="dropdown-menu">
				                <li><a data-toggle="tab" href="#dropdown1">Dropdown1</a></li>
				                <li><a data-toggle="tab" href="#dropdown2">Dropdown2</a></li>
				            </ul>
				        </li>
				    </ul>
				    <div class="tab-content" id="myTabContent">
				    	<!-- PERSONAL INFO -->
				        <div id="sectionA" class="tab-pane fade in active">
				        	<form role="form" action="#" method="post" class="form-horizontal"><!-- class="form-horizontal" -->
				        	<br />
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
					        				<div class="input-group date">
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
										<label for="telefono" class="col-md-4 control-label">Teléfono</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="telefono" value="{{ $user->formulario->IPe_Telefono }}">
										</div>
									</div>
									<!-- Fax -->
									<div class="form-group">
										<label for="fax" class="col-md-4 control-label">Fax:</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="fax" value="{{ $user->formulario->IPe_Fax }}">
										</div>
									</div>
									<!-- Email -->
									<div class="form-group">
										<label for="email" class="col-md-4 control-label">Email:</label>
										<div class="col-md-8">
											@if($user->formulario->emails->isEmpty())
												<input type="email" class="form-control" name="email">
											@else
												@foreach($user->formulario->emails as $email)
													<input type="email" class="form-control" name="email" value="{{ $email->Email_Email }}">
												@endforeach
											@endif

										</div>
									</div>
								</div>
								<!-- End col-lg-6 -->
	                    		<div class="col-lg-6">
	                    			<!-- Enfasis de interes -->
									<div class="form-group">
										<label for="enfasis" class="col-md-4 control-label">Énfasis de interes</label>
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
											<textarea name="area_investigacion" class="form-control " rows="3">{{ $user->formulario->informacion_aspirante->area_interes->Area_Nombre }}</textarea>
										</div>
					        		</div>
					        		<strong>Dirección actual</strong>
		                    		<!-- Pais de Residencia -->
		                    		<div class="form-group">
		                    			<label for="pais_residencia" class="col-md-4 control-label">País de residencia</label>
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
		                    			<label for="ciudad" class="col-md-4 control-label">Ciudad</label>
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
		                    			<label for="direccion_correspondencia" class="col-md-4 control-label">Direccion para el envio de correspondencia:</label>
		                    			<div class="col-md-8">
		                    				<textarea name="direccion_correspondencia" class="form-control " rows="2">{{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Dir_Corresp }}</textarea>
		                    			</div>
		                    		</div>
	                    		</div>
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
					        	</div>
					        </div>
				        	</form>
				        	<!-- End Form -->

				        </div>
				        <!-- PERSONAL  -->
				        <div id="sectionB" class="tab-pane fade">
				            <h3>Section B</h3>
				            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
				        </div>
				        <div id="dropdown1" class="tab-pane fade">
				            <h3>Dropdown 1</h3>
				            <p>WInteger convallis, nulla in sollicitudin placerat, ligula enim auctor lectus, in mollis diam dolor at lorem. Sed bibendum nibh sit amet dictum feugiat. Vivamus arcu sem, cursus a feugiat ut, iaculis at erat. Donec vehicula at ligula vitae venenatis. Sed nunc nulla, vehicula non porttitor in, pharetra et dolor. Fusce nec velit velit. Pellentesque consectetur eros.</p>
				        </div>
				        <div id="dropdown2" class="tab-pane fade">
				            <h3>Dropdown 2</h3>
				            <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis dis parturient.</p>
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
		// $('.datepicker_control').datepicker({
		//     startDate: "1/01/1910",
		//     language: "es",
		//     autoclose: true,
		//     todayHighlight: true,
		//     icons: {
  //                   time: "fa fa-clock-o",
  //                   date: "fa fa-calendar",
  //                   up: "fa fa-arrow-up",
  //                   down: "fa fa-arrow-down"
  //               }
		// });
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
@endsection