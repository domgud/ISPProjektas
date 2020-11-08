<title>Prekė</title>
@extends('layouts.app')

@section('content')

    <h1>
        Prekės peržiūros langas
    </h1>

    <h2>Prekes pavadinimas: test</h2>
    <h2>Prekes kaina: 1444</h2>
    <h2>Prekes galiojimo data: 2020-11-07</h2>
    <h2>Gamintojas: Toyota</h2>
    <a href="{{route('shop.show', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Pridėti į krepšeli</button> </a>
{{--    FIXME: ONLY ADMIN CAN DO THESE THINGS!!! --}}
{{--    @can('shop-admin')--}}
        <a href="{{route('shop.edit', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Redaguoti</button> </a>
        <a href="{{route('shop.delete', 1)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b1e21">Šalinti</button> </a>
{{--    @endcan--}}
    <a href="{{route('shop.index')}}"> <button type="button" class="btn btn-primary float-right" style="background-color: darkblue">Atgal</button> </a>
@endsection

