@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Create New Consult</h2>
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

	{!! Form::open(['route' => 'consults.store', 'method' => 'post', 'class' => 'form-group']) !!}

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Name client:</strong>
				{!! Form::select('client', $clients->toArray() , null , ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Name doctor:</strong>
				{!! Form::select('doctor', $user->toArray() , null , ['class' => 'form-control', 'readonly']) !!}
{{--				{!! Form::text('doctor', auth()->user()->id , ['class' => 'form-control', 'disabled']) !!}--}}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Onderwerp:</strong>
				{!! Form::text('subject', 'Onderwerp', ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Samenvatting:</strong>
				{!! Form::textarea('summary', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>disease:</strong>
				{!! Form::select('disease', $disease->toArray() , null , ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Datum:</strong>
				{!! Form::date('date', now(), ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Time:</strong>
				{!! Form::time('time', now(), ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Lengte van Consult per 10 minuten:</strong>
				 {!! Form::selectRange('duration', 1, 10, null , ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				{!! Form::submit('Verzenden', ['class' => 'form-control', 'primary']) !!}
			</div>
		</div>
	</div>
	{!! Form::close() !!}


@endsection

{{--@section('content')--}}
{{--	@if (count($errors) > 0)--}}
{{--		<div class="alert alert-danger">--}}
{{--			<strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--			<ul>--}}
{{--				@foreach ($errors->all() as $error)--}}
{{--					<li>{{ $error }}</li>--}}
{{--				@endforeach--}}
{{--			</ul>--}}
{{--		</div>--}}
{{--	@endif--}}

{{--	@role('doctor|specialist')--}}

{{--	{!! Form::open(['route' => 'consults.store', 'method' => 'post']) !!}--}}
{{--	<div class="row">--}}
{{--		<div class="col-xs-12 col-sm-12 col-md-6">--}}
{{--			<div class="form-group">--}}
{{--				<strong>Client:</strong>--}}
{{--				{!! Form::select('client_id', $doctor->toArray() , 'select' , ['class' => 'form-control']) !!}--}}
{{--			</div>--}}
{{--		</div>--}}
{{--		<div class="col-xs-12 col-sm-12 col-md-6">--}}
{{--			<div class="form-group">--}}
{{--				<strong>doctor:</strong>--}}
{{--				{!! Form::text('doctor_id', auth()->user()->id, ['class' => 'form-control', 'disabled']) !!}--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--	{!! Form::close() !!}--}}

{{--	@endrole--}}

{{--@endsection--}}
