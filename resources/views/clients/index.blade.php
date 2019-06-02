@extends('layouts.app')




@section('content')

	<table class="table table-hover">
		<thead>
		<tr>

			<th>Naam cliënt</th>
			<th>Naam doctor</th>

			<th>Actie</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($clients as $client)
			<tr>

				<td>
					{{ $client->getClient()->first()->name }}
				</td>
				<td>
					{{ $client->getDoctor()->first()->name }}
				</td>
				<td>
					<a class="btn btn-info" href="{{ route('clients.show',$client->client_id) }}">Show</a>
					<a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Edit</a>

					<script type="text/javascript">

                        function ConfirmDelete() {

                            var x = confirm("Weet u zeker dat u deze client wilt verwijderen");
                            if (x)
                                return true;
                            else
                                return false;
                        }

					</script>
					{!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $client->id],'style'=>'display:inline', 'onsubmit'=> ' return ConfirmDelete()']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection
