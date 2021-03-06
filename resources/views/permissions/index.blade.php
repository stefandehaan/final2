@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Permission Management</h2>
			</div>
			@can('permission-create')
				<div class="pull-right">
					<a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a>
				</div>
			@endcan
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
			<th width="280px">Action</th>
		</tr>
		@foreach ($permissions as $key => $permission)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $permission->name }}</td>
				<td>
					@can('permission-show')
						<a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a>
					@endcan
					@can('permission-edit')
						<a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
					@endcan
					@can('permission-delete')
						{!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					@endcan

				</td>
			</tr>
		@endforeach
	</table>


	{!! $permissions->render() !!}


@endsection
