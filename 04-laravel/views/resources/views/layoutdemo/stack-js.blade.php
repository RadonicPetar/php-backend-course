@extends('layouts.app');

@section('title')
Stack Demo
@endsection

@push('styles')
<style>
    .js-box{
        background: #ffe1dd;
        border: 2px solid red;
        padding: 20px;
        border-radius: 8px;
        color: black;
    }
    h2{
        color: red;
        font-size: 2em;
    }
    input[type="text"]{
        padding: 10px;
    }
</style>
@endpush

@section('content')
<h2>Blade Stack Demo</h2>
<div class="js-box">
    Ovaj js dolazi iz script direktive
    <input type="text" name="grad" id="grad" size="30">
</div>
@push('scripts')
<script>
    alert('Pozdrav iz JavaScripta');
</script>
@endpush

@push('scripts')
<script>
    document.getElementById("grad").value = "Zagreb";
</script>
@endpush

@endsection