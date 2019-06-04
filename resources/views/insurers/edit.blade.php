@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Edit Role</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
			</div>
		</div>
	</div>


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


	{!! Form::model($insurers, ['method' => 'PATCH','route' => ['insurers.update', $insurers->first()->user_id]]) !!}
{{--	<form action="{{ route('insurers.update', $insurers->first()->user_id ) }}" method="post">--}}
{{--		@csrf--}}
{{--		{{method_field('PATCH')}}--}}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Name:</strong>
				{!! Form::text('name', $insurers->first()->name, array('placeholder' => 'Name','class' => 'form-control')) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Address:</strong>
				{!! Form::text('address', $insurers->first()->address, array('placeholder' => 'Addres','class' => 'form-control')) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Postcode:</strong>
				{!! Form::text('zip', $insurers->first()->zip, array('placeholder' => 'Name','class' => 'form-control')) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Telefoonnummer:</strong>
				{!! Form::text('tel', $insurers->first()->tel, array('placeholder' => 'Name','class' => 'form-control')) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>E-mail:</strong>
				{!! Form::text('email', $insurers->first()->email, array('placeholder' => 'Name','class' => 'form-control')) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
	{{ Form::close() }}


@endsection

