<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Forms</title>

<link href="{{ asset('/dashboard/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/dashboard/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('/dashboard/css/styles.css') }}" rel="stylesheet">

@yield('styles')

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	@include('dashboard.partials.layout_menu_top')
	<!-- /.navbar-top -->

	@include('dashboard.partials.layout_menu_left')
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/"><span class="glyphicon glyphicon-home"></span></a></li>
				@yield('parent_pages')
				<li class="active">@yield('page_header')</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@yield('page_header')</h1>
			</div>
		</div><!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					@yield('content')
				</div>
			</div>
		</div>

	<script src="/dashboard/js/jquery-1.11.1.min.js"></script>
	<script src="/dashboard/js/bootstrap.min.js"></script>
	<script src="/dashboard/js/chart.min.js"></script>
	<script src="/dashboard/js/chart-data.js"></script>
	<script src="/dashboard/js/easypiechart.js"></script>
	<script src="/dashboard/js/easypiechart-data.js"></script>
	<script src="/dashboard/js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
	@yield('scripts')
</body>

</html>
