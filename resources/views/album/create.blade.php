@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Create')
@section('content')

    <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <button type="button" class="navbar-toggle"data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span lclass="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Awesome Albums</a>
            <div class="nav-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{URL::route('create_album_form')}}">CreateNew Album</a></li>
                </ul>
            </div> <!--/.nav-collapse -->
        </div>
    </div>
    <div class="container" style="text-align: center;">
        <div class="span4" style="display: inline-block;margin-top:100px;">

            @if($errors->has())
                <div class="alert alert-block alert-error fade in" id="error-block">
                    {{
                    $messages = $errors->all('<li>:message</li>')
                    }}
                    <button type="button" class="close"data-dismiss="alert">×</button>

                    <h4>Warning!</h4>
                    <ul>
                        @foreach($messages as $message)
                            {{$message}}
                        @endforeach

                    </ul>
                </div>
            @endif

            <form name="createnewalbum" method="POST"action="{{URL::route('create_album')}}"enctype="multipart/form-data">
                <fieldset>
                    <legend>Create an Album</legend>
                    <div class="form-group">
                        <label for="name">Album Name</label>
                        <input name="name" type="text" class="form-control"placeholder="Album Name"value="{{Input::old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Album Description</label>
                        <textarea name="description" type="text"class="form-control" placeholder="Albumdescription">{{Input::old('descrption')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="cover_image">Select a Cover Image</label>
                        {{Form::file('cover_image')}}
                    </div>
                    <button type="submit" class="btnbtn-default">Create!</button>
                </fieldset>
            </form>
        </div>
    </div> <!-- /container -->
@endsection
