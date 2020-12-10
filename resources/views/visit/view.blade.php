@extends('layouts.app')

@section('content')
    @can('create-visit')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Treniruotės peržiūra
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Treniruotės pavadinimas</th>
                                <th scope="col">Laikas nuo</th>
                                <th scope="col">Laikas iki</th>
                                <th scope="col">Tipas</th>
                                <th scope="col">Tikslas</th>
                                <th scope="col">Treneris</th>
                                <th scope="col">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    {{ $visit->treniruote->pavadinimas }}
                                </td>
                                <td>
                                    {{ $visit->treniruote->laikas_nuo }}
                                </td>
                                <td>
                                    {{ $visit->treniruote->laikas_iki }}
                                </td>
                                <td>
                                    {{ $visit->treniruote->treniruotes_tipas->tipas }}
                                </td>
                                <td>
                                    {{ $visit->tikslas }}
                                </td>
                                <td>
                                    {{ $visit->treniruote->treneris->user->name }} {{ $visit->treniruote->treneris->user->lastname }}
                                </td>
                                <td>
                                    <a href="{{route('visit.delete', $visit)}}">
                                        <button type="button" class="btn btn-danger float-left">
                                            Ištrinti
                                        </button>
                                    </a>
                                    <a href="{{ route('visit.edit', $visit->id) }}">
                                        <button type="button" class="btn btn-info float-right">Redaguoti</button>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="{{route('visit.index')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
