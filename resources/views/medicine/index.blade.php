@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Medicijn beheer</h2>
			</div>
			@can('medicine-create')
				<div class="pull-right">
					<a class="btn btn-success" href="{{ route('medicine.create') }}">Maak nieuw Medicijn</a>
				</div>
			@endcan
		</div>
	</div>


	<br>

	{!! Form::label('total users', 'Total users: '. $data->count(), ['class' => 'control-label']) !!}
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		<br>
	@endif


	<table class="table table-bordered">
		<tr>

			<th>Name</th>

			<th width="280px">Action</th>
		</tr>
		@foreach ($data as $key => $medicine)
			<tr>
				<td>{{ $medicine->name }}</td>
				<td>
					@can('medicine-edit')
						<a class="btn btn-primary" href="{{ route('medicine.edit',$medicine->id) }}">Edit</a>
					@endcan
					@can('medicine-delete')
						<script type="text/javascript">
                            function ConfirmDelete() {

                                var x = confirm("Weet u zeker dat u dit persoon wilt verwijderen");
                                if (x)
                                    return true;
                                else
                                    return false;
                            }
						</script>

						{!! Form::open(['method' => 'DELETE','route' => ['medicine.destroy',
						$medicine->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					@endcan
				</td>
			</tr>
		@endforeach
	</table>



@endsection
