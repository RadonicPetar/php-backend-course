@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>
    <head>
        <title>Proizvodi</title>
    </head>
    <body>
        <h1>Proizvodi iz kontrolera</h1>
        <ul>
            @foreach ($products as $product)
            <li>{{ $product->id }} - {{ $product->name }}, cijena {{ $product->price }}, kategorija {{ $product->category->name}}</li>
            @endforeach
        </ul>
        <p>
            Datum generiranja: {{ now()->format("d.m.Y H:i:s") }}
        </p>
    </body>
</html>