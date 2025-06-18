@extends('layouts.master')
@section('page')


<div class="divbi">   
<a class="buttonbi" href="{{ url('employeefestivalbonuses') }}"><span>Back To List</span></a> 
</div>


<form action="{{ url('employeefestivalbonuses') }}" method="post" class="product-form" enctype="multipart/form-data">
  @csrf
  <label for="name">Month</label><br>
    <select name="month" id="name" >
            <option value="">-- Select Month --</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
    </select><br><br>
 


  <label for="name">Festival Name</label><br>
  <input type="text" name="festival_name" id="festival_name" /><br><br>

  <label for="name">Bonus </label><br>
  <input type="number" name="bonus_amount" id="bonus_amount" /><br><br>

  <button type="submit" class="buttonbis" value="save"><span>Submit</span></button>
</form>

@endsection