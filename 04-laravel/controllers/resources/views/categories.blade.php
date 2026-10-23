<!DOCTYPE html>
<html>
    <head>
        <title>Kategorije</title>
    </head>
    <body>
        <h1>Kategorije iz kontrolera</h1>
        <ul>
            @foreach ($categories as $category)
            <li>{{ $category->id }} - {{ $category->name }}, popularnost {{ $category->popularity }}</li>
            @endforeach
        </ul>
    </body>
</html>