<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<h1 style = text-align:center;>Informacijos trinimo langas</h1>

<div class="form-group">

    <div class="form-group" style = text-align:center;>
        <br> <br>
        {!! Form::Label('post', 'Skelbimai:') !!}
        <select class="form-control" name="title_id">
            @foreach($posts as $post)
                <option value="{{$post->title_id}}">{{$post->title}}</option>
            @endforeach
        </select>
        <br> <br>
    </div>
</div>


<div style = text-align:center;><button style = text-align:center;>Trinti</button></div>
<br> <br>
<div style = text-align:center;><a class = "nav-link text-sm text-gray-700 underline" href="/" >Pagrindinis langas</a></div>
</body>

</html>
