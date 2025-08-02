@extends('layouts.master')
@section('page')

<style>
    .table {
        margin-top: 20px;
        border-collapse: collapse;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
        padding: 10px;
    }

    .table th {
        background-color: #e6f9e6;
        font-weight: 900;
        font-size: 16px;
    }

    .table td {
        font-size: 14px;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tbody tr:hover {
        background-color: #e9f5ff;
    }

    .form-select, .form-control, label {
        text-align: center;
    }
</style>

<!-- Filter Form -->
<form method="GET" action="{{ route('studentattendances.create') }}">
    <div class="divbi">
        <a href="{{ url('studentattendances') }}">
            <button type="button" class="buttonc"> <i> ← Back</i></button>
        </a>

        <div style="display: flex;">
            <label for="classes"><strong>Filter by Class:</strong></label>
            <select name="classes" id="classes" class="form-select" onchange="this.form.submit()">
                <option value="">-- All Classes --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ request('classes') == $class->id ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="display: flex;">
            <label for="shift"><strong>Filter by Shift:</strong></label>
            <select name="shift" id="shift" class="form-select" onchange="loadSection(); this.form.submit();">
                <option value="">-- All Shifts --</option>
                @foreach($shifts as $shift)
                    <option value="{{ $shift->id }}" {{ request('shift') == $shift->id ? 'selected' : '' }}>
                        {{ $shift->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="display: flex;">
            <label for="section"><strong>Filter by Section:</strong></label>
            <select name="section" id="section" class="form-select" onchange="this.form.submit()">
                <option value="">-- All Sections --</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ request('section') == $section->id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <input type="text" name="st_name" placeholder="St. Name..." value="{{ request('st_name') }}"
                style="width: 180px; height: 40px; border-radius: 5px;">
            <button type="submit" class="buttonc"><i>Search</i></button>
        </div>

        <div>
            <a href="{{ route('studentattendances.create') }}">
                <button type="button" class="buttonc"><i>Reset Filters</i></button>
            </a>
        </div>
    </div>
</form>

<!-- Attendance Form -->
<form method="POST" action="{{ route('studentattendances.store') }}">
    @csrf
    <div class="divbi">
        <div style="display: flex; align-items: center;">
            <label for="date" style="font-size: 20px; margin-right: 10px;">Date:</label>
            <input type="date" name="date" id="date" value="{{ old('date', now()->toDateString()) }}" required
                style="width: 180px; height: 40px; border-radius: 5px;">
        </div>

        <div class="mb-3" style="text-align: center;">
            <label style="font-size: 20px; margin-right: 10px;">Set All Students To:</label>
            @foreach(['present', 'absent', 'late', 'leave', 'half_day', 'left_without_permission'] as $status)
                <button type="button" class="buttonc" onclick="setAllStatus('{{ $status }}')">
                    <i>{{ ucfirst(str_replace('_', ' ', $status)) }}</i>
                </button>
            @endforeach
        </div>
    </div>

    <!-- Attendance Table -->
      <div class="table-responsive ">
    <table class="table table-bordered">
        <thead>
            <tr style="background-color: #f0f0f0;">
                <th>St.ID</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Shift</th>
                <th>Section</th>
                
                <th>In Time</th>
                <th>Out Time</th>
                <th>Status</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>
                        {{ $student->name }}
                        <input type="hidden" name="students[{{ $student->id }}][student_id]" value="{{ $student->id }}">
                    </td>
                    <td>
                        {{ $student->class->name }}
                        <input type="hidden" name="students[{{ $student->id }}][classe_id]" value="{{ $student->classe_id }}">
                    </td>
                    <td>
                        {{ $student->shift->name }}
                        <input type="hidden" name="students[{{ $student->id }}][shift_id]" value="{{ $student->shift_id }}">
                    </td>
                    <td>
                        {{ $student->section->name }}
                        <input type="hidden" name="students[{{ $student->id }}][section_id]" value="{{ $student->section_id }}">
                    </td>
                  
                    <td>
                        <input type="time" name="students[{{ $student->id }}][in_time]" class="form-control">
                    </td>
                    <td>
                        <input type="time" name="students[{{ $student->id }}][out_time]" class="form-control">
                    </td>
                      <td>
                        <select name="students[{{ $student->id }}][status]" class="form-select">
                            <option value="">-- Select --</option>
                            @foreach(['present', 'absent', 'late', 'leave', 'half_day', 'left_without_permission'] as $status)
                                <option value="{{ $status }}">{{ ucfirst(str_replace('_', ' ', $status)) }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" name="students[{{ $student->id }}][remark]" class="form-control" placeholder="Optional">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- Submit Button -->
    <div style="text-align: center; margin-top: 20px;">
        <button type="submit" class="buttonbis"><span>Submit Attendance</span></button>
    </div>
</form>

<script>
    function setAllStatus(status) {
        const selects = document.querySelectorAll('select.form-select');
        selects.forEach(select => {
            select.value = status;
        });
    }

    function loadSection() {
        const shift_id = document.querySelector('#shift').value;
        const sectionSelect = document.querySelector('#section');

        if (shift_id) {
            fetch(`/getsections/${shift_id}`)
                .then(response => response.json())
                .then(data => {
                    sectionSelect.innerHTML = '<option value="">-- Select Section --</option>';
                    data.forEach(section => {
                        const option = document.createElement('option');
                        option.value = section.id;
                        option.textContent = section.name;
                        sectionSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching sections:', error);
                });
        } else {
            sectionSelect.innerHTML = '<option value="">-- Select Section --</option>';
        }
    }
</script>
<script>
    const shiftRules = {
        'Morning Shift': { start: '07:00', end: '12:00', late: '07:30' },
        'Day Shift':     { start: '12:00', end: '17:00', late: '10:30' }
    };

    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const shiftName = row.querySelector('td:nth-child(4)')?.innerText?.trim();
            const inTimeInput = row.querySelector('input[name*="[in_time]"]');
            const outTimeInput = row.querySelector('input[name*="[out_time]"]');
            const statusSelect = row.querySelector('select[name*="[status]"]');

            if (inTimeInput && outTimeInput && statusSelect && shiftRules[shiftName]) {
                const { start, late, end } = shiftRules[shiftName];

                const evaluateStatus = () => {
                    const inTime = inTimeInput.value;
                    const outTime = outTimeInput.value;

                    if (!inTime && !outTime) {
                        statusSelect.value = 'absent';
                       
                        return;
                    }

                    if (!outTime || outTime < end) {
                        statusSelect.value = 'absent';
                        
                        return;
                    }

                    if (inTime > late) {
                        statusSelect.value = 'absent';
                      
                    } else if (inTime > start) {
                        statusSelect.value = 'late';
                        
                    } else {
                        statusSelect.value = 'present';
                        
                    }
                };

                inTimeInput.addEventListener('change', evaluateStatus);
                outTimeInput.addEventListener('change', evaluateStatus);
            }
        });
    });
</script>





@endsection
