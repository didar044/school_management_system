@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Employee Providentfund Information</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <!-- <a class="buttonbi" href="{{ url('employeeprovidentfunds/create') }}">
        <span>Add employee providentfund</span>
    </a> -->


    <form method="GET" action="{{ route('employeeprovidentfunds.index') }}" >
                <input type="text" name="search" placeholder=" Employee Id..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
                <button type="submit" class="buttonbi" style="width:100px">
                    <span>Search</span> 
               </button>
   </form>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Employee Id</th>
        <th>Payment Date</th>
        <th>Payment Id</th>
        <th>Month</th>
        <th>Fund Ammount</th>
        <!-- <th>Acttion</th> -->
    </tr>
    @forelse($employeeprovidentfunds as $employeeprovidentfund)
    <tr>
        <td>{{$employeeprovidentfund->id}}</td>
        <td>{{$employeeprovidentfund->name}}</td>
        <td>{{$employeeprovidentfund->employee_id}}</td>
        <td>{{$employeeprovidentfund->payment_date}}</td>
        <td>{{$employeeprovidentfund->employee_salary_payment_id}}</td>
        <td>{{$employeeprovidentfund->employeefestivalbonuse->month}}</td>
        <td>{{$employeeprovidentfund->provident_fund}}</td>
        <!-- <td>
            <div class="divc">
               <a href='{{url("employeeprovidentfunds/$employeeprovidentfund->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <a href='{{url("employeeprovidentfunds/$employeeprovidentfund->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>

                <form action="{{route('employeeprovidentfunds.destroy',$employeeprovidentfund->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form> 
                 
            </div>
        </td> -->
    </tr>
    @empty
    <tr>
        <td colspan="7">No employeeprovidentfunds available.</td>
    </tr>
    @endforelse
</table>
</div>

@endsection