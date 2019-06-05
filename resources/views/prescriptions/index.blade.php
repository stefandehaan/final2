@extends('layouts.app')


@section('content')

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Recepten Management</h2>
			</div>
			@can('prescription-create')
				<div class="pull-right">
					<a class="btn btn-success" href="{{ route('prescriptions.create') }}"> Niew recept maken</a>
				</div>
			@endcan
		</div>
	</div>

	<br>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		<br>
	@endif


	<table class="table table-hover">
		<thead>
		<tr>

			<th scope="col">Naam client</th>
			<th scope="col">Medicijn</th>
			<th scope="col">Handeling</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($prescriptions as $prescription)

			@if ($prescription->retrieved === 0)
				<tr>
					<td>{{ $prescription->Clients()->first()->name }}</td>
					<td>{{ $prescription->getMedicine()->first()->name }}</td>
					<td>
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
						{!! Form::open(['method' => 'patch','route' => ['prescriptions.update', $prescription->client],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
						{!! Form::submit('Medicijn opgehaald', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</tr>

			@endif
		@endforeach

		</tbody>
	</table>

	{{--	<div class="row justify-content-center">--}}
	{{--		@foreach ($prescriptions as $prescription)--}}
	{{--			@if ($prescription->retrieved === 0)--}}
	{{--				<div class="col-md-12">--}}
	{{--					<div class="card">--}}


	{{--						<div class="card-header">Recept voor: {{ $prescription->Clients()->first()->name  }}</div>--}}
	{{--						<div class="card-body">--}}
	{{--							<ul class="list-group">--}}
	{{--								<li class="list-group-item">--}}
	{{--									{{ $prescription->getMedicine()->first()->name }}--}}
	{{--								</li>--}}
	{{--								<li class="list-group-item">--}}
	{{--									<script type="text/javascript">--}}

	{{--                                        function ConfirmDelete() {--}}

	{{--                                            var x = confirm("Weet u zeker dat u dit consult wilt verwijderen");--}}
	{{--                                            if (x)--}}
	{{--                                                return true;--}}
	{{--                                            else--}}
	{{--                                                return false;--}}
	{{--                                        }--}}
	{{--										--}}{{--									{{dd($prescription->client)}}--}}
	{{--									</script>--}}
	{{--									{!! Form::open(['method' => 'patch','route' => ['prescriptions.update', $prescription->client],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}--}}
	{{--									{!! Form::submit('Medicijn opgehaald', ['class' => 'btn btn-danger']) !!}--}}
	{{--									{!! Form::close() !!}--}}
	{{--								</li>--}}
	{{--							</ul>--}}
	{{--						</div>--}}
	{{--					</div>--}}
	{{--					<hr class="bg-primary">--}}
	{{--				</div>--}}

	{{--			@endif--}}

	{{--		@endforeach--}}
	{{--	</div>--}}

@endsection
{{--@foreach ($prescriptions as $prescription)--}}


{{--	{{ $prescription->getClient()->first()->name }}--}}
{{--	{{ $prescription->getMedicine()->first()->name }}--}}
{{--@endforeach--}}

{{--@endsection--}}
