@extends('layouts.master')
@section('page')


<div class="divbi">   
<a class="buttonbi" href="{{ url('paymentmethods') }}"><span>Back To  List</span></a> 
</div>


<form action="{{ url('paymentmethods') }}" method="post" class="product-form" enctype="multipart/form-data">
  @csrf
  <label for="name">Methode</label><br>
  <input type="text" name="name" id="name" /><br><br>
  <label for="name">Type</label><br>
  <input type="text" name="type" id="type" /><br><br>
  <label for="name">Details</label><br>
  <textarea  name="details" id="details"></textarea><br><br>
  <label for="status">Status</label><br>
  <input type="text" name="status" id="status" /><br><br>
  <button type="submit" class="buttonbis" value="save"><span>Submit</span></button>
</form>

@endsection