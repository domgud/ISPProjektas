@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Ar tikrai norite šalinti?') }}</div>
            <a href="{{route('Training.index')}}"> <button type="button" class="btn btn-primary float-left">Taip</button></a>
            <a href="{{route('Training.index')}}"> <button type="button" class="btn btn-primary float-left">Ne</button></a>
        </div>
    </div>
</div>
@endsection