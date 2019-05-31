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
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		<br>
	@endif


	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Roles</th>
			<th width="280px">Action</th>
		</tr>
		@foreach ($data as $key => $user)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					@if(!empty($user->getRoleNames()))
						@foreach($user->getRoleNames() as $v)
							<label class="badge badge-success">{{ $v }}</label>
						@endforeach
					@endif
				</td>
				<td>
					<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
					<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

					<script type="text/javascript">

                        function ConfirmDelete() {

                            var x = confirm("Weet u zeker dat u dit persoon wilt verwijderen");
                            if (x)
                                return true;
                            else
                                return false;
                        }

					</script>
					{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</table>


	{!! $data->render() !!}


@endsection
