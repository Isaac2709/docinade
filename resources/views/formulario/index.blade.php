@extends('index')

@section('styles')
	<style type="text/css">
/*.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 100px;
}*/
.typeahead, .tt-query, .tt-hint {
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
.typeahead {
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

@section('content2')
	<!-- Here begin Main Content -->
	<div class="post-45 page type-page status-publish hentry">
	    <div class="widget-main">
	        <div class="widget-inner">
	            <h3 class="archive-title">DOCINADE</h3>
					<div class="su-tabs su-tabs-style-default" data-active="1"><div class="su-tabs-nav"><span class="" data-url="" data-target="blank"><strong>DOCINADE</strong></span><span class="" data-url="" data-target="blank"><strong>Objetivos</strong></span><span class="" data-url="" data-target="blank"><b>Énfasis y áreas disciplinarias</b></span><span class="" data-url="" data-target="blank"><strong>Representantes por Universidad</strong></span></div><div class="su-tabs-panes"><div class="su-tabs-pane su-clearfix">
					<p class="p1">El DOCINADE es un Programa Interuniversitario de Doctorado de la región mesoamericana, bajo el modelo pedagógico bimodal, que combina actividades académicas tanto presenciales como a distancia y virtual.</p>
					<p class="p1">Dicho programa académico es coordinado por universidades públicas costarricenses, pero también participan otras universidades latinoamericanas de la región, como socias la Universidad Nacional Autónoma de México (UNAM), la Universidad Autónoma Chapingo, (UACh), la Universidad Nacional Autónoma de Nicaragua (UNAN-León) y otras instituciones mexicanas, de Guatemala y de Cuba.</p>
					<p class="p1">La convocatoria de admisión en el programa se extiende a todos aquellos profesionales de las áreas científicas y tecnológicas, con grado de Maestría Académica afín o, en casos excepcionales, con Licenciatura afín y experiencia académica en investigación.</p>
					<p class="p1">Entre estas áreas del saber, son reconocidas Agronomía y Agrícola, Zootecnia y Veterinaria, Biología, Forestales, Ambientales, Química, Física, Farmacia y Medicina, Electrónica, Computación y otras áreas afines a las ciencias y tecnología.</p>
					<p> </div>
					<div class="su-tabs-pane su-clearfix">
					<p class="p1"><b>Objetivos generales</b></p>
					<p class="p1">Desarrollar capacidades humanas de investigación científica y tecnológica a nivel de Doctorado Académico, en concordancia con las necesidades de desarrollo de la región mesoamericana para mejorar la calidad de vida del ser humano y su relación con la sostenibilidad.</p>
					<p class="p1">Fortalecer la investigación y el desarrollo sostenible de la región mesoamericana mediante la cooperación interinstitucional y de Educación Superior Universitaria.</p>
					<p class="p1"><b>Objetivos específicos</b></p>
					<p class="p1">Formar profesionales a nivel de doctorado con capacidad de generar conocimientos científicos y tecnológicos que permiten proponer soluciones sostenibles ante los impactos de los recursos naturales, la seguridad alimentaria, la gestión y cultura ambiental, las nuevas tecnologías y la diversidad socio-cultural.</p>
					<p class="p1">Formar profesionales capaces de desarrollar Programas de cultura ambiental que promuevan y faciliten el desarrollo de una conciencia ambiental.</p>
					<p class="p1">Formar profesionales que elaboren proyectos de gestión ambiental que ayuden al desarrollo en un ambiente de sostenibilidad respetando las diferencias culturales.</p>
					<p> </div>
					<div class="su-tabs-pane su-clearfix">
					<p class="p1"><b>Énfasis y áreas disciplinarias</b></p>
					<ul class="ul1">
					<li class="li2">Sistemas de producción agrícolas</li>
					<li class="li2">Gestión de recursos naturales</li>
					<li class="li2">Gestión y cultura ambiental</li>
					<li class="li2">Tecnologías electrónica aplicadas</li>
					</ul>
					<p class="p1">En términos generales, el objeto de estudio deberá ser original. Se concentrará en una investigación sobre actividades de interés alimenticio-económico para el hombre, la conservación de los recursos naturales, su manejo amigable con el entorno y buscando siempre la obtención de resultados que faciliten la convivencia y coexistencia con la naturaleza. </div>
					<div class="su-tabs-pane su-clearfix">
					<table>
					<tbody>
					<tr>
					<td colspan="3" width="449"><strong>Tecnológico de Costa Rica TEC</strong></td>
					</tr>
					<tr>
						<td width="159">Dr. Freddy Araya</td>
						<td width="137">Coordinador General CGA</td>
						<td width="153">faraya@itcr.ac.cr</td>
					</tr>
					<tr>
						<td width="159">Dra. Floria Roa Gutiérrez</td>
						<td width="137">Cultura y Gestión Ambiental</td>
						<td width="153">froa@itcr.ac.cr</td>
					</tr>
					<tr>
						<td width="159">Dr. Saúl Guadamuz Brenes</td>
						<td width="137">Tecnologías Electrónicas Aplicadas</td>
						<td width="153">sguadamuz@itcr.ac.cr</td>
					</tr>
					<tr>
						<td width="159">Dr. Ruperto Quesada Monge</td>
						<td width="137">Recursos Naturales</td>
						<td width="153"><a href="mailto:rquesada@itcr.ac.cr">rquesada@itcr.ac.cr</a></td>
					</tr>
					<tr>
						<td width="159">Dr. Carlos Muñoz Ruiz</td>
						<td width="137">Producción Agrícola</td>
						<td width="153">camunoz@itcr.ac.cr</td>
					</tr>
					<tr>
						<td width="159">Sra. Viviana Miranda Quirós</td>
						<td width="137">AsistenteOficina DOCINADE –TEC2401 3043</td>
						<td width="153">vmiranda@itcr.ac.cr</td>
					</tr>
					<tr>
					<td colspan="3" width="449"><strong>Universidad Nacional UNA</strong></td>
					</tr>
					<tr>
						<td width="159">Dr. Luis Sierra Sierra</td>
						<td width="137">Coordinador &#8211; representante por la UNARecursos Naturales</td>
						<td width="153">luis.sierra.sierra@una.cr</td>
					</tr>
					<tr>
						<td width="159">Dr. Rafael Orozco Rodríguez</td>
						<td width="137">Producción Agrícola</td>
						<td width="153">rafael.orozco.rodriguez@una.cr</td>
					</tr>
					<tr>
						<td width="159">Dr. Giovanni Sáenz Arce</td>
						<td width="137">Tecnologías Electrónicas Aplicadas</td>
						<td width="153">giovanni .saenz.arce@una.cr</td>
					</tr>
					<tr>
						<td width="159">Srta Elizabeth   González</td>
						<td width="137">AsistenteOficinaDOCINADE –UNA2277 3276</td>
						<td width="153">docinade@una.cr</td>
					</tr>
					<tr>
					<td colspan="3" width="449"><strong>Universidad Estatal a Distancia UNED</strong></td>
					</tr>
					<tr>
						<td width="159">Dra. María E. Cascante Prada</td>
						<td width="137">Coordinador &#8211; representante por la UNEDProducción Agrícola</td>
						<td width="153">mcascante@uned.ac.cr</td>
					</tr>
					<tr>
						<td width="159">Dra. Lidia Mayela Hernández Rojas</td>
						<td width="137">Cultura y Gestión Ambiental</td>
						<td width="153">lmhernández@uned.ac.cr</td>
					</tr>
					<tr>
						<td width="159">Dra. Rosibel Víquez Abarca</td>
						<td width="137">Tecnologías Electrónicas Aplicadas</td>
						<td width="153">rviquez@uned.ac.cr</td>
					</tr>
					<tr>
						<td width="159">Dra. Gabriela Jones Román</td>
						<td width="137">Recursos Naturales</td>
						<td width="153">gjones@uned.ac.cr</td>
					</tr>
					<tr>
						<td width="159">Licda Yeimy Jiménez Flores</td>
						<td width="137">AsistenteOficina DOCINADE –UNA2202 1810 / 2202 1872</td>
						<td width="153"><a href="mailto:yjimenez@uned.ac.cr">yjimenez@uned.ac.cr</a></td>
					</tr>
					</tbody>
					</table>
					<p class="p1"><a href="http://docinade.com/wp-content/uploads/2014/10/organigrama2.png"><img class="wp-image-312 aligncenter" src="http://docinade.com/wp-content/uploads/2014/10/organigrama2.png" alt="organigrama2" width="509" height="517" /></a></p>
					<p class="p1"></div></div></div>
			</div> <!-- /.widget-inner -->
		</div> <!-- /.widget-main -->
	</div>
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
											<input type="text" class="form-control" name="nombre">
										</div>
					        		</div>
					        		<!-- Apellidos del aspirante -->
					        		<div class="form-group">
					        			<label for="apellidos" class="col-md-4 control-label">Apellidos:</label>
					        			<div class="col-md-8">
											<input type="text" class="form-control" name="apellidos">
										</div>
					        		</div>
					        		<!-- ID or passport of aspirant -->
					        		<div class="form-group">
					        			<label for="id" class="col-md-4 control-label">Cedula o Pasaporte:</label>
					        			<div class="col-md-8">
					        				<input type="text" class="form-control" name="id">
					        			</div>
					        		</div>
					        		<!-- Genero del(la) aspirante -->
									<div class="form-group">
										<label for="genero" class="col-md-4 control-label">Género:</label>
										<div class="col-md-8">
											<select name="genero" id="" class="form-control">
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
											  <input type="text" class="datepicker_control form-control" name="fecha_nacimiento"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
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
		                    				<!-- <input type="text" class="form-control" name="pais_residencia"> -->
		                    				<!-- <div id="prefetch">
											  	<input class="typeahead form-control" type="text" placeholder="Countries" data-provide="typeahead" name="pais_residencia">
											</div> -->
											<div class="bs-example">
										        <input type="text" class="form-control typeahead tt-query" autocomplete="off" spellcheck="false">
										    </div>
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
		$('input.typeahead').typeahead({
			name: 'accounts',
			local: ['Audi', 'BMW', 'Bugatti', 'Ferrari', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen']
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