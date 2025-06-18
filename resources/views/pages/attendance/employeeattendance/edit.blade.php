@extends('layouts.master')
@section('page')

<style>
    .form-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        max-width: 1200px;
        margin: auto;
        background: white;
        padding: 40px;
        border-radius: 10px;
        border: 1px solid #ccc;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center; /* ✅ corrected */
        font-size: 24px;
        color: #2e8b57;
        margin-bottom: 40px;
    }

    .section-title {
        font-size: 18px;
        font-weight: bold;
        padding: 10px 15px;
        margin-bottom: 20px;
        background-color: #e0f7e9;
        border-left: 5px solid #2e8b57;
        color: #2e8b57;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        flex: 1 1 45%;
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
    }

    input,
    select,
    textarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    textarea {
        resize: vertical;
        min-height: 60px;
    }


</style>

<div class="divbi">   
    <a class="buttonbi" href="{{ url('employeeattendances') }}"><span>Back To List</span></a> 
</div>

<div class="form-container">
    <h2>Edit Employee Attendance</h2>

    <form action="{{ route('employeeattendances.update', $employeeattendances->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label>Employee Name</label>
                <input type="hidden" name="employee_id" value="{{ $employeeattendances->employee->id }}">
                <input type="text" class="form-control" value="{{ $employeeattendances->employee->name }}" readonly>
            </div>

            <div class="form-group">
                <label>Shift</label>
                <input type="text" class="form-control" value="{{ $employeeattendances->employeeshift->name }}" readonly>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="{{ $employeeattendances->date }}" required>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="">-- Select Status --</option>
                    <option value="present" {{ $employeeattendances->status == 'present' ? 'selected' : '' }}>Present</option>
                    <option value="absent" {{ $employeeattendances->status == 'absent' ? 'selected' : '' }}>Absent</option>
                    <option value="leave" {{ $employeeattendances->status == 'leave' ? 'selected' : '' }}>Leave</option>
                    <option value="late" {{ $employeeattendances->status == 'late' ? 'selected' : '' }}>Late</option>
                    <option value="halfday" {{ $employeeattendances->status == 'halfday' ? 'selected' : '' }}>Half Day</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Check In</label>
                <input type="time" name="check_in" class="form-control" value="{{ $employeeattendances->check_in }}">
            </div>

            <div class="form-group">
                <label>Check Out</label>
                <input type="time" name="check_out" class="form-control" value="{{ $employeeattendances->check_out }}">
            </div>
        </div>

        <div class="form-group">
            <label>Remarks</label>
            <textarea name="remarks" class="form-control" rows="3">{{ $employeeattendances->remarks }}</textarea>
        </div>

        <div style="text-align: center;">
            <button class="buttonbis"><span> Update Attendance </span></button>
        </div>
    </form>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const shiftRules = {
        'Morning Shift': { start: '08:00', end: '14:00', late: '08:30' },
        'Day Shift': { start: '10:00', end: '16:00', late: '10:30' },
        'Night Shift': { start: '18:00', end: '23:00', late: '18:30' },
        'Overall School': { start: '10:00', end: '14:00', late: '10:30' },
    };

    const shiftName = document.getElementById('shift_name').value;
    const checkInInput = document.querySelector('input[name="check_in"]');
    const checkOutInput = document.querySelector('input[name="check_out"]');
    const statusSelect = document.querySelector('select[name="status"]');

    function updateStatus() {
        const checkIn = checkInInput.value;
        const checkOut = checkOutInput.value;

        if (!shiftName || !(shiftName in shiftRules)) return;

        const rule = shiftRules[shiftName];

        if (statusSelect.value === 'leave') return;

        if (!checkIn || !checkOut) {
            statusSelect.value = 'absent';
            return;
        }

        if (checkIn >= rule.late) {
            statusSelect.value = 'absent';
        } else if (checkIn >= rule.start && checkIn < rule.late) {
            statusSelect.value = 'late';
        } else {
            statusSelect.value = 'present';
        }

        if (checkOut < rule.end && statusSelect.value === 'present') {
            statusSelect.value = 'halfday';
        }
    }

    // Bind to input changes
    checkInInput.addEventListener('change', updateStatus);
    checkOutInput.addEventListener('change', updateStatus);

    // Run initially
    updateStatus();
});
</script>

@endsection
