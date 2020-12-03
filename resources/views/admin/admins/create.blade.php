@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pridėti adminą</div>

                    <div class="card-body">
                        <form action="{{route('admin.admins.store')}}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">El. Paštas</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Vardas</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  requiredautofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-2 col-form-label text-md-right">Miestas</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street" class="col-md-2 col-form-label text-md-right">Gatvė</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control" name="street" value="{{ old('street') }}" required>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number" class="col-md-2 col-form-label text-md-right">Namo nr.</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control" name="number" value="{{ old('number') }}" required>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_code" class="col-md-2 col-form-label text-md-right">Pašto kodas</label>

                                <div class="col-md-6">
                                    <input id="post_code" type="number" class="form-control" name="post_code" value="{{ old('post_code') }}" required>


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label text-md-right">Slaptažodis</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="work_start" class="col-md-3 col-form-label text-md-right">Pradeda dirbti</label>

                                <input type="date" id="work_start" name="work_start">

                            </div>
                            <div class="form-group row">
                                <label for="end_work" class="col-md-3 col-form-label text-md-right">Baigia dirbti</label>

                                <input type="date" id="end_work" name="end_work">


                            </div>
                            <div class="form-group row">
                                <label for="role" class="col-md-2 col-form-label text-md-right">Būsena</label>
                                <div class="col-md-6">
                                    <select name="state" id="state">
                                        @foreach($states as $state)
                                                <option value="{{$state->id}}" selected="selected">{{$state->name}} </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">
                                Pridėti
                            </button>
                            <a href="{{route('admin.users.index')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
