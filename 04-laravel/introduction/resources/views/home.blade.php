<!DOCTYPE html>
<html>
<head>
    <title>Home view</title>
</head>
<body>
<h1>HTML View custom</h1>
@php

$ime = "Pero";
@endphp
<p>Pozdrav {{ $ime }}</p>

<ul>
    <li><a href="/">Početna</a></li>
    <li><a href="/prva">Prva ruta</a></li>
    <li><a href="/korisnik/edit">KOrisnik edit</a></li>
    <li><a href="/proizvod/5">Proizvod id 5</a></li>
    <li><a href="/knjige">Knjige</a></li>
    <li><a href="/knjige/3">Knjige id</a></li>
</ul>
</body>
</html>