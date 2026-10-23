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
        <h1>Automobili i vlasnici</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Motor</th>
                <th>Godište</th>
                <th>Registracija</th>
                <th>Vlasnik</th>
                <th>Datum rođenja</th>
                <th>Starost</th>
            </tr>
            @foreach ($automobili as $automobil)
            <tr>
                <td>{{ $automobil['id'] }}</td>
                <td>{{ $automobil['naziv'] }}</td>
                <td>{{ $automobil['motor'] }}</td>
                <td>{{ $automobil['godiste'] }}</td>
                <td>{{ $automobil['registracija'] }}</td>

                @if($automobil['vlasnik'])
                <td>
                    {{ $automobil['vlasnik']['ime'] }} 
                    {{ $automobil['vlasnik']['prezime'] }}
                </td>
                <td>
                    {{ $datum = Carbon::parse($automobil['vlasnik']['datum_rod'])->format('d.m.Y') }}
                </td>
                <td>
                    {{ $starost = Carbon::parse($automobil['vlasnik']['datum_rod'])->age }}
                </td>
                @else
                <td colspan="3">Vlasnik ne postoji</td>
                @endif
            </tr>
            @endforeach
        </table>
        <p>
            <a href="/vozila/broj-po-vlasniku">Broj automobila po vlasniku</a>
        </p>
        <p>
            <a href="/vozila/pdf">Export to PDF</a>
        </p>
    </body>
</html>