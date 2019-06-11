@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Create')
@section('content')

<div class = 'container'>
    <h1>
        Create image
    </h1>
    <form method = 'get' action = '{!!url("image")!!}'>
        <button class = 'btn blue'>image Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("image")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="input-field col s6">
            <input id="album_id" name = "album_id" type="text" class="validate">
            <label for="album_id">album_id</label>
        </div>
        <div class="input-field col s6">
            <input id="image" name = "image" type="text" class="validate">
            <label for="image">image</label>
        </div>
        <div class="input-field col s6">
            <input id="description" name = "description" type="text" class="validate">
            <label for="description">description</label>
        </div>
        <button class = 'btn red' type ='submit'>Create</button>
    </form>
</div>
@endsection