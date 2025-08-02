@extends('layouts.master')

@section('page')
<style>
    .buttonbi {
    color: white;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 4px;
    display: inline-block;
    margin-right: 5px;
}
table,tr,th{
    font-size: 15px;
}
table,tr,td{
    font-size: 12px;
}
</style>


<div style="display: flex; justify-content: space-between;">
        <div>
            <img src="{{ asset('image/school.png') }}" alt="School Logo" style="height: 150px;">
        </div>
        <div style=" text-align: center;" >
                    <h1 style="text-align: center;">Class Routine <span style="background: #2e8b57 ; color: aliceblue; padding: 3px; border-radius: 5px;">{{ $day }}</span> </h1>
                    @php
                        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    @endphp
                    <h2> View another day: </h2>
                    @foreach ($days as $d)
                    
                        <a href="{{ route('routines.filter', ['day' => $d]) }}" 
                        class="buttonbi"
                        style="background-color: {{ $day == $d ? '#2e8b57' : '2e8b57' }};">
                            <span>{{ $d }}</span>
                        </a>       
                    @endforeach
        </div>
        <div style="margin-top: 40px;">
            <h2> "Empowering Young Minds<br>for a Brighter Future"</h2>
        </div>
</div>
     <div class="table-responsive ">
<table>
    <thead>
        <tr>
            <th>Class</th>
            <th>Section</th>
            <!-- <th>Teacher</th> -->
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

        @forelse ($grouped as $key => $schedulesByClassSection)
            @php
                $room = $schedulesByClassSection->first()->room->id ?? 'N/A';
                $shift = $schedulesByClassSection->first()->shift->name ?? 'N/A';
                $className = $schedulesByClassSection->first()->classe->name ?? 'N/A';
                $sectionName = $schedulesByClassSection->first()->section->name ?? 'N/A';
                $teacher = $schedulesByClassSection->first()->employee->name ?? 'N/A';

                $periods = [
                    '1st' => '-',
                    '2nd' => '-',
                    '3rd' => '-',
                    'Break' => '-',
                    '4th' => '-',
                    '5th' => '-',
                    '6th' => '-',
                ];

                foreach ($schedulesByClassSection as $schedule) {
                    $periodName = strtolower($schedule->period->name ?? '');

                    if (in_array($periodName, ['1st', 'first'])) $periods['1st'] = $schedule->subject->name ?? 'N/A';
                    elseif (in_array($periodName, ['2nd', 'second'])) $periods['2nd'] = $schedule->subject->name ?? 'N/A';
                    elseif (in_array($periodName, ['3rd', 'third'])) $periods['3rd'] = $schedule->subject->name ?? 'N/A';
                    elseif (in_array($periodName, ['break'])) $periods['Break'] = 'Break Time';
                    elseif (in_array($periodName, ['4th', 'fourth'])) $periods['4th'] = $schedule->subject->name ?? 'N/A';
                    elseif (in_array($periodName, ['5th', 'fifth'])) $periods['5th'] = $schedule->subject->name ?? 'N/A';
                    elseif (in_array($periodName, ['6th', 'sixth'])) $periods['6th'] = $schedule->subject->name ?? 'N/A';
                }
            @endphp
            <tr>
                <td>{{ $className }}</td>
                <td>{{ $sectionName }}</td>
                <!-- <td>{{ $teacher }}</td> -->
                <td>{{ $periods['1st'] }}</td>
                <td>{{ $periods['2nd'] }}</td>
                <td>{{ $periods['3rd'] }}</td>
                <td>{{ $periods['Break'] }}</td>
                <td>{{ $periods['4th'] }}</td>
                <td>{{ $periods['5th'] }}</td>
                <td>{{ $periods['6th'] }}</td>
                <td>{{ $room }}</td>
                <td>{{ $shift }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="12">No schedules found for {{ $day }}</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div> 

@endsection
