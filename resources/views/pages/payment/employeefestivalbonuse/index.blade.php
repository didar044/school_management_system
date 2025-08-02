@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Employee Festival Bonuse Information</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('employeefestivalbonuses/create') }}">
        <span>Add Employee Festival Bonuse</span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Month</th>
        <th>Festival</th>
        <th>Bonus</th>
        <th>Acttion</th>
    </tr>
    @forelse($employeefestivalbonuses as $employeefestivalbonuse)
    <tr>
        <td>{{$employeefestivalbonuse->id}}</td>
        <td>{{$employeefestivalbonuse->month}}</td>
        <td>{{$employeefestivalbonuse->festival_name}}</td>
        <td>{{$employeefestivalbonuse->bonus_amount}}%</td>
        <td>
            <div class="divc">
               <a href='{{url("employeefestivalbonuses/$employeefestivalbonuse->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("employeefestivalbonuses/$employeefestivalbonuse->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('employeefestivalbonuses.destroy',$employeefestivalbonuse->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form> 
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">No employeefestivalbonuses available.</td>
    </tr>
    @endforelse
</table>
</div>

@endsection