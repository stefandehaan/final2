@extends('layouts.app')

@section('content')
	@can('department-create')
		{!! Form::open(['route' => 'departments.store', 'method' => 'post', 'class' => 'form-group']) !!}

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>selecteer ziekenhuis</strong>
					{!! Form::select('hospital', $hospital->toArray() , null , ['class' => 'form-control']) !!}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	@endcan
@endsection
