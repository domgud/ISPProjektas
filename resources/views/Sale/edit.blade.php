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
        <form action="{{ route('Sale.update', $sal->id) }}" method="POST">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group row">
                <label for="vietos" class="col-md-2 col-form-label text-md-right">Vietu skaicius:</label>
                <div class="col-md-6">
                    <input id="vietos" type="number" class="form-control " name="vietos" value="{{$sal->vietu_skaicius}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="numeris" class="col-md-2 col-form-label text-md-right">Sales numeris:</label>
                <div class="col-md-6">
                    <input id="numeris" type="number" class="form-control " name="numeris" value="{{$sal->sales_numeris}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="iranga" class="col-md-2 col-form-label text-md-right">Iranga:</label>
                <div class="col-md-6">
                    <select id="iranga" type="number" class="form-control " name="iranga">
                        @if ($sal->turi_iranga === 1)
                            <option value="1" selected="selected">Pilna</option> 
                            <option value="0">Nepilna</option> 
                        @elseif ($sal->turi_iranga === 0)
                            <option value="1">Pilna</option> 
                            <option value="0" selected="selected">Nepilna</option>
                        @endif
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-left" style="background-color: #1b4b72">Patvirtinti</button>
            <a href="{{route('Sale.index')}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b1e21">Atšaukti</button> </a>

        </form>
    </div>
@endsection