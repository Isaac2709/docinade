@if (session()->has('successMessage'))
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<center>{{ Session::get('successMessage') }}</center>
	</div>
@endif