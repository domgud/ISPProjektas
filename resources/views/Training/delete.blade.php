@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ __('Šalinimo patvirtinimas') }}
            </div>

            <h4 style="align: moddle"> Ar tikrai norite ištrinti treniruote pavadinimu: {{ $train->pavadinimas }} ?</h4>

            <div class="card-body">

                @can('manage-Training')
                    <form action="{{route('Training.destroy', $train->id)}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger float-right">Taip</button>
                    </form>
                    <a href="{{route('Training.index')}}"> <button type="button" class="btn btn-primary float-left">Ne</button> </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection