@extends('layouts.app')

@section('content')
    @can('create-visit')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Treniruotės
                </div>

                <div class="card-body">
                    <form action="{{ route('visit.search') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="treneris" class="col-md-2 col-form-label text-md-right">Treneriai:</label>
                            <div class="col-md-10">
                                <select name="treneris" id="treneris" class="form-control">
                                    <option value="all">Visi treneriai</option>
                                    @foreach($trainers as $trainer)
                                        @if($selectedTrainer != null && $selectedTrainer == $trainer->id)
                                            <option selected="selected" value="{{$trainer->id}}">{{$trainer->user->name}} {{ $trainer->user->lastname }}</option>
                                        @else
                                            <option value="{{$trainer->id}}">{{$trainer->user->name}} {{ $trainer->user->lastname }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <br/>
                                <button type="submit" class="btn btn-secondary float-right">
                                    Filtruoti
                                </button>
                            </div>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Treniruotės pavadinimas</th>
                                <th scope="col">Laikas nuo</th>
                                <th scope="col">Laikas iki</th>
                                <th scope="col">Tipas</th>
                                <th scope="col">Treneris</th>
                                <th scope="col">Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($trainings as $training)
                            <tr>
                                <td scope="row">
                                    {{ $training->data }}
                                </td>
                                <td>
                                    {{ $training->pavadinimas }}
                                </td>
                                <td>
                                    {{ $training->laikas_nuo }}
                                </td>
                                <td>
                                    {{ $training->laikas_iki }}
                                </td>
                                <td>
                                    {{ $training->treniruotes_tipas->tipas }}
                                </td>
                                <td>
                                    {{ $training->treneris->user->name }} {{ $training->treneris->user->lastname }}
                                </td>
                                <td>
                                    <a href="{{route('visit.createVisit', $training)}}">
                                        <button type="button" class="btn btn-success float-left">Registracija</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('visit.index')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                </div>
            </div>
        </div>
    </div>
    @endcan
@endsection
