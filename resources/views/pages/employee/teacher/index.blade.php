@extends('layouts.master')
@section('page')


<div class="divbi">
     <span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Teachers List</span>
     <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
     <form method="GET" action="{{ route('teachers.index') }}" >
                <input type="text" name="em_id" placeholder=" Em. Id..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
            <span style=" font-weight: bold; color: #555;">OR</span>    <input type="text" name="em_name" placeholder=" Em. Name..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
                <button type="submit" class="buttonbis">
                    <span>Search</span> 
               </button>
     </form>
    
     <!--{ <a class="buttonbi" href="{{ url('teachers/create') }}">
        <span>Employee Add</span>
     </a> }-->
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Photo</th>
        <th>Qualification</th>
        <th>Joing Date</th>
        <th>Teacher Shift</th>
        <th>Category</th>
        <th>Con. Num.</th>
        <!-- <th>Address</th> -->
        <th>Acttion</th>
    </tr>
    @forelse($teachers as $teacher)
    
    <tr>
        <td>{{$teacher->id}}</td>
        <td>{{$teacher->name}}</td>
        <td><img src='{{url("/image/employee_img/$teacher->photo")}}'  alt="" style="width=80px; height:80px" ></td>
        <td>{{$teacher->qualification}}</td>
        <td>{{$teacher->joining_date}}</td>
        <td>{{$teacher->employeeshift->name}}</td>
        <td>{{$teacher->employee_categorie->name}}</td>
        <td>{{$teacher->phone_number}}</td>
        <!-- <td>{{$teacher->address}}</td> -->
       
        <td>
            <div class="divc">
               <!-- <a href='{{url("teachers/$teacher->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a> -->
                <a href='{{url("teachers/$teacher->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>

                <!-- <form action="{{route('teachers.destroy',$teacher->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                <button class="buttonc" onClick="if( confirm('Are you Sure'))  alert('Item Deleting......')"><i class='bx bxs-trash'></i></button>
                </form> -->
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="9">No classes available.</td>
    </tr>
    @endforelse
</table>
<div style="margin-top:10px;">
{{ $teachers ->links('pagination::bootstrap-5') }}
</div>



@endsection