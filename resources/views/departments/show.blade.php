@extends('layouts.app')

@section('content')
	@include('departments/modal')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Bedden beheer</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('beds.create') }}">Voeg een bed toe</a>
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
		@foreach($beds as $bed)
			<div class="col-3 mb-3">
				<div class="card">
					<div class="card-header">
						<h5>Bed #{{$bed->id}}</h5>
					</div>

					<div class="card-body">


						<div class="row">
							<div class="col-6">
								<a class="btn btn-sm btn-primary w-100" href="{{ route('beds.show', [$bed->id]) }}">
									Historie
								</a>
							</div>
							<div class="col-6">

								<button class="addButton btn btn-sm btn-primary w-100"
										data-id="{{$bed->id}}"
										data-toggle="modal" data-target="#createModal">
									Toevoegen
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection

@section('scripts')
	<script>
        $('.addButton').click(function () {
            const id = $(this).data('id');
            const modal = $("#createModal");

            modal.find('.bed-text').text(id);
            modal.find("#bed-input").val(id);
        })
	</script>
@endsection


