<div class="row">
    <h3 class="col-md-12"><b>TITULO:</b></h3>
    <br/>
    <h3 class="col-md-12"><b>DEFINICIÓN DEL PROBLEMA:</b></h3>
    @if(!is_null($user->formulario->informacion_aspirante->propuesta_tesis))        
        <label class="col-md-12">{{ $user->formulario->informacion_aspirante->propuesta_tesis->PTe_Definicion}}</label>        
    @endif
    <br/>
    <h3 class="col-md-12"><b>OBJETIVOS:</b></h3>    
    @if(!is_null($user->formulario->informacion_aspirante->propuesta_tesis))    
        <label class="col-md-12">{{ $user->formulario->informacion_aspirante->propuesta_tesis->PTe_Objetivos}}</label>        
    @endif
    <br/>
    <h3 class="col-md-12"><b>METODOLOGÍA:</b></h3>        
    @if(!is_null($user->formulario->informacion_aspirante->propuesta_tesis))    
        <label class="col-md-12">{{ $user->formulario->informacion_aspirante->propuesta_tesis->PTe_Metodologia}}</label>        
    @endif
    <br/>    
    <h3 class="col-md-12"><b>MARCO TEÓRICO:</b></h3>
    @if(!is_null($user->formulario->informacion_aspirante->propuesta_tesis))        
        <label class="col-md-12">{{ $user->formulario->informacion_aspirante->propuesta_tesis->PTe_Marco_Teorico}}</label>        
    @endif
    <br/>
    <h3 class="col-md-12"><b>BIBLIOGRAFÍA:</b></h3>    
    @if(!is_null($user->formulario->informacion_aspirante->propuesta_tesis))    
        <label class="col-md-12">{{ $user->formulario->informacion_aspirante->propuesta_tesis->PTe_Bibliografia}}</label>        
    @endif
</div>
<br/>