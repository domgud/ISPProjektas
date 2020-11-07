<title>Krepšelio prekės šalinimas</title>
@extends('layouts.app')

@section('content')
    <h1>
        Krepšelio prekės šalinimo langas
    </h1>
    <a href="{{route('shop.view', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: darkblue">Patvirtinti</button> </a>
    <a href="{{route('shop.view', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b1e21">Atšaukti</button> </a>
@endsection
