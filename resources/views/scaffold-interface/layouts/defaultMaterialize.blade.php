<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel = "stylesheet"
		  href = "https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	<script type = "text/javascript"
			src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
	</script>
	<link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>@yield('title')</title>
</head>
<body>
<nav class="nav-content"> test</nav>

<ul id="slide-out" class="sidenav">

	@can('user-list')
		<li>
			<a href="{{ route('users.index') }}"><i class="material-icons">person_add</i>Users</a>
		</li>
	@endcan
	@can('consult-list')
		<li>
			<a href="{{ route('consults.index') }}">Consulten</a>
		</li>
	@endcan
	@can('client-list')
		<li>
			<a href="{{ route('clients.index') }}">Cliënten</a>
		</li>
	@endcan
	@can('role-list')
		<li>
			<a href="{{ route('roles.index') }}">Rollen</a>
		</li>
	@endcan
	@can('permission-list')
		<li>
			<a href="{{ route('permissions.index') }}">Permissies</a>
		</li>
	@endcan
	@can('disease-list')
		<li>
			<a href="{{ route('diseases.index') }}">Ziektes</a>
		</li>
	@endcan
	@can('treatment-list')
		<li>
			<a href="{{ route('treatments.index') }}">Behandelingen</a>
		</li>
	@endcan
	@can('medication-list')
		<li>
			<a href="{{ route('medicine.index') }}">Medicijnen</a>
		</li>
	@endcan
	@can('insurer-list')
		<li>
			<a href="{{ route('insurers.index') }}">Verzekeraars</a>
		</li>
	@endcan
	@can('department-list')
		<li>
			<a href="{{ route('departments.index') }}">Afdelingen (ziekenhuis)</a>
		</li>
	@endcan

	@can('bedusage-list')
		<li>
			<a href="{{ route('bedusage.index') }}">Beddengebruik</a>
		</li>
	@endcan

	@can('prescription-list')
		<li>
			<a href="{{ route('prescriptions.index') }}">Voorschriften (recepten)</a>
		</li>
	@endcan
	<li>

		<a href="{{ route('logout') }}"
		   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
			{{ __('Logout') }}
		</a>
	</li>

	<form id="logout-form" action="{{ route('logout') }}" method="POST"
		  style="display: none;">
		@csrf
	</form>

</ul>
<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

<div class="content">
	<main class="py-4">
		<div class="container">
			@yield('content')
		</div>
	</main>
</div>
<div id="modal1" class="modal">
	<div class="row AjaxisModal">
	</div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script src="{{ asset('js/materialize.min.js') }}"></script>
<script>  var baseURL = "{{ URL::to('/') }}"</script>
<script src="{{URL::asset('js/AjaxisMaterialize.js')}}"></script>
<script src="{{URL::asset('js/scaffold-interface-js/customA.js')}}"></script>
<script>
    $('select').material_select();
</script>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, options);
    });

    // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
    // var collapsibleElem = document.querySelector('.collapsible');
    // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

    // Or with jQuery

    $(document).ready(function () {
        $('.sidenav').sidenav();
    });

</script>
</body>
</html>
