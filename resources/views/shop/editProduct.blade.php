<title>Prekės redagavimas</title>
@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <h1>
        "{{ $preke->pavadinimas }}" prekės redagavimo langas
    </h1>

    <div class="card-body">
        <form action="{{ route('shop.update', $preke) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="pavadinimas" class="col-md-2 col-form-label text-md-right">Pavadinimas:</label>
                <div class="col-md-6">
                    <input id="pavadinimas" type="text" class="form-control " name="pavadinimas" value="{{ $preke->pavadinimas }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="gamintojas" class="col-md-2 col-form-label text-md-right">Gamintojas:</label>
                <div class="col-md-6">
                    <input id="gamintojas" type="text" class="form-control " name="gamintojas" value="{{ $preke->gamintojas }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="aprasymas" class="col-md-2 col-form-label text-md-right">Aprašymas:</label>
                <div class="col-md-6">
                    <textarea  id="aprasymas" type="text" class="form-control " name="aprasymas">{{ $preke->aprasymas }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="kaina" class="col-md-2 col-form-label text-md-right">Prekės kaina:</label>
                <div class="col-md-2">
                    <input id="kaina" type="number" step="0.01" class="form-control " name="kaina" value="{{ $preke->kaina }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="data" class="col-md-2 col-form-label text-md-right">Galiojimo iki data:</label>
                <div class="col-md-2">
                    <input id="data" type="date" class="form-control " name="data" value="{{ $preke->galioja_iki_data }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-left" style="background-color: #1b4b72">Patvirtinti</button>
            <a href="{{route('shop.show', $preke->id)}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b1e21">Atgal</button> </a>

        </form>
    </div>
   
@endsection
