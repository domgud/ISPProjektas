<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ataskaita</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            border: 1px solid black;
            width: 70%;
        }
        td {
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }
        tr:nth-child(even){
            background-color: antiquewhite;
        }

    </style>
</head>
<body>
<center>
    <h1>Savaites ataskaita</h1>
</center>
<table>
    <thead>
    <tr style="background-color: #c6e0f5">
        <td>Skelbimu pavadinimas</td>
        <td>Sukurtas</td>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div style="margin-left: 50px">
    <h4>
        Generavimo data: {{ date('Y-m-d')  }}
    </h4>
    <h4>
        Skelbimu kiekis: {{ sizeof($posts) }}
    </h4>
</div>

</body>
</html>
