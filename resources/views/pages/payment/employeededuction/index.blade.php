@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Salary Deducations Table</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('employeedeductions/create') }}">
        <span>Add Deducation</span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Categorie</th>
        <th>Basic Salary</th>
        <th>Tax D.</th>
        <th>Absences D.</th>
        <th>Fine D.</th>
        <th>Provindent D.</th>
        <th>Acttion</th>
    </tr>
    @forelse($employeedeductions as $employeededuction)
    <tr>
        <td>{{$employeededuction->id}}</td>
        <td>{{$employeededuction->employee_categorie->name}}</td>
        <td>{{$employeededuction->employee_categorie->salary}}</td>
        <td>{{$employeededuction->tax}}%</td>
        <td>{{$employeededuction->absence}}</td>
        <td>{{$employeededuction->fine}}</td>
        <td>{{$employeededuction->provident_fund}}%</td>
        

        
        <td>
            <div class="divc">
               <a href='{{url("employeedeductions/$employeededuction->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                 <!-- <a href='{{url("employeedeductions/$employeededuction->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>  -->

                <form action="{{route('employeedeductions.destroy',$employeededuction->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>  
                
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="8">No employeedeductions available.</td>
    </tr>
    @endforelse
</table>
</div>

@endsection