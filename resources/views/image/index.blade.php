@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        image Index
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("image")!!}/create'>
            <button class = 'btn red' type = 'submit'>Create New image</button>
        </form>
    </div>
    <table>
        <thead>
            <th>album_id</th>
            <th>image</th>
            <th>description</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($images as $image) 
            <tr>
                <td>{!!$image->album_id!!}</td>
                <td>{!!$image->image!!}</td>
                <td>{!!$image->description!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/image/{!!$image->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/image/{!!$image->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/image/{!!$image->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $images->render() !!}

</div>
@endsection