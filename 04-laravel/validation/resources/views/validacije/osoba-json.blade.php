<!DOCTYPE html>
<html>
    <head>
        <title>Validacija više atributa</title>
    </head>
    <body>
        <h1>Validacija više atributa i spremanje u JSON</h1>

        <form method="POST" action="{{ route('validacija.osoba.json.store') }}">
            @csrf

            <p>
                <label>Ime:</label><br>
                <input type="text" name="ime" value="{{ old('ime') }}">
            </p>

            @error('ime')
            <p style="color:red;">{{ $message }}</p>
            @enderror

            <p>
                <label>Prezime:</label><br>
                <input type="text" name="prezime" value="{{ old('prezime') }}">
            </p>
            @error('prezime')
            <p style="color:red;">{{ $message }}</p>
            @enderror
            <p>
                <label>Plaća:</label><br>
                <input type="number" name="placa" step="0.01" value="{{ old('placa') }}">
            </p>
            @error('placa')
            <p style="color:red;">{{ $message }}</p>
            @enderror
            <button type="submit">Spremi</button>
        </form>
    </body>
</html>