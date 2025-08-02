@extends('layouts.master')
@section('page')

<style>
    
   
    td{
        font-size: 13px;
    }

    th {
        background-color: #e6f9e6;
        font-weight: 900;
        font-size: 14px;
    }

</style>

<div class="divbi">
<span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Expenses List</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('expenses/create') }}">
        <span>New Expense </span>
    </a>
</div>
<div class="table-responsive ">
<table>
    <tr>
        <th>Id</th>
        <th>Class</th>
        <th>Admission Fee</th>
        <th> Monthly Tuition</th>
        <th>Uniform Fee </th>
        <th> Books & Supplies </th>
        <th>Exam Fee </th>
        <th>Library Fee </th>
        <th>Lab Fee</th>
        <th>ID Card Fee  </th>
        <th> Development Fee </th>
        <th> Sports Fee </th>
        <th>Art & Craft Fee </th>
        <th>Report Card Fee</th>
        <th>Acttion</th>
    </tr>
    @forelse($expenses as $expense)
    <tr>
        <td>{{$expense->id}}</td>
        <td>{{$expense->classe->name}}</td>
        <td>{{$expense->admission_fee}}</td>
        <td>{{$expense->monthly_fee}}</td>
        <td>{{$expense->uniform_fee}}</td>
        <td>{{$expense->books_fee}}</td>
        <td>{{$expense->exam_fee}}</td>
        <td>{{$expense->library_fee}}</td>
        <td>{{$expense->lab_fee}}</td>
        <td>{{$expense->id_card_fee}}</td>
        <td>{{$expense->development_fee}}</td>
        <td>{{$expense->sports_fee}}</td>
        <td>{{$expense->art_craft_fee}}</td>
        <td>{{$expense->report_card_fee}}</td>
       
        <td>
            <div class="divc">
               <a href='{{url("expenses/$expense->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <a href='{{url("expenses/$expense->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a>

                <form action="{{route('expenses.destroy',$expense->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                 <button class="buttonc" onClick="if( confirm('Are you Sure'))  alert('Item Deleting......')"><i class='bx bxs-trash'></i></button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="15">No expenses available.</td>
    </tr>
    @endforelse
</table>
</div>

@endsection