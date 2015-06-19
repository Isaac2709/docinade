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
                class="text-center img-thumbnail" height="180px" width="180px">
            </p>
        @endif
    </div>
    <div class="col-md-8">
        <label><u>Apellidos:</u></label>
        <label>{{ $user->formulario->IPe_Apellido }}</label>
        </br>
        <label><u>Nombre:</u></label>
        <label>{{ $user->formulario->IPe_Nombre }}</label>
        </br>
        <label><u>Género:</u></label>
        <label>
            @if(!is_null($user->formulario->IPe_Genero) && !empty($user->formulario->IPe_Genero))
                @if($user->formulario->IPe_Genero == "F") Femenino
                @elseif($user->formulario->IPe_Genero == "M") Masculino
                @endif
            @endif
        </label>
        </br>
        <label ><u>Fecha de Nacimiento:</u></label>
        <label >
            @if(!is_null($user->formulario->IPe_Fecha_Nac) && $user->formulario->IPe_Fecha_Nac != "0000-00-00")
                <?php
                    $date_obj = date_create_from_format('Y-m-d',$user->formulario->IPe_Fecha_Nac);
                    $fecha_nacimiento = date_format($date_obj, 'd/m/Y');
                ?>
                {{ $fecha_nacimiento }}
            @endif
        </label>
    </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label ><u>Lugar de Nacimiento:</u></label>
                <label >{{ $user->formulario->informacion_aspirante->Asp_Lugar_Nac }}</label>
                </br>
                <label ><u>Nacionalidad:</u></label>
                <label >
                    @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Nac))
                        {{ $user->formulario->informacion_aspirante->nacionalidad->Nac_Nombre }}
                    @endif
                </label>
                </br>
                <label ><u>N° Cédula/Pasaporte:</u></label>
                <label >{{ $user->formulario->IPe_Pasaporte }}</label>
            </div>

            <div class="col-md-6">
                <label ><u>Énfasis de Interés:</u></label>
                <label >
                    @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Enfasis))
                        {{ $user->formulario->informacion_aspirante->enfasis->Enf_Nombre }}
                    @endif
                </label>
                </br>
                <label ><u>Área de Interés para Tema de Investigación:</u></label>
                <label >
                    @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Area_Interes))
                        {{ $user->formulario->informacion_aspirante->area_interes->Area_Nombre }}
                    @endif
                </label>
            </div>
        </div>

    <h3 class="col-md-12"><b>Dirección Actual:</b></h3>
    <div class="col-md-12">
        <div class="col-md-6">
            <label><u>País:</u></label>
            <label>
                @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual) && !is_null($user->formulario->informacion_aspirante->direccion_actual->DiA_ID_Pais))
                    {{ $user->formulario->informacion_aspirante->direccion_actual->pais_residencia->Pais_Nombre }}
                @endif
            </label>
            </br>
            <label><u>Ciudad:</u></label>
            <label>
                @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual))
                    {{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Ciudad }}
                @endif
            </label>
            </br>
            <label><u>Código Postal:</u></label>
            <label>
                @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual))
                    {{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Cod_Postal }}
                @endif
            </label>
            </br>
            <label><u>Teléfono:</u></label>
            <label>{{ $user->formulario->IPe_Telefono }}</label>
        </div>

        <div class="col-md-6">
            <label><u>Fax:</u></label>
            <label>{{ $user->formulario->IPe_Fax }}</label>
            </br>
            <label><u>Correo(s) Electrónico(s):</u></label>
            <label>
                @if(!$user->formulario->emails->isEmpty())
                    {{ $user->formulario->emails()->first()->Email_Email }}
                    @if ($user->formulario->emails()->count()>1)
                        , {{ $user->formulario->emails[1]->Email_Email or '' }}
                    @endif
                @endif
            </label>
            </br>
            <label><u>Dirección Envío Correspondencia:</u></label>
            <label>
                @if(!is_null($user->formulario->informacion_aspirante->Asp_ID_Dir_Actual))
                    {{ $user->formulario->informacion_aspirante->direccion_actual->DiA_Dir_Corresp }}
                @endif
            </label>
        </div>
    </div>
    <br/>
</div>