<title>Parduotuvės langas</title>
@extends('layouts.app')
@section('navigation-bar')
    <a href="{{ route('shop.create') }}"> <button type="button" class="btn btn-primary float-right">Pridėti prekę</button> </a>
    <a href="{{ route('cart.index') }}"> <button type="button" class="btn btn-primary float-right">Krepšelis</button> </a>
@endsection


@section('content')
    <p>Ieškoti:
        <input type="text" style="width: 40%">
        <a href="{{route('shop.index', 1)}}"> <button type="button" name="search" style="color: white;background-color: #1b4b72">Ieškoti</button> </a>
    </p>
    <h1>
        Parduotuvės langas
    </h1>

    <table class="table">
        <tr style="background-color: #c6e0f5">
            <td>Prekės vardas</td>
            <td>Kaina</td>
            <td></td>
        </tr>
        <tr>
            <td>Labai gera preke</td>
            <td>4.36$</td>
            <td style="float: right">
                <a href="{{route('shop.show', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Peržiūrėti</button> </a>
            </td>
        </tr>
    </table>
@endsection



