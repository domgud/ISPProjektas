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
            width: 90%;
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
        <h1>Treniruotes ataskaita</h1>
    </center>
    <table>
        <thead>
            <tr style="background-color: #c6e0f5">
                <th>Data</th>
                <th>Pavadinimas</th>
                <th>Nuo:</th>
                <th>Iki:</th>
                <th>Tipas</th>
                <th>Sales numeris</th>
                <th>Vietu skaicius</th>
                <th>Treneris</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{$tr->data}}</th>
                <th>{{$tr->pavadinimas}}</th>
                <th>{{$tr->laikas_nuo}}</th>
                <th>{{$tr->laikas_iki}}</th>
                <th>{{$tipas->tipas}}</th>
                <th>{{$sale->sales_numeris}}</th>
                <th>{{$sale->vietu_skaicius}}</th>
                <th>{{$tr->treneris->user->name}} {{$tr->treneris->user->lastname}}</th>
            </tr>
        </tbody>
    </table>

    <div style="margin-left: 50px">
        <h4>
            Generavimo data: {{ date('Y-m-d')  }}
        </h4>
        <h4>
            Naudojamu saliu skaicius: {{ sizeof($sales) }}
        </h4>
        <h4>
            Siulomu skirtingu treniruociu tipu kiekis: {{ sizeof($tipai) }}
        </h4>
    </div>

</body>
</html>