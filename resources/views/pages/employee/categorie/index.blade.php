@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Categorie List</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('categories/create') }}">
        <span>Add Categorie</span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Categorie</th>
        <th>Salary</th>
        <th>Description</th>
        <th>Acttion</th>
    </tr>
    @forelse($categories as $categorie)
    <tr>
        <td>{{$categorie->id}}</td>
        <td>{{$categorie->name}}</td>
        <td>{{$categorie->salary}}</td>
        <td>{{$categorie->description}}</td>
        <td>
            <div class="divc">
               <a href='{{url("categories/$categorie->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("categories/$categorie->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('categories.destroy',$categorie->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>  
                
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4">No categories available.</td>
    </tr>
    @endforelse
</table>
</div>

@endsection