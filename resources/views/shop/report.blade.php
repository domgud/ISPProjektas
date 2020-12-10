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
            float: right;
            border: 1px solid black;
            width: 70%;
        }
        td {
            float: right;
            border-bottom: 1px solid black;
        }
        tr:nth-child(even){
            background-color: antiquewhite;
        }

    </style>
</head>
<body>
    <center>
        <h1>Krepšelio užsakymo nr: {{ $krepselis->uzsakymo_nr }} ataskaita</h1>
    
    <table>
        <thead>
            <tr style="background-color: #c6e0f5">
                <td>Preke</td>
                <td>Kaina</td>
            </tr>
        </thead>
        <tbody>
            @foreach($krepselis->prekes as $preke)
            <tr>
                <td>{{ $preke->pavadinimas }}</td>
                <td>{{ $preke->kaina }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <h4>
            Generavimo data: {{ date('Y-m-d')  }}
        </h4>
        <h4>
            Prekiu kiekis: {{ sizeof($krepselis->prekes) }}
        </h4>
        <h4>
            Bendra suma: {{ $krepselis->suma }}€
        </h4>
    </div>
</center>
</body>
</html>


