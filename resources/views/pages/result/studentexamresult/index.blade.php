@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Result List</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('studentexamresults/create') }}">
        <span>Add Exam Marks</span>
    </a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Student Name</th>
        <th>Student Id</th>
        <th>Exam Name</th>
        <th>Total Mark</th>
        <th>Average Mark</th>
        <th>GPA</th>
        <th>Grad</th>
        <th>Exam Year</th>
        <th>Remark</th>
        <th>Acttion</th>
    </tr>
    @forelse($studentexamresults as $studentexamresult)
    <tr>
        <td>{{$studentexamresult->id}}</td>
        <td>{{$studentexamresult->student->name}}</td>
         <td>{{$studentexamresult->student->id}}</td>
        <td>{{$studentexamresult->examType->name}}</td>
        <td>{{$studentexamresult->total_marks}}</td>
        <td>{{$studentexamresult->average_marks}}</td>
        <td>{{$studentexamresult->gpa}}</td>
        <td>{{$studentexamresult->grade}}</td>
        <td>{{$studentexamresult->exam_year}}</td>
        <td>{{$studentexamresult->remark}}</td>
        <td>
            <div class="divc">
               <a href='{{url("studentexamresults/$studentexamresult->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <a href='{{url("studentexamresults/$studentexamresult->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>

                <form action="{{route('studentexamresults.destroy',$studentexamresult->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form> 
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="10">No studentexamresults available.</td>
    </tr>
    @endforelse
</table>


@endsection