@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Treniruotės kūrimas') }}</div>
              @can('manage-Training')
              <a href="{{route('Training.index')}}"> <button type="button" class="btn btn-primary float-left">Kurti ataskaita</button></a>
              @endcan
        </div>
    </div>
</div>
@endsection