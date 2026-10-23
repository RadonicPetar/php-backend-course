@extends('layouts.app')
@section('title')
Card Demo
@endsection

@section('content')
<h2>Blade Card komponenta</h2>


<x-card>
    <x-slot:title>
        Laravel tečaj
    </x-slot:title>
    Ovo je opis laravel tečaja
</x-card>
<x-card>
    <x-slot:title>
        PHP napredni
    </x-slot:title>
    Ovo je sadržaj PHP naprednog tečaja
</x-card>
@endsection