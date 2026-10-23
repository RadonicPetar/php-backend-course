<!DOCTYPE html>
<html>
    <head>
        <title>Osnovna validacija</title>
    </head>
    <body>
        <h1>Osnovna validacija</h1>

        <form method="POST" action="{{ route('validacija.osnovna.store') }}">
            @csrf

            <p>
                <label>Ime:</label><br>
                <input type="text" name="ime" value="{{ old('ime') }}">
            </p>

            @error('ime')
            <p style="color:red;">{{ $message }}</p>
            @enderror
            <button type="submit">Pošalji</button>
        </form>
    </body>
</html>