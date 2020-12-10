<title>Krepšelio langas</title>
@extends('layouts.app')

@section('navigation-bar')
    @if($krepselis && sizeof($krepselis->prekes) != 0)
    <a href="{{route('cart.report', $krepselis->id)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Generuoti ataskaita</button> </a>
    @endif
@endsection

@section('content')
    <h1>
        Krepšelio langas
    </h1>
    @if($krepselis)
      <div class="card-body"> 

        @if(sizeof($krepselis->prekes) != 0)
            <table class="table">
                <thead>
                    <tr style="background-color: #c6e0f5">
                        <td>Prekės pavadinimas</td>
                        <td>Kaina</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($krepselis->prekes as $preke)
                        <tr>
                            <td>{{ $preke->pavadinimas }}</td>
                            <td>{{ $preke->kaina }}€</td>
                            <td>
                                <a href="{{route('cart.delete', $preke->id)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Pašalinti</button> </a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        @else
            <h3 style="color: red">Krepšelis tuščias</h3>
        @endif

            <h4>Visa suma: {{ $krepselis->suma }}€</h4>
            <h4>Užsakymo numeris: {{ $krepselis->uzsakymo_nr }}</h4>
        </div>
    @else
        <h3 style="color: red">Krepšelis tuščias</h3>
    @endif


    <a href="{{route('shop.index', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b1e21">Atgal</button> </a>
@endsection
