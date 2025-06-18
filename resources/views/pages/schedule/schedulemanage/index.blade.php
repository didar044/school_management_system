@extends('layouts.master')
@section('page')
<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Schedule List</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('schedulemanages/create') }}">
        <span>Manage Schedule</span>
    </a>
</div>

<form id="dayFilterForm" method="GET" action="{{ route('schedulemanages.index') }}">
    <input type="hidden" name="day" id="dayInput" value="">
</form>

<div style="margin-bottom: 20px; text-align: center;" >
    @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
        <button type="button" onclick="filterByDay('{{ $day }}')" style="margin: 5px;" class="buttonbis">
          <span>  {{ $day }} </span>
        </button>
    @endforeach
</div>

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
        <th>Action</th>
        
    </tr>
    @forelse($schedules as $schedule)
       <tr>
          <td>{{$schedule->id}}</td>
          <td>{{$schedule->day}}</td>
          <td>{{ $schedule->classe?->name ?? 'N/A' }}</td>
          <td>{{$schedule->period->name}}</td>
          <td>{{$schedule->subject->name}}</td>
          <td>{{$schedule->room_id}}</td>
          

          <td>{{ $schedule->employee?->name ?? 'N/A' }}</td>
          <td>{{$schedule->shift->name}}</td>
          <td>{{$schedule->section->name}}</td>
          <td>
             <div class="divc">
               <a href='{{url("schedulemanages/$schedule->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("schedulemanages/$schedule->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('schedulemanages.destroy',$schedule->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>  
                
                 
            </div>
          </td>
       </tr>
       @empty
       <tr>
         <td colspan="12">No Schedule available.</td>
       </tr>
       @endforelse
</table>
<script>
function filterByDay(day) {
    document.getElementById('dayInput').value = day;
    document.getElementById('dayFilterForm').submit();
}
</script>
@endsection