@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Leave Categorie Information</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('leavecategories/create') }}">
        <span>Add Leave Categorie</span>
    </a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Leave Categorie</th>
        <th>Days</th>
        <th>Acttion</th>
    </tr>
    @forelse($leavecategories as $leavecategorie)
    <tr>
        <td>{{$leavecategorie->id}}</td>
        <td>{{$leavecategorie->name}}</td>
         <td>{{$leavecategorie->days}}</td>
        <td>
            <div class="divc">
               <a href='{{url("leavecategories/$leavecategorie->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("leavecategories/$leavecategorie->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('leavecategories.destroy',$leavecategorie->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form> 
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4">No leavecategories available.</td>
    </tr>
    @endforelse
</table>


@endsection