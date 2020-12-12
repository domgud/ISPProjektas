@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Redaguojamas asmuo: {{$user->name}}</div>

                    <div class="card-body">
                        <form action="{{route('admin.users.update', $user->id)}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">El. Paštas</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" autocomplete="email" autofocus>


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Vardas</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$user->email}}"  autofocus>


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-2 col-form-label text-md-right">Pavardė</label>

                                <div class="col-md-6">

                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthdate" class="col-md-2 col-form-label text-md-right">Gimimo data</label>

                                <div class="col-md-6">

                                    <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ $user->birthdate }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="code" class="col-md-2 col-form-label text-md-right">Asmens kodas</label>

                                <div class="col-md-6">

                                    <input id="code" type="number" class="form-control" name="code" value="{{ $user->code }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phonenumber" class="col-md-2 col-form-label text-md-right">Telefono numeris</label>

                                <div class="col-md-6">

                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ $user->phonenumber }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-2 col-form-label text-md-right">Miestas</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{$user->address->city}}">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street" class="col-md-2 col-form-label text-md-right">Gatvė</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control" name="street" value="{{$user->address->street}}">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number" class="col-md-2 col-form-label text-md-right">Namo nr.</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control" name="number" value="{{$user->address->number}}">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_code" class="col-md-2 col-form-label text-md-right">Pašto kodas</label>

                                <div class="col-md-6">
                                    <input id="post_code" type="number" class="form-control" name="post_code" value="{{$user->address->post_code}}">


                                </div>
                            </div>
                            @if(Auth::id() === $user->id)
                                <div class="form-group row">
                                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">
                                Atnaujinti
                            </button>
                            @if(Auth::user()->hasRole('admin'))
                                <a href="{{route('admin.users.index')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                            @else
                                <a href="{{route('home')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
