@extends('layouts.app')

@section('content')
	<div class="container">
		@role('admin')
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->email }}
							</li>
						</ul>
					</div>
				</div>
				<hr class="bg-primary">
			</div>
		</div>
		@endrole

		@role('client')
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->email }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatse consult</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">

								@if ($consult->count() === 0)
									Nog geen consult
								@else

									Onderwerp: {{ $consult->last()->subject }}
							</li>

							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
							<li class="list-group-item">
								Samenvatting: {{ $consult->last()->summary }}
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="bg-primary">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Uw doctor</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->name }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Uw verzekering</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Naam verzekering:
								{{ $insurance_info->first()->name }}
							</li>
							<li class="list-group-item">
								Contactpersoon:
								{{ $insurance->first()->name }}
							</li>
							<li class="list-group-item">
								Telefoon nummer:
								{{ $insurance_info->first()->tel }}
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		@endrole


		@role('insurance')
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->email }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatse consult</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">

								Onderwerp: {{ $consult->last()->subject }}
							</li>

							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="bg-primary">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->name }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatste Consult</div>

					<div class="card-body">
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif

						You are logged in!
					</div>
				</div>
			</div>
		</div>
		@endrole

		@role('doctor')
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->email }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatse consult</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">

								Onderwerp: {{ $consult->last()->subject }}
							</li>

							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		@endrole

		@role('hospital')
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->email }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatse consult</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">

								Onderwerp: {{ $consult->last()->subject }}
							</li>

							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="bg-primary">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->name }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatste Consult</div>

					<div class="card-body">
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif

						You are logged in!
					</div>
				</div>
			</div>
		</div>
		@endrole

		@role('specialist')
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->email }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatse consult</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">

								Onderwerp: {{ $consult->last()->subject }}
							</li>

							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="bg-primary">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->name }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatste Consult</div>

					<div class="card-body">
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif

						You are logged in!
					</div>
				</div>
			</div>
		</div>
		@endrole


		@role('pharmacy')
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->email }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatse consult</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">

								Onderwerp: {{ $consult->last()->subject }}
							</li>

							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="bg-primary">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->name }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatste Consult</div>

					<div class="card-body">
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif

						You are logged in!
					</div>
				</div>
			</div>
		</div>
		@endrole


		@role('specialist')
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->email }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatse consult</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">

								Onderwerp: {{ $consult->last()->subject }}
							</li>

							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
							<li class="list-group-item">
								Daturm: {{ $consult->last()->date }}
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="bg-primary">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Persoonlijke informatie</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								Uw naam:
								{{ auth()->user()->name }}
							</li>

							<li class="list-group-item">
								Uw e-mail:
								{{ auth()->user()->name }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Laatste Consult</div>

					<div class="card-body">
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif

						You are logged in!
					</div>
				</div>
			</div>
		</div>
		@endrole

	</div>
@endsection
