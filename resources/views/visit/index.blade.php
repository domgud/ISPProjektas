@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @can('create-visit')
                    <div class="card-header">
                        Mano vizitai
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Treniruotės pavadinimas</th>
                                    <th scope="col">Treneris</th>
                                    <th scope="col">Tikslas</th>
                                    <th scope="col">Veiksmai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visits as $visit)
                                    <tr>
                                        <td scope="row">
                                            {{ $visit->sukurimo_data }}
                                        </td>
                                        <td>
                                            {{ $visit->treniruote->pavadinimas }}
                                        </td>
                                        <td>
                                            {{ $visit->treniruote->treneris->user->name }} {{ $visit->treniruote->treneris->user->lastname }}
                                        </td>
                                        <td>
                                            {{ $visit->tikslas }}
                                        </td>
                                        <td>
                                            <a href="{{route('visit.show', $visit->id)}}"> <button type="button" class="btn btn-success">Peržiūrėti treniruotę</button> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('visit.search') }}"> <button type="button" class="btn btn-primary float-left">Ieškoti treniruotės</button> </a>
                        @endcan
                    </div>
            </div>
        </div>
    </div>
@endsection
