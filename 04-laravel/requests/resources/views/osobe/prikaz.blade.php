<!DOCTYPE html>
<html>
    <head>
        <title>Osobe</title>
        <style>
            label, button{
                display: block;
                margin-top: 10px;
            }
            
        </style>
    </head>
    <body>
      <h1>Osoba spremljena</h1>
     
      <table border="1">
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Placa</th>
        </tr>
        @foreach ($osobe as $osoba)
        <tr>
            <td>{{ $osoba['id'] }}</td>
            <td>{{ $osoba['ime'] }}</td>
            <td>{{ $osoba['prezime'] }}</td>
            <td>{{ $osoba['placa'] }}</td>
        </tr>
        
        @endforeach
      </table>

      <p>
        <a href="{{ route('osoba.create') }}">Novi unos</a>
      </p>
    </body>
</html>