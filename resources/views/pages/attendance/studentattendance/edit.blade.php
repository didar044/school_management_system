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
    <a class="buttonbi" href="{{ url('studentattendances') }}"><span>Back To List</span></a> 
</div>




<div class="form-container">
    <h2>Edit Student Attendance</h2>

    <form action="{{ route('studentattendances.update', $studentattendances->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label>Student Name</label>
                <input type="hidden" name="student_id" value="{{ $studentattendances->student_id }}">
                <input type="text" class="form-control" value="{{ $studentattendances->student->name ?? 'N/A' }}" readonly>
            </div>

            <div class="form-group">
                <label>Class</label>
                <input type="text" class="form-control" value="{{ $studentattendances->class->name ?? 'N/A' }}" readonly>
            </div>

            <div class="form-group">
                <label>Shift</label>
                <input type="text" class="form-control" value="{{ $studentattendances->shift->name ?? 'N/A' }}" readonly>
            </div>

            <div class="form-group">
                <label>Section</label>
                <input type="text" class="form-control" value="{{ $studentattendances->section->name ?? 'N/A' }}" readonly>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="{{ $studentattendances->date }}" required>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    @foreach(['present', 'absent', 'late', 'leave', 'half_day', 'left_without_permission'] as $status)
                        <option value="{{ $status }}" {{ $studentattendances->status == $status ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>In Time</label>
                <input type="time" name="in_time" class="form-control" value="{{ $studentattendances->in_time }}">
            </div>

            <div class="form-group">
                <label>Out Time</label>
                <input type="time" name="out_time" class="form-control" value="{{ $studentattendances->out_time }}">
            </div>
        </div>

        <div class="form-group">
            <label>Remark</label>
            <textarea name="remark" class="form-control" rows="3">{{ $studentattendances->remark }}</textarea>
        </div>

        <div style="text-align: center;">
            <button type="submit" class="buttonbis"><span>Update Attendance</span></button>
        </div>
    </form>
</div>



<script>
    const shiftRules = {
        'Morning Shift': { start: '07:00', end: '12:00', late: '07:30' },
        'Day Shift':     { start: '12:00', end: '17:00', late: '12:30' } // ⬅️ Fixed late time logic
    };

    document.addEventListener('DOMContentLoaded', function () {
        const shiftName = "{{ $studentattendances->shift->name ?? 'Morning Shift' }}";

        const inTimeInput = document.querySelector('input[name="in_time"]');
        const outTimeInput = document.querySelector('input[name="out_time"]');
        const statusSelect = document.querySelector('select[name="status"]');

        const rules = shiftRules[shiftName];
        if (!rules) return;

        const { start, late, end } = rules;

        function evaluateStatus() {
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
        }

        inTimeInput.addEventListener('change', evaluateStatus);
        outTimeInput.addEventListener('change', evaluateStatus);
    });
</script>









@endsection