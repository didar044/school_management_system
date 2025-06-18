@extends('layouts.master')
@section('page')


<div class="divbi">
     <span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;"> Student Fees Collection List</span>
     <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
     <form method="GET" action="{{ route('feecollections.index') }}" >
                <input type="text" name="st_id" placeholder=" St. Id..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
               <span style=" font-weight: bold; color: #555;">OR</span>
               <input type="text" name="st_name" placeholder=" St. Name..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
                <button type="submit" class="buttonbis">
                    <span>Search</span> 
               </button>
     </form>
     
     <a class="buttonbi" href="{{ url('feecollections/create') }}">
        <span>Fees Collection</span>
     </a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Student Id</th>
        <th>payment_method</th>
        <th>Reference Nu.</th>
        <th>Payment Date</th>
        <th>Total Amount</th>
        <th>Paid Amount</th>
        <th>Due Amount</th>
        <th>Money receipt</th>
    </tr>
    @forelse($studentpayments as $studentpayment)
    
    <tr>
        <td>{{$studentpayment->id}}</td>
        <td>{{$studentpayment->name}}</td>
        <td>{{$studentpayment->student_id}}</td>
        <td>{{$studentpayment->paymentmethod->name }}</td>
        <td>{{$studentpayment->reference_number}}</td>
        <td>{{$studentpayment->payment_date}}</td>
        <td>{{$studentpayment->total_amount}}</td>
        <td>{{$studentpayment->paid_amount}}</td>
        <td>{{$studentpayment->due_amount}}</td>
        
        
        <td>
            <div class="divc">
               <!-- <a href='{{url("studentpayments/$studentpayment->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a> -->
                <a href='{{url("feecollections/$studentpayment->id")}}'><button class="buttonc"><i class="bi bi-printer-fill"></i></button></a>

                <form action="{{route('studentpayments.destroy',$studentpayment->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                <!-- <button class="buttonc" onClick="if( confirm('Are you Sure'))  alert('Item Deleting......')"><i class='bx bxs-trash'></i></button> -->
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="10">No classes available.</td>
    </tr>
    @endforelse
</table>



<div style="margin-top:10px;">
{{ $studentpayments->links('pagination::bootstrap-5') }}
</div>
@endsection