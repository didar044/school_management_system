@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Subject List</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('subjects/create') }}">
        <span>Add Subject</span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Subject Code</th>
        <th>subject</th>
        <th>Description</th>
        <th>Acttion</th>
    </tr>
    @forelse($subjects as $subject)
    <tr>
        <td>{{$subject->id}}</td>
        <td>{{$subject->name}}</td>
        
        <td>{{$subject->description}}</td>
        <td>
            <div class="divc">
               <a href='{{url("subjects/$subject->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("subjects/$subject->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('subjects.destroy',$subject->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>  
                
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4">No subjects available.</td>
    </tr>
    @endforelse
</table>
</div>

@endsection