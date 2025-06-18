@extends('layouts.master')
@section('page')


<div class="divbi">
  <span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Attendance List</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('studentattendances/create') }}">
        <span>Add  Attendance</span>
    </a>
    <form method="GET" action="{{ route('studentattendances.index') }}" >
                <input type="text" name="search" placeholder="Student Id..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
                <button type="submit" class="buttonbis">
                    <span>Search</span> 
               </button>
   </form>

    
</div>


<table>
    <tr>
         
        <th>Id</th>
        <th>Name</th>
        <th>St. Id</th>
        <th>Shift</th>
          <th>Section</th>
        <th>Date</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Status</th>
        <th>Remarks</th>
     
        <th>Acttion</th>
    </tr>
    @forelse($studentattendances as $studentattendance)
    <tr>
        <td>{{$studentattendance->id}}</td>
        <td>{{$studentattendance->student->name  }}</td>
         <td>{{$studentattendance->student_id  }}</td>
        <td>{{$studentattendance->shift->name  }}</td>
        <td>{{$studentattendance->section->name  }}</td>
        <td>{{$studentattendance->date}}</td>
        <td>{{$studentattendance->check_in  }}</td>
        <td>{{$studentattendance->check_out }}</td>
        <td>{{$studentattendance->status  }}</td>
        <td>{{$studentattendance->remarks  }}</td>
        <td>
            <div class="divc">
               <a href='{{url("studentattendances/$studentattendance->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("studentattendances/$studentattendance->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('studentattendances.destroy',$studentattendance->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>  
                
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="12">No studentattendances Available.</td>
    </tr>
    @endforelse
</table>
<div style="margin-top:10px;">
{{ $studentattendances->links('pagination::bootstrap-5') }}
</div>

@endsection