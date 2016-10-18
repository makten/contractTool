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


	


	<!-- <div id="app"> -->
	
	<div class="header">
		
		<div class="logo">
			<i class="fa fa-tachometer"></i>
			<span>Brand</span>
		</div>

		<a href="#" class="nav-trigger"><span></span></a>

		


		<div class="navmenu" id="myNavbar">

			<ul class="" style="margin-top: 10px;">

				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li class="active"><a href="#">Home</a></li>
				
				<li>

					<li class="dropdown" >

						<!-- Menu Toggle Button -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

							<img style="border: 2px solid lightgrey; padding: 2px; margin-right: 7px; height: 25px; width: 25px; border-radius: 50%; background: #E9E8E8;" src="/images/example.png" class="user-image" alt="User Image"/>

							<span class="hidden-xs">Hafiz Abass</span>

						</a>

						<ul class="dropdown-menu" style="border-top-right-radius: 0;
						border-top-left-radius: 0;
						padding: 1px 0 0 0;
						border-top-width: 0;
						width: 280px;
						position: absolute;	
						right: 20px;
						margin: 4px;
						margin-top: 16px;					
						left: auto;">


						<li class="user-header" style="height: 175px; padding: 10px; text-align: center;">
							<center>
								<img src="/images/example.png" class="img-circle" alt="User Image"/ style="z-index: 5;
								height: 90px;
								width: 90px;
								border: 3px solid;
								border-color: transparent;
								border-color: rgba(255, 255, 255, 0.2);">
							</center>

							

							<p style="z-index: 5;
							color: #fff;
							color: rgba(255, 255, 255, 0.8);
							font-size: 17px;
							margin-top: 10px;">
							Hafiz Abass               
						</p>

					</li>


					<li class="user-body" style="border-bottom-right-radius: 4px;
					border-bottom-left-radius: 4px;">


					<div class="col-xs-4 text-center">
						<a href="#">Mijn team</a>
					</div>

					<div class="col-xs-4 text-center">
						<a href="/hello">Mijn activiteiten</a>
					</div>

				</li>


				<li class="user-footer" style="display: list-item;
				text-align: -webkit-match-parent; ">

				<div class="pull-left">
					<a href="/user/1/profile" class="btn btn-default btn-flat">Profile</a>
				</div>

				<div class="pull-right">

					<a href="{{ url('/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						Logout
					</a>

				</div>

				<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>

			</li>
		</ul>
	</li>

</li>

<li class="hidden-xs">&nbsp;&nbsp;&nbsp;&nbsp;</li>

</ul>

</div>


</div>






<div class="side-nav">


	<div class="logo">
		<i class="fa fa-tachometer"></i>
		<span>Brand</span>
	</div>



	<nav>
		<ul>
			<li>
				<a href="#">
					<span><i class="fa fa-user"></i></span>
					<span>Users</span>
				</a>
			</li>
			<li>
				<a href="#">

					<span><i class="fa fa-envelope"></i></span>
					<span>Messages</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<span><i class="fa fa-bar-chart"></i></span>
					<span>Analytics</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span><i class="fa fa-credit-card-alt"></i></span>
					<span>Payments</span>
				</a>
			</li>
		</ul>
	</nav>
</div>


<div class="main-content">

	

		<div class="main">

		<div class="col-md-8 col-md-offset-2" id="bam" style="margin-top: 80px;">

			<h1 >

				Something Amazing Is Coming Soon!

			</h1>

			<p class="fadeIn wait-2s">You Will Love it</p>

		</div>
			<div class="widget">
				<div class="title">Number of views</div>
				<div class="chart"></div>
			</div>
			<div class="widget">
				<div class="title">Number of likes</div>
				<div class="chart"></div>
			</div>
			<div class="widget">
				<div class="title">Number of comments</div>
				<div class="chart"></div>
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
