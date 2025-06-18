@extends('layouts.master')
@section('page')
    <style>
        <style>.table {
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table th,
        .table td {
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


        .buttonc:hover {
            background-color: #084298;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control,
        .form-select {
            font-size: 14px;
            padding: 6px 10px;
        }
    </style>

    </style>


    <div class="divbi">
        <a class="buttonbi" href="{{ url('employeeattendances') }}"><span>Back To List</span></a>
        <form method="GET" action="{{ route('employeeattendances.create') }}">
            <input type="text" name="search" placeholder="Employee Name..." value="{{ request('search') }}"
                style="width: 180px ; height:40px; border-radius: 5px;">
            <button type="submit" class="buttonbi">
                <i class='bx bx-search'> Search</i>
            </button>
        </form>
    </div>



    <form action="{{ url('employeeattendances') }}" method="POST">

        @csrf



        <table class="table table-bordered">
            <div style="display: flex; align-items: center; justify-content:  space-around;">

                <div>
                    <label for="date" class="me-4">
                        <h3 style="font-size:30px;"> Date: </h3>
                    </label>
                    <input type="date" name="date" id="date" value="{{ old('date', now()->toDateString()) }}" required
                        style="width: 180px; height: 40px; border-radius: 5px;">
                </div>
                <div>
                    <h2
                        style="font-size: 22px; background: green; color:white; text-align: center;  padding: 5px; border-radius: 5px;">
                        Add Employee Attendance</h2>
                </div>

            </div>
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Shift</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Submit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}
                            <input type="hidden" name="attendances[{{ $employee->id }}][employee_id]"
                                value="{{ $employee->id }}">
                        </td>
                        <td> {{ $employee->employeeshift->name }}
                            <input type="hidden" name="attendances[{{ $employee->id }}][employeeshift_id]"
                                value="{{ $employee->employeeshift_id }}">
                        </td>
                        <td>
                            <input type="time" name="attendances[{{ $employee->id }}][check_in]" class="form-control check-in">
                        </td>
                        <td>
                            <input type="time" name="attendances[{{ $employee->id }}][check_out]"
                                class="form-control check-out">
                        </td>
                        <td>
                            <select name="attendances[{{ $employee->id }}][status]" class="form-select status">
                                <option value="">------</option>
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                                <option value="leave">Leave</option>
                                <option value="late">Late</option>
                                <option value="halfday">Half Day</option> <!-- New option -->
                            </select>
                        </td>
                        <td>
                            <input type="text" name="attendances[{{ $employee->id }}][remarks]" class="form-control">
                        </td>
                        <td>
                            <input type="hidden" name="date" value="{{ old('date', now()->toDateString()) }}">
                            <button type="submit" class="buttonc"><i class='bx bx-check-circle'></i> </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <!-- <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', now()->toDateString()) }}" required>
            </div> -->

        <button type="submit" class="buttonbi" style="text-align: center;"><span > Submit Attendance </span></button>
    </form>




    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const shiftRules = {
                'Morning Shift': { start: '07:00', end: '12:00', late: '07:30' },
                'Day Shift':     { start: '12:00', end: '17:00', late: '10:30' },
                'Night Shift': { start: '18:00', end: '23:00', late: '18:30' },
                'Overall School': { start: '10:00', end: '14:00', late: '10:30' },
            };

            // Loop over each row
            document.querySelectorAll('tbody tr').forEach(function (row) {
                const shiftText = row.children[1]?.textContent?.trim();
                const checkInInput = row.querySelector('.check-in');
                const checkOutInput = row.querySelector('.check-out');
                const statusSelect = row.querySelector('.status');

                if (!shiftText || !(shiftText in shiftRules)) return;

                const rule = shiftRules[shiftText];

                const updateStatus = () => {
                    const checkIn = checkInInput.value;
                    const checkOut = checkOutInput.value;

                    // Don't auto-update if user manually selected 'leave'
                    if (statusSelect.value === 'leave') return;

                    // If either check-in or check-out missing → Absent
                    if (!checkIn || !checkOut) {
                        statusSelect.value = 'absent';
                        return;
                    }

                    // Lateness and presence logic
                    if (checkIn >= rule.late) {
                        statusSelect.value = 'absent';
                    } else if (checkIn >= rule.start && checkIn < rule.late) {
                        statusSelect.value = 'late';
                    } else {
                        statusSelect.value = 'present';
                    }

                    // Check-out before end → Halfday (but only if otherwise Present)
                    if (checkOut < rule.end && statusSelect.value === 'present') {
                        statusSelect.value = 'halfday';
                    }
                };

                // Bind event listeners
                checkInInput.addEventListener('change', updateStatus);
                checkOutInput.addEventListener('change', updateStatus);

                // Call once on load
                updateStatus();
            });
        });
    </script>




@endsection