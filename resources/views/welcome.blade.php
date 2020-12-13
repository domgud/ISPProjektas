@extends('layouts.app')

@section('navigation-bar')
    {{--                Add sexy buttons in here!!!              --}}

    @can('shop-all')
        <a href="{{route('shop.index')}}"> <button type="button" class="btn btn-primary float-left">Parduotuvė</button> </a>
    @endcan



    @can('manage-Training')
        <a href="{{route('Training.index')}}"> <button type="button" class="btn btn-primary float-left">Treniruotės</button> </a>
        <a href="{{route('Sale.index')}}"> <button type="button" class="btn btn-primary float-left">Salės</button> </a>
    @endcan
@endsection

@section('content')

    @can('manage-info')

        <div style = text-align:center;><a type="button" class="btn btn-primary float-left" href="/post" >Prideti naujiena</a></div>

    @endcan
    @can('manage-info')

        <a href="{{route('createPDF')}}"> <button type="button" class="btn btn-primary float-left" style="background-color: #1b4b72">Generuoti ataskaita</button> </a>

    @endcan



    <br><br>
    <br><br>

    <form action="{{route('search')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="ieskoti" class="col-md-4 col-form-label text-md-right font-weight-bold">Ieškoti:</label>
            <div class="col-md-4">
                <input type="text" name="ieskoti" id="ieskoti" class="form-control" @isset($paieska) value="{{ $paieska }}" @endisset >
            </div>
            <button type="submit" class="btn btn-primary float-left">Filtruoti</button>
        </div>
    </form>



    <div style = text-align:center;> <h2>Naujienos</h2></div>



        @if(count($posts) > 0)

            <div class = "card" style>
                <ul class = "list-group list-group-flush">
            @foreach($posts as $post)

                        <li class = "list-group-item">
                            <h3><a href="/viewPost/{{$post->id}}">{{$post->title}}</a></h3>
                            <div><small>{{$post->created_at}}</small></div>
                        </li>

            @endforeach
                </ul>
            </div>

        @else
        @endif

@endsection
