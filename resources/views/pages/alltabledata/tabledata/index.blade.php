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
        text-transform: uppercase; /* Make th and td uppercase */
    }

    table th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-transform: uppercase; /* Ensure headers uppercase */
    }
     .data-all {
        max-width: 1400px;
        margin: 0 auto;
        text-align: center;
    }



    


    @media print {
    body * {
        visibility: hidden; 
    }
    .data-all, .data-all * {
        visibility: visible; 
    }
    .data-all {
        position: absolute;
        left: -250px; /* Changed from -125px to 0 to avoid cutting off */
        top: 0;
        width: 100%;
        max-width: none;
        margin: 0;

    }
    /* Make tables take full width on print */
    .data-all table {
        width: 100% !important;
        table-layout: auto !important; /* allow columns to adjust width based on content */
    }
    /* Allow table cells to wrap text on print */
    /* .data-all table th,
    .data-all table td {
        white-space: normal !important; 
        word-break: break-word !important;
        overflow-wrap: break-word !important;
    } */
}

</style>
  
<div class="divbi">
    <a class="buttonbi" href="{{ url('/') }}">
        <span> <i class="bi bi-house"></i> Home</span>
    </a>

        <a class="buttonbi" href="{{ route('admin.table-data.show') }}" >
        <span>   <i class="bi bi-arrow-clockwise"></i> Refresh</span>
    </a>
    
</div>

<div class="data-all">
    <h1>All Tables Data</h1>

    <form method="POST" action="{{ route('admin.table-data.show') }}" style=" margin-bottom: 10px; display: flex; justify-content: space-between; ">
        @csrf
        <button type="submit" class="buttonbis"><span> Show All Tables Data</span></button>
        <button onclick="window.print()" class="buttonbis"><span><i class="bi bi-printer-fill"></i></span></button>
    </form>

    @if(isset($tables))
        @foreach($tables as $tableName)
            @php
                $cleanTableName = str_replace('fic_', '', $tableName);
                $rows = DB::table($cleanTableName)->get();
            @endphp

            {{-- Display table name uppercase and without prefix --}}
            <h3 style=" text-align: center; ">Table: {{ strtoupper($cleanTableName) }}</h3>

            @if ($rows->isEmpty())
                <p>No data found.</p>
            @else
            <div class="table-responsive ">
                <table>
                    <thead>
                        <tr>
                            @foreach(array_keys((array) $rows[0]) as $col)
                                {{-- Column names uppercase --}}
                                <th>{{ strtoupper($col) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $row)
                            <tr>
                                @foreach((array) $row as $cell)
                                    <td>{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
            @endif
        @endforeach
    @endif
</div>

@endsection
