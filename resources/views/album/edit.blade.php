@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Edit')
@section('content')

<div class = 'container'>
    <h1>
        Edit album
    </h1>
    <form method = 'get' action = '{!!url("album")!!}'>
        <button class = 'btn blue'>album Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("album")!!}/{!!$album->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="input-field col s6">
            <input id="name" name = "name" type="text" class="validate" value="{!!$album->
            name!!}"> 
            <label for="name">name</label>
        </div>
        <div class="input-field col s6">
            <input id="description" name = "description" type="text" class="validate" value="{!!$album->
            description!!}"> 
            <label for="description">description</label>
        </div>
        <div class="input-field col s6">
            <input id="cover_image" name = "cover_image" type="text" class="validate" value="{!!$album->
            cover_image!!}"> 
            <label for="cover_image">cover_image</label>
        </div>
        <button class = 'btn red' type ='submit'>Update</button>
    </form>
</div>
@endsection