@extends('dashboard.dashboard')

@section('styles')
	<link href="{{ asset('/dashboard/css/bootstrap-table.css') }}" rel="stylesheet">
    <style type="text/css">
    ::selection {
    background: #7A9853;
    color: #fff;
    text-shadow: none;
}


.navbar-inverse{
    background: #7A9853;
}

.navbar-brand{
    padding: 0px 0px 0px 15px;
}

::-moz-selection {
    background: #7A9853;
    color: #fff;
    text-shadow: none;
}

/**** Background Colors ****/
body,
.lightBtn {
  background-color: #efefef;
}
    </style>
@endsection

@section('page_header')
	Administradores
@endsection

@section('content')
	<!-- <div class="panel-heading">Administradores</div> -->
	<div class="panel-body">
		<div class="form-group">
			@if (count($errors) > 0)
				@include('administrador.partials.alert_danger')
			@else
				@include('administrador.partials.alert_success')
			@endif

			<!-- <div class="dataTable_wrapper"> -->
            <table data-toggle="table" data-row-style="rowStyle" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Correo Electrónico</th>
                        <th>X</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
						<tr class="odd gradeX">
                            <td>{{ $admin->Usu_Nombre }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                            	<a href="{{URL::route('admin.users.edit', $admin->Usu_ID)}}" class="btn btn-info">Editar</a>

                            	<form class="form" method="POST" action="{{ route('admin.users.destroy', $admin->Usu_ID) }}">
                            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            		<input type="hidden" name="_method" value="DELETE">
                            		<input type="submit" onclick="return confirm('¿Seguro que desea eliminar el registro?')" class="btn btn-danger" value="Eliminar">
                            	</form>
                            </td>
                        </tr>
					@endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<a href="{{route('admin.users.create')}}" class="btn btn-primary">Registrar Administrador</a>
			</div>
		</div>
    </div>
</div>

 <!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});
</script>


@endsection
