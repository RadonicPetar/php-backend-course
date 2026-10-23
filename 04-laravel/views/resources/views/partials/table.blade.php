@once
@push('styles')

<style>
    .data-table{
                width: 100%;
                border-collapse: collapse;
                margin-top: 15px;
            }

            .data-table th{
                background: #333;
                color: white;
                padding: 10px;
                text-align: left;
            }

            .data-table td{
                border: 1px solid #ddd;
                padding: 10px;
            }

            .data-table tr:nth-child(even){
                background: #f2f2f2;
            }
</style>

@endpush
@endonce

<table class="data-table">
    <thead>
        <tr>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @forelse($rows as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{{ $cell }}</td>               
                @endforeach
            </tr>
        @empty
        <tr>
            <td colspan="{{ count($headers) }}">
                Nema podataka za prikaz
            </td>
        </tr>
        @endforelse
    </tbody>
</table>