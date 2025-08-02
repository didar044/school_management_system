@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Employee Shift Information</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('employeeshifts/create') }}">
        <span>Add Employee Shift</span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Employeeshift</th>
        <th>Acttion</th>
    </tr>
    @forelse($employeeshifts as $employeeshift)
    <tr>
        <td>{{$employeeshift->id}}</td>
        <td>{{$employeeshift->name}}</td>
        <td>
            <div class="divc">
               <a href='{{url("employeeshifts/$employeeshift->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("employeeshifts/$employeeshift->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('employeeshifts.destroy',$employeeshift->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form> 
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">No employeeshifts available.</td>
    </tr>
    @endforelse
</table>
</div>

@endsection