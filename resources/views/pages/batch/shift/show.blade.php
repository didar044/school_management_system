@extends('layouts.master')
@section('page')
<div class="divbi">
<a class="buttonbi" href="{{ url('shifts') }}">
        <span>Back To Shifts List</span>
</a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Class</th>
    </tr>
    <tr>
        <td>{{$shifts->id}}</td>
        <td>{{$shifts->name}}</td>
    </tr>
</table>
@endsection