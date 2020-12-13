@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Treniruotės') }} 
            </div>
            <div class="card-body">
            <table style="width:100%">
                <tr>
                    <th>Data</th>
                    <th>Nuo:</th>
                    <th>Iki:</th>
                    <th>Tipas</th>
                    <th>Salės numeris</th>
                </tr>
                @foreach ($tren as $tr)
                    <tr>
                        <th>{{$tr->data}}</th>
                        <th>{{$tr->laikas_nuo}}</th>
                        <th>{{$tr->laikas_iki}}</th>
                        <th>{{$tr->treniruotes_tipas->tipas}}</th>
                        <th>{{$tr->sale->sales_numeris}}</th>
                        <td><a href="{{route('Training.show', $tr->id)}}"> <button type="button" class="btn btn-primary float-left">Detaliau</button></a></td>
                        @can('manage-Training')
                            <td><a href="{{route('Training.delete', $tr->id)}}"> <button type="button" class="btn btn-primary float-left">Šalinti</button></a></td>
                            <td><a href="{{route('Training.edit', $tr->id)}}"> <button type="button" class="btn btn-primary float-left">Redaguoti</button></a></td>
                            <td><a href="{{route('Training.ataskaita', $tr->id)}}"> <button type="button" class="btn btn-primary float-right">Ataskaitos generavimas</button></a> </td>
                        @endcan
                    </tr>
                @endforeach
              </table>
              @can('manage-Training')
              <a href="{{route('Training.create')}}"> <button type="button" class="btn btn-primary float-left">Kurti</button></a>
              @endcan
        </div>
    </div>
</div>
@endsection