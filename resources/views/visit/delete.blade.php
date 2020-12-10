@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Šalinimo patvirtinimas') }}
                </div>

                <div>
                    Ar tikrai norite ištrinti treniruotę {{ $visit->treniruote->pavadinimas }}?
                </div>

                <div class="card-body">

                    @can('create-visit')
                        <form action="{{route('visit.destroy', $visit)}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger float-right">Taip</button>
                        </form>
                        <a href="{{route('visit.show', $visit)}}"> <button type="button" class="btn btn-primary float-left">Ne</button> </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
