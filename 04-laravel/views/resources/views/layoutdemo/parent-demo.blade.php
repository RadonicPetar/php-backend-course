@extends('layouts.app')

@section('title')
Parent demo
@endsection

@section('message')

@parent

 <div
    style="background: #eef5ff;
    border: 1px solid #aac8ff;
    padding: 15px;
    margin: 20px;
    border-radius: 5px;
    ">
    Dobrodošli na Laravel Blade sekciju
</div>

@endsection

@section('content')
<h2>Demonstaracija parent direktive</h2>
<p>
    Proširivanje postojeće sekcije
</p>
@endsection