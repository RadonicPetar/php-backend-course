@extends('layouts.app')

@section('title')
Unesena knjiga
@endsection

@section('content')
<h2>Podaci o knjizi</h2>
<p>Naziv: {{ $book['naziv'] }}</p>
<p>Autor: {{ $book['autor'] }}</p>
<p>Godina: {{ $book['godina']  }}</p>
<p>Cijena: {{ number_format($book['cijena'],2,',','.') }} €</p>
@endsection