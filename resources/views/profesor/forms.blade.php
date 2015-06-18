@extends('profesor.dashboard')

@section('styles')
	<!--1 <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">-->

	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" > -->
	<link href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" >
	<!--para highlight -->
	<link href="//cdn.datatables.net/plug-ins/1.10.7/features/searchHighlight/dataTables.searchHighlight.css" rel="stylesheet" >

	<!-- 3<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css" rel="stylesheet" >-->
	<style type="text/css">

		tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

    .btn-circle {
	  width: 30px;
	  height: 30px;
	  text-align: center;
	  padding: 6px 0;
	  font-size: 12px;
	  line-height: 1.428571429;
	  border-radius: 15px;
	}
	</style>
	<link href="{{ asset('/dashboard/css/bootstrap-table.css') }}" rel="stylesheet">
@endsection

@section('form_active')
	class="active"
@endsection

@section('page_title')
	Formularios
@endsection

@section('page_header')
	Formularios
@endsection

@section('content')
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-condensed" id="tablaConsultas">
				<thead>
					<tr>
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
				<tfoot>
					<tr>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Cédula/Pasaporte</th>
						<th>Género</th>
						<th>Nacionalidad</th>
						<th>Email principal</th>
						<th>Estado Formulario</th>
						<th>Detalles</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($users as $user)
						@if(!empty($user->IPe_Nombre))
							@if($user->Asp_Estado_Formulario == "Enviado")
								<tr>
									<td><strong>{{$user->IPe_Nombre}}</strong></td>
									<td><strong>{{$user->IPe_Apellido}}</strong></td>
									<td><strong>{{$user->IPe_Pasaporte}}</strong></td>
									<td><strong>{{$user->IPe_Genero}}</strong></td>
									<td><strong>{{$user->Nac_Nombre}}</strong></td>
									<td><strong>{{$user->formulario->emails()->first()->Email_Email or ''}}</strong></td>
									<td><strong>{{$user->Asp_Estado_Formulario}}</strong></td>
									<td><a href="{{ url('/profesor/aspirante/'.$user->Usu_ID) }}" class="btn btn-warning btn-sm" role="button"><span class="glyphicon glyphicon-info-sign"></span></a></td>
								</tr>
							@else
								<tr>
									<td>{{$user->IPe_Nombre}}</td>
									<td>{{$user->IPe_Apellido}}</td>
									<td>{{$user->IPe_Pasaporte}}</td>
									<td>{{$user->IPe_Genero}}</td>
									<td>{{$user->Nac_Nombre}}</td>
									<td>{{$user->formulario->emails()->first()->Email_Email or ''}}</td>
									<td>{{$user->Asp_Estado_Formulario}}</td>
									<td><a href="{{ url('/profesor/aspirante/'.$user->Usu_ID) }}" class="btn btn-info btn-sm" role="button"><span class="glyphicon glyphicon-info-sign"></span></a></td>
								</tr>
							@endif
						@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('scripts')
<!-- 1<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
scrip

<script type="text/javascript">
	$(document).ready(function(){
    $('#tablaConsultas').DataTable();
});
</script>-->


<!-- 2<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    $('#tablaConsultas').DataTable();
});
</script>-->


<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<!-- para el highlight-->
<script src="//cdn.datatables.net/plug-ins/1.10.7/features/searchHighlight/dataTables.searchHighlight.min.js"></script>
<script src="//bartaz.github.io/sandbox.js/jquery.highlight.js"></script>

<script type="text/javascript">

	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tablaConsultas tfoot th').each( function () {
        var title = $('#tablaConsultas thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );

    // DataTable
    var table = $('#tablaConsultas').DataTable();



    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );

    //ordenamiento por una columna en especifico
    table
    .order( [ 6, 'asc' ] )
    .draw();
} );
</script>

<script type="text/javascript">
	$('#tablaConsultas').dataTable({
		searchHighlight: true,
	  	"language":
	  	{
		    "emptyTable":     "No hay datos disponibles en la tabla",
		    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
		    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
		    "infoFiltered":   "(filtrado de _MAX_ registros en total)",
		    "infoPostFix":    "",
		    "thousands":      ",",
		    "lengthMenu":     "Mostrar _MENU_ registros",
		    "loadingRecords": "Cargando...",
		    "processing":     "Procesando...",
		    "search":         "Buscar:",
		    "zeroRecords":    "No se encontraron registros relacionados",
		    "paginate":
		    {
		        "first":      "Primero",
		        "last":       "Ultimo",
		        "next":       "Siguiente",
		        "previous":   "Anterior"
		    },
		    "aria":
		    {
		        "sortAscending":  ": activar para ordenar columna ascendentemente",
		        "sortDescending": ": activar para ordenar columna descendentemente"
		    }
  		},
  		"order":
  		[
  			[ 6, "asc" ]
  		]
	});
</script>
@endsection