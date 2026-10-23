<!DOCTYPE html>
<html>
    <head>
        <title>Gradovi</title>
    </head>
    <body>
        <h1>Popis gradova</h1>
        <ul>
            @foreach ($cities as $city)
            <li>{{ $city }}</li>
            @endforeach
        </ul>
    </body>
</html>