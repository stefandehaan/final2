@extends('layouts.app')


@section('content')
	{!! Form::open(['route' => 'insurers.store', 'method' => 'post']) !!}
	{!! Form::select('user_id', $insurers->toArray() , null , ['class' => 'form-control']) !!}
	{!! Form::text('name', 'Name', ['class' => 'form-control']) !!}
	{!! Form::text('address', 'Address', ['class' => 'form-control']) !!}
	{!! Form::text('zip', 'Zip', ['class' => 'form-control']) !!}
	{!! Form::text('tel', 'Tel', ['class' => 'form-control']) !!}
	{!! Form::email('email', 'Email', ['class' => 'form-control']) !!}
	{!! Form::submit('Submit', ['class' => 'form-control']) !!}
	{!! Form::close() !!}
@endsection
