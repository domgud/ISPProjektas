@extends('layouts.app')

@section('content')

<body>
    <h1 style = text-align:center;>Naujienu siuntimo langas</h1>

    {!! Form::open(['action' => 'PostController@store', 'method' => 'POST']) !!}
    <div class = "form-group">
        {{Form::label('title','Pavadinimas')}}
        {{Form::text('title', '',['class' => 'form-control', 'placeholder' => ''])}}
    </div>
    <div class = "form-group">
        {{Form::label('body','Tekstas')}}
        {{Form::textarea('body', '',['class' => 'form-control', 'placeholder' => ''])}}
    </div>
    {{Form::submit('Siusti', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</body>

<div style = text-align:center;><a class = "nav-link text-sm text-gray-700 underline" href="/" >Pagrindinis puslapis</a></div>

@endsection
