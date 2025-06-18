@extends('layouts.master') 

@section('page')
<div class="container">
    <h1>Class Routine for Monday</h1>

    {{-- Optional: Link to view other days --}}
     <div class="divbi">
       <h2> View another day: </h2>
        <a class="buttonbi" href="{{ route('routines.show', 'Monday') }}"><span> Monday</span></a> |
        <a class="buttonbi" href="{{ route('routines.show', 'Tuesday') }}"> <span>Tuesday</span></a> |
        <a class="buttonbi" href="{{ route('routines.show', 'Wednesday') }}"><span>Wednesday </span></a> |
        <a class="buttonbi" href="{{ route('routines.show', 'Thursday') }}"> <span>Thursday</span></a> |
        <a class="buttonbi" href="{{ route('routines.show', 'Friday') }}"> <span>Friday</span></a> |
        <a class="buttonbi" href="{{ route('routines.show', 'Saturday') }}"> <span>Saturday</span></a> |
        <a class="buttonbi" href="{{ route('routines.show', 'Sunday') }}"> <span>Sunday</span></a> 

    </div>
    <table cellpadding="8" cellspacing="0" >
        <thead>
            <tr>
                <th>Class</th>
                <th>Section</th>
                <th>1st</th>
                <th>2nd</th>
                <th>3rd</th>
                <th>Break</th>
                <th>4th</th>
                <th>5th</th>
                <th>6th</th>
                <th>Room</th>
                <th>Shift</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mondaySchedule as $row)
                <tr>
                    <td>{{ $row->class_id }}</td>
                    <td>{{ $row->section_id }}</td>
                    <td>{{ $row->{'1st'} ?? '-' }}</td>
                    <td>{{ $row->{'2nd'} ?? '-' }}</td>
                    <td>{{ $row->{'3rd'} ?? '-' }}</td>
                    <td>{{ $row->break_time }}</td>
                    <td>{{ $row->{'4th'} ?? '-' }}</td>
                    <td>{{ $row->{'5th'} ?? '-' }}</td>
                    <td>{{ $row->{'6th'} ?? '-' }}</td>
                    <td>{{ $row->room_id }}</td>
                    <td>{{ $row->shift_id }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="11">No schedule found for Monday.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
