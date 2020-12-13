@extends('layouts.app')

@section('content')
    <form action="{{route('admin.user.search')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="ieskoti" class="col-md-4 col-form-label text-md-right font-weight-bold">Ieškoti:</label>
            <div class="col-md-4">
                <input type="text" name="ieskoti" id="ieskoti" class="form-control" @isset($paieska) value="{{ $paieska }}" @endisset >
            </div>
            <button type="submit" class="btn btn-primary float-left">Ieškoti</button>
        </div>
    </form>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Naudotojai</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vardas</th>
                                <th scope="col">El. Paštas</th>
                                <th scope="col">Rolė</th>
                                <th scope="col">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>
                                        @can('edit-users')
                                            <a href="{{route('admin.users.edit', $user)}}"> <button type="button" class="btn btn-primary float-left">Redaguoti</button> </a>
                                        @endcan
                                        @can('delete-users')
                                            <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('Ar tikrai norite pašalinti??')" class="btn btn-danger">Šalinti</button>
                                        </form>
                                            @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('admin.users.create')}}"> <button type="button" class="btn btn-dark float-left">Naujas naudotojas</button> </a>
                        <a href="{{route('home')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
