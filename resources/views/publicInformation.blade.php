<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<h1 style = text-align:center;>Viesos informacijos langas</h1>
<div style = text-align:center;><a class = "nav-link text-sm text-gray-700 underline" href="/" >Pagrindinis langas</a></div>
    @can('manage-info')
        <div style = text-align:center;><a class = "nav-link text-sm text-gray-700 underline" href="/editInfo" >Informacijos redagavimo langas</a></div>
        <div style = text-align:center;><a class = "nav-link text-sm text-gray-700 underline" href="/deleteInfo" >Informacijos trinimo langas</a></div>
        <div style = text-align:center;><a class = "nav-link text-sm text-gray-700 underline" href="/post" >Prideti naujiena</a></div>
        <div style = text-align:center;><a class = "nav-link text-sm text-gray-700 underline" href="/generatePublic" >Kurti ataskaita</a></div>
    @endcan
</body>

</html>
