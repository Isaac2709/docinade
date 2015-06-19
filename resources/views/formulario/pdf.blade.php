<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulario - {{ $user->formulario->IPe_Nombre or ''}}</title>
	<link href="{{ asset('/css/pdf.css') }}" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<style type="text/css">
		/*Table 1: Para Registros Múltiples.*/
		table.table1{
   			border: 1px solid black;
   			border-collapse: collapse;
		}
		table.table1 th {

			padding: 5px;
			border: 1px solid black;
    		vertical-align: middle;
    		text-align: center;
		}
		table.table1 td {
			padding: 5px;
			border: 1px solid black;
    		vertical-align: middle;
    		text-align: left;
		}
		tbody:before, tbody:after { display: none; }

		/*Table 1: Para Registros Sencillos.*/
		table.table2{
   			border: 1px solid black;
   			border-collapse: collapse;
		}
		table.table2 td {
			padding: 2px;
    		vertical-align: middle;
    		text-align: left;
		}
	</style>
</head>
<body>
	<p class="text-center"><img src="images/DOCINADE.png" align="middle"></p>
	<table width="100%">
		<tr>
			<td align="center"><img src="images/UNED.png"></td>
			<td align="center"><img src="images/TEC.png"></td>
			<td align="center"><img src="images/UNA.png"></td>
		</tr>
	</table>
	<p class="text-center"><font size="17">DOCTORADO EN CIENCIAS NATURALES PARA EL DESARROLLO</font></p>
	<p class="text-center"><font size="14">FORMULARIO DE SOLICITUD DE ADMISIÓN</font></p>
	<p class="text-center"><font size="14">VIII PROMOCIÓN Universidad Estatal a Distancia 2015 (UNED, Costa Rica)</font></p>
	<table width="100%">
		<tr>
			<td width="30%" align="center">
				@if(is_null($user->formulario->informacion_aspirante->Asp_Fotografia))
					<img src="images/NoDisponible.jpg" height="160px" width="160px" border="1px">
				@else
					<img src="{{'storage/images/'.$user->formulario->informacion_aspirante->Asp_Fotografia}}" height="160px" width="160px" border="1px">
				@endif
			</td>
			<td><p><font size="2">Este formulario deberá ser enviado necesariamente por correo electrónico a:<br />
				Dr. Wagner Peña Cordero al correo wpena@uned.ac.cr,<br />
				wpenanator@gmail.com, docinade@uned.ac.cr<br /><br />
				Con copia a:<br /><br />
				Instituto Tecnológico de Costa Rica, Santa Clara,<br />
				Coordinación general:<br />
				Dr. Freddy Araya Rodíguez: freddyaraya1996gmail.com<br />
				o a la señora Viviana Miranda<br />
				a los correos, vmiranda@itcr.ac.cr, o al vmirandaq@gmail.com.</font></p></td>
		</tr>
	</table>
	<p class="text-left"><font size="2">
		Nota: También se deberá enviar la documentación vía currier, consulado o entregarlo personalmente en UNED.
	</font></p>
	<table>
		<tr>
			<td><u class="text-left"><b><font size="3">I. FECHA ENVÍO:</font></b></u></td>
			<td><table cellpadding="20">
				<tr>
					<td><b>DIA </b>
						@if(!is_null($user->formulario->informacion_aspirante->Asp_Fecha_Envio) && $user->formulario->informacion_aspirante->Asp_Fecha_Envio != "0000-00-00")
							<?php
								$date_obj = date_create_from_format('Y-m-d',$user->formulario->informacion_aspirante->Asp_Fecha_Envio);
								$dia_envio = date_format($date_obj, 'd');
							?>
							{{ $dia_envio }}
						@endif
					</td>
					<td><b>MES </b>
						@if(!is_null($user->formulario->informacion_aspirante->Asp_Fecha_Envio) && $user->formulario->informacion_aspirante->Asp_Fecha_Envio != "0000-00-00")
							<?php
								$date_obj = date_create_from_format('Y-m-d',$user->formulario->informacion_aspirante->Asp_Fecha_Envio);
								$mes_envio = date_format($date_obj, 'm');
							?>
							{{ $mes_envio }}
						@endif
					</td>
					<td><b>AÑO </b>
						@if(!is_null($user->formulario->informacion_aspirante->Asp_Fecha_Envio) && $user->formulario->informacion_aspirante->Asp_Fecha_Envio != "0000-00-00")
							<?php
								$date_obj = date_create_from_format('Y-m-d',$user->formulario->informacion_aspirante->Asp_Fecha_Envio);
								$annio_envio = date_format($date_obj, 'Y');
							?>
							{{ $annio_envio }}
						@endif
					</td>
				</tr>
			</table></td>
		</tr>
	</table>
	<b class="text-left"><u><font size="3">
		II. INFORMACIÓN PERSONAL
	</font></u></b>
	<br />
	<br />
	<table class="table2" width="99%">
		<tr>
			<td width="33%"><b> Apellidos: </b>{{ $user->formulario->IPe_Apellido }}</td>
			<td width="33%"><b> Nombre: </b>{{ $user->formulario->IPe_Nombre }}</td>
			<td width="33%"><b> Género: </b>
				@if(!is_null($user->formulario->IPe_Genero) && !empty($user->formulario->IPe_Genero))
                	@if($user->formulario->IPe_Genero == "F")
						Femenino
                    @elseif($user->formulario->IPe_Genero == "M")
                    	Másculino
                	@endif
                @endif
            </td>
		</tr>
		<tr>
			<td><b> Fecha de Nacimiento: </b>
				@if(!is_null($user->formulario->IPe_Fecha_Nac) && $user->formulario->IPe_Fecha_Nac != "0000-00-00")
					<?php
						$date_obj = date_create_from_format('Y-m-d',$user->formulario->IPe_Fecha_Nac);
						$fecha_nacimiento = date_format($date_obj, 'd/m/Y');
					?>
					{{ $fecha_nacimiento }}
				@endif
			</td>
			<td colspan=2><b> Lugar de Nacimiento: </b>{{ $user->formulario->informacion_aspirante->Asp_Lugar_Nac }}</td>
		</tr>
		<tr>
			<td colspan=3><b> Nacionalidad</b>
				@if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Nac))
					{{ $user->formulario->informacion_aspirante->nacionalidad->Nac_Nombre }}
				@endif
			</td>
		</tr>
		<tr>
			<td colspan=2><b> País de Residencia: </b>
				@if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual) && !is_null($user->formulario->informacion_aspirante->direccion_actual->DiA_ID_Pais))
					{{ $user->formulario->informacion_aspirante->direccion_actual->pais_residencia->Pais_Nombre }}
				@endif
			</td>
			<td ><b> N° de Cédula: </b>{{ $user->formulario->IPe_Pasaporte }}</td>
		</tr>
		<tr>
			<td colspan=3><b> Énsasis de Interés: </b>
				@if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Enfasis))
					{{ $user->formulario->informacion_aspirante->enfasis->Enf_Nombre }}
				@endif
			</td>
		</tr>
		<tr>
			<td colspan=3><b> Área en que le interesaría desarrollar el tema de investigación: </b>
				{{ $user->formulario->informacion_aspirante->Asp_Area_Interes }}
			</td>
		</tr>
	</table>
	<br />
	<b class="text-left"><font size="2">DIRECCIÓN ACTUAL</font></b>
	<table class="table2" width="99%">
		<tr>
			<td width="33%"><b> País: </b>
				@if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual) && !is_null($user->formulario->informacion_aspirante->direccion_actual->DiA_ID_Pais))
					{{ $user->formulario->informacion_aspirante->direccion_actual->pais_residencia->Pais_Nombre }}
				@endif
			</td>
			<td width="33%"><b> Ciudad: </b>
				@if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual))
					{{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Ciudad }}
				@endif
			</td>
			<td width="33%"><b> Código Postal: </b>
				@if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual))
					{{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Cod_Postal }}
				@endif
			</td>
		</tr>
		<tr>
			<td colspan=3><b> Dirección para Envío de Correspondencia: </b>
				@if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual))
					{{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Dir_Corresp }}
				@endif
			</td>
		</tr>
		<tr>
			<td><b> Tel. Celular: </b>{{ $user->formulario->IPe_Telefono }}</td>
			<td><b> Fax: </b>{{ $user->formulario->IPe_Fax }}</td>
			<td><b> Correo(s) Electrónico(s): </b>
				@if(!$user->formulario->emails->isEmpty())
					{{ $user->formulario->emails()->first()->Email_Email }},
					@if ($user->formulario->emails()->count()>1)
						{{ $user->formulario->emails[1]->Email_Email }}
					@endif
				@endif
			</td>
		</tr>
	</table>
	<br />
	<u class="text-left"><b><font size="3">
		III. EDUCACIÓN SUPERIOR/EXPERIENCIA PROFESIONAL
	</font></b></u>
	<br />
	<br />
	<b class="text-left"><font size="2">
		a. EDUCACIÓN SUPERIOR
	</font></b>
	<table class="table1" width="100%">
		<tr>
			<th><b>Institución, País</b></th>
			<th><b>Área de Especialidad</b></th>
			<th><b>Grado Académico</b></th>
			<th><b>Año de Graduación</b></th>
		</tr>
		@foreach($user->formulario->informacion_aspirante->educacion_superior as $edSup)
			<tr>
				<td>
					@if(!is_null($edSup->Sup_ID_Institucion)) {{ $edSup->institucion->Ins_Nombre }}
					@endif
					@if(!is_null($edSup->Sup_ID_Pais)) , {{ $edSup->pais->Pais_Nombre }}
					@endif
				</td>
				<td>
					@if(!is_null($edSup->Sup_ID_Area_Esp)) {{ $edSup->area_especialidad->Esp_Area }}
					@endif
				</td>
				<td>
					@if(!is_null($edSup->Sup_ID_Grado_Acad)) {{ $edSup->grado_academico->Gra_Nombre }}
					@endif
				</td>
				<td>{{ $edSup->Sup_Anio_Grad }}</td>
			</tr>
		@endforeach
	</table>
	<br />
	<b class="text-left"><font size="2">
		b. EXPERIENCIA PROFESIONAL
	</font></b>
	<?php $funciones = null; ?>
	<table  class="table1"  width="100%">
		<tr>
			<th><b>Empresa, Centro o Institución</b></th>
			<th><b>Ocupación o Posición</b></th>
			<th><b>Años de Experiencia</b></th>
		</tr>
		@foreach($user->formulario->informacion_aspirante->experiencias_profesionales_desc as $expPro)
			<tr>
				 @if($expPro->Pro_Actual)
				  <?php $funciones = $expPro->Pro_Funciones; ?>
				 @endif
				<td>
					{{ $expPro->Pro_Institucion }}
				</td>
				<td>
					@if(!is_null($expPro->Pro_ID_Ocupacion)) {{ $expPro->ocupacion->Ocu_Ocupacion }}
					@endif
				</td>
				<td>
					Inicio: {{ $expPro->Pro_Anio_Inicio }} <br />
					Fin: {{ $expPro->Pro_Anio_Fin }}
				</td>
			</tr>
		@endforeach
	</table>
	<br />
	<table class="table2" width="100%">
		<tr>

			<!-- <td><b>Para el trabajo actual las funciones que desempeña: </b> </td> -->
			<td><b>Funciones que Desempeña en el Trabajo más Reciente: </b>
				{{ $funciones }}
			</td>
		</tr>
	</table>
	<br />
	<u class="text-left"><b><font size="3">
		IV. EXPERIENCIA EN INVESTIGACIÓN
	</font></b></u>
	<br />
	<br />
	<table class="table1"  width="100%">
		<tr>
			<th><b>Nombre de Proyecto o Actividades Principales</b></th>
			<th><b>Institución y Lugar</b></th>
			<th><b>Año</b></th>
		</tr>
		@foreach($user->formulario->informacion_aspirante->experiencias_investigaciones_desc as $expInv)
			<tr>
				<td>{{ $expInv->Inv_Proyecto }}</td>
				<td>
					@if(!is_null($expInv->Inv_ID_Institucion)) {{ $expInv->institucion->Ins_Nombre }}
					@endif
					- {{ $expInv->Inv_Lugar }}
				</td>
				<td>
					@if($expInv->Inv_Anio_Inicio == $expInv->Inv_Anio_Fin)
						{{ $expInv->Inv_Anio_Inicio }}
					@else
						Inicio: {{ $expInv->Inv_Anio_Inicio }} <br />
						Fin: {{ $expInv->Inv_Anio_Fin }}
					@endif
				</td>
			</tr>
		@endforeach
	</table>
	<br />
	<u class="text-left"><b><font size="3">
		V. TRABAJOS E INVESTIGACIONES PUBLICADAS
	</font></b></u>
	<br />
	<br />
	<table class="table1"  width="100%">
		<tr>
			<th><b>Título de la Publicación</b></td>
			<th><b>Título del Medio de Publicación<br />y País de Publicación</b></td>
			<th><b>Año</b></td>
		</tr>
		@foreach($user->formulario->informacion_aspirante->publicaciones_desc as $public)
			<tr>
				<td>{{ $public->Pub_Titulo }}</td>
				<td>
					{{ $public->Pub_Medio }}
					@if(!is_null($public->Pub_ID_Pais))

					, {{ $public->pais->Pais_Nombre }}
					@endif
				</td>
				<td>{{ $public->Pub_Anio }}</td>
			</tr>
		@endforeach
	</table>
	<br />
	<u class="text-left"><b><font size="3">
		VI. CURSOS Y SEMINARIOS MÁS RELEVANTES
	</font></b></u>
	<br />
	<br />
	<table class="table1"  width="100%">
		<tr>
			<th><b>Nombre de Actividad</b></th>
			<th><b>Institución y Lugar</b></th>
			<th><b>Año</b></td>
		</tr>
		@foreach($user->formulario->informacion_aspirante->cursos_seminarios_desc as $curso_relevante)
			<tr>
				<td>{{ $curso_relevante->CSe_Actividad }}</td>
				<td>
					{{ $curso_relevante->CSe_Institucion }}
					@if(!empty($curso_relevante->CSe_Lugar))
						 -
						{{ $curso_relevante->CSe_Lugar}}
					@endif
				</td>
				<td>{{ $curso_relevante->CSe_Annio }}</td>
			</tr>
		@endforeach
	</table>
	<br />
	<u class="text-left"><b><font size="3">
		VII. CONOCIMIENTO DE IDIOMAS DISTINTOS AL MATERNO.
	</font></b></u>
	<br />
	<br />
	<table class="table1"  width="100%">
		<tr>
			<th><b>Idioma</b></th>
			<th><b>Nivel de Escritura</b></th>
			<th><b>Nivel de Lectura</b></th>
			<th><b>Nivel Conversacional</b></th>
		</tr>
		@foreach($user->formulario->informacion_aspirante->conocimiento_idiomas as $idioma)
			<tr>
				<td> {{ $idioma->Idm_Idioma }} </td>
				<td> {{ $idioma->nivel_idioma_escritura->Niv_Nombre or '' }}</td>
				<td> {{ $idioma->nivel_idioma_lectura->Niv_Nombre or '' }}</td>
				<td> {{ $idioma->nivel_idioma_conversacional->Niv_Nombre or '' }}</td>
			</tr>
		@endforeach
	</table>
	<br />
	<u class="text-left"><b><font size="3">
		VIII. ACCESO A BIBLIOTECA Y PROCESAMIENTO DE DATOS
	</font></b></u>
	<br />
	<br />
	<b class="text-left"><font size="2">
		a. ¿TIENE ACCESO A BIBLIOTECA(S) O CENTRO(S) DE DOCUMENTACIÓN?
	</font></b><br />
	@if(!$user->formulario->informacion_aspirante->acceso_bibliotecas->isEmpty())
		@foreach($user->formulario->informacion_aspirante->acceso_bibliotecas as $acceso_biblioteca)
			{{ $acceso_biblioteca->Bib_Nombre }} <br />
		@endforeach
	@else
		NO
	@endif
	<br />
	<b class="text-left"><font size="2">
		b. ¿TIENE ACCESO Y CONOCIMIENTOS ACERCA DE PROGRAMAS DE PROCESAMIENTO DE DATOS?
	</font></b><br />
	@if(!$user->formulario->informacion_aspirante->acceso_procesamiento_datos->isEmpty())
		@foreach($user->formulario->informacion_aspirante->acceso_procesamiento_datos as $acceso_procesamiento_datos)
			{{ $acceso_procesamiento_datos->PDa_Nombre }} <br />
		@endforeach
	@else
		NO
	@endif
	<br />
	<u class="text-left"><b><font size="3">
		IX. MANEJO DE PROGRAMAS DE COMPUTACIÓN
	</font></b></u>
	<br />
	<b class="text-left"><font size="2">
		a. ¿TIENE ACCESO A WINDOWS?:
	</font></b>
	@if($user->formulario->informacion_aspirante->Asp_Acceso_Windows)
		 Si
	@else
		 NO
	@endif
	<br />
	<b class="text-left"><font size="2">
		b. ¿TIENE ACCESO A CORREO ELECTRÓNICO?
	</font></b>
	@if($user->formulario->informacion_aspirante->Asp_Acceso_Email)
		 Si
	@else
		 NO
	@endif
	<br />
	<b class="text-left"><font size="2">
		c. ¿UTILIZA PROGRAMAS DE COMPUTACIÓN?
	</font></b>
	@if(!$user->formulario->informacion_aspirante->acceso_programas_computacionales->isEmpty())
		Si
		<br />
		<table class="table1"  width="100%">
		<tr>
			<td>
				<b>Cuales programas de computación utiliza.</b>
			</td>
		</tr>
		@foreach($user->formulario->informacion_aspirante->acceso_programas_computacionales as $programa_computacion)
			<tr>
				<td>
					{{$programa_computacion->Prog_Nombre}}
				</td>
		    </tr>
		@endforeach
		</table>
	@else
		No
	@endif
	<br />
	<br />
	<u class="text-left"><b><font size="3">
		X. RECOMENDACIONES DE PROFESORES O ESPECIALISTAS
	</font></b></u>
	<br />
	<br />
	@if(!$user->formulario->informacion_aspirante->recomendaciones->isEmpty())
		@foreach($user->formulario->informacion_aspirante->recomendaciones as $recomendacion)
			<table class="table2"  width="100%">
				<tr>
					<td width="20%">
						<b>Nombre Completo: </b>
					</td>
					<td colspan=3>
						{{$recomendacion->Rec_Nombre_Completo}}
					</td>
			    </tr>
			    <tr>
					<td width="20%">
						<b>Dirección: </b>
					</td>
					<td colspan=3>
						{{ $recomendacion->Rec_Direccion }}
					</td>
			    </tr>
			    <tr>
					<td width="20%">
						<b>Teléfono: </b>
					</td>
					<td>
						{{ $recomendacion->Rec_Telefono }}
					</td>
					<td width="20%">
						<b>Fax: </b>
					</td>
					<td>
						{{ $recomendacion->Rec_Fax }}
					</td>
			    </tr>
			    <tr>
					<td width="20%">
						<b>Email: </b>
					</td>
					<td colspan=3>
						{{ $recomendacion->email->Email_Email or '' }}
					</td>
			    </tr>
			    <tr>
					<td width="20%">
						<b>Posición: </b>
					</td>
					<td colspan=3>
						{{ $recomendacion->Rec_Ocupacion }}
					</td>
			    </tr>
			</table>
			<br />
		@endforeach
	@endif
	<br />
	<b class="text-left"><font size="2">
		¿TIENE CONOCIMIENTO DE EDUCACIÓN A DISTANCIA O PLATAFORMAS VIRTUALES?
	</font></b>
	@if($user->formulario->informacion_aspirante->Asp_Conoc_Educacion_Dist)
	 	Si
	 	<br />
		<table class="table1" width="100%">
			<tr>
				<td><b>Comente:</b></td>
			</tr>
			<tr>
				<td> {{ $user->formulario->informacion_aspirante->educacion_distancia->EDi_Descripcion }} </td>
			</tr>
		</table>
	@else
		 NO
	@endif
</body>
</html>