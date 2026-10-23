@extends('layouts.app')

@section('title')
Alert Demo
@endsection

@section('content')
<h2>Blade alert komponente</h2>
<x-alert type="success">
    Knjiga je uspješno spremljena
</x-alert>
<x-alert type="warning">
    Provjerite svoje podatke
</x-alert>
<x-alert type="danger">
    Dogodila se greška
</x-alert>
<x-alert type="">
    Error type
</x-alert>
@endsection