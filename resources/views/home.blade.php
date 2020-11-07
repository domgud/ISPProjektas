@extends('layouts.app')

@section('navigation-bar')
    {{--                Add sexy buttons in here!!!              --}}
    <a href="{{route('shop.index')}}"> <button type="button" class="btn btn-primary float-left">Parduotuvė</button> </a>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
@endsection
