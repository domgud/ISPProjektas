<title>Prekės redagavimas</title>
@extends('layouts.app')

@section('content')
    <h1>
        Prekės redagavimo langas
    </h1>
    <a href="{{route('shop.index', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Patvirtinti</button> </a>
    <a href="{{route('shop.show', 1)}}"> <button type="button" class="btn btn-primary float-right" style="background-color: #1b1e21">Atgal</button> </a>
@endsection
