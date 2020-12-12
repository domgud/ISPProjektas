<title>Parduotuvės langas</title>
@extends('layouts.app')
@section('navigation-bar')
    <a href="{{ route('shop.create') }}"> <button type="button" class="btn btn-primary float-right">Pridėti prekę</button> </a>
    <a href="{{ route('cart.index' ) }}"> <button type="button" class="btn btn-primary float-right">Krepšelis</button> </a>
@endsection


@section('content')
<form action="{{route('shop.search')}}" method="POST">
    @csrf
    <div class="form-group row">
        <label for="ieskoti" class="col-md-4 col-form-label text-md-right font-weight-bold">Ieškoti:</label>
        <div class="col-md-4">
            <input type="text" name="ieskoti" id="ieskoti" class="form-control" @isset($paieska) value="{{ $paieska }}" @endisset >
        </div>
        <button type="submit" class="btn btn-primary float-left">Ieškoti</button>
    </div>
</form>
    <h1>
        Parduotuvės langas
    </h1>

    <table class="table">
        <thead>
            <tr style="background-color: #c6e0f5">
                <td>Prekės vardas</td>
                <td>Kaina</td>
                <td></td>
            </tr>
        </thead>

        <tbody>
        @foreach($prekes as $preke)
            <tr>
                <td>{{ $preke->pavadinimas }}</td>
                <td>{{ $preke->kaina }}€</td>
                <td style="float: right">
                    <a href="{{route('shop.show', $preke->id)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Peržiūrėti</button> </a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection



