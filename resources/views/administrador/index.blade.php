@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Administradores</div>

				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Hubieron algunos problemas con las entradas.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@else
						@if (session()->has('successMessage'))
							<div class="alert alert-success">
							@foreach(session('successMessage') as $message)
								<center><strong>{{ $message }}</strong></center>
							@endforeach
							</div>
						@endif
					@endif
					<div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
