@extends('layouts.app')

@section('content')

	@foreach($beds as $bed)

		<div class="row">
			<a href="{{ route('beds.show', [$bed->id]) }}">
				Bed #{{$bed->id}}

			</a>
		</div>

	@endforeach
@endsection


