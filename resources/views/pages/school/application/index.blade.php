@extends('layouts.master')
@section('page')


<div class="divbi">
     <span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Applications List</span>
     <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
     <form method="GET" action="{{ route('applications.index') }}" >
                <input type="text" name="ap_id" placeholder=" Ap. Id..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
            <span style=" font-weight: bold; color: #555;">OR</span>    <input type="text" name="ap_name" placeholder=" Ap. Name..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
                <button type="submit" class="buttonbis">
                    <span>Search</span> 
               </button>
     </form>
     <a class="buttonbi" href="{{ url('applications/create') }}">
        <span>Application</span>
     </a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Photo</th>
        <th>Class</th>
        <th>Shift</th>
        <th>Con.Num.</th>
        <th>Address</th>
        <th>Acttion</th>
    </tr>
    @forelse($applications as $application)
    
    <tr>
        <td>{{$application->id}}</td>
        <td>{{$application->name}}</td>
        <td><img src='{{url("/image/appplication_img/$application->photo")}}'  alt=""  height=70px; width=100px; ></td>
        <td>{{$application->classe->name}}</td>
        <td>{{$application->shift->name}}</td>
        <td>{{$application->mobile_number}}</td>
        <td>{{$application->address}}</td>
        <td>
            <div class="divc">
               <a href='{{url("applications/$application->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <a href='{{url("applications/$application->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>

                <form action="{{route('applications.destroy',$application->id)}}" method="post">
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

<div style="margin-top:10px;">
{{ $applications->links('pagination::bootstrap-5') }}
</div>


@endsection