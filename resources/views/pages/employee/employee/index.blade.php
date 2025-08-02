@extends('layouts.master')
@section('page')


<div class="divbi">
     <span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Employees List</span>
     <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
     <form method="GET" action="{{ route('employees.index') }}" >
                <input type="text" name="em_id" placeholder=" Em. Id..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
            <span style=" font-weight: bold; color: #555;">OR</span>    <input type="text" name="em_name" placeholder=" Em. Name..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
                <button type="submit" class="buttonbis">
                    <span>Search</span> 
               </button>
     </form>
    
     <a class="buttonbi" href="{{ url('employees/create') }}">
        <span>Employee Add</span>
     </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Photo</th>
        <th>Qualification</th>
        <th>Joing Date</th>
        <th>Employeeshift</th>
        <th>Category</th>
        <th>Con. Num.</th>
        <!-- <th>Address</th> -->
        <th>Acttion</th>
    </tr>
    @forelse($employees as $employee)
    
    <tr>
        <td>{{$employee->id}}</td>
        <td>{{$employee->name}}</td>
        <td><img src='{{url("/image/employee_img/$employee->photo")}}'  alt="" style="width=80px; height:80px" ></td>
        <td>{{$employee->qualification}}</td>
        <td>{{$employee->joining_date}}</td>
        <td>{{$employee->employeeshift->name}}</td>
        <td>{{$employee->employee_categorie->name}}</td>
        <td>{{$employee->phone_number}}</td>
        <!-- <td>{{$employee->address}}</td> -->
       
        <td>
            <div class="divc">
               <a href='{{url("employees/$employee->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <a href='{{url("employees/$employee->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>

                <form action="{{route('employees.destroy',$employee->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                <button class="buttonc" onClick="if( confirm('Are you Sure'))  alert('Item Deleting......')"><i class='bx bxs-trash'></i></button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="9">No classes available.</td>
    </tr>
    @endforelse
</table>
</div>
<div style="margin-top:10px;">
{{ $employees ->links('pagination::bootstrap-5') }}
</div>



@endsection