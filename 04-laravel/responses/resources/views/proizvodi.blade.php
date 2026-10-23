<!DOCTYPE html>
<html>
    <head>
        <title>Proizvodi</title>
    </head>
    <body>
        <h1>Popis proizvoda</h1>

    <ul>
        @foreach ($products as $product)
        <li> {{ $product }}</li>    
        @endforeach
    </ul>
    </body>
</html>