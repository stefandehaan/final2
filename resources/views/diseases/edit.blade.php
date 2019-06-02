@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Edit Disease</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ url()->previous() }}"> Back</a>
			</div>
		</div>
	</div>

	<form action="{{ route('diseases.update', $disease->id ) }}" method="post">
		{{csrf_field()}}
		{{method_field('PATCH')}}
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Name:</strong>
					<input type="text" class="form-control" name="name" placeholder="Name disease" value="{{$disease->name}}">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Description:</strong>
					<textarea name="description" class="form-control"
							  value="{{$disease->description}}">{{$disease->description}}</textarea>				</div>
			</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Danger:</strong>
							<select class="form-control" name="danger" id="">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
					</div>
		</div>
				<button type="submit" class="button is-link">Update Project</button>
			</div>
		</div>
	</form>
	<br>

	<form action="/diseases/{{ $disease->id }}" method="post">

		{{csrf_field()}}
		{{method_field('DELETE')}}

		<div class="control">
			<button class="button is-link"> Delete Project</button>
		</div>
		<br>

	</form>



	{{--	{!! Form::open([['method' => 'PATCH','route' => ['diseases.update', $disease->id]]]) !!}--}}

	{{--	<div class="row">--}}
	{{--		<div class="col-xs-12 col-sm-12 col-md-12">--}}
	{{--			<div class="form-group">--}}
	{{--				<strong>Name:</strong>--}}
	{{--				{!! Form::text('name', $disease->name, array('class' => 'form-control')) !!}--}}
	{{--			</div>--}}
	{{--		</div>--}}
	{{--		<div class="col-xs-12 col-sm-12 col-md-12">--}}
	{{--			<div class="form-group">--}}
	{{--				<strong>Description:</strong>--}}
	{{--				{!! Form::text('description', $disease->description, ['class' => 'form-control']) !!}--}}
	{{--			</div>--}}
	{{--		</div>--}}

	{{--		<div class="col-xs-12 col-sm-12 col-md-12">--}}
	{{--			<div class="form-group">--}}
	{{--				<strong>Danger:</strong>--}}
	{{--				{!! Form::select('danger', [1, 2 ,3 ,4, 5] , null , ['class' => 'form-control']) !!}--}}
	{{--			</div>--}}
	{{--		</div>--}}

	{{--		<div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
	{{--			<button type="submit" class="btn btn-primary">Submit</button>--}}
	{{--		</div>--}}
	{{--	</div>--}}

	{{--	{!! Form::close() !!}--}}


@endsection
