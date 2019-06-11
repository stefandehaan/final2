@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Create treatment</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('treatments.index') }}"> Back</a>
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
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		<br>
	@endif



	{!! Form::open(array('route' => 'treatments.store','method'=>'post')) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>client:</strong>
				{!! Form::select('client', $client->toArray() , null , ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>specialist:</strong>
				{!! Form::select('specialist', $specialist->toArray() , null , ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Omschrijving:</strong>
				{!! Form::textarea('description', 'Description', ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>ziekte:</strong>
				{!! Form::select('disease', $disease->toArray() , null , ['class' => 'form-control']) !!}
			</div>
		</div>

	</div>
	{!! Form::submit('Submit', ['class' => 'form-control']) !!}
	{!! Form::close() !!}
@endsection
