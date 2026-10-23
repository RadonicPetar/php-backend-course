<!DOCTYPE html>
<html>
    <head>
        <title>Validacija više atributa</title>
    </head>
    <body>
        <h1>Validacija više atributa</h1>

        <form method="POST" action="{{ route('validacija.proizvod.store') }}">
            @csrf

            <p>
                <label>Šifra:</label><br>
                <input type="number" name="sifra" value="{{ old('sifra') }}">
            </p>

            @error('sifra')
            <p style="color:red;">{{ $message }}</p>
            @enderror

            <p>
                <label>Naziv:</label><br>
                <input type="text" name="naziv" value="{{ old('naziv') }}">
            </p>
            @error('naziv')
            <p style="color:red;">{{ $message }}</p>
            @enderror

            <p>
                <label>Kolicina:</label><br>
                <input type="number" name="kolicina" value="{{ old('kolicina') }}">
            </p>
            @error('kolicina')
            <p style="color:red;">{{ $message }}</p>
            @enderror

            <p>
                <label>Cijena:</label><br>
                <input type="number" name="cijena" step="0.01" value="{{ old('cijena') }}">
            </p>
            @error('cijena')
            <p style="color:red;">{{ $message }}</p>
            @enderror
            <button type="submit">Spremi</button>
        </form>
    </body>
</html>