@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            @can('create-visit')
                <div class="card-header">
                    Mano vizitai
                </div>
                <div class="card-body">
                    <form action="{{route('visit.update', $visit)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}

                        <div class="form-group row">
                            <label for="tikslas" class="col-md-2 col-form-label text-md-right">Tikslas</label>
                            <div class="col-md-6">
                                <input id="tikslas" type="text" class="form-control @error('tikslas') is-invalid @enderror" name="tikslas" value="{{ $visit->tikslas }}">
                                @error('tikslas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="treniruote" class="col-md-2 col-form-label text-md-right">Treniruotė</label>
                            <div class="col-md-6">
                                <select name="treniruote" id="treniruote" class="form-control">
                                    @foreach($trainings as $training)
                                        @if($training->id == $visit->treniruote_id)
                                            <option value="{{$training->id}}" selected="selected">{{$training->pavadinimas}}</option>
                                        @else
                                            <option value="{{$training->id}}">{{$training->pavadinimas}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success float-right">
                            Atnaujinti
                        </button>
                    </form>
                    <a  href="{{route('visit.show', $visit)}}"> <button type="button" class="btn btn-warning">Atgal</button> </a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
