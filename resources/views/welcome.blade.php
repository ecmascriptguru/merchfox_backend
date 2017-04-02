<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Welcome to WordFox</title>

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

		<!-- Styles -->
   		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
		</script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#wordfox-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Word Fox</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="wordfox-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="{{ route('home', ['keyword' => '']) }}">Products <span class="sr-only"></span></a></li>
						<li><a href="{{ route('items.index') }}">Your products</a></li>
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
						</li> -->
					</ul>
					@if (Route::has('login'))
					<ul class="nav navbar-nav navbar-right">
						@if(!Auth::check())
						<form class="navbar-form navbar-left">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Email Address">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
						@else
						<form class="navbar-form navbar-left">
							<div class="form-group">
								<input type="keyword" class="form-control" placeholder="Keyword">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ Voyager::image(Auth::user()->avatar) }}" class="nav-avatar">{{ Auth::user()->name }}<span class="caret"></span></a>
							<ul class="dropdown-menu">
								@if (Auth::user()->role_id == 1)
								<li><a href="{{ route('voyager.dashboard') }}">Admin Page</a></li>
								@endif
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
						@endif
					</ul>
					@endif
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="flex-center position-ref full-height">
			@if (Route::has('login'))
				<div class="top-right links">
					@if (Auth::check())
						<a href="{{ url('/home') }}">Home</a>
					@else
						<a href="{{ url('/login') }}">Login</a>
						<a href="{{ url('/register') }}">Register</a>
					@endif
				</div>
			@endif

			<div class="content">
				<div class="title m-b-md">
					Laravel
				</div>

				<div class="links">
					<a href="https://laravel.com/docs">Documentation</a>
					<a href="https://laracasts.com">Laracasts</a>
					<a href="https://laravel-news.com">News</a>
					<a href="https://forge.laravel.com">Forge</a>
					<a href="https://github.com/laravel/laravel">GitHub</a>
				</div>
			</div>
		</div>
	</body>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
</html>
