@extends('layouts.app')
@section('title','Index')
@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Afbeeldingen Management</h2>
			</div>
			@can('image-create')
				<div class="pull-right">
					<a class="btn btn-success" href="{{ route('images.create') }}">Voeg afbeelding toe</a>
				</div>
			@endcan
		</div>
	</div>


	<br>

	{!! Form::label('total users', 'Totaal aantal afbeeldingen: '. $images->count(), ['class' => 'control-label']) !!}
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		<br>
	@endif

	<style>
		.jg {
			display: flex;
			flex-wrap: wrap;
		}

		.jg > a, .jg::after {
			--ratio: calc(var(--w) / var(--h));
			--row-height: 9rem;
			flex-basis: calc(var(--ratio) * var(--row-height));
		}

		.jg > a {
			margin: 0.25rem;
			flex-grow: calc(var(--ratio) * 100);
		}

		.jg::after {
			--w: 2;
			--h: 1;
			content: '';
			flex-grow: 1000000;
		}

		.jg > a > img {
			display: block;
			width: 100%;
		}
	</style>

	<div class='container'>
		<div class="jg col-12">
			@foreach ($images as $image)

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="{{route("images.show", $image->id)}}" style="--w: 500; --h: 500">
						<img src="{{route("images.show", $image->id)}}" class="img-fluid" alt="Responsive image">
					</a>

					{!! Form::open(['method' => 'DELETE','route' => ['images.destroy', $image->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
					<hr class="bg-primary">
				</div>
				<br>

			@endforeach

		</div>

	</div>
@endsection
