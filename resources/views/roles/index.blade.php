@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Role Management</h2>
			</div>
			<div class="pull-right">
				@can('role-create')
					<a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
				@endcan
			</div>
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
			<th width="280px">Action</th>
		</tr>
		@foreach ($roles as $key => $role)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $role->name }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
					@can('role-edit')
						<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
					@endcan
					@can('role-delete')
						<script type="text/javascript">

                            function ConfirmDelete() {

                                var x = confirm("Weet u zeker dat u dit persoon wilt verwijderen");
                                if (x)
                                    return true;
                                else
                                    return false;
                            }

						</script>

						{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					@endcan
				</td>
			</tr>
		@endforeach
	</table>


	{!! $roles->render() !!}


@endsection
