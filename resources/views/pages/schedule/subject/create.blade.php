@extends('layouts.master')
@section('page')
<style>
  .form-container {
      background-color: white;
      max-width: 400px;
      margin: 20px auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      
    }
    
.form-container h2 {
  margin-bottom: 20px;
  font-size: 24px;
  color: #333;
  text-align: center;
}

label {
  display: block;
  margin-bottom: 6px;
  color: #555;
  font-weight: 600;
}

input[type="text"],
 textarea{
  width: 100%;
  padding: 10px 12px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 15px;
  box-sizing: border-box;
}
</style>


<div class="divbi">   
<a class="buttonbi" href="{{ url('subjects') }}"><span>Back to Sublist List</span></a> 
</div>


<div class="form-container">
    <h2>Add  Subject</h2>
    <form action="{{ url('subjects') }}" method="post" class="product-form" enctype="multipart/form-data">
       @csrf
       <label for="name">Subject Code</label>
      <input type="text" id="id" name="id" required>
      <label for="name">Subject Name</label>
      <input type="text" id="name" name="name" required>
      <label for="shift_id">Description</label>
      <textarea type="text" id="description" name="description"></textarea>
        
      <br> <br>

      

      <button type="submit" class="buttonbis" value="save"><span>Submit</span></button>
    </form>
</div>


@endsection