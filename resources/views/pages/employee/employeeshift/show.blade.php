@extends('layouts.master')
@section('page')
<div class="divbi">
<a class="buttonbi" href="{{ url('employeeshifts') }}">
        <span>Back To employeeshifts List</span>
</a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Class</th>
    </tr>
    <tr>
        <td>{{$employeeshifts->id}}</td>
        <td>{{$employeeshifts->name}}</td>
    </tr>
</table>
@endsection