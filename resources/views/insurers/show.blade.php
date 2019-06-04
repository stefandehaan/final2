@extends('layouts.app')



@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2> Show Client</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Naam:</strong>
				{{ $user->name }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Telefoonnummer:</strong>
				{{ $info->phone }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Geboortedag:</strong>
				{{ $info->birth }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Adres:</strong>
				{{ $info->address }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Postcode:</strong>
				{{ $info->zip }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>BSN:</strong>
				{{ $info->bsn }}
			</div>
		</div>
	</div>

@endsection
