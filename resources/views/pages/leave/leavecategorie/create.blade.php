@extends('layouts.master')
@section('page')


<div class="divbi">   
<a class="buttonbi" href="{{ url('leavecategories') }}"><span>Back To List</span></a> 
</div>


<form action="{{ url('leavecategories') }}" method="post" class="product-form" enctype="multipart/form-data">
  @csrf
  <label for="name">Leave Categorie</label><br>
  <input type="text" name="name" id="name" /><br><br>
  <label for="name">Days</label><br>
  <input type="number" name="days" id="name" /><br><br>
  <button type="submit" class="buttonbis" value="save"><span>Submit</span></button>
</form>

@endsection