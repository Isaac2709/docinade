<div class="row">
	<div class="col-md-6">
		<div class="row">
			<h3 class="col-md-12"><b>PRIMER RECOMENDACIÓN:</b></h3>
			<label ><u><b>Nombre:</b></u></label>
			<label >{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Nombre_Completo or '' }}</label>
			</br>
			<label ><u><b>Dirección:</b></u></label>
			<label >{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Direccion or '' }}</label>
			</br>
			<label ><u><b>Teléfono:</b></u></label>
			<label >{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Telefono or '' }}</label>
			</br>
			<label ><u><b>Fax:</b></u></label>
			<label >{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Fax or '' }}</label>
			</br>
			<label ><u><b>Email:</b></u></label>
			<label >
				@if(!$user->formulario->informacion_aspirante->recomendaciones->isEmpty())
					{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->email->Email_Email or ''}}
				@endif
			</label>
			</br>
			<label ><u><b>Posición:</b></u></label>
			<label >{{ $user->formulario->informacion_aspirante->recomendaciones()->first()->Rec_Ocupacion or '' }}</label>
		</div>
	</div>
	<div class="col-md-6">
		<div class="row">
			<h3 class="col-md-12"><b>SEGUNDA RECOMENDACIÓN:</b></h3>
			@if($user->formulario->informacion_aspirante->recomendaciones()->count() > 1)
			<div class="col-md-12">
					<label ><u><b>Nombre:</b></u></label>
					<label >{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Nombre_Completo or '' }}</label>
					</br>
					<label ><u><b>Dirección:</b></u></label>
					<label >{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Direccion or '' }}</label>
					</br>
					<label ><u><b>Teléfono:</b></u></label>
					<label >{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Telefono or '' }}</label>
					</br>
					<label ><u><b>Fax:</b></u></label>
					<label >{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Fax or '' }}</label>
					</br>
					<label ><u><b>Email:</b></u></label>
					<label >
						@if(!is_null($user->formulario->informacion_aspirante->recomendaciones[1]->Rec_ID_Email))
							{{ $user->formulario->informacion_aspirante->recomendaciones[1]->email->Email_Email or '' }}
						@endif
					</label>
					</br>
					<label ><u><b>Posición:</b></u></label>
					<label >{{ $user->formulario->informacion_aspirante->recomendaciones[1]->Rec_Ocupacion or '' }}</label>
			</div>
			@else
				<div class="col-md-12">
						<label ><u><b>Nombre:</b></u></label>
						<label ><u><b>Dirección:</b></u></label>
						<label ><u><b>Teléfono:</b></u></label>
						<label ><u><b>Fax:</b></u></label>
						<label ><u><b>Email:</b></u></label>
						<label ><u><b>Posición:</b></u></label>
				</div>
			@endif
		</div>
	</div>
<br/>
</div>