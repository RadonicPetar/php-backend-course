<!DOCTYPE html>
<html>
    <head>
        <title>Prikaz podataka</title>
    </head>
    <body>
        <h1>Ispis proizvoda</h1>

       <ul>
        @forelse($products as $product)
            <li>{{ $product }}</li>
        @empty
            <li>Nema proizvoda</li>
        @endforelse
       </ul>

    </body>
</html>