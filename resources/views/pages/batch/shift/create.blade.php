@extends('layouts.master')
@section('page')


<div class="divbi">   
<a class="buttonbi" href="{{ url('shifts') }}"><span>Back To List</span></a> 
</div>


<form action="{{ url('shifts') }}" method="post" class="product-form" enctype="multipart/form-data">
  @csrf
  <label for="name">Name</label><br>
  <input type="text" name="name" id="name" /><br><br>
  <button type="submit" class="buttonbis" value="save"><span>Submit</span></button>
</form>

@endsection