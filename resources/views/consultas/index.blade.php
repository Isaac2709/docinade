@extends('app')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Lista de Aspirantes</h2></div>
				<div class="panel-body">
					<!-- <form class="navbar-form navbar-left" role="search">-->
					{!! Form::open(['route' => 'consultas.index', 'method'=>'GET', 'class'=>'navbar-form navbar-right', 'role'=>'search']) !!}
					  <div class="form-group">
					  	<!-- <input type="text" class="form-control" placeholder="Search">-->
					    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre de Usuario']) !!}
					  </div>
					  <button type="submit" class="btn btn-default">Buscar</button>
					{!! Form::close() !!}
					<!-- </form>-->
					<br />
				<p>Hay {{$users->total()}} usuarios</p>
				<div class="table-responsive">
					<table class="table table-striped table-hover table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Apellidos</th>
								<th>Cédula/Pasaporte</th>
								<th>Género</th>
								<th>Nacionalidad</th>
								<th>Email principal</th>
								<th>Estado Formulario</th>
								<th>Detalles</th>
							</tr>
						</thead>
						<tbody>
						@foreach($users as $user)
							<tr>
								<!-- <td>{{$user->formulario->Usu_ID}}</td>-->
								<td>{{$user->formulario->IPe_Nombre}}</td>
								<td>{{$user->formulario->IPe_Apellido}}</td>
								<td>{{$user->formulario->IPe_Pasaporte}}</td>
								<td>{{$user->formulario->IPe_Genero}}</td>
								<td>{{$user->formulario->informacion_aspirante->nacionalidad->Nac_Nombre or ''}}</td>
								<td>{{$user->formulario->emails()->first()->Email_Email or ''}}</td>
								<td>Incompleto</td>
								<td>X</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					</div>
					{!! $users->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection