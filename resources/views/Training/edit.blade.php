@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Treniruotės redagavimas') }}</div>
            <table style="width:100%">
                <tr>
                    <th>Data</th>
                    <th>Nuo:</th>
                    <th>Iki:</th>
                    <th>Tipas</th>
                    <th>Vietu skaicius</th>
                    <th>Salės numeris</th>
                </tr>
                <tr>
                    <td>2020-11-10</td>
                    <td>13.30</td>
                    <td>15.00</td>
                    <td>Yoga</td>
                    <td>5</td>
                    <td>2</td>
                </tr>
              </table>
              @can('manage-Training')
              <a href="{{route('Training.index')}}"> <button type="button" class="btn btn-primary float-left">Išsaugoti</button></a>
              <a href="{{route('Training.index')}}"> <button type="button" class="btn btn-primary float-left">Gryžti</button></a>
              @endcan
        </div>
    </div>
</div>
@endsection