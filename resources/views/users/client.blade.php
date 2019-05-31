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

	{!! Form::open(['route' => ['store.info.client', $user->id]]) !!}
	{{--	{!! Form::open((route('store.info.client', $user->id))) !!}--}}

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Name:</strong>
				{!! Form::text('client',$user->name, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Doctor:</strong>
				{!! Form::select('doctor', $doctors->toArray(),null , ['placeholder' => 'Kies een doctor', 'class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Verzekeraar:</strong>
				{!! Form::select('insurance',  $insurers->toArray(),null , ['placeholder' => 'Kies een Verzekeraar', 'class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Bloed type:</strong>
				{!! Form::select('blood_type',  $bloodtypes->toArray(), null , ['placeholder' => 'Kies een Bloedtype', 'class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Telefoon:</strong>
				{!! Form::text('phone', 'Telefoonnummer', ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Geboortedatum:</strong>
				{!! Form::date('age', date('Y-m-d'), ['class' => 'form-control'])  !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Addres:</strong>
				{!! Form::text('address', 'Address', ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Zip:</strong>
				{!! Form::text('zip', 'Zip', ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Gender:</strong>
				{!! Form::select('gender', ['m', 'v'] , null , ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>BSN:</strong>
				{!! Form::text('bsn', 'BSN', ['class' => 'form-control']) !!}
			</div>
		</div>


	</div>

	{!! Form::submit('Submit', ['class' => 'form-control']) !!}
	{!! Form::close() !!}


@endsection
