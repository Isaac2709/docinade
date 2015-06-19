<div class="row">
    <h3 class="col-md-12"><b>EXPERIENCIA PROFESIONAL:</b></h3>
    <?php $funciones = null; ?>
    <div class="col-md-12">
        <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center"><b>Empresa, Centro o Institución</b></th>
                <th class="text-center"><b>Ocupación o Posición</b></th>
                <th class="text-center"><b>Años de Experiencia</b></th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
        </table>
    </div>
    <label><b>Funciones que Desempeña en el Trabajo más Reciente: </b>
        {{ $funciones }}
    </label>
    <br/>
</div>