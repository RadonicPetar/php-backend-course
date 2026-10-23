@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>
    <head>
        <title>Automobili i vlasnici</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                margin: 30px;
            }

            table{
                border-collapse: collapse;
                width: 100%;
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
        <h1>Broj automobila po vlasniku</h1>

        <table>
            <tr>
                <th>Vlasnik</th>
                <th>Broj automobila</th>

            </tr>
            @foreach ($rezultat as $red)
            <tr>
                <td>{{ $red['vlasnik'] }}</td>
                <td>{{ $red['broj'] }}</td>
            </tr>
            @endforeach
        </table>
        <p>
            <a href="/vozila">Povratak na automobile</a>
        </p>
    </body>
</html>