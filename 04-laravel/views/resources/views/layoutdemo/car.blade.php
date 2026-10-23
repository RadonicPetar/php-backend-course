@extends('layouts.app')

@section('title')
Automobil
@endsection

@section('content')
<h2>Podaci o automobilu</h2>
<p>Marka: {{ $marka }}</p>
<p>Model: {{ $model }}</p>
<p>Godište: {{ $godiste }}</p>
<p>Cijena: {{ number_format($cijena,2,',','.') }} €</p>
@endsection