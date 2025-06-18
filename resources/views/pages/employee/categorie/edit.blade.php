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
<a class="buttonbi" href="{{ url('categories') }}"><span>Class List</span></a> 
</div>




<form action="{{ url('categories/'. $categories->id) }}" method="POST" enctype="multipart/form-data"  class="product-form" >
@csrf
 @method("PUT")
  <label for="name">Class</label><br>
     
     <input type="text" name="name" value="{{$categories->name}}" ><br><br>

     <label for="name">Salary</label><br>
     
     <input type="text" name="salary" value="{{$categories->salary}}" ><br><br>

     <label for="name">Description</label><br>
     
     <input type="text" name="description" value="{{$categories->description}}" ><br><br>
     
   <button type="submit" class="buttonbis" value="update" ><span>Update</span></button> 
</form>


@endsection