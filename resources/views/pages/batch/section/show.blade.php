@extends('layouts.master')
@section('page')
<div class="divbi">
<a class="buttonbi" href="{{ url('sections') }}">
    <span>Back To sections List</span>
</a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Section</th>
        <th>Shift</th>
    </tr>
    <tr>
        <td>{{$sections->id}}</td>
        <td>{{$sections->name}}</td>
        <td>{{$sections->shift->name}}</td>
    </tr>
</table>
@endsection