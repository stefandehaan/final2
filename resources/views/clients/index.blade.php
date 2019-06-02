@extends('layouts.app')


@section('content')

@section('content')

	<table class="table table-hover">
		<thead>
		<tr>
			<th>Datum consult</th>
			<th>Naam cliënt</th>
			<th>Naam doctor</th>
			<th>Onderwerp consult</th>
			<th>Actie</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($clients as $client)
			<tr>
				<td>
					{{ $client->id }}
				</td>
				<td>
					{{ $client->getClient()->first()->name }}
				</td>
				<td>
					sup bithc
				</td>
				<td>
					<a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">Show</a>
					<a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Edit</a>
					{!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $client->id],'style'=>'display:inline']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection
