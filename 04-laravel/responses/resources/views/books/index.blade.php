<!DOCTYPE html>
<html>
    <head>
        <title>Unos knjige</title>
        <style>
            body{
                font-family:Arial, Helvetica, sans-serif;
                margin: 40px;
                background: #f5f5f5;
            }

            table{
                border-collapse: collapse;
                width: 70%;
                background: white;
            }
            th{
                background: #333;
                color:white;
                padding: 10px;
            }

            td{
                border: 1px solid #ddd;
                padding: 8px;
            }

            tr:nth-child(even){
                background: #f2f2f2;
            }

            a{
                display: inline-block;
                margin-bottom: 15px;
            }
        </style>
    </head>

    <body>
        <h1>Ispis svih knjiga</h1>

        <p>
            <a href="{{ route('books.create') }}">Dodaj novu knjigu</a>
        </p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naziv</th>
                    <th>Autor</th>
                    <th>Godina</th>
                    <th>Cijena</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($knjige as $knjiga)
                    <tr>
                        <td>{{ $knjiga['id'] }}</td>
                        <td>{{ $knjiga['naziv'] }}</td>
                        <td>{{ $knjiga['autor'] }}</td>
                        <td>{{ $knjiga['godina'] }}</td>
                        <td>{{ $knjiga['cijena'] }}</td>
                    </tr>              
                @endforeach
            </tbody>
        </table>

    </body>
</html>