<title>Krepšelio langas</title>
@extends('layouts.app')

@section('navigation-bar')
    <a href="{{route('cart.report')}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Generuoti ataskaita</button> </a>
@endsection

@section('content')
    <h1>
        Krepšelio langas
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
                <a href="{{route('cart.delete', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Pašalinti</button> </a>
            </td>
        </tr>
    </table>

    <a href="{{route('shop.index', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b1e21">Atgal</button> </a>
@endsection
