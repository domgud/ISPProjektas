@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div><b>Registracijos valdymo langas</b></div>
                <br>
                <form>
                    <label for="filter">Treniruotės paieška:</label>
                    <input type="text" id="filter" name="filter">
                    <input type="submit" value="Submit" class="btn btn-warning">
                </form>

                <br>

                @can('create-visit')
                    <a href="{{route('visit.create')}}"> <button type="button" class="btn btn-primary float-left">Registracija</button> </a>
                    <br>
                    <a href="{{route('visit.show', 1)}}"> <button type="button" class="btn btn-warning float-left">Peržiūrėti treniruotę</button> </a>
                @endcan
            </div>
        </div>
    </div>
@endsection
