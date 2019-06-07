<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">
					Bed #<span class="bed-text"></span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				{!! Form::open(['route' => ['bedusage.store'], 'method' => 'post']) !!}

				{!! Form::hidden('bed', null, ['id' => 'bed-input']) !!}
				{!! Form::select('client', $clients->toArray() , null , ['class' => 'form-control mb-3']) !!}


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
