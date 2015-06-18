@extends('profesor.dashboard')

@section('page_title')
	Perfil de Administrador
@endsection

@section('page_header')
	Perfil
@endsection

@section('content')
	<div class="panel-body">
		@if (count($errors) > 0)
			@include('administrador.partials.alert_danger')
		@else
			@include('administrador.partials.alert_success')
		@endif

		<form class="form-horizontal" method="POST" action="{{ route('profesor.perfil.update', $profesor->Usu_ID) }}">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<!-- Nombre Completo -->
			<div class="form-group">
				<label for="nombre_completo" class="col-md-4 control-label">Nombre Completo: </label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="nombre_completo" value="{{ $profesor->Usu_Nombre }}" disabled="">
				</div>
			</div>

			<!-- Email -->
			<div class="form-group">
				<label for="email" class="col-md-4 control-label">Correo Electrónico: </label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="email" value="{{ $profesor->email }}" disabled="">
				</div>
			</div>

			<!-- Contraseña -->
			<div class="form-group">
				<label for="password" class="col-md-4 control-label">Contraseña: </label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password" disabled="">
				</div>
			</div>

			<!-- Confirmación de Contraseña -->
			<div class="form-group" id="password_confirmation" style="visibility:hidden;">
				<label class="col-md-4 control-label">Confirmar Contraseña</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password_confirmation" disabled="">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="button" id="btn-update" class="btn btn-primary">Modificar</button>
					<input type="submit" id="btn-save" class="btn btn-success" value="Guardar" style="visibility:hidden;">
					<input type="button" id="btn-cancel" class="btn btn-danger" value="Cancelar" style="visibility:hidden;">
				</div>
			</div>
		</form>
	</div>
@endsection


@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn-update').click(function(){
				$(this).parents('form.form-horizontal').find('input').attr('disabled', false);
				$('#btn-save').css('visibility', 'visible');
				$('#btn-cancel').css('visibility', 'visible');
				$('#password_confirmation').css('visibility', 'visible');
				$(this).css('display', 'none');
			})
			$('#btn-cancel').click(function(){
				cancelarActualizacion();
				$(this).parents('form.form-horizontal').find('input').attr('disabled', true);
				$('#btn-save').css('visibility', 'hidden');
				$('#btn-cancel').css('visibility', 'hidden');
				$('#password_confirmation').css('visibility', 'hidden');
				$('#btn-update').css('display', 'initial');
			})
		});
	</script>
	<script type="text/javascript">
		$(function(){
		    $('form.form-horizontal').find(':input').each(function(i, elem) {
		         var input = $(elem);
		         if(elem.type=="checkbox"){
		            input.data('estadoInicial',input.is(":checked"));
		         }
		         else{
		            input.data('estadoInicial', input.val());}
		    });
		});

		function cancelarActualizacion() {
		    $('form.form-horizontal').find(':input').each(function(i, elem) {
		         var input = $(elem);
		         if(elem.type=="checkbox"){
		            input.prop('checked', input.data('estadoInicial'));
		         }
		         else{
		            input.val(input.data('estadoInicial'));
		        }
		    });
		}
	</script>
@endsection