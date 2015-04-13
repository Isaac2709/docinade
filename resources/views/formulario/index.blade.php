@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

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
											<input type="text" class="form-control" name="name">
										</div>
					        		</div>
					        		<!-- Last name of aspirant -->
					        		<div class="form-group">
					        			<label for="last_name" class="col-md-4 control-label">Apellidos:</label>
					        			<div class="col-md-8">
											<input type="text" class="form-control" name="last_name">
										</div>
					        		</div>
					        		<!-- ID or passport of aspirant -->
					        		<div class="form-group">
					        			<label for="id" class="col-md-4 control-label">Cedula o Pasaporte:</label>
					        			<div class="col-md-8">
					        				<input type="text" class="form-control" name="id">
					        			</div>
					        		</div>
					        		<!-- Genero de aspirante -->
									<div class="form-group">
										<label for="gender" class="col-md-4 control-label">Género:</label>
										<div class="col-md-8">
											<select name="" id="" class="form-control">
												<option value="a" selected> Seleccione su género</option>
				                                <option value="a"> Másculino</option>
				                                <option value="b"> Femenino </option>
				                            </select>
			                            </div>
					        		</div>
					        		<!-- Fecha de Nacimiento -->
					        		<div class="form-group">
					        			<label for="fecha_nacimiento" class="col-md-4 control-label">Fecha de Nacimiento</label>
					        			<div class="col-md-8">
					        				<!-- <input type="text" class="datepicker_control form-control"> -->
					        				<div class="input-group date">
											  <input type="text" class="datepicker_control form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
											</div>
					        			</div>
					        		</div>
					        		<!-- Lugar de Nacimiento -->
									<div class="form-group">
										<label for="lugarNacimiento" class="col-md-4 control-label">Lugar de nacimiento:</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="lugar_nacimiento">
										</div>
									</div>
									<!-- Nacionalidad -->
									<div class="form-group">
										<label for="nacionalidad" class="col-md-4 control-label">Nacionalidad:</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="nacionalidad">
										</div>
									</div>
									<!-- Teléfono -->
									<div class="form-group">
										<label for="telefono" class="col-md-4 control-label">Teléfono</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="telefono">
										</div>
									</div>
									<!-- Fax -->
									<div class="form-group">
										<label for="fax" class="col-md-4 control-label">Fax:</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="fax">
										</div>
									</div>

								</div>
								<!-- End col-lg-6 -->
	                    		<div class="col-lg-6">
	                    			<!-- Enfasis de interes -->
									<div class="form-group">
										<label for="enfasis" class="col-md-4 control-label">Énfasis de interes</label>
										<div class="col-md-8">
											<select name="" id="" class="form-control">
												<option value="a" selected> Énfasis</option>
				                                <option value="a"> SPA</option>
				                                <option value="b"> Femenino </option>
				                            </select>
										</div>
									</div>
									<div class="form-group">
					        			<label for="area_investigacion" class="col-md-4 control-label">Aréa en que le interesaría desarrollar el tema de investigación:</label>
					        			<div class="col-md-8">
											<textarea name="area_investigacion" class="form-control " rows="3"></textarea>
										</div>
					        		</div>
					        		<strong>Dirección actual</strong>
		                    		<!-- Pais de Residencia -->
		                    		<div class="form-group">
		                    			<label for="pais_residencia" class="col-md-4 control-label">País de residencia</label>
		                    			<div class="col-md-8">
		                    				<input type="text" class="form-control" name="pais_residencia">
		                    			</div>
		                    		</div>
		                    		<!-- Ciudad -->
		                    		<div class="form-group">
		                    			<label for="ciudad" class="col-md-4 control-label">Ciudad</label>
		                    			<div class="col-md-8">
		                    				<input type="text" class="form-control" name="ciudad">
		                    			</div>
		                    		</div>
		                    		<!-- Codigo Postal -->
		                    		<div class="form-group">
		                    			<label for="codigo_postal" class="col-md-4 control-label">Código postal:</label>
		                    			<div class="col-md-8">
		                    				<input type="text" class="form-control" name="codigo_postal">
		                    			</div>
		                    		</div>
		                    		<!-- Direccion para el envio de correspondencia -->
		                    		<div class="form-group">
		                    			<label for="direccion_correspondencia" class="col-md-4 control-label">Direccion para el envio de correspondencia:</label>
		                    			<div class="col-md-8">
		                    				<textarea name="direccion_correspondencia" class="form-control " rows="2"></textarea>
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
						        			<input type="submit" class="btn btn-success">
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
		</div>
	</div>
</div>
@endsection


@section('scripts')
	<!-- Lista desplegable -->
	<script src="/js/bootstrap-combobox.js"></script>
	<!-- Calendario -->
	<script src="/js/bootstrap-datepicker.js"></script>
	<!-- Diccionario en español para el calendario -->
	<script src="/js/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.combobox').combobox();
		});
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
@endsection