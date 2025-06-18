@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Salary Allowances Table</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('employeesalarypayments/create') }}">
        <span> Salary Payment</span>
    </a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Em. Name</th>
        <th>Payment Date</th>
        <th>Salary Issuer</th>
        <th>Salary Month</th>
        <th>Payment Method</th>
        <th>Reference</th>
        <th>Total Allowances</th>
        <th>Total Deductions</th>
        <th>Net Salary</th>
        
        
        <th>Payment Receipt</th>
    </tr>
    @forelse($employeesalarypayments as $employeesalarypayment)
    <tr>
        <td>{{$employeesalarypayment->id}}</td>
        <td>{{$employeesalarypayment->name}}</td>
        <td>{{$employeesalarypayment->payment_date}}</td>
        <td>{{$employeesalarypayment->employeeadministrator->name}}</td>
        <td>{{$employeesalarypayment->employeefestivalbonuse->month}}</td>
        <td>{{$employeesalarypayment->paymentmethod->name}}</td>
        <td>{{$employeesalarypayment->reference}}</td>
        <td>{{$employeesalarypayment->total_amount}}</td>
        <td>{{$employeesalarypayment->total_deductions}}</td>
        <td>{{$employeesalarypayment->net_salary}}</td>


        
        
      
        

        
        <td>
            <div class="divc">
               <!-- <a href='{{url("employeesalarypayments/$employeesalarypayment->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a> -->
                 <!-- <a href='{{url("employeesalarypayments/$employeesalarypayment->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>  -->
                  <a href='{{url("employeesalarypayments/$employeesalarypayment->id")}}'><button class="buttonc"><i class="bi bi-printer-fill"></i></button></a>

                <!-- <form action="{{route('employeesalarypayments.destroy',$employeesalarypayment->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>   -->
                
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="12">No employeesalarypayments available.</td>
    </tr>
    @endforelse
</table>


@endsection