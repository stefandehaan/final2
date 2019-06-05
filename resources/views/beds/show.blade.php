@extends("layouts.app")

@section('content')
    @foreach($usages as $usage)
		<div class="card" >
			<div class="card-body">
				<h5 class="card-title">Registratie #{{ $usage->id }}</h5>
				<div class="row">
					<div class="col-4">
						<b>Client</b>
					</div>
					<div class="col-8">
						{{ $usage->getClient->name }}
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<b>Tijdspan</b>
					</div>
					<div class="col-8">
						{{ $usage->start }} - {{ $usage->until }}
					</div>
				</div>
			</div>
			</div>
	@endforeach
@endsection
