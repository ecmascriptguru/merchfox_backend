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
	<body id="welcome-page">
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
					<a class="navbar-brand" href="/">{{ config('app.name', 'Word Fox') }}</a>
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
						<form class="navbar-form login-form navbar-left" action="{{ route('login') }}" method="POST">
							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Email Address">
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							{{ csrf_field() }}
							<button type="submit" class="btn btn-default">Login</button>
						</form>
						<li class="dropdown">
							<a href="{{ route('login') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Log In<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('login') }}">Login</a></li>
								<li><a href="{{ route('register') }}">Register</a></li>
							</ul>
						</li>
						@else
						<form class="navbar-form navbar-left" action="{{ route('home_post') }}">
							<div class="form-group">
								<input type="keyword" name="keyword" class="form-control" placeholder="Keyword">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
						<li class="dropdown">
							<a href="{{ route('profile') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ Voyager::image(Auth::user()->avatar) }}" class="nav-avatar">{{ Auth::user()->name }}<span class="caret"></span></a>
							<ul class="dropdown-menu">
								@if (Auth::user()->role_id == 1)
								<li><a href="{{ route('voyager.dashboard') }}">Admin Page</a></li>
								@endif
								<!-- <li><a href="{{ route('profile') }}">Profile</a></li> -->
								<li><a href="{{ route('items.index') }}">My products</a></li>
								<li role="separator" class="divider"></li>
								<li>
									<form method="POST" action="{{ route('logout') }}">
										{{ csrf_field() }}
										<button class="nav-logout-button" type="submit">Sign Out</button>
									</form>
								</li>
							</ul>
						</li>
						@endif
					</ul>
					@endif
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="container">
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-6">
				<div class="content" id="selected-post">
					<h3 class="title">{{ $posts[0]->title }}</h3>
					<div class="image">
						<img class="post-image" src="{{ Voyager::image($posts[0]->image) }}">
					</div>
					<div class="post-body">
						{!! html_entity_decode($posts[0]->body) !!}
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 right-sidebar">
				<h3>Recent Posts</h3>
				<ul class="posts">
					@foreach($posts as $post)
					<li class="post" data-img-url="{{ Voyager::image($post->image) }}" data-body="{{ $post->body }}">
						<h5 class="post-title">{{ $post->title }}</h5>
						<p class="post-excerpt">
							@if (strlen($post->excerpt) > 50)
								{{ substr($post->excerpt, 0, 47) . "..."}}
							@else
								{{ $post->excerpt }}
							@endif
						</p>
						<p class="posted-at">{{ $post->updated_at }}</p>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</body>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
</html>
