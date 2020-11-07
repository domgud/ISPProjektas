@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Peržiūrėti treniruotę') }}</div>
                <div><b>Registracijos peržiūros langas</b></div>
                <br>
                @can('create-visit')
                    <a href="{{route('visit.edit', 1)}}"> <button type="button" class="btn btn-warning float-left">Redaguoti</button> </a>
                    <br>
                    <a href="{{route('visit.delete', 1)}}"> <button type="button" class="btn btn-primary float-left">Ištrinti</button> </a>
                    <br>
                    <a href="{{route('visit.index')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                @endcan
            </div>
        </div>
    </div>
@endsection
