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

					{{-- @include('flash::message') --}}
					
					@yield('main-content')

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
					</div><div class="widget">
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
				</div><div class="widget">
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
			</div><div class="widget">
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
		</div><div class="widget">
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
	</div><div class="widget">
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
					</div><div class="widget">
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
				</div><div class="widget">
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
			</div><div class="widget">
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
		</div><div class="widget">
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

		var h = $('.main').height()
		$('.sidebar').height(h + $('.title').height() + 50);

	});

	
</script>


</body>
</html>