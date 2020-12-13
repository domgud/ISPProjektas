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
                @foreach ($sale as $sal)
                    <tr>
                        <th>{{$sal->sales_numeris}}</th>
                        <th>{{$sal->vietu_skaicius}}</th>
                        @if($sal->turi_iranga === 1 )
                            <th>Pilna iranga</th>
                        @else
                            <th>Nepilna iranga</th>
                        @endif
                        <td><a href="{{route('Sale.show', $sal->id)}}"> <button type="button" class="btn btn-primary">Detaliau</button></a></td>
                        @can('manage-Training')
                            <td><a href="{{route('Sale.delete', $sal->id)}}"> <button type="button" class="btn btn-primary float-left">Šalinti</button></a></td>
                            <td><a href="{{route('Sale.edit', $sal->id)}}"> <button type="button" class="btn btn-primary">Redaguoti</button></a></td>
                        @endcan
                    </tr>
                @endforeach
              </table>
              @can('manage-Training')
              <a href="{{route('Sale.create')}}"> <button type="button" class="btn btn-primary float-left">Kurti</button></a>
              @endcan
        </div>
    </div>
</div>
@endsection