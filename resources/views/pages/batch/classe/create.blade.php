@extends('layouts.master')
@section('page')
<style>
    .product-form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    font-family: Arial, sans-serif;
}

.product-form label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.product-form input[type="text"] {
    width: 100%;
    padding: 8px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 15px;
    font-size: 16px;
}
</style>

<div class="divbi">   
<a class="buttonbi" href="{{ url('classes') }}"><span>Class List</span></a> 
</div>


<form action="{{ url('classes') }}" method="post" class="product-form" enctype="multipart/form-data">
  @csrf
  <label for="name">Name</label><br>
  <input type="text" name="name" id="name" /><br><br>
  <button type="submit" class="buttonbis" value="save"><span>Submit</span></button>
</form>

@endsection