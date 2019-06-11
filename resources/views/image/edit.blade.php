@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Edit')
@section('content')

<div class = 'container'>
    <h1>
        Edit image
    </h1>
    <form method = 'get' action = '{!!url("image")!!}'>
        <button class = 'btn blue'>image Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("image")!!}/{!!$image->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="input-field col s6">
            <input id="album_id" name = "album_id" type="text" class="validate" value="{!!$image->
            album_id!!}"> 
            <label for="album_id">album_id</label>
        </div>
        <div class="input-field col s6">
            <input id="image" name = "image" type="text" class="validate" value="{!!$image->
            image!!}"> 
            <label for="image">image</label>
        </div>
        <div class="input-field col s6">
            <input id="description" name = "description" type="text" class="validate" value="{!!$image->
            description!!}"> 
            <label for="description">description</label>
        </div>
        <button class = 'btn red' type ='submit'>Update</button>
    </form>
</div>
@endsection