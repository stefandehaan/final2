@extends('layouts.app')


@section('content')

	@role('client')
	<div class="row justify-content-center">
		@foreach ($client_consults as $consult)

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">{{ $consult->subject  }}</div>

					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">

								{{$consult->summary}}
							</li>
							<li class="list-group-item">

								<a href="{{ route('consults.show', $consult->id) }}" class="btn btn-info">
									Show
								</a>
								<a href="{{ route('consults.edit', $consult->id) }}" class="btn btn-warning">
									Edit
								</a>
								<a href="{{ route('consults.destroy', $consult->id) }}" class="btn btn-danger">
									Delete
								</a>
							</li>


						</ul>
					</div>
				</div>
			<hr class="bg-primary">
			</div>
		@endforeach
	</div>
	@endrole
@endsection
