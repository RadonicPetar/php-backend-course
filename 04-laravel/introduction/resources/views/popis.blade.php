<!DOCTYPE html>
<html>
<head>
    <title>Popis</title>
</head>
<body>
<h1>Predane varijable iz ruta</h1>

@if(isset($name))
<p>Pozdrav {{ $name }}</p>
@endif



@if (isset($popis))
<h2>Običan popis obaveza</h2>
<ul>
    @foreach ($popis as $id=>$naziv)
        <li>{{ $id }} - {{ $naziv }}</li>
    @endforeach
</ul>
@endif

@if (isset($categories))
<h2>Popis kategorija</h2>
<ul>
    @foreach ($categories as $c)
        <li>{{ $c->id }} - {{ $c->name }}</li>
    @endforeach
</ul>
<p>Datum: {{ $datum }}</p>
@endif
</body>
</html>