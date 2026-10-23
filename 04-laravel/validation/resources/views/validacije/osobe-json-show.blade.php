<!DOCTYPE html>
<html>
    <head>
        <title>Validacija više atributa</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                margin: 30px;
            }

            table{
                border-collapse: collapse;
                width: 50%;
            }

            th,td{
                border: 1px solid #999;
                padding: 8px;
                text-align: left;
            }

            th{
                background-color: #eee;
            }

            h1{
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <h1>Prikaz unesenih osoba</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Placa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($osobe as $osoba)
                <tr>
                    <td>{{ $osoba['id'] }}</td>
                    <td>{{ $osoba['ime'] }}</td>
                    <td>{{ $osoba['prezime'] }}</td>
                    <td>{{ $osoba['placa'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

      
        <hr>
        <p>
            <a href="{{ route('validacija.osoba.json.create') }}">Novi unos</a>
        </p>
    </body>
</html>