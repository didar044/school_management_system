@extends('layouts.master')
@section('page')

<style>
    table {
        width: 100%;            
        border-collapse: collapse;  
        margin-bottom: 30px;    
        table-layout: fixed;    
        word-wrap: break-word;  
    }
    table th, table td {
        border: 1px solid #ddd;
        padding: 8px;          
        text-align: left;    
        overflow: hidden;  
        white-space: nowrap;
        text-overflow: ellipsis; 
        text-transform: uppercase;
    }
    table th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-transform: uppercase;
    }
    .data-all {
        max-width: 1400px;
        margin: 0 auto;
        text-align: center;
    }
    @media print {
        body * { visibility: hidden; }
        .data-all, .data-all * { visibility: visible; }
        .data-all {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            max-width: none;
            margin: 0;
        }
        .data-all table {
            width: 100% !important;
            table-layout: auto !important;
        }
    }
</style>

<div class="divbi">
    <a class="buttonbi" href="{{ url('/') }}">
        <span><i class="bi bi-house"></i> Home</span>
    </a>
    <a class="buttonbi" href="{{ route('admin.table-data.show') }}">
        <span><i class="bi bi-arrow-clockwise"></i> Refresh</span>
    </a>
</div>

<div class="data-all">
    <h1>All Tables Data</h1>

    <form method="POST" action="{{ route('admin.table-data.show') }}" style="margin-bottom: 10px; display: flex; justify-content: space-between;">
        @csrf
        <button type="submit" class="buttonbis"><span>Show All Tables Data</span></button>
        <button onclick="window.print()" class="buttonbis" type="button"><span><i class="bi bi-printer-fill"></i></span></button>
    </form>

    @if(isset($tables))
        @foreach($tables as $tableName)
            @php
                try {
                    // Remove prefix 'fic_' before querying because Laravel DB config has prefix 'fic_'
                    $rawTableName = preg_replace('/^fic_/', '', $tableName);

                    // Query using raw table name WITHOUT prefix
                    $rows = DB::table($rawTableName)->get();

                    $columns = $rows->isNotEmpty() ? array_keys((array)$rows[0]) : [];
                } catch (\Exception $e) {
                    $rows = collect();
                    $columns = [];
                }
            @endphp

            <h3 style="text-align: center;">Table: {{ strtoupper($rawTableName) }}</h3>

            @if ($rows->isEmpty())
                <p>No data found.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            @foreach($columns as $col)
                                <th>{{ strtoupper($col) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $row)
                            <tr>
                                @foreach((array)$row as $cell)
                                    <td>{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif 
        @endforeach
    @endif
</div>

@endsection
