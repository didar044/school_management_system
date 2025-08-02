@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Payment Method Information</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('paymentmethods/create') }}">
        <span>Add Payment Method</span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Method</th>
        <th>Type</th>
        <th>Details</th>
        <th>Status</th>
        <th>Acttion</th>
    </tr>
    @forelse($paymentmethods as $paymentmethod)
    <tr>
        <td>{{$paymentmethod->id}}</td>
        <td>{{$paymentmethod->name}}</td>
        <td>{{$paymentmethod->type}}</td>
        <td>{{$paymentmethod->details}}</td>
        <td><span class="badge {{ $paymentmethod->status ? 'bg-success' : 'bg-danger' }}">{{ $paymentmethod->status ? 'Active' : 'Inactive' }}</span></td>
        <td>
            <div class="divc">
               <a href='{{url("paymentmethods/$paymentmethod->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("paymentmethods/$paymentmethod->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('paymentmethods.destroy',$paymentmethod->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form> 
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6">No paymentmethods available.</td>
    </tr>
    @endforelse
</table>
</div>

@endsection