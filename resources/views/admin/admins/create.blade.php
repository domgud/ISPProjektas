@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add admin</div>

                    <div class="card-body">
                        <form action="{{route('admin.admins.store')}}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

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
                                <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

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
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

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
                                <label for="work_start" class="col-md-4 col-form-label text-md-right">Pradeda dirbti</label>

                                <input type="date" id="work_start" name="work_start">

                            </div>
                            <div class="form-group row">
                                <label for="end_work" class="col-md-4 col-form-label text-md-right">Baigia dirbti</label>

                                <input type="date" id="end_work" name="end_work">


                            </div>
                            <div class="form-group row">
                                <label for="role" class="col-md-2 col-form-label text-md-right">Role</label>
                                <div class="col-md-6">
                                    <select name="state" id="state">
                                        @foreach($states as $state)
                                                <option value="{{$state->id}}" selected="selected">{{$state->name}} </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">
                                Add
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
