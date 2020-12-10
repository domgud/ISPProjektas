@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @can('create-visit')
                    <div class="card-header">
                        Treniruotės tikslas
                    </div>
                    <div class="card-body">
                        <form action="{{route('visit.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="tikslas" class="col-md-2 col-form-label text-md-right">Įrašykite tikslą</label>
                                <div class="col-md-6">
                                    <input id="tikslas" type="text" class="form-control @error('tikslas') is-invalid @enderror" name="tikslas" value="{{ old('tikslas') }}">
                                    @error('tikslas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <input id="id" type="hidden" name="id" value="{{ $visit }}">
                            </div>
                            <button type="submit" class="btn btn-success float-right">
                                Registruotis į treniruotę
                            </button>
                            <a  href="{{route('visit.search')}}"> <button type="button" class="btn btn-warning">Atgal</button> </a>
                        </form>
                    @endcan
                </div>
        </div>
    </div>
</div>
@endsection
