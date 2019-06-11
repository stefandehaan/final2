@extends('layouts.app')
@section('title','Index')
@section('content')

	<div class="navbar navbar-dark bg-dark fixed-top navbar-expand-md">
		<div class="container">
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".nav-collapse"></button>
			<a class="navbar-brand" href="/">Awesome Albums</a>
			<div class="nav-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="nav-item"><a href="{{route('create_album_form')}}" class="nav-link">Create New Album</a>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<div class="container">
		<div class="starter-template">
			<div class="row">
				@foreach($albums as $album)
					<div class="col-xl-3">
						<div class="thumbnail" style="min-height: 514px;">
							<img alt="{{$album->name}}" src="/albums/{{$album->cover_image}}">							<div class="caption">
								<h3>{{$album->name}}</h3>
								<p>{{$album->description}}</p>
								<p>{{count($album->Photos)}} image(s).</p>
								<p>Created date: {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p>
								<p>
									<a href="{{route('show_album', array('id'=>$album->id)}}"
									   class="btn btn-big btn-secondary">Show Gallery</a>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<!-- /.container -->
	</div>
@endsection
