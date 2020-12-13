@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Salės') }} 
            </div>
            <div class="card-body">
            <table style="width:100%">
                <tr>
                    <th>Sales numeris</th>
                    <th>Vietu skaicius</th>
                    <th>Iranga</th>
                </tr>
                <tr>
                    <th>{{$sal->sales_numeris}}</th>
                    <th>{{$sal->vietu_skaicius}}</th>
                    <th>{{$sal->turi_iranga}}</th>
                </tr>
              </table>
              <h1>Treniruotes kurios naudojo sia sale</h1>
              <table style="width:100%">
                <tr>
                    <th>data</th>
                    <th>pavadinimas</th>
                    <th>nuo</th>
                    <th>iki</th>
                </tr>
                @foreach ($tren as $tr)
                    <tr>
                        <th>{{$tr->data}}</th>
                        <th>{{$tr->pavadinimas}}</th>
                        <th>{{$tr->laikas_nuo}}</th>
                        <th>{{$tr->laikas_iki}}</th>
                    </tr>
                @endforeach
              </table>


              @can('manage-Training')
              <a href="{{route('Sale.index')}}"> <button type="button" class="btn btn-primary float-left">Atgal</button></a>
              @endcan
        </div>
    </div>
</div>
@endsection