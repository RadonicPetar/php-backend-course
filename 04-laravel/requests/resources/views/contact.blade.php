<!DOCTYPE html>
<html>
    <head>
        <title>Kontakt</title>
        <style>
            label, button{
                display: block;
                margin-bottom: 10px;
            }
            
        </style>
    </head>
    <body>
        <form method="POST" action="/contact">
        @csrf
        <label>Ime:</label>
        <input type="text" name="ime">
        <button type="submit">Pošalji</button>
        </form>
    </body>
</html>