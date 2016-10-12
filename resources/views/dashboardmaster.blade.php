<!DOCTYPE HTML>
<html>


@section('htmlheader')
@include('layouts.partials.htmlheader')
@show

@if(isset($userSettings))


<body id='admin_app' class="{{$userSettings->skin}} sidebar-mini">

	@else

	<body id='admin_app' class="skin-red sidebar-mini">

		@endif

		<div id="app">

			@include('layouts.partials.mainheader')
			@include('layouts.partials.sidebar')


			<!-- Content Wrapper. Contains page content -->


			<div class="main-content">

				@include('layouts.partials.contentheader')



				
				


				<!-- Main content -->
				<section class="main">


				<!-- 	<div class="col-md-8 col-md-offset-2" id="bam" style="margin-top: 80px;">

					<h1 >

						Something Amazing Is Coming Soon!

					</h1>

					<p class="fadeIn wait-2s">You Will Love it</p>

				</div> -->






				@yield('main-content')



				
				<div class="widget">
					<div class="title">TO DO</div>
					<div class="chart" style="padding: 5px;">
						<p>Create contract pages</p>
					</div>
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

				<div class="widget">
					<div class="title">Number of views</div>
					<div class="chart"></div>
				</div>

				<div class="widget">
					<div class="title">Number of comments</div>
					<div class="chart"></div>
				</div>		

			</div>

		</section><!-- /.content -->

	</div><!-- /.content-wrapper -->



	{{-- @include('layouts.partials.controlsidebar') --}}
	@include('layouts.partials.footer')

</div><!-- ./wrapper -->


@section('scripts')
@include('layouts.partials.scripts')
@show

<script type="text/javascript">
	$(document).ready(function() {

		$('.nav-trigger').click(function() {
			$('.sidebar').toggleClass('visible');
		});

		var h = $('.main-content').height()
		$('.sidebar').height(h + $('.title').height() + 50);

	});

	
</script>


</body>
</html>