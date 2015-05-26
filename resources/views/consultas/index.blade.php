@extends('app')

@section('styles')
	<!--1 <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">-->

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" >
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
	</style>

	
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Lista de Aspirantes</h2></div>
				<div class="panel-body">
					<!-- <form class="navbar-form navbar-right" role="search">
					
					  <div class="form-group">
					  <input type="text" class="form-control" placeholder="Search">
					    
					  </div>
					  <button type="submit" class="btn btn-default">Buscar</button>
					</form>
					<br />-->
				<!-- <p>Hay {{$users->total()}} usuarios</p>-->
				<div class="table-responsive">
					<table class="table table-striped table-hover table-condensed" id="tablaConsultas">
						<thead>
							<tr>
								<!--<th>#</th>-->
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
								<!--<th>#</th>-->
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
							<tr>
								<!-- <td>{{$user->formulario->Usu_ID}}</td>-->
								<td>{{$user->formulario->IPe_Nombre}}</td>
								<td>{{$user->formulario->IPe_Apellido}}</td>
								<td>{{$user->formulario->IPe_Pasaporte}}</td>
								<td>{{$user->formulario->IPe_Genero}}</td>
								<td>{{$user->formulario->informacion_aspirante->nacionalidad->Nac_Nombre or ''}}</td>
								<td>{{$user->formulario->emails()->first()->Email_Email or ''}}</td>
								<td>{{$user->formulario->informacion_aspirante->Asp_Estado_Formulario}}</td>
								<td><a href="#" class="btn btn-info btn-sm" role="button"><span class="glyphicon glyphicon-info-sign"></span></a></td>
							</tr>
						@endforeach
						</tbody>
					</table>
					</div>
					<!--{!! $users->render() !!} -->
				</div>
			</div>
		</div>
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


} );
</script>

<script type="text/javascript">
	$('#tablaConsultas').dataTable( { searchHighlight: true,
  "language": {
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
    "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "Siguiente",
        "previous":   "Anterior"
    },
    "aria": {
        "sortAscending":  ": activar para ordenar columna ascendentemente",
        "sortDescending": ": activar para ordenar columna descendentemente"
    }
  }

} );
</script>








@endsection