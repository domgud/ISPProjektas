@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit admin {{$admin->user->name}}</div>

                    <div class="card-body">
                        <form action="{{route('admin.admins.update', $admin)}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$admin->user->email}}"  required autocomplete="email" autofocus>

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
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$admin->user->email}}"  requiredautofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="work_start" class="col-md-4 col-form-label text-md-right">Pradeda dirbti</label>

                                <input type="text" id="work_start" name="work_start" value="{{$admin->work_start}}">

                            </div>
                            <div class="form-group row">
                                <label for="end_work" class="col-md-4 col-form-label text-md-right">Baigia dirbti</label>

                                <input type="text" id="end_work" name="end_work" value="{{$admin->end_work}}">


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
                                Update
                            </button>
                            <a href="{{route('admin.users.index')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
