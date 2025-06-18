@extends('layouts.master')
@section('page')



<div class="divbi">
     <span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Leave Leave Transaction  List</span>
     <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
     <!-- <a class="buttonbi" href="{{ url('leavetransactions/create') }}">
        <span>Applications</span>
     </a> -->
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Em/St Name</th>
        <th>Application Id</th>
        <th>Categorie</th>
        <th>Days</th>
        <th>Application Date</th>
        <th>Form Date</th>
        <th>To Date</th>
        <th>Remark</th>
        
        <th>Action</th>
    </tr>
    @forelse($leavetransactions as $leavetransaction)
    
    <tr>
        <td>{{$leavetransaction->id}}</td>
        <td> {{$leavetransaction->employee->name ?? $leavetransaction->student->name}}</td>
         <td>{{$leavetransaction->leave_application_id}}</td>
         <td>{{$leavetransaction->leavecategorie->name }}</td>
        <td>{{$leavetransaction->days}}</td>
        <td>{{$leavetransaction->date}}</td>
        <td>{{$leavetransaction->from_date}}</td>
        <td>{{$leavetransaction->to_date}}</td>
        <td>{{$leavetransaction->remark}}</td>
      
        
        
        <td>
            <div class="divc">
               <!-- <a href='{{url("leavetransactions/$leavetransaction->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <a href='{{url("leavetransactions/$leavetransaction->id")}}'><button class="buttonc"><i  class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('leavetransactions.destroy',$leavetransaction->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                <button class="buttonc" onClick="if( confirm('Are you Sure'))  alert('Item Deleting......')"><i class='bx bxs-trash'></i></button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="9">No classes available.</td>
    </tr>
    @endforelse
</table>




@endsection