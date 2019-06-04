@extends('layouts.app')




@section('content')

	<table class="table table-hover">
		<thead>
		<tr>

			<th scope="col">Naam Verzekeraar</th>
			<th scope="col">Telefoonnummer</th>
			<th scope="col">Handeling</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($insurers as $insurer)
	<tr>
		<td>{{ $insurer->name }}</td>
		<td>{{ $insurer->tel }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('insurers.show',$insurer->user_id) }}">Show</a>

			<a class="btn btn-primary" href="{{ route('insurers.edit',$insurer->user_id) }}">Edit</a>
			<script type="text/javascript">

                function ConfirmDelete() {

                    var x = confirm("Weet u zeker dat u dit consult wilt verwijderen");
                    if (x)
                        return true;
                    else
                        return false;
                }
				{{--									{{dd($prescription->client)}}--}}
			</script>
			{!! Form::open(['method' => 'patch','route' => ['insurers.update', $insurer->user_id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
			{!! Form::submit('Verwijder', ['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}

		</td>
	</tr>


		@endforeach
		</tbody>
	</table>
@endsection
