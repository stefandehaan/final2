<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<style>
		body {
			margin: 0;
			font-family: "Lato", sans-serif;
		}

		.sidebar {
			margin: 0;
			padding: 0;
			width: 200px;
			background-color: #f1f1f1;
			position: fixed;
			height: 100%;
			overflow: auto;
		}

		.sidebar a {
			display: block;
			color: black;
			padding: 16px;
			text-decoration: none;
		}

		.sidebar a.active {
			background-color: #4CAF50;
			color: white;
		}

		.sidebar a:hover:not(.active) {
			background-color: #555;
			color: white;
		}

		div.content {
			margin-left: 200px;
			padding: 1px 16px;
			height: 1000px;
		}

		@media screen and (max-width: 700px) {
			.sidebar {
				width: 100%;
				height: auto;
				position: relative;
			}

			.sidebar a {
				float: left;
			}

			div.content {
				margin-left: 0;
			}
		}

		@media screen and (max-width: 400px) {
			.sidebar a {
				text-align: center;
				float: none;
			}
		}
	</style>

</head>
<body>



			<div class="sidebar">
				<a class="active" href="{{ url('/') }}">
					{{ config('Uw Dossier', 'ECD online dossier') }}
				</a>
				<a href="{{ route('dashboard') }}">Dashboard</a>
				<a href="{{ route('users.index') }}">Users</a>
				<a href="{{ route('consults.index') }}">Consulten</a>
				<a href="{{ route('roles.index') }}">Rollen</a>
				<a href="#about">Clienten</a>
				<a href="#about">Clienten</a>
				<a href="#about">Clienten</a>
				@guest

						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

					@if (Route::has('register'))

							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

					@endif
				@else

						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a  href="{{ route('logout') }}"
							   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action= "{{ route('logout') }}" method="POST"
								  style="display: none;">
								@csrf
							</form>
						</div>

				@endguest
			</div>

		<div class="content">
			<main class="py-4">
				<div class="container">
					@yield('content')
				</div>
			</main>
		</div>


</body>
</html>
