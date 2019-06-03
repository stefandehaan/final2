@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Create New Prescription</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
			</div>
		</div>
	</div>

	<br>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::open(['route' => 'prescriptions.store', 'method' => 'post', 'class' => 'form-group']) !!}

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Name client:</strong>
				@if (auth()->user()->hasRole('doctor'))

					<select name="client" id="client" class="form-control">
						@foreach ($clients as $client)
							<option value="{{ $client->getClient->id }}">
								{{ $client->getClient->name }}
							</option>
						@endforeach
					</select>

				@else

					{!! Form::select('client', $clients->toArray() , null , ['class' => 'form-control']) !!}
				@endif
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Name Medicine:</strong>
				{!! Form::select('medicine', $medicine->toArray() , null , ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@endsection
