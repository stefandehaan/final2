@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Users Management</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
			</div>
		</div>
	</div>


	<br>

{{--	{!! Form::label('total users', 'Total users: '. $data->count(), ['class' => 'control-label']) !!}--}}
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		<br>
	@endif

	<table class="table table-hover">
		<thead>
		<tr>

			<th>Naam client</th>
			<th>Naam specialist</th>
			<th>Omschrijving</th>
			<th>ziekte</th>


			<th>Actie</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($treatments as $treatment)
			<tr>

				<td>
					{{ $client->first()->name }}
				</td>
				<td>
					{{ $specialist->first()->name }}
				</td>
				<td>
					{{ $treatment->description }}
				</td>
				<td>
					{{ $disease->first()->name }}
				</td>

				<td>
					<a class="btn btn-info" href="{{ route('treatments.show',$treatment->id) }}">Show</a>
					<a class="btn btn-primary" href="{{ route('treatments.edit',$treatment->id) }}">Edit</a>

					<script type="text/javascript">

                        function ConfirmDelete() {

                            var x = confirm("Weet u zeker dat u deze client wilt verwijderen");
                            if (x)
                                return true;
                            else
                                return false;
                        }

					</script>
					{!! Form::open(['method' => 'DELETE','route' => ['treatments.destroy', $treatment->id],'style'=>'display:inline', 'onsubmit'=> ' return ConfirmDelete()']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection
