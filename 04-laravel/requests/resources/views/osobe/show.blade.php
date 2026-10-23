<!DOCTYPE html>
<html>
    <head>
        <title>Osobe</title>
        <style>
            label, button{
                display: block;
                margin-top: 10px;
            }
            
        </style>
    </head>
    <body>
      <h1>Osoba spremljena</h1>
      <ul>
        <li>ID: {{ $osoba['id'] }}</li>
        <li>Ime: {{ $osoba['ime'] }}</li>
        <li>Prezime: {{ $osoba['prezime'] }}</li>
        <li>Plaća: {{ $osoba['placa'] }}</li>
      </ul>

      <p>
        Ukupno poslano: {{ $ukupno }}
        Svi poslani podaci: {{ print_r($sve) }}
      </p>

      <p>
        <a href="{{ route('osoba.create') }}">Novi unos</a>
      </p>
      <p>
        <a href="{{ route('osobe.prikaz') }}">Prikaz osoba</a>
      </p>
    </body>
</html>