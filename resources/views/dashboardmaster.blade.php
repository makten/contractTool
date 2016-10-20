<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>CT-Hafiz</title>

	<!-- Styles -->
	<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('/css/bootstrap-theme.css') }}" rel="stylesheet" type="text/css"/>
	<link href="/css/app.css" rel="stylesheet">
	<link href="/css/HADashboard.css" rel="stylesheet">
	<link href="/css/nprogress.css" rel="stylesheet">

	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
			]); ?>
		</script>

	</head>


	<body>

		<div id="app">

			@include('layouts.partials.mainheader')
			@include('layouts.partials.sidebar')		


			<div class="main-content">



					@yield('content')


				


			</div>

		</div>






		<!-- Scripts -->
		<script src="/js/app.js"></script>		
		<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<script src="/js/jquery.dropdown.js" type="text/javascript"></script>
		<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('/js/dashboard.js') }}" type="text/javascript"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('.nav-trigger').click(function() {
					$('.side-nav').toggleClass('visible');
				});
			});
		</script>


	</body>
	</html>
