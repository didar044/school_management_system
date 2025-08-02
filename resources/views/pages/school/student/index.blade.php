@extends('layouts.master')
@section('page')


<div class="divbi">
     <span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Students List</span>
     <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
     
       <form method="GET" action="{{ route('students.index') }}" >
                <input type="text" name="student_id" placeholder=" Student Id..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
                <input type="text" name="student_name" placeholder=" Student Name..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
                <button type="submit" class="buttonbis">
                    <span>Search</span> 
               </button>
        </form>
     
     <a class="buttonbi" href="{{ url('/') }}">
        <span>Home</span>
     </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>St. Id</th>
        <th>Name</th>
        <th>Photo</th>
        <th>Class</th>
        <th>Shift</th>
        <th>Con.Num.</th>
        <th>Address</th>
        <th>Acttion</th>
    </tr>
    @forelse($students as $student)
    
    <tr>
        <td>{{$student->id}}</td>
        <td>{{$student->name}}</td>
        <td><img src='{{url("/image/appplication_img/$student->photo") ?? null}}'  alt=""  height=70px; width=100px;  ></td>
        <td>{{$student->class->name ?? null}}</td>
        <td>{{$student->shift->name ?? null}}</td>
        <td>{{$student->mobile_number ?? null}}</td>
        <td>{{$student->address ?? null}}</td>
        <td>
            <div class="divc">
               <a href='{{url("students/$student->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <a href='{{url("students/$student->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>

                <form action="{{route('students.destroy',$student->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                <button class="buttonc" onClick="if( confirm('Are you Sure'))  alert('Item Deleting......')"><i class='bx bxs-trash'></i></button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="8">No classes available.</td>
    </tr>
    @endforelse
</table>
</div>
<div style="margin-top:10px;">
{{ $students->links('pagination::bootstrap-5') }}
</div>


@endsection