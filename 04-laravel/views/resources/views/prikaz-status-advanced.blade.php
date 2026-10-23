<!DOCTYPE html>
<html>
    <head>
        <title>Prikaz podataka</title>
    </head>
    <body>
        <h1>Prikaz podataka o osobi {{ $ime }}, {{ $godine }}</h1>

        @if ($godine < 18)
            <h2>Maloljetan</h2>
        @elseif($godine < 65)
            <h2>Odrasla osoba</h2>
        @else
            <h2>Umirovljenik</h2>
        @endif

        <h3>Adresa</h3>
        @isset($adresa)
            <p>Adresa: {{ $adresa }}</p>
        @endisset
    </body>
</html>