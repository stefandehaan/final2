@extends('layouts.app')

@section('content')
	@include('departments/modal')

	<div class="row">
		@foreach($beds as $bed)
			<div class="col-3 mb-3">
				<div class="card">
					<div class="card-header">
						<h5>Bed #{{$bed->id}}</h5>
					</div>

					<div class="card-body">

						<div class="card-img-top">
							{!! QrCode::size(180)->generate(route('beds.show', $bed->id)); !!}

						</div>
						<div class="row">
							<div class="col-6">
								<a class="btn btn-sm btn-primary w-100" href="{{ route('beds.show', [$bed->id]) }}">
									Historie
								</a>
							</div>
							<div class="col-6">
								<button class="addButton btn btn-sm btn-primary w-100" data-id="{{$bed->id}}"
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


