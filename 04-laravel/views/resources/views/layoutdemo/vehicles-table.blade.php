@extends('layouts.app'):

@section('title')
Automobili
@endsection

@section('content')
<h2>Popis automobila</h2>
<p>
    prikaz automobila pomoću zajedničkog partial viw-a
</p>

@include('partials.table',[
    'headers'=>$headers,
    'rows'=>$rows
])
@endsection