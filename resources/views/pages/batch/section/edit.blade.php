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
select {
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
<a class="buttonbi" href="{{ url('sections') }}"><span>Back to Seation List</span></a> 
</div>


<div class="form-container">
    <h2>Edit Core Section</h2>
    <form action="{{ url('sections/'. $sections->id) }}" method="post" class="product-form" enctype="multipart/form-data">
       @csrf
       @method("PUT")
      <label for="name">Section Name</label>
      <input type="text" id="name" name="name" value="{{$sections->name}}">

      <label for="shift_id">Shift</label>
      <select id="shift_id" name="shift_id" >
        @foreach($shifts as $shift)
        <option value="{{$shift->id}}" {{$sections->shift->id == $shift->id?'selected':''}}>{{$shift->name}}</option>
        @endforeach
      </select> <br> <br>

      <button type="submit" class="buttonbis" value="update"><span>Submit</span></button>
    </form>
</div>


@endsection