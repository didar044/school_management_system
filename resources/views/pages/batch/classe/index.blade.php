@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Class Information</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('classes/create') }}">
        <span>Add Class</span>
    </a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Class</th>
        <th>Acttion</th>
    </tr>
    @forelse($classes as $class)
    <tr>
        <td>{{$class->id}}</td>
        <td>{{$class->name}}</td>
        <td>
            <div class="divc">
               <a href='{{url("classes/$class->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <a href='{{url("classes/$class->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>

                <form action="{{route('classes.destroy',$class->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">No classes available.</td>
    </tr>
    @endforelse
</table>


@endsection