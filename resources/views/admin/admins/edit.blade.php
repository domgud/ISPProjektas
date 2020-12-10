@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Redaguojamas administratorius: {{$admin->user->name}}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('admin.admins.update', $admin)}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{$admin->user->email}}"  autocomplete="email" autofocus>


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$admin->user->name}}" autofocus>


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-2 col-form-label text-md-right">Pavardė</label>

                                <div class="col-md-6">

                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $admin->user->lastname }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthdate" class="col-md-2 col-form-label text-md-right">Gimimo data</label>

                                <div class="col-md-6">

                                    <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ $admin->user->birthdate }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="code" class="col-md-2 col-form-label text-md-right">Asmens kodas</label>

                                <div class="col-md-6">

                                    <input id="code" type="number" class="form-control" name="code" value="{{ $admin->user->code }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phonenumber" class="col-md-2 col-form-label text-md-right">Telefono numeris</label>

                                <div class="col-md-6">

                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ $admin->user->phonenumber }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-2 col-form-label text-md-right">Miestas</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{$admin->user->address->city}}">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street" class="col-md-2 col-form-label text-md-right">Gatvė</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control" name="street" value="{{$admin->user->address->street}}">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number" class="col-md-2 col-form-label text-md-right">Namo nr.</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control" name="number" value="{{$admin->user->address->number}}">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_code" class="col-md-2 col-form-label text-md-right">Pašto kodas</label>

                                <div class="col-md-6">
                                    <input id="post_code" type="number" class="form-control" name="post_code" value="{{$admin->user->address->post_code}}">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="work_start" class="col-md-3 col-form-label text-md-right">Pradeda dirbti</label>

                                <input type="date" id="work_start" name="work_start" value="{{$admin->work_start}}">

                            </div>
                            <div class="form-group row">
                                <label for="end_work" class="col-md-3 col-form-label text-md-right">Baigia dirbti</label>

                                <input type="date" id="end_work" name="end_work" value="{{$admin->end_work}}">


                            </div>
                            <div class="form-group row">
                                <label for="state" class="col-md-2 col-form-label text-md-right">Būsena</label>
                                <div class="col-md-6">
                                    <select name="state" id="state">
                                        @foreach($states as $state)
                                            @if($admin->state_id===$state->id)
                                                <option value="{{$state->id}}" selected="selected">{{$state->name}} </option>
                                            @else
                                                <option value="{{$state->id}}">{{$state->name}} </option>
                                            @endif
                                        @endforeach

                                    </select>
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
