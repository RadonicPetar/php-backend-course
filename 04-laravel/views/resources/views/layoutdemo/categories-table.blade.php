@extends('layouts.app'):

@section('title')
kategorije
@endsection

@section('content')
<h2>Popis kategorija</h2>
<p>
    prikaz kategorija pomoću zajedničkog partial view-a
</p>

@include('partials.table',[
    'headers'=>$headers,
    'rows'=>$rows
])
@endsection