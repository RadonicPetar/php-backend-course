@extends('layouts.app')
@section('title')
Card Demo
@endsection

@section('content')
<h2>Blade Card - popis tečajeva</h2>
{{ $izvodjac }}
@foreach ($tecajevi as $tecaj)


<x-card>
    <x-slot:title>
        {{$tecaj['naziv']}}
    </x-slot:title>
    {{$tecaj['opis']}}
</x-card>
@endforeach

@endsection