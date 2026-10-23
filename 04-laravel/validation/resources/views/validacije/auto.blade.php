<!DOCTYPE html>
<html>
    <head>
        <title>Validacija više atributa</title>
    </head>
    <body>
        <h1>Validacija više atributa - automobili unos</h1>

        <form method="POST" action="{{ route('validacija.auto.store') }}">
            @csrf

            <p>
                <label>Naziv:</label><br>
                <input type="text" name="naziv" value="{{ old('naziv') }}">
            </p>

            @error('naziv')
            <p style="color:red;">{{ $message }}</p>
            @enderror

            <p>
                <label>Registracija:</label><br>
                <input type="text" name="registracija" value="{{ old('registracija') }}">
            </p>
            @error('registracija')
            <p style="color:red;">{{ $message }}</p>
            @enderror            

            <p>
                <label>Registracija potvrda:</label><br>
                <input type="text" name="registracija_potvrda" value="{{ old('registracija_potvrda') }}">
            </p>
            @error('registracija_potvrda')
            <p style="color:red;">{{ $message }}</p>
            @enderror 
            
            <p>
                <label>Oznaka države:</label><br>
                <input type="text" name="oznaka_drzave" value="{{ old('oznaka_drzave') }}">
            </p>
            @error('oznaka_drzave')
            <p style="color:red;">{{ $message }}</p>
            @enderror

            <p>
                <label>Broj šasije:</label><br>
                <input type="text" name="broj_sasije" value="{{ old('broj_sasije') }}">
            </p>
            @error('broj_sasije')
            <p style="color:red;">{{ $message }}</p>
            @enderror

            <p>
                <label>Godiste:</label><br>
                <input type="number" name="godiste" value="{{ old('godiste') }}">
            </p>
            @error('godiste')
            <p style="color:red;">{{ $message }}</p>
            @enderror

            <p>
                <label>Kilometri:</label><br>
                <input type="number" name="kilometri" value="{{ old('kilometri') }}">
            </p>
            @error('kilometri')
            <p style="color:red;">{{ $message }}</p>
            @enderror
            <button type="submit">Spremi</button>
        </form>
    </body>
</html>