@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <h1>
        Sales pridėjimo langas
    </h1>

    <div class="card-body">
        <form action="{{ route('Sale.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="vietos" class="col-md-2 col-form-label text-md-right">Vietu skaicius:</label>
                <div class="col-md-6">
                    <input id="vietos" type="number" class="form-control " name="vietos" value="{{ old('vietos') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="numeris" class="col-md-2 col-form-label text-md-right">Sales numeris:</label>
                <div class="col-md-6">
                    <input id="numeris" type="number" class="form-control " name="numeris" value="{{ old('numeris') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="iranga" class="col-md-2 col-form-label text-md-right">Iranga:</label>
                <div class="col-md-6">
                    <select id="iranga" type="number" class="form-control " name="iranga">
                        <option value="1">Pilna</option>
                        <option value="0">Nepilna</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-left" style="background-color: #1b4b72">Pridėti</button>
            <a href="{{route('Sale.index')}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b1e21">Atšaukti</button> </a>

        </form>
    </div>
@endsection