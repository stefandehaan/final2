@extends("layouts.app")

@section('content')
	@foreach($usages as $usage)
		<div class="card">
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
				@if (!$usage->until)
					<div class="card-img-top">
						{!! QrCode::size(180)->generate(route('beds.show', $usage->id)); !!}

					</div>
				<div class="row">
					<script type="text/javascript">

                        /**
                         * @return {boolean}
                         */
                        function ConfirmDelete() {
                            return confirm('Weet u zeker dat u dit persoon wilt verwijderen');
                        }
						</script>
					{!! Form::open(['method' => 'PATCH','route' => ['bedusage.update', $usage->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
					{!! Form::submit('Bed wordt niet meer door gebruiker gebruikt', ['class' => 'btn btn-danger ml-3 mt-3']) !!}
					{!! Form::close() !!}



				</div>
				@endif
			</div>
		</div>
		<hr class="bg-primary">

	@endforeach
@endsection
