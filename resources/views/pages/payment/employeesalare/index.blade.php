@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Salary Allowances Table</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('employeesalaries/create') }}">
        <span>Add Salary Allowances</span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Categorie</th>
        <th>Basic Salary</th>
        <th>House A.</th>
        <th>Transport A.</th>
        <th>Medical A.</th>
        <th>Education A.</th>
        <th>Food A.</th>
        <th>Child Care A.</th>
        <th>Acttion</th>
    </tr>
    @forelse($employeesalaries as $employeesalarie)
    <tr>
        <td>{{$employeesalarie->id}}</td>
        <td>{{$employeesalarie->employee_categorie->name}}</td>
        <td>{{$employeesalarie->employee_categorie->salary}}</td>
        <td>{{$employeesalarie->house_allowance}}%</td>
        <td>{{$employeesalarie->transport_allowance}}%</td>
        <td>{{$employeesalarie->medical_allowance}}%</td>
        <td>{{$employeesalarie->education_allowance}}%</td>
        <td>{{$employeesalarie->food_allowance}}%</td>
        <td>{{$employeesalarie->child_care_allowance}}%</td>
        
        

        
        <td>
            <div class="divc">
               <a href='{{url("employeesalaries/$employeesalarie->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                 <!-- <a href='{{url("employeesalaries/$employeesalarie->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>  -->

                <form action="{{route('employeesalaries.destroy',$employeesalarie->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>  
                
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="12">No employeesalaries available.</td>
    </tr>
    @endforelse
</table>
</div>

@endsection