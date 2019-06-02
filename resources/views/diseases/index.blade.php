@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Ziektebeheer</h2>
			</div>
			<div class="pull-right">
				@can('disease-create')
					<a class="btn btn-success" href="{{ route('diseases.create') }}"> Create New Disease</a>
				@endcan

			</div>
			<br>
		</div>
	</div>


		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif


	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Gevaar 1-5</th>
			<th width="280px">Action</th>
		</tr>
		@foreach ($diseases as  $disease)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $disease->name }}</td>
				<td>{{ $disease->danger }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('diseases.show',$disease->id) }}">Show</a>
					@can('diseases-edit')
						<a class="btn btn-primary" href="{{ route('diseases.edit',$disease->id) }}">Edit</a>
					@endcan
					@can('diseases-delete')
						<script type="text/javascript">

                            function ConfirmDelete() {

                                var x = confirm("Weet u zeker dat u dit persoon wilt verwijderen");
                                if (x)
                                    return true;
                                else
                                    return false;
                            }

						</script>

						{!! Form::open(['method' => 'DELETE','route' => ['diseases.destroy', $disease->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					@endcan
				</td>
			</tr>
		@endforeach
	</table>




@endsection
