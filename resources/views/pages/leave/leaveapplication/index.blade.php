@extends('layouts.master')
@section('page')

<style>
    .badge1 {
  display: inline-block;
  padding: 0.35em 0.65em;
  font-size: 0.90em;
  font-weight: 700;
  color:white;
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: 0.375rem;
}
</style>

<div class="divbi">
     <span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Leave Applications  List</span>
     <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
     <a class="buttonbi" href="{{ url('leaveapplications/create') }}">
        <span>Applications</span>
     </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Em/St Id</th>
        <th>Person Type</th>
        <th>Categorie</th>
        <th>Days</th>
        <th>Application Date</th>
        <th>Form Date</th>
        <th>To Date</th>
        <th>Remark</th>
        <th>Stutas</th>
        <th>Action</th>
    </tr>
    @forelse($leaveapplications as $leaveapplication)
    
    <tr>
        <td>{{$leaveapplication->id}}</td>

        <td> {{$leaveapplication->employee->name ?? $leaveapplication->student->name}}</td>
        <td>{{$leaveapplication->person_type}}</td>
        <td>{{$leaveapplication->leavecategorie->name }}</td>
        <td>{{$leaveapplication->days}}</td>
        <td>{{$leaveapplication->date}}</td>
        <td>{{$leaveapplication->from_date}}</td>
        <td>{{$leaveapplication->to_date}}</td>
        <td>{{$leaveapplication->remark}}</td>
        <td>



               
                        <span class="badge1" style="background-color: {{ $leaveapplication->status == 'Approved' ? '#198754' : ($leaveapplication->status == 'Rejected' ? '#990000' : '#f0ad4e') }};">

                                        {{ $leaveapplication->status }} 
                        </span>
                
                
                        @if($leaveapplication->status === 'Pending')


                            
                            <!-- Approve: Should use POST, not PUT, if targeting 'store' route -->
                            <form method="POST" action="{{ route('leaveapplications.update', $leaveapplication->id) }}" style="display:inline;">
                                @csrf
                                @method('PUT')
                                
                                <input type="hidden" name="status" value="Rejected">
                                <button class="buttonc"><i> Reject</i></button>
                              
                            </form>

                            <!-- Reject: This can stay as PUT if 'update' is correctly defined -->
                            <form method="POST" action="{{ route('leavetransactions.update', $leaveapplication->id) }}" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Approved">
                                <button class="buttonc"><i>Approve</i></button>
                            </form>
                        @endif
        </td>
        
        
        <td>
            <div class="divc">
               <!-- <a href='{{url("leaveapplications/$leaveapplication->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <a href='{{url("leaveapplications/$leaveapplication->id")}}'><button class="buttonc"><i  class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('leaveapplications.destroy',$leaveapplication->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                <button class="buttonc" onClick="if( confirm('Are you Sure'))  alert('Item Deleting......')"><i class='bx bxs-trash'></i></button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="10">No classes available.</td>
    </tr>
    @endforelse
</table>
</div>



@endsection