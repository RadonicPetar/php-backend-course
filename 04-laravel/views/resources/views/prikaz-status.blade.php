<!DOCTYPE html>
<html>
    <head>
        <title>Prikaz podataka</title>
    </head>
    <body>
        <h1>Prikaz podataka o osobi {{ $ime }}, {{ $godine }}</h1>

        @if ($godine >= 18)
            <h2>Punoljetan</h2>
        @else
            <h2>Maloljetan</h2>
        @endif

    </body>
</html>