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
select, input[type="time"] {
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
<a class="buttonbi" href="{{ url('periods') }}"><span>Back to  List</span></a> 
</div>


<div class="form-container">
    <h2>Add Period</h2>
    <form action="{{ url('periods') }}" method="post" class="product-form" enctype="multipart/form-data">
       @csrf
      <label for="name">Period Name</label>
      <input type="text" id="name" name="name" required>

      <label for="period_id">Period Start</label>
       <input type="time" id="period_start" name="period_start">  <br> <br>
       

        <label for="period_id">Period End</label>
       <input type="time" id="period_start" name="period_end">   <br> <br>
      

      

      <button type="submit" class="buttonbis" value="save"><span>Submit</span></button>
    </form>
</div>


@endsection