@extends('layouts.master')
@section('page')


<div class="divbi">   
<a class="buttonbi" href="{{ url('employeefestivalbonuses') }}"><span>Back To  List</span></a> 
</div>




<form action="{{ url('employeefestivalbonuses/'. $employeefestivalbonuses->id) }}" method="POST" enctype="multipart/form-data"  class="product-form" >
@csrf
 @method("PUT")

  <label for="name">Month</label><br>

    <select name="month" id="month">
        <option value="January" {{ $employeefestivalbonuses->month == 'January' ? 'selected' : '' }}>January</option>
        <option value="February" {{ $employeefestivalbonuses->month == 'February' ? 'selected' : '' }}>February</option>
        <option value="March" {{ $employeefestivalbonuses->month == 'March' ? 'selected' : '' }}>March</option>
        <option value="April" {{ $employeefestivalbonuses->month == 'April' ? 'selected' : '' }}>April</option>
        <option value="May" {{ $employeefestivalbonuses->month == 'May' ? 'selected' : '' }}>May</option>
        <option value="June" {{ $employeefestivalbonuses->month == 'June' ? 'selected' : '' }}>June</option>
        <option value="July" {{ $employeefestivalbonuses->month == 'July' ? 'selected' : '' }}>July</option>
        <option value="August" {{ $employeefestivalbonuses->month == 'August' ? 'selected' : '' }}>August</option>
        <option value="September" {{ $employeefestivalbonuses->month == 'September' ? 'selected' : '' }}>September</option>
        <option value="October" {{ $employeefestivalbonuses->month == 'October' ? 'selected' : '' }}>October</option>
        <option value="November" {{ $employeefestivalbonuses->month == 'November' ? 'selected' : '' }}>November</option>
        <option value="December" {{ $employeefestivalbonuses->month == 'December' ? 'selected' : '' }}>December</option>
    </select><br><br>

    <!-- <select name="month" id="month">
        @php
            $months = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
        @endphp

        @foreach ($months as $month)
            <option value="{{ $month }}" {{ $employeefestivalbonuses->month == $month ? 'selected' : '' }}>
                {{ $month }}
            </option>
        @endforeach
    </select><br><br> -->

 


  <label for="name">Festival</label><br>
     
  <input type="text" name="festival_name" value="{{$employeefestivalbonuses->festival_name}}" ><br><br>

  <label for="name">Bonus</label><br>
     
  <input type="text" name="bonus_amount" value="{{$employeefestivalbonuses->bonus_amount}}" ><br><br>
     
<button type="submit" class="buttonbis" ><span>Update</span></button> 
</form>


@endsection