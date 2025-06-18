@extends('layouts.master')
@section('page')


<div class="divbi">   
<a class="buttonbi" href="{{ url('paymentmethods') }}"><span>Back To List</span></a> 
</div>




<form action="{{ url('paymentmethods/'. $paymentmethods->id) }}" method="POST" enctype="multipart/form-data"  class="product-form" >
@csrf
 @method("PUT")
  <label for="name">Method</label><br>    
  <input type="text" name="name" value="{{$paymentmethods->name}}" ><br><br>
    <label for="type">Type</label><br>    
  <input type="text" name="type" value="{{$paymentmethods->type}}" ><br><br>
    <label for="details">Details</label><br>  
    <textarea  name="details" value="{{$paymentmethods->details}}" ></textarea>  
  <br><br>
    <label for="name">Status</label><br>    
  <input type="text" name="status" value="{{$paymentmethods->status}}" ><br><br>
     
   <button type="submit" class="buttonbis" ><span>Update</span></button> 
</form>


@endsection