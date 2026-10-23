<!DOCTYPE html>
<html>
    <head>
        <title>Validacija više atributa</title>
    </head>
    <body>
        <h1>Validacija više atributa</h1>

        <form method="POST" action="{{ route('validacija.osoba.store') }}">
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
                <label>E-mail:</label><br>
                <input type="email" name="email" value="{{ old('email') }}">
            </p>
            @error('email')
            <p style="color:red;">{{ $message }}</p>
            @enderror

            <p>
                <label>Godine:</label><br>
                <input type="number" name="godine" value="{{ old('godine') }}">
            </p>
            @error('godine')
            <p style="color:red;">{{ $message }}</p>
            @enderror

            <p>
                <label>Plaća:</label><br>
                <input type="number" name="placa" step="0.01" value="{{ old('email') }}">
            </p>
            @error('placa')
            <p style="color:red;">{{ $message }}</p>
            @enderror
            <button type="submit">Spremi</button>
        </form>
    </body>
</html>