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
        Treniruotės redagavimo langas
    </h1>

    <div class="card-body">
        <form action="{{ route('Training.update', $training->id) }}" method="POST">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group row">
                <label for="pavadinimas" class="col-md-2 col-form-label text-md-right">Pavadinimas:</label>
                <div class="col-md-6">
                    <input id="pavadinimas" type="text" class="form-control " name="pavadinimas" value="{{ $training->pavadinimas }}">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="data" class="col-md-2 col-form-label text-md-right">Data</label>
                <div class="col-md-3">
                    <input id="data" type="date" class="form-control " name="data" value="{{ $training->data }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="pradzia" class="col-md-2 col-form-label text-md-right">Treniruotės pradžia:</label>
                <div class="col-md-6">
                    <input id="pradzia" type="time" class="form-control " name="pradzia" value="{{ $training->laikas_nuo }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="pabaiga" class="col-md-2 col-form-label text-md-right">Treniruotės pabaiga:</label>
                <div class="col-md-6">
                    <input id="pabaiga" type="time" class="form-control " name="pabaiga" value="{{ $training->laikas_iki }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="tipas" class="col-md-2 col-form-label text-md-right">Treniruotės tipas:</label>
                <div class="col-md-2">
                    <select id="tipas" type="number" step="0.01" class="form-control " name="tipas">
                        @foreach ($tipai as $tip)
                            @if ($tip->id === $training->tipas)
                                <option value={{$tip->id}} selected="selected">{{$tip->tipas}}</option>
                            @else
                                <option value={{$tip->id}}>{{$tip->tipas}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="sale" class="col-md-2 col-form-label text-md-right">Treniruotės salė:</label>
                <div class="col-md-5">
                    <select id="sale" type="number" step="0.01" class="form-control " name="sale">
                        @foreach ($sales as $sal)
                            @if($sal->id===$training->sales_id)
                                <option value={{$sal->id}} selected="selected"> 
                                    Sale: {{$sal->sales_numeris}} |
                                    vietu skaičius: {{$sal->vietu_skaicius}} |
                                    iranga: {{$sal->turi_iranga ? "Pilna" : "Nepilna"}}
                                </option>
                            @else
                                <option value={{$sal->id}}> 
                                    Sale: {{$sal->sales_numeris}} |
                                    vietu skaičius: {{$sal->vietu_skaicius}} |
                                    iranga: {{$sal->turi_iranga ? "Pilna" : "Nepilna"}}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-left" style="background-color: #1b4b72">Pridėti</button>
            <a href="{{route('Training.index')}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b1e21">Atšaukti</button> </a>

        </form>
    </div>
@endsection