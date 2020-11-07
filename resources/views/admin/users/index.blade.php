@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Action</th>
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
                                            @if($user->role->name==='admin')
                                                <a href="{{route('admin.admins.edit', $user->admin->id)}}"> <button type="button" class="btn btn-primary float-left">Edit</button> </a>
                                                @elseif($user->role->name==='trainer')
                                                <a href="{{route('admin.trainers.edit', $user->trainer->id)}}"> <button type="button" class="btn btn-primary float-left">Edit</button> </a>
                                                @elseif($user->role->name==='user')
                                                <a href="{{route('admin.clients.edit', $user->client->id)}}"> <button type="button" class="btn btn-primary float-left">Edit</button> </a>
                                            @endif
                                        @endcan
                                        @can('delete-users')
                                            <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-warning">Delete</button>
                                        </form>
                                            @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('admin.admins.create')}}"> <button type="button" class="btn btn-primary float-left">Admin</button> </a>
                        <a href="{{route('admin.trainers.create')}}"> <button type="button" class="btn btn-warning float-left">Trainer</button> </a>
                        <a href="{{route('admin.clients.create')}}"> <button type="button" class="btn btn-primary float-left">User</button> </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
