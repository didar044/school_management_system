@extends('layouts.master') 

@section('page')


<form id="dayFilterForm" method="GET" action="{{ route('routines.index') }}">
    <input type="hidden" name="day" id="dayInput" value="">
</form>

<div style="margin-bottom: 20px;">
    @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
        <button type="button" onclick="filterByDay('{{ $day }}')" style="margin: 5px;" class="buttonbi">
          <span>  {{ $day }} </span>
        </button>
    @endforeach
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Day</th>
        <th>Class</th>
        <th>Period</th>
        <th>Subject</th>
        <th>Room Number</th>
        <th>Teacher</th>
        <th>Shift</th>
        <th>Section</th>
    </tr>
    @foreach ($routines as $routine )
        <tr>
          <td>{{$routine->id}}</td>
          <td>{{$routine->day}}</td>
          <td>{{$routine->classe?->name ?? 'N/A' }}</td>
          <td>{{$routine->period->name}}</td>
          <td>{{$routine->subject->name}}</td>
          <td>{{$routine->room_id}}</td>
          <td>{{$routine->employee?->name ?? 'N/A' }}</td>
          <td>{{$routine->shift->name}}</td>
          <td>{{$routine->section->name}}</td>
        </tr>
    @endforeach
    
</table>
</div>



<script>
function filterByDay(day) {
    document.getElementById('dayInput').value = day;
    document.getElementById('dayFilterForm').submit();
}
</script>
@endsection