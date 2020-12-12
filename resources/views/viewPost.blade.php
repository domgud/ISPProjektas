@extends('layouts.app')

@section('content')

    <a href = / class ="btn btn-default"> Go Back</a>
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    @can('manage-info')

        <a href="/editInfo/{{$post->id}}/edit"> <button type="button" class="btn btn-primary float-left">Redaguoti</button> </a>
        {!! Form::open(['action' => ['PostController@destroy', $post->id],'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Trinti',['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    @endcan

@endsection
