<div class="row">
    <label class="col-md-12 labelRight"><h3><b>FECHA ENVÍO:</b></h3></label>
    <label class="col-md-3 labelRight">Día </label>
    <label class="col-md-3 labelRight">Mes </label>
    <label class="col-md-6 labelRight">Año </label>
    <br/>
    <br/>
    <h3 class="col-md-12"><b>INFORMACIÓN PERSONAL:</b></h3>
    <div class="col-md-4">
        @if(is_null($user->formulario->informacion_aspirante->Asp_Fotografia))
            <p class="text-center">
                <img src="{{url('/images/Buddy.jpg')}}" class="text-center" height="180px" width="180px">
            </p>
        @else
            <p class="text-center">
                <img src="{{url('storage/images/'.$user->formulario->informacion_aspirante->Asp_Fotografia)}}"
                class="text-center img-thumbnail" height="160px" width="160px">
            </p>
        @endif
    </div>
    <div class="col-md-8">
        <label class="col-md-3 labelLeft">Apellidos:</label>
        <label class="col-md-9 labelRight">{{ $user->formulario->IPe_Apellido }}</label>
        <label class="col-md-3 labelLeft">Nombre:</label>
        <label class="col-md-9 labelRight">{{ $user->formulario->IPe_Nombre }}</label>
        <label class="col-md-3 labelLeft">Género:</label>
        <label class="col-md-9 labelRight">
            @if(!is_null($user->formulario->IPe_Genero) && !empty($user->formulario->IPe_Genero))
                @if($user->formulario->IPe_Genero == "F") Femenino
                @elseif($user->formulario->IPe_Genero == "M") Masculino
                @endif
            @endif
        </label>
        <label class="col-md-3 labelLeft">Fecha de Nacimiento:</label>
        <label class="col-md-9 labelRight">
            @if(!is_null($user->formulario->IPe_Fecha_Nac) && $user->formulario->IPe_Fecha_Nac != "0000-00-00")
                <?php
                    $date_obj = date_create_from_format('Y-m-d',$user->formulario->IPe_Fecha_Nac);
                    $fecha_nacimiento = date_format($date_obj, 'd/m/Y');
                ?>
                {{ $fecha_nacimiento }}
            @endif
        </label>
        <label class="col-md-3 labelLeft">Lugar de Nacimiento:</label>
        <label class="col-md-9 labelRight">{{ $user->formulario->informacion_aspirante->Asp_Lugar_Nac }}</label>
        <label class="col-md-3 labelLeft">Nacionalidad:</label>
        <label class="col-md-9 labelRight">
            @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Nac))
                {{ $user->formulario->informacion_aspirante->nacionalidad->Nac_Nombre }}
            @endif
        </label>
        <label class="col-md-3 labelLeft" text-align="right">N° Cédula/Pasaporte:</label>
        <label class="col-md-9 labelRight">{{ $user->formulario->IPe_Pasaporte }}</label>
        <label class="col-md-3 labelLeft" text-align="right">Énfasis de Interés:</label>
        <label class="col-md-9 labelRight">
            @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Enfasis))
                {{ $user->formulario->informacion_aspirante->enfasis->Enf_Nombre }}
            @endif
        </label>
    </div>
    <label class="col-md-12">
        <label class="col-md-5 labelLeft">Área de Interés para Tema de Investigación:</label>
        <label class="col-md-7 labelRight">
            @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Area_Interes))
                {{ $user->formulario->informacion_aspirante->area_interes->Area_Nombre }}
            @endif
        </label>
    </label>
    <h3 class="col-md-12"><b>Dirección Actual:</b></h3>
    <label class="col-md-1 labelLeft">País:</label>
    <label class="col-md-3 labelRight">
        @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual) && !is_null($user->formulario->informacion_aspirante->direccion_actual->DiA_ID_Pais))
            {{ $user->formulario->informacion_aspirante->direccion_actual->pais_residencia->Pais_Nombre }}
        @endif
    </label>
    <label class="col-md-1 labelLeft">Ciudad:</label>
    <label class="col-md-3 labelRight">
        @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual))
            {{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Ciudad }}
        @endif
    </label>
    <label class="col-md-2 labelLeft">Código Postal:</label>
    <label class="col-md-2 labelRight">
        @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual))
            {{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Cod_Postal }}
        @endif
    </label>
    <label class="col-md-1 labelLeft">Teléfono:</label>
    <label class="col-md-3 labelRight">{{ $user->formulario->IPe_Telefono }}</label>
    <label class="col-md-1 labelLeft">Fax:</label>
    <label class="col-md-7 labelRight">{{ $user->formulario->IPe_Fax }}</label>
    <label class="col-md-3 labelLeft">Correo(s) Electrónico(s):</label>
    <label class="col-md-9 labelRight">
        @if(!$user->formulario->emails->isEmpty())
            {{ $user->formulario->emails()->first()->Email_Email }}
            @if ($user->formulario->emails()->count()>1)
                , {{ $user->formulario->emails[1]->Email_Email or '' }}
            @endif
        @endif
    </label>
    <label class="col-md-3 labelLeft">Dirección Envío Correspondencia:</label>
    <label class="col-md-9 labelRight">
        @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual))
            {{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Dir_Corresp }}
        @endif
    </label>
    <br/>
</div>