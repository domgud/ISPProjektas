@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Treniruotės dalyviai') }}</div>
            <table style="width:100%">
                <tr>
                    <th>Data</th>
                    <th>Pavadinimas</th>
                    <th>Nuo:</th>
                    <th>Iki:</th>
                    <th>Tipas</th>
                    <th>Salės numeris</th>
                    <th>Vietų skaičius</th>
                    <th>Treneris</th>
                </tr>
                <tr>
                    <th>{{$tr->data}}</th>
                    <th>{{$tr->pavadinimas}}</th>
                    <th>{{$tr->laikas_nuo}}</th>
                    <th>{{$tr->laikas_iki}}</th>
                    <th>{{$tipai->tipas}}</th>
                    <th>{{$sales->sales_numeris}}</th>
                    <th>{{$sales->vietu_skaicius}}</th>
                    <th>{{$tr->treneris->user->name}} {{$tr->treneris->user->lastname}}</th>
                </tr>

            </table>

              @can('manage-Training')
              <a href="{{route('Training.index')}}"> <button type="button" class="btn btn-primary float-left">Gryžti</button></a>
              @endcan
        </div>
    </div>
</div>
@endsection