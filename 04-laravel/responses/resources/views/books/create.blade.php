<!DOCTYPE html>
<html>
    <head>
        <title>Unos knjige</title>
        <style>
            label{
                display:block;
                margin-top: 10px;
            }

            form{
                width:50%;
                border: 1px solid #999;
                padding: 20px;
            }
            input[type="text"],input[type="number"],button{
                padding: 5px;
            }
            .error{
                color: red;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <h1>Unos knjige</h1>
        <form method="POST" action="{{ route('books.store') }}">
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
    </body>
</html>