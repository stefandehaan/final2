@extends('layouts.app')


@section('content')

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Consult Management</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('consults.create') }}"> Create New Consult</a>
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

	<div class="row justify-content-center">
		@foreach ($client_consults as $consult)
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">{{ $consult->subject  }}</div>
					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item">
								{{$consult->summary}}
							</li>
							<li class="list-group-item">
								<a href="{{ route('consults.show', $consult->id) }}" class="btn btn-info">Show</a>
								<a href="{{ route('consults.edit', $consult->id) }}" class="btn btn-warning">Edit</a>
								<script type="text/javascript">

                                    function ConfirmDelete() {

                                        var x = confirm("Weet u zeker dat u dit consult wilt verwijderen");
                                        if (x)
                                            return true;
                                        else
                                            return false;
                                    }

								</script>
								{!! Form::open(['method' => 'DELETE','route' => ['consults.destroy', $consult->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
								{!! Form::close() !!}
							</li>
						</ul>
					</div>
				</div>
			<hr class="bg-primary">
			</div>

		@endforeach
			{{ $client_consults->render() }}
	</div>

@endsection
