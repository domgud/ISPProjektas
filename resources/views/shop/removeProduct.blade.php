<title>Prekės šalinimas</title>
@extends('layouts.app')

@section('content')
    <h1>
        Prekės šalinimo langas
    </h1>
    <a href="{{route('shop.index', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: lime">Patvirtinti</button> </a>
    <a href="{{route('shop.index', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b1e21">Atšaukti</button> </a>
@endsection
