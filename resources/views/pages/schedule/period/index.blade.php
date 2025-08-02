@extends('layouts.master')
@section('page')



<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Period List</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('periods/create') }}">
        <span>Add Period</span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Period</th>
        <th>Period Start</th>   
        <th>Period End</th>
        
        <th>Acttion</th>
    </tr>
    @forelse($periods as $period)
    <tr>
        <td>{{$period->id}}</td>
        <td>{{$period->name}}</td>
        <td>{{$period->period_start}}</td>
        <td>{{$period->period_end}}</td>
        
        <td>
            <div class="divc">
               <a href='{{url("periods/$period->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("periods/$period->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('periods.destroy',$period->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form>  
                
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">No periods available.</td>
    </tr>
    @endforelse
</table>
</div>


@endsection