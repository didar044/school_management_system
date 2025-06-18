@extends('layouts.master')
@section('page')


<div class="divbi">   
<a class="buttonbi" href="{{ url('shifts') }}"><span>Class List</span></a> 
</div>




<form action="{{ url('shifts/'. $shifts->id) }}" method="POST" enctype="multipart/form-data"  class="product-form" >
@csrf
 @method("PUT")
  <label for="name">Class</label><br>
     
     <input type="text" name="name" value="{{$shifts->name}}" ><br><br>
     
   <button type="submit" class="buttonbis" ><span>Update</span></button> 
</form>


@endsection