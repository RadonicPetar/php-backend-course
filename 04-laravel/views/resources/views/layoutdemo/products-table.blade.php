@extends('layouts.app'):

@section('title')
Proizvodi
@endsection



@section('content')
<h2>Popis proizvoda</h2>
<p>
    prikaz proizvoda pomoću zajedničkog partial viw-a
</p>

@include('partials.table',[
    'headers'=>$headers,
    'rows'=>$rows
])
@endsection