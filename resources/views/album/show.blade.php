@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Show album
    </h1>
    <form method = 'get' action = '{!!url("album")!!}'>
        <button class = 'btn blue'>album Index</button>
    </form>
    <table class = 'highlight bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>name : </i></b>
                </td>
                <td>{!!$album->name!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>description : </i></b>
                </td>
                <td>{!!$album->description!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>cover_image : </i></b>
                </td>
                <td>{!!$album->cover_image!!}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection