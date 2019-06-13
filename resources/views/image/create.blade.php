@extends('layouts.app')
@section('title','Create')
@section('content')

	<div class='container'>
		<h1>
			Add image
		</h1>
		{!! Form::open(['route' => 'images.store', 'method' => 'post', 'files' => true]) !!}
		<div class="input-group mb-3">
			<div class="custom-file">

				{!! Form::file('image', ['class' => 'custom-file-input']) !!}
				<label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose
					file max 2048kb</label>
			</div>
			<div class="input-group-append">
				<span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
			</div>
		</div>
		{!! Form::select('user_id', $users->toArray() , null , ['class' => 'form-control']) !!}
		{!! Form::submit('Submit', ['class' => 'form-control']) !!}

		{!! Form::close() !!}

	</div>
	<script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     var elems = document.querySelectorAll('select');
        //     var instances = M.FormSelect.init(elems, options);
        // });

        // Or with jQuery

        $(document).ready(function () {
            $('select').formSelect();
        });
	</script>
@endsection
