@extends('layouts.app');

@section('title')
Stack Demo
@endsection

@push('styles')
<style>
    .special-box{
        background: #ddffdd;
        border: 2px solid green;
        padding: 20px;
        border-radius: 8px;
    }
    h2{
        color: red;
        font-size: 2em;
    }
</style>
@endpush

@section('content')
<h2>Blade Stack Demo</h2>
<div class="special-box">
    Ovaj css dolazi iz push direktive
</div>

@endsection