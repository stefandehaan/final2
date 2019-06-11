@extends('layouts.app')

@section('content')
	{!! Form::open(['route' => 'beds.store', 'method' => 'post', 'class' => 'form-group']) !!}

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>selecteer afdeling</strong>
				{!! Form::select('department', $department->toArray() , null , ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
	</div>
	{!! Form::close() !!}

@endsection
