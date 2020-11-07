@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registracija į treniruotę') }}</div>
                <div><b>Registracijos forma</b></div>
                <br>
                @can('create-visit')
                    <a href="{{route('visit.index')}}"> <button type="button" class="btn btn-warning float-left">Registruotis</button> </a>
                    <br>
                    <a href="{{route('visit.index')}}"> <button type="button" class="btn btn-primary float-left">Atgal</button> </a>
                @endcan
            </div>
        </div>
    </div>
@endsection
