@extends('layouts.app')

@section('content')

    <body>
    <h1 style = text-align:center;>Naujienos redagavimas</h1>

    {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST']) !!}
    <div class = "form-group">
        {{Form::label('title','Pavadinimas')}}
        {{Form::text('title', $post->title,['class' => 'form-control', 'placeholder' => ''])}}
    </div>
    <div class = "form-group">
        {{Form::label('body','Tekstas')}}
        {{Form::textarea('body', $post->body,['class' => 'form-control', 'placeholder' => ''])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Sumbit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    </body>

    <div style = text-align:center;><a class = "nav-link text-sm text-gray-700 underline" href="/" >Pagrindinis puslapis</a></div>
@endsection
