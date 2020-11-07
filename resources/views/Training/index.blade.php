@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Treniruotės') }} 
                <a href="{{route('Training.ataskaita', 1)}}"> <button type="button" class="btn btn-primary float-right">Ataskaitos generavimas</button></a> 
            </div>
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
                    <td><a href="{{route('Training.show', 1)}}"> <button type="button" class="btn btn-primary float-left">Detaliau</button></a></td>
                    @can('manage-Training')
                    <td><a href="{{route('Training.delete', 1)}}"> <button type="button" class="btn btn-primary float-left">Šalinti</button></a></td>
                    <td><a href="{{route('Training.edit', 1)}}"> <button type="button" class="btn btn-primary float-left">Redaguoti</button></a></td>
                    @endcan
                </tr>
              </table>
              @can('manage-Training')
              <a href="{{route('Training.create')}}"> <button type="button" class="btn btn-primary float-left">Kurti</button></a>
              @endcan
        </div>
    </div>
</div>
@endsection