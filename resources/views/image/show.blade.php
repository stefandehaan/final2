@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Show image
    </h1>
    <form method = 'get' action = '{!!url("image")!!}'>
        <button class = 'btn blue'>image Index</button>
    </form>
    <table class = 'highlight bordered'>

        <td>
                <img src="{{route("images.show", 2)}}" />
        </td>
{{--        <thead>--}}
{{--            <th>Key</th>--}}
{{--            <th>Value</th>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    <b><i>album_id : </i></b>--}}
{{--                </td>--}}
{{--                <td>{!!$image->album_id!!}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    <b><i>image : </i></b>--}}
{{--                </td>--}}
{{--                <td>{!!$image->image!!}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    <b><i>description : </i></b>--}}
{{--                </td>--}}
{{--                <td>{!!$image->description!!}</td>--}}
{{--            </tr>--}}
{{--        </tbody>--}}
    </table>
</div>
@endsection
