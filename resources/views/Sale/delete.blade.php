@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ __('Šalinimo patvirtinimas') }}
            </div>

            <h4 style="align: moddle"> Ar tikrai norite ištrinti sale numeriu: {{ $sal->sales_numeris }}?</h4>

            <div class="card-body">

                @can('manage-Training')
                    <form action="{{route('Sale.destroy', $sal->id)}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger float-right">Taip</button>
                    </form>
                    <a href="{{route('Sale.index')}}"> <button type="button" class="btn btn-primary float-left">Ne</button> </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection