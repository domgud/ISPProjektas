@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Redaguojamas asmuo: {{$client->user->name}}</div>

                    <div class="card-body">
                        <form action="{{route('admin.clients.update', $client)}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$client->user->email}}"  required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$client->user->email}}"  requiredautofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-2 col-form-label text-md-right">Pavardė</label>

                                <div class="col-md-6">

                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $client->user->lastname }}" required>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthdate" class="col-md-2 col-form-label text-md-right">Gimimo data</label>

                                <div class="col-md-6">

                                    <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ $client->user->birthdate }}" required>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="code" class="col-md-2 col-form-label text-md-right">Asmens kodas</label>

                                <div class="col-md-6">

                                    <input id="code" type="number" class="form-control" name="code" value="{{ $client->user->code }}" required>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phonenumber" class="col-md-2 col-form-label text-md-right">Telefono numeris</label>

                                <div class="col-md-6">

                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ $client->user->phonenumber }}" required>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-2 col-form-label text-md-right">Miestas</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{$client->user->address->city}}" required>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street" class="col-md-2 col-form-label text-md-right">Gatvė</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control" name="street" value="{{$client->user->address->street}}" required>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number" class="col-md-2 col-form-label text-md-right">Namo nr.</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control" name="number" value="{{$client->user->address->number}}" required>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_code" class="col-md-2 col-form-label text-md-right">Pašto kodas</label>

                                <div class="col-md-6">
                                    <input id="post_code" type="number" class="form-control" name="post_code" value="{{$client->user->address->post_code}}" required>


                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Atnaujinti
                            </button>
                            <a href="{{route('admin.users.index')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
