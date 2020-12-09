<title>Prekė</title>
@extends('layouts.app')

@section('content')
@if(session()->has('addedItem'))
    <div class="row-cols-1 bg-info" >
        <center>
            <b>Prekė pridėta į krepšelį</b>
        </center>
        {{ session()->forget('addedItem') }}
    </div>
@endif
    <h1>
        "{{ $preke->pavadinimas }}" prekės peržiūros langas
    </h1>

    <h2>Pavadinimas: {{ $preke->pavadinimas }}</h2>
    <h2>Aprašymas:</h2> <p>{{ $preke->aprasymas }}</p>
    <h2>Kaina: {{ $preke->kaina }}€</h2>
    @isset($preke->galioja_iki_data)
        <h2>Galioja iki: {{ $preke->galioja_iki_data }}</h2>
    @endisset
    <h2>Gamintojas: {{ $preke->gamintojas }}</h2>
    <a href="{{route('cart.add', $preke)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Pridėti į krepšeli</button> </a>
{{--    FIXME: ONLY ADMIN CAN DO THESE THINGS!!! --}}
{{--    @can('shop-admin')--}}
        <a href="{{route('shop.edit', $preke->id)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Redaguoti</button> </a>
        <a href="{{route('shop.deletePage', $preke->id)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b1e21">Šalinti</button> </a>
{{--    @endcan--}}
    <a href="{{route('shop.index')}}"> <button type="button" class="btn btn-primary float-right" style="background-color: darkblue">Atgal</button> </a>
@endsection

