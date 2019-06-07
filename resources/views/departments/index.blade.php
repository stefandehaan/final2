@extends('layouts.app')

@section('content')

	@foreach($departments as $department)

		<div class="row">
			<a href="{{ route('departments.show', [$department->id]) }}">
				Afdeling #{{$department->id}}
			</a>
		</div>


	@endforeach
@endsection
