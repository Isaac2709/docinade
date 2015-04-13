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
			        <div class="row">
                    <div class="col-lg-6">
			        	<form action="#" method="post" class="form"><!-- class="form-horizontal" -->
			        		<!-- Name of aspirant -->
			        		<div class="form-group">
			        			<label for="name" class="col-md-4 control-label">Nombre:</label>
			        			<div class="form-group col-md-6">
									<input type="text" class="form-control" name="name">
								</div>
			        		</div>
			        		<!-- Last name of aspirant -->
			        		<div class="form-group">
			        			<label for="last_name" class="col-md-4 control-label">Apellidos:</label>
			        			<div class="form-group col-md-6">
									<input type="text" class="form-control" name="last_name">
								</div>
			        		</div>
			        		<!-- ID or passport of aspirant -->
			        		<div class="form-group">
			        			<label for="id" class="col-md-4 control-label">Cedula o Pasaporte:</label>
			        			<div class="form-group col-md-6">
			        				<input type="text" class="form-control" name="id">
			        			</div>
			        		</div>
			        		<!-- Genero de aspirante -->
							<div class="form-group">
								<label for="gender" class="col-md-4 control-label">Género:</label>
								<div class="col-md-6">
									<select name="" id="" class="form-control">
										<option value="a" selected> Seleccione su género</option>
		                                <option value="a"> Másculino</option>
		                                <option value="b"> Femenino </option>
		                            </select>
	                            </div>

			        			<!--<div class="col-md-6">
			        				<div class="dropdown">
										<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
											Seleccione un género
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
											<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Másculino</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Femenino</a></li>
										</ul>
									</div>
			        			</div> -->
<!-- <div class="btn-group"> <a class="btn btn-default dropdown-toggle btn-select" data-toggle="dropdown" href="#">Select a Country <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="#">United States</a></li>
        <li><a href="#">Canada</a></li>
        <li class="divider"></li>
        <li><a href="#"><span class="glyphicon glyphicon-star"></span> Other</a></li>
    </ul>
</div> -->
			        		</div>
			        		<!-- Fecha de Nacimiento -->
			        		<div class="form-group">
			        			<label for="fecha_nacimiento" class="col-md-4 control-label">Fecha de Nacimiento</label>
			        			<div class="col-md-6">
			        				<input type="text" class="datepicker_control">
			        			</div>
								<!-- <div class="input-group date">
								  <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div> -->
			        		</div>
			        		<!-- Lugar de Nacimiento -->
							<div class="form-group">
								<label for="lugarNacimiento" class="col-md-4 control-label">Lugar de nacimiento:</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="lugar_nacimiento">
								</div>
							</div>
							<!-- Nacionalidad -->
							<div class="form-group">
								<label for="nacionalidad" class="col-md-4 control-label">Nacionalidad:</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="nacionalidad">
								</div>
							</div>
							<!-- Enfasis de interes -->
							<div class="form-group">
								<label for="enfasis" class="col-md-4 control-label">Énfasis de interes</label>
								<div class="form-group col-md-6">
									<select name="" id="" class="form-control">
										<option value="a" selected> Énfasis</option>
		                                <option value="a"> SPA</option>
		                                <option value="b"> Femenino </option>
		                            </select>
								</div>
							</div>
							<!-- Teléfono -->
							<div class="form-group">
								<label for="telefono" class="col-md-4 control-label">Teléfono</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="telefono">
								</div>
							</div>
							<!-- NACIONALIDAD of aspirant -->
			        		<!-- <div class="form-group">
			        			<label for="gender" class="col-md-4 control-label">Género:</label>
			        			<div class="col-md-6">
			        				<select class="combobox">
										<option></option>
										<option value="PA">Pennsylvania</option>
										<option value="CT">Connecticut</option>
										<option value="NY">New York</option>
										<option value="MD">Maryland</option>
										<option value="VA">Virginia</option>
									</select>
			        			</div>
			        		</div> -->

			        	</form>
			        </div>
			        </div>
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
			   <!--  <hr>
			    <p class="active-tab"><strong>Active Tab</strong>: <span></span></p>
			    <p class="previous-tab"><strong>Previous Tab</strong>: <span></span></p> -->

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
	 	$('.datepicker_control').datepicker({
		    language: "es",
		    autoclose: true,
		    todayHighlight: true
		});
	</script>
@endsection