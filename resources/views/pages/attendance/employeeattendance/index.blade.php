@extends('layouts.master')
@section('page')


<div class="divbi">
  <span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Attendance List</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('employeeattendances/create') }}">
        <span>Add Employee Attendance</span>
    </a>
    <form method="GET" action="{{ route('employeeattendances.index') }}" >
                <input type="text" name="search" placeholder=" Employee Id..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
                <button type="submit" class="buttonbis">
                    <span>Search</span> 
               </button>
   </form>

    
</div>


<table>
    <tr>
         
        <th>Id</th>
        <th>Name</th>
        <th>Em. ID</th>
        <th>Shift</th>
        <th>Date</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Status</th>
        <th>Remarks</th>
     
        <th>Acttion</th>
    </tr>
    @forelse($employeeattendances as $employeeattendance)
    <tr>
        <td>{{$employeeattendance->id}}</td>
        <td>{{$employeeattendance->employee->name  }}</td>
        <td>{{$employeeattendance->employee_id}}</td>
        <td>{{$employeeattendance->employeeshift->name  }}</td>
        <td>{{$employeeattendance->date}}</td>
        <td>{{$employeeattendance->check_in  }}</td>
        <td>{{$employeeattendance->check_out }}</td>
        <td>{{$employeeattendance->status  }}</td>
        <td>{{$employeeattendance->remarks  }}</td>
        <td>
            <div class="divc">
               <a href='{{url("employeeattendances/$employeeattendance->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("employeeattendances/$employeeattendance->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('employeeattendances.destroy',$employeeattendance->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>  
                
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="10">No Employeeattendances Available.</td>
    </tr>
    @endforelse
</table>
<div style="margin-top:10px;">
{{ $employeeattendances->links('pagination::bootstrap-5') }}
</div>

@endsection