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

.product-form input[type="text"] ,textarea{
    width: 100%;
    padding: 8px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 15px;
    font-size: 16px;
}
</style>

<div class="divbi">   
<a class="buttonbi" href="{{ url('frequences') }}"><span>Class List</span></a> 
</div>


<form action="{{ url('frequences/'.$frequence->id) }}" method="post" class="product-form" enctype="multipart/form-data">
  @csrf
        @method("PUT")
  <label for="name">Type Name</label><br>
  <input type="text" name="name" id="name" value="{{ $frequence->typeName }}" /><br><br>
  <label for="name">Frequency</label><br>
  <input type="text" name="frequency" id="name" value="{{ $frequence->frequency }}"  /><br><br>
  <label for="name">Description</label><br>
  <textarea name="description" id="name" >{{ $frequence->description }}</textarea>
  <br><br>
  <button type="submit" class="buttonbis" value="save"><span>Submit</span></button>
</form>

@endsection