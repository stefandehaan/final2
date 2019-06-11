<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>

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
			height: auto;
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


@auth
	<div class="sidebar">

		@guest

			<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

		@else
			<a class="active" href="{{ url('/') }}">
				{{ config('Uw Dossier', 'ECD online dossier') }}
			</a>
			<a href="{{ route('dashboard') }}">Dashboard</a>
			@can('user-list')
				<a href="{{ route('users.index') }}">Users</a>
			@endcan

			@can('consult-list')
				<a href="{{ route('consults.index') }}">Consulten</a>
			@endcan
			@can('client-list')
				<a href="{{ route('clients.index') }}">Clienten</a>
			@endcan
			@can('role-list')
				<a href="{{ route('roles.index') }}">Rollen</a>
			@endcan
			@can('permission-list')
				<a href="{{ route('permissions.index') }}">Permissies</a>
			@endcan
			@can('disease-list')
				<a href="{{ route('diseases.index') }}">Ziektes</a>
			@endcan
			@can('treatment-list')
				<a href="{{ route('treatments.index') }}">Behandelingen</a>
			@endcan
			@can('medication-list')
				<a href="{{ route('medicine.index') }}">Medicijnen</a>
			@endcan
			@can('insurer-list')
				<a href="{{ route('insurers.index') }}">Verzekeraars</a>
			@endcan
			@can('department-list')
				<a href="{{ route('departments.index') }}">Afdelingen (ziekenhuis)</a>
			@endcan
			@can('prescription-list')
				<a href="{{ route('prescriptions.index') }}">Voorschriften (recepten)</a>
			@endcan
			@can('bedusage-list')
				<a href="{{ route('departments.index') }}">Beddengebruik</a>
			@endcan

			<a href="{{ route('logout') }}"
			   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
				{{ __('Logout') }}
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST"
				  style="display: none;">
				@csrf
			</form>


		@endguest
	</div>
@endauth
<div class="content">
	<main class="py-4">
		<div class="container-fluid">
			@yield('content')
		</div>
	</main>
</div>

@yield('scripts')
</body>
</html>
