@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Shift Information</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('shifts/create') }}">
        <span>Add Shift</span>
    </a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Shift</th>
        <th>Acttion</th>
    </tr>
    @forelse($shifts as $shift)
    <tr>
        <td>{{$shift->id}}</td>
        <td>{{$shift->name}}</td>
        <td>
            <div class="divc">
               <a href='{{url("shifts/$shift->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <a href='{{url("shifts/$shift->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>

                <form action="{{route('shifts.destroy',$shift->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form> 
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">No Shifts available.</td>
    </tr>
    @endforelse
</table>


@endsection