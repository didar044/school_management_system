@extends('layouts.master')
@section('page')


<div class="divbi">
   <span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Book List</span>
  
               <form method="GET" action="{{ route('books.index') }}" >
                           <!-- <input type="text" name="ap_id" placeholder=" Ap. Id..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
                         <span style=" font-weight: bold; color: #555;">OR</span>   -->
                           <input type="text" name="title" placeholder=" Book Name..." value="{{ request('search') }}" style="width: 180px ; height:40px; border-radius: 5px;">
                <button type="submit" class="buttonbis">
                    <span>Search</span> 
               </button>
             </form>


    <a class="buttonbi" href="{{ url('books/create') }}">
        <span>Add Book</span>
    </a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Publisher</th>
        <th>Publishe Year</th>
        <th>Total Copies </th>
        <th>Copies Available</th>
        <th>Acttion</th>
    </tr>
    @forelse($books as $book)
    <tr>
        <td>{{$book->id}}</td>
        <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        <td>{{$book->isbn}}</td>
        <td>{{$book->publisher}}</td>
        <td>{{$book->year_published}}</td>
        <td>{{$book->copies_total}}</td>
        <td>{{$book->copies_available}}</td>
        <td>
            <div class="divc">
               <a href='{{url("books/$book->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("books/$book->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('books.destroy',$book->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form> 
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="9">No books available.</td>
    </tr>
    @endforelse
</table>



<div style="margin-top:10px;">
{{ $books->links('pagination::bootstrap-5') }}
</div>





@endsection