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

.product-form input[type="text"] ,input[type="time"] {
    width: 100%;
    padding: 8px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 15px;
    font-size: 16px;
}
</style>

<div class="divbi">   
<a class="buttonbi" href="{{ url('periods') }}"><span>Class List</span></a> 
</div>




<form action="{{ url('periods/'. $periods->id) }}" method="POST" enctype="multipart/form-data"  class="product-form" >
@csrf
 @method("PUT")
  <label for="name">Period </label><br>
     
     <input type="text" name="name" value="{{$periods->name}}" ><br><br>

     <label for="name">Start</label><br>
     
     <input type="time" name="period_start" value="{{$periods->period_start}}" ><br><br>

     <label for="name">End</label><br>
     
     <input type="time" name="period_end" value="{{$periods->period_end}}" ><br><br>
     
   <button type="submit" class="buttonbis" ><span>Update</span></button> 
</form>


@endsection