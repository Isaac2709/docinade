<div class="row">
	<div class="col-md-6">
		<div class="row">
			<h3 class="col-md-12"><b>PRIMER RECOMENDACIÓN:</b></h3>
			<label class="col-md-3"><b>Nombre:</b></label>
			<label class="col-md-9">{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Nombre_Completo or '' }}</label>
			<label class="col-md-3"><b>Dirección:</b></label>
			<label class="col-md-9">{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Direccion or '' }}</label>
			<label class="col-md-3"><b>Teléfono:</b></label>
			<label class="col-md-9">{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Telefono or '' }}</label>
			<label class="col-md-3"><b>Fax:</b></label>
			<label class="col-md-9">{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Fax or '' }}</label>
			<label class="col-md-3"><b>Email:</b></label>
			<label class="col-md-9">
				@if(!$user->formulario->informacion_aspirante->recomendaciones->isEmpty())
					{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->email->Email_Email or ''}}
				@endif
			</label>
			<label class="col-md-3"><b>Posición:</b></label>
			<label class="col-md-9">{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Ocupacion or '' }}</label>
		</div>
	</div>
	<div class="col-md-6">
		<div class="row">
			<h3 class="col-md-12"><b>SEGUNDA RECOMENDACIÓN:</b></h3>
			@if($user->formulario->informacion_aspirante->recomendaciones()->count() > 1)
				<label class="col-md-3"><b>Nombre:</b></label>
				<label class="col-md-9">{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Nombre_Completo or '' }}</label>
				<label class="col-md-3"><b>Dirección:</b></label>
				<label class="col-md-9">{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Direccion or '' }}</label>
				<label class="col-md-3"><b>Teléfono:</b></label>
				<label class="col-md-9">{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Telefono or '' }}</label>
				<label class="col-md-3"><b>Fax:</b></label>
				<label class="col-md-9">{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Fax or '' }}</label>
				<label class="col-md-3"><b>Email:</b></label>
				<label class="col-md-9">
					@if(!is_null($user->formulario->informacion_aspirante->recomendaciones[1]->Rec_ID_Email))
						{{ $user->formulario->informacion_aspirante->recomendaciones[1]->email->Email_Email or '' }}
					@endif
				</label>
				<label class="col-md-3"><b>Posición:</b></label>
				<label class="col-md-9">{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Ocupacion or '' }}</label>
			@else
				<label class="col-md-12"><b>Nombre:</b></label>
				<label class="col-md-12"><b>Dirección:</b></label>
				<label class="col-md-12"><b>Teléfono:</b></label>
				<label class="col-md-12"><b>Fax:</b></label>
				<label class="col-md-12"><b>Email:</b></label>
				<label class="col-md-12"><b>Posición:</b></label>
			@endif
		</div>
	</div>
<br/>
</div>