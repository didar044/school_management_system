@extends('layouts.master')
@section('page')
<div class="divbi">
<a class="buttonbi" href="{{ url('classes') }}">
        <span> Class List</span>
</a>
</div>
<table>
    <tr>
        <th>Id</th>
        <th>Class</th>
    </tr>
    <tr>
        <td>{{$classe->id}}</td>
        <td>{{$classe->name}}</td>
    </tr>
</table>
@endsection