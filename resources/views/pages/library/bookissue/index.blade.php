@extends('layouts.master')
@section('page')


<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Book Issues Information</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('bookissues/create') }}">
        <span>Add Book Issue</span>
    </a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Book ID</th>
        <th>Student ID</th>
        <th>Issue Date</th>
        <th>Due Date</th>
        <th>Return Date</th>
        <th>Fine</th>
        <th>Return Status</th>

        <th>Action</th>
   </tr>
    @forelse($bookissues as $bookissue)
    <tr>
            <td>{{ $bookissue->id }}</td>
            <td>{{ $bookissue->book->title }}</td>
            <td>{{ $bookissue->student->name }}</td>
            <td>{{ $bookissue->issue_date }}</td>
            <td>{{ $bookissue->due_date }}</td>
            <td>{{ $bookissue->return_date ?? 'Not returned' }}</td>
            <td>{{ number_format($bookissue->fine, 2) }}</td>

            <td>
                    @if(!$bookissue->return_date)
                        <a href="{{ route('bookissues.return', $bookissue->id) }}" onclick="return confirm('Mark book as returned?')">Return</a>
                    @else
                        Returned
                    @endif
            </td>

            <td>
                <div class="divc">
                <a href='{{url("bookissues/$bookissue->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                    <!-- <a href='{{url("bookissues/$bookissue->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                    <form action="{{route('bookissues.destroy',$bookissue->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="buttonc"><i class='bx bxs-trash'></i></button>
                    </form> 
                    
                </div>
            </td>
    
    </tr>



    @empty
    <tr>
        <td colspan="9">No bookissues available.</td>
    </tr>
    @endforelse
</table>

<div style="margin-top:10px;">
{{ $bookissues->links('pagination::bootstrap-5') }}
</div>
@endsection