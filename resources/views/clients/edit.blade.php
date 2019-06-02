@extends('layouts.app')


@section('content')

{!! Form::model($user, ['route' => ['clients.update', $user->id], 'method' => 'patch']) !!}



	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Name:</strong>
				{!! Form::text('client_id',$user->name, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Doctor:</strong>
				{!! Form::select('doctor_id', $doctors->toArray(),null , ['placeholder' => 'Kies een doctor', 'class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Verzekeraar:</strong>
				{!! Form::select('insurance_id',  $insurers->toArray(),null , ['placeholder' => 'Kies een Verzekeraar', 'class' => 'form-control']) !!}
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
				{!! Form::text('phone', $user->phone , ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Geboortedatum:</strong>
				{!! Form::date('birth', $user->birth, ['class' => 'form-control'])  !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Addres:</strong>
				{!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Zip:</strong>
				{!! Form::text('zip', $user->zip, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Gender:</strong>
				{!! Form::select('gender', ['male', 'female'] , null , ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>BSN:</strong>
				{!! Form::text('bsn', $user->bsn, ['class' => 'form-control']) !!}
			</div>
		</div>


	</div>

	{!! Form::submit('Submit', ['class' => 'form-control']) !!}
	{!! Form::close() !!}

@endsection
