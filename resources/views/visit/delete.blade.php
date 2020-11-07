@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ar tikrai norite ištrinti treniruotę?') }}</div>
                <div><b>Registracijos šalinimo langas</b></div>
                <br>
                @can('create-visit')
                    <a href="{{route('visit.index')}}"> <button type="button" class="btn btn-warning float-left">Taip</button> </a>
                    <br>
                    <a href="{{route('visit.show', 1)}}"> <button type="button" class="btn btn-primary float-left">Ne</button> </a>
                @endcan
            </div>
        </div>
    </div>
@endsection
