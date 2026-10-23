<!DOCTYPE html>
<html>
    <head>
        <title>Rezultat validacija</title>
    </head>
    <body>
        <h1>Rezultat validacija proizvoda</h1>

    <ul>
        @foreach ($podaci as $kljuc=>$vrijednost)
        <li> {{ $kljuc }}: {{  $vrijednost }}</li>    
        @endforeach
    </ul>
    </body>
</html>