<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
 	<p class="text-center"><img src="images/DOCINADE.png" align="middle"></p>
	<br />
	<p class="text-center">
		<img src="images/UNED.png" align="left">
		<img src="images/TEC.png" align="middle">
		<img src="images/UNA.png" align="right">
	</p>
	<p class="text-center"><font size="17">DOCTORADO EN CIENCIAS NATURALES PARA EL DESARROLLO</font></p>
	<p class="text-center"><font size="14">FORMULARIO DE SOLICITUD DE ADMISIÓN</font></p>
	<p class="text-center"><font size="14">VIII PROMOCIÓN Universidad Estatal a Distancia 2015 (UNED, Costa Rica)</font></p>
	<br />
	<table cellspacing="12">
		<tr>
			<td><img src="{{ 'storage/images/'.$user->formulario->informacion_aspirante->Asp_Fotografia}}" height="160px" width="160px" border="1px"></td>
			<td><p>Este formulario deberá ser enviado necesariamente por correo electrónico a:<br />
				Dr. Wagner Peña Cordero al correo wpena@uned.ac.cr,<br />
				wpenanator@gmail.com, docinade@uned.ac.cr<br /><br />
				Con copia a:<br /><br />
				Instituto Tecnológico de Costa Rica, Santa Clara,<br />
				Coordinación general:<br />
				Dr. Freddy Araya Rodíguez: freddyaraya1996gmail.com<br />
				o a la señora Viviana Miranda<br />
				a los correos, vmiranda@itcr.ac.cr, o al vmirandaq@gmail.com.</p></td>
		</tr>
	</table>
	<p class="text-left"><font size="2">
		Nota: También se deberá enviar la documentación vía currier, consulado o entregarlo personalmente en UNED.
	</font></p>
	<table>
		<tr>
			<td><u class="text-left"><b>I. FECHA:</b></u></td>
			<td><table cellpadding="20">
				<tr>
					<td><b>DIA</b></td>
					<td><b>MES</b></td>
					<td><b>AÑO</b></td>
				</tr>
			</table></td>
		</tr>
	</table>
	<u class="text-left"><b><font size="2">
		II. INFORMACIÓN PERSONAL
	</font></b></u>
	<table width="100%">
		<tr><td colspan=3></td></tr>
		<tr>
			<td><b>Apellidos: </b> {{ $user->formulario->IPe_Apellido }} </td>
			<td><b>Nombre: </b> {{ $user->formulario->IPe_Nombre }} </td>
			<td><b>Género: </b>
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
			<td><b>Fecha de Nacimiento: </b>
				<!-- Conversión del formato de la fecha -->
				@if(!is_null($user->formulario->IPe_Fecha_Nac) && $user->formulario->IPe_Fecha_Nac != "0000-00-00")
					<?php
						$date_obj = date_create_from_format('Y-m-d',$user->formulario->IPe_Fecha_Nac);
						$fecha_nacimiento = date_format($date_obj, 'd/m/Y');
					?>
					{{ $fecha_nacimiento }}
				@endif
			</td>
			<td colspan=2><b>Lugar de Nacimiento: </b> {{ $user->formulario->informacion_aspirante->Asp_Lugar_Nac }} </td>
		</tr>
		<tr>
			<td colspan=3><b>Nacionalidad: </b>
				@if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Nac))
					{{ $user->formulario->informacion_aspirante->nacionalidad->Nac_Nombre }}
				@endif
			</td>
		</tr>
		<tr>
			<td colspan=2><b>País de Residencia: </b>
				@if(!is_null($user->formulario->informacion_aspirante->direccion_actual->pais_residencia))
					{{ $user->formulario->informacion_aspirante->direccion_actual->pais_residencia->Pais_Nombre }}
				@endif
			</td>
			<td ><b>N° de Cédula: </b> {{ $user->formulario->IPe_Pasaporte }}</td>
		</tr>
		<tr>
			<td colspan=3><b>Énsasis de Interés: </b>
				@if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Enfasis))
					{{ $user->formulario->informacion_aspirante->enfasis->Enf_Nombre }}
				@endif
			</td>
		</tr>
		<tr>
			<td colspan=3><b>Área en que le interesaría desarrollar el tema de investigación: </b></td>
		</tr>
	</table>
	<br />
	<br />
	<b class="text-left"><font size="2">DIRECCIÓN ACTUAL</font></b>
	<table width="100%">
		<tr><td colspan=3></td></tr>
		<tr>
			<td><b>País: </b></td>
			<td><b>Ciudad: </b></td>
			<td><b>Código Postal: </b></td>
		</tr>
		<tr>
			<td colspan=3><b>Dirección para Envío de Correspondencia: </b></td>
		</tr>
		<tr>
			<td><b>Tel. Celular: </b>{{ $user->formulario->IPe_Telefono }}</td>
			<td><b>Fax: </b>{{ $user->formulario->IPe_Fax }}</td>
			<td><b>Correo(s) Electrónico(s): </b>
				@if(!$user->formulario->emails->isEmpty())
					{{ $user->formulario->emails()->first()->Email_Email }}
				@endif
			</td>
		</tr>
	</table>
	<br />
	<u class="text-left"><b><font size="2">
		III. EDUCACIÓN SUPERIOR/EXPERIENCIA PROFESIONAL
	</font></b></u>
	<br />
	<p class="text-left"><font size="2">
		a. EDUCACIÓN SUPERIOR
	</font></p>
	<table width="100%">
		<tr><td colspan=3></td></tr>
		<tr>
			<td><b>Institución, País</b></td>
			<td><b>Año de Graduación</b></td>
			<td><b>Título(s) Obtenido(s)</b></td>
		</tr>
	</table>
	<br />
	<p class="text-left"><font size="2">
		b. EXPERIENCIA PROFESIONAL
	</font></p>
	<table width="100%">
		<tr><td colspan=3></td></tr>
		<tr>
			<td><b>Empresa, Centro o Institución</b></td>
			<td><b>Ocupación o Posición</b></td>
			<td><b>Años de Experiencia</b></td>
		</tr>
	</table>
</body>
</html>