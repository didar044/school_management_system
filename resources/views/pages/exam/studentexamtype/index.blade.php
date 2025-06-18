@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">List Of Exam</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('studentexamtypes/create') }}">
        <span>Add Exam Type</span>
    </a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Exam Name</th>
        <th>Term </th>
        <th>Session Year</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Pass Marks</th>
        <th>Marks <sub>(P.S)</sub></th>
        <th>Remark</th>
        <th>Acttion</th>
    </tr>
    @forelse($studentexamtypes as $studentexamtype)
    <tr>
        <td>{{$studentexamtype->id}}</td>
        <td>{{$studentexamtype->name}}</td>
        <td>{{$studentexamtype->term}}</td>
        <td>{{$studentexamtype->session_year}}</td>
        <td>{{$studentexamtype->start_date}}</td>
        <td>{{$studentexamtype->end_date}}</td>
        <td>{{$studentexamtype->pass_marks}}</td>
        <td>{{$studentexamtype->max_number}}</td>
        <td>{{$studentexamtype->remark}}</td>
        <td>
            <div class="divc">
               <a href='{{url("studentexamtypes/$studentexamtype->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("studentexamtypes/$studentexamtype->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('studentexamtypes.destroy',$studentexamtype->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form> 
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="9">No studentexamtypes available.</td>
    </tr>
    @endforelse
</table>


@endsection