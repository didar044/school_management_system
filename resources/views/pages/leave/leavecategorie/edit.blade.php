@extends('layouts.master')
@section('page')



<div class="divbi">   
<a class="buttonbi" href="{{ url('leavecategories') }}"><span>Class List</span></a> 
</div>




<form action="{{ url('leavecategories/'. $leavecategories->id) }}" method="POST" enctype="multipart/form-data"  class="product-form" >
@csrf
 @method("PUT")
  <label for="name">Leave Categorie</label><br>
     
     <input type="text" name="name" value="{{$leavecategories->name}}" ><br><br>
     <label for="name">Days</label><br>
     
     <input type="text" name="days" value="{{$leavecategories->days}}" ><br><br>
     
   <button type="submit" class="buttonbis" ><span>Update</span></button> 
</form>


@endsection