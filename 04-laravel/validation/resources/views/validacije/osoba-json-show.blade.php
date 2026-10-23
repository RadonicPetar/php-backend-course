<!DOCTYPE html>
<html>
    <head>
        <title>Validacija više atributa</title>
    </head>
    <body>
        <h1>Prikaz unesene osobe</h1>

        <p>
            ID: {{ $osoba['id'] }}
        </p>
        <p>
            Ime: {{ $osoba['ime'] }}
        </p>
        <p>
            Prezime: {{ $osoba['prezime'] }}
        </p>
        <p>
            Placa: {{ $osoba['placa'] }}
        </p>
        <hr>
        <p>
            <a href="{{ route('validacija.osoba.json.create') }}">Novi unos</a>
        </p>
        <p>
            <a href="{{ route('validacija.osoba.json.show') }}">Prikaz svih osoba</a>
        </p>
    </body>
</html>