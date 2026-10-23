<!DOCTYPE html>
<html>
    <head>
        <title>Prikaz podataka</title>
    </head>
    <body>
        <h1>Ispis knjiga</h1>

        @foreach ($books as $book)
            <li>{{ $book }}</li>
        @endforeach

    </body>
</html>