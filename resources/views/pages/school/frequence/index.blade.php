@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">About frequences</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('frequences/create') }}">
        <span>Add Frequency</span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Type Name</th>
        <th>Frequenc</th>
        <th>Description</th></th>
        <th>Acttion</th>
    </tr>
    @forelse($frequences as $frequence)
    <tr>
        <td>{{$frequence->id}}</td>
        <td>{{$frequence->typeName}}</td>
        <td>{{$frequence->frequency}}</td>
        <td>{{$frequence->description}}</td>
        <td>
            <div class="divc">
               <!-- <a href='{{url("frequences/$frequence->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a> -->
               
                <!-- <a href='{{url("frequences/$frequence->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('frequences.destroy',$frequence->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>  
                
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">No frequences available.</td>
    </tr>
    @endforelse
</table>
</div>

@endsection