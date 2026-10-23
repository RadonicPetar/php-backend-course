<!DOCTYPE html>
<html>
    <head>
        <title>Osoba</title>
        <style>
            label, button{
                display: block;
                margin-top: 10px;
            }
            
        </style>
    </head>
    <body>
        <form method="POST" action="{{ route('osoba.store') }}">
        @csrf
        <label>Ime:</label>
        <input type="text" name="ime">

        <label>Prezime:</label>
        <input type="text" name="prezime">

        <label>Plaća:</label>
        <input type="number" name="placa" step="0.01">
        <button type="submit">Spremi</button>
        </form>
    </body>
</html>