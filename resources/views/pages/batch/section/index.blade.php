@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">About Sections</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('sections/create') }}">
        <span>Add Section</span>
    </a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Section</th>
        <th>Shift</th>
        <th>Acttion</th>
    </tr>
    @forelse($sections as $section)
    <tr>
        <td>{{$section->id}}</td>
        <td>{{$section->name}}</td>
        <td>{{$section->shift->name}}</td>
        <td>
            <div class="divc">
               <a href='{{url("sections/$section->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
               
                <a href='{{url("sections/$section->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>

                <form action="{{route('sections.destroy',$section->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>  
                
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4">No sections available.</td>
    </tr>
    @endforelse
</table>


@endsection