@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Create New User</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
	{{--{!! Form::open(['route' => 'store.info.client', $user->id, 'method' => 'post']) !!}--}}

	{{--{!! Form::close() !!}--}}
	{!! Form::open(['route' => ['store.info.insurer', $user->id]]) !!}
	{{--	{!! Form::open((route('store.info.client', $user->id))) !!}--}}

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Name:</strong>
				{!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Addres:</strong>
				{!! Form::text('address', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Postcode:</strong>
				{!! Form::text('zip', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Telefoonnummer:</strong>
				{!! Form::text('tel', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>email:</strong>
				{!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@endsection
