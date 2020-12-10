<title>Prekės šalinimas</title>
@extends('layouts.app')

@section('content')
    <h1>
        "{{ $preke->pavadinimas }}" prekė bus pašalinta
    </h1>
    <h2>
        Ar esate tikras?
    </h2>
    <form action="{{route('shop.destroy', $preke->id)}}" method="POST" class="float-left">
        @csrf
        {{method_field('DELETE')}}
        <button type="submit" class="btn btn-primary float-left" style="background-color: rgb(0, 110, 255)">Patvirtinti</button>
    </form>
    <a href="{{route('shop.show', $preke->id)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b1e21">Atšaukti</button> </a>
@endsection
