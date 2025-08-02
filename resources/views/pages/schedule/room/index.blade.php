@extends('layouts.master')
@section('page')



<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Room List</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('rooms/create') }}">
        <span>Add Room</span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Room Number</th>
        <th>Capcity</th>
        <th>Description</th>   
        <th>Building Name</th>
        
        <th>Acttion</th>
    </tr>
    @forelse($rooms as $room)
    <tr>
        <td>{{$room->id}}</td>
        <td>{{$room->capacity}}</td>
        <td>{{$room->description}}</td>
        <td>{{$room->building}}</td>
        
        <td>
            <div class="divc">
               <a href='{{url("rooms/$room->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("rooms/$room->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('rooms.destroy',$room->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>  
                
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">No rooms available.</td>
    </tr>
    @endforelse
</table>
</div>
<div style="margin-top:10px;">
{{ $rooms->links('pagination::bootstrap-5') }}
</div>


@endsection