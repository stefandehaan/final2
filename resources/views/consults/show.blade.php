@extends('layouts.app')


@section('content')

	<div class="col-md-12">
		<div class="card">
			<div class="card-header">{{ $consult->subject  }}</div>
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item">
						{{$consult->summary}}
					</li>
					<li class="list-group-item">
						<a href="{{ route('consults.edit', $consult->id) }}" class="btn btn-warning">Edit</a>
						<script type="text/javascript">

                            function ConfirmDelete() {

                                var x = confirm("Weet u zeker dat u dit persoon wilt verwijderen");
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
	</div>

@endsection
