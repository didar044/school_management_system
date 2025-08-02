@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Employee Administrator Information</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('employeeadministrators/create') }}">
        <span>Add Amployee Administrator</span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Employee Id</th>
        <th>Categorie</th>
        <th>Role</th>
        <th>Acttion</th>
    </tr>
    @forelse($employeeadministrators as $employeeadministrator)
    <tr>
        <td>{{$employeeadministrator->id}}</td>
        <td>{{$employeeadministrator->name}}</td>
        <td>{{$employeeadministrator->employee_id}}</td>
        <td>{{$employeeadministrator->employee_categorie}}</td>
        <td>{{$employeeadministrator->role}}</td>
       
        <td>
            <div class="divc">
               <a href='{{url("employeeadministrators/$employeeadministrator->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <a href='{{url("employeeadministrators/$employeeadministrator->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>

                <form action="{{route('employeeadministrators.destroy',$employeeadministrator->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form> 
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6">No employeeadministrators available.</td>
    </tr>
    @endforelse
</table>
</div>

@endsection