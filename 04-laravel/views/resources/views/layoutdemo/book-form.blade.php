@extends('layouts.app')

@section('title')
Knjiga
@endsection

@section('content')
<h2>Unos knjige</h2>
<form method="POST" action="{{ route('layout.book.store') }}">
    @csrf
    <label>Naziv</label>
    <label><input type="text" name="naziv" value="{{ old('naziv') }}"></label>
    <label>
        @error('naziv')
        <span class="error">{{ $message }}</span>
        @enderror
    </label>

    <label>Autor</label>
    <label><input type="text" name="autor" value="{{ old('autor') }}"></label>
    <label>
        @error('autor')
        <span class="error">{{ $message }}</span>
        @enderror
    </label>

    <label>Godina</label>
    <label><input type="number" name="godina" value="{{ old('godina') }}"></label>
    <label>
        @error('godina')
        <span class="error">{{ $message }}</span>
        @enderror
    </label>

    <label>Cijena</label>
    <label><input type="number" step="0.01" name="cijena" value="{{ old('cijena') }}"></label>
    <label>
        @error('cijena')
        <span class="error">{{ $message }}</span>
        @enderror
    </label>
    <label><button type="submit">Spremi</button></label>
</form>
@endsection