@extends('layouts.app')
@section('content')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-8">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Administratorius</a></li>
                <li><a data-toggle="tab" href="#menu1">Treneris</a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="card">
                        <div class="card-header">Naujas administratorius</div>

                        <div class="card-body">
                            <form action="{{route('admin.users.store')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-right">El. paštas</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control " name="email" value="{{old('email')}}"   autocomplete="email" autofocus>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-right">Vardas</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}"  autofocus>


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lastname" class="col-md-2 col-form-label text-md-right">Pavardė</label>

                                    <div class="col-md-6">

                                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{old('lastname')}}" >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birthdate" class="col-md-2 col-form-label text-md-right">Gimimo data</label>

                                    <div class="col-md-6">

                                        <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{old('birthdate')}}" >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="code" class="col-md-2 col-form-label text-md-right">Asmens kodas</label>

                                    <div class="col-md-6">

                                        <input id="code" type="number" class="form-control" name="code" value="{{old('code')}}" >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phonenumber" class="col-md-2 col-form-label text-md-right">Telefono numeris</label>

                                    <div class="col-md-6">

                                        <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{old('phonenumber')}}" >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-md-2 col-form-label text-md-right">Miestas</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control" name="city" value="{{old('city')}}" >


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="street" class="col-md-2 col-form-label text-md-right">Gatvė</label>

                                    <div class="col-md-6">
                                        <input id="street" type="text" class="form-control" name="street" value="{{old('street')}}" >


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="number" class="col-md-2 col-form-label text-md-right">Namo nr.</label>

                                    <div class="col-md-6">
                                        <input id="number" type="number" class="form-control" name="number" value="{{old('number')}}" >


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="post_code" class="col-md-2 col-form-label text-md-right">Pašto kodas</label>

                                    <div class="col-md-6">
                                        <input id="post_code" type="number" class="form-control" name="post_code" value="{{old('post_code')}}" >


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="work_start" class="col-md-3 col-form-label text-md-right">Pradeda dirbti</label>

                                    <input type="date" id="work_start" name="work_start" value="{{old('work_start')}}">

                                </div>
                                <div class="form-group row">
                                    <label for="end_work" class="col-md-3 col-form-label text-md-right">Baigia dirbti</label>

                                    <input type="date" id="end_work" name="end_work" value="{{old('end_work')}}">


                                </div>
                                <div class="form-group row">
                                    <label for="state" class="col-md-2 col-form-label text-md-right">Būsena</label>
                                    <div class="col-md-6">
                                        <select name="state" id="state">
                                            @foreach($states as $state)

                                                <option value="{{$state->id}}">{{$state->name}} </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="role" name="role" value="admin">


                                <button type="submit" class="btn btn-primary">
                                    Pridėti
                                </button>
                                <a href="{{route('admin.users.index')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="card">
                        <div class="card-header">Naujas treneris</div>

                        <div class="card-body">
                            <form action="{{route('admin.users.store')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-right">El. paštas</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control " name="email" value="{{old('email')}}"   autocomplete="email" autofocus>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-right">Vardas</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}"  autofocus>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-md-2 col-form-label text-md-right">Pavardė</label>

                                    <div class="col-md-6">

                                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{old('lastname')}}" >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birthdate" class="col-md-2 col-form-label text-md-right">Gimimo data</label>

                                    <div class="col-md-6">

                                        <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{old('birthdate')}}" >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="code" class="col-md-2 col-form-label text-md-right">Asmens kodas</label>

                                    <div class="col-md-6">

                                        <input id="code" type="number" class="form-control" name="code" value="{{old('code')}}" >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phonenumber" class="col-md-2 col-form-label text-md-right">Telefono numeris</label>

                                    <div class="col-md-6">

                                        <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{old('phonenumber')}}" >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-md-2 col-form-label text-md-right">Miestas</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control" name="city" value="{{old('city')}}" >


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="street" class="col-md-2 col-form-label text-md-right">Gatvė</label>

                                    <div class="col-md-6">
                                        <input id="street" type="text" class="form-control" name="street" value="{{old('street')}}" >


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="number" class="col-md-2 col-form-label text-md-right">Namo nr.</label>

                                    <div class="col-md-6">
                                        <input id="number" type="number" class="form-control" name="number" value="{{old('number')}}" >


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="post_code" class="col-md-2 col-form-label text-md-right">Pašto kodas</label>

                                    <div class="col-md-6">
                                        <input id="post_code" type="number" class="form-control" name="post_code" value="{{old('post_code')}}" >


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="work_start" class="col-md-3 col-form-label text-md-right">Pradeda dirbti</label>

                                    <input type="date" id="work_start" name="work_start" value="{{old('work_start')}}">

                                </div>
                                <div class="form-group row">
                                    <label for="end_work" class="col-md-3 col-form-label text-md-right">Baigia dirbti</label>

                                    <input type="date" id="end_work" name="end_work" value="{{old('end_work')}}">



                                </div>
                                <div class="form-group row">
                                    <label for="experience" class="col-md-2 col-form-label text-md-right">Darbo patirtis metais</label>

                                    <div class="col-md-6">
                                        <input id="experience" type="number" class="form-control" name="experience" value="{{old('experience')}}" >


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="state" class="col-md-2 col-form-label text-md-right">Būsena</label>
                                    <div class="col-md-6">
                                        <select name="state" id="state">
                                            @foreach($states as $state)

                                                <option value="{{$state->id}}">{{$state->name}} </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="role" name="role" value="trainer">


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
        </div>
</div>
</body>
@endsection
