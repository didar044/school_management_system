@extends('layouts.master')
@section('page')
<style>
   
    .form-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        max-width: 1000px;
        margin: auto;
        background: white;
        padding: 40px;
        border-radius: 10px;
        border: 1px solid #ccc;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
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
<a class="buttonbi"  href="{{ url('schedulemanages') }}"><span>Back To List</span></a> 
</div>

<div class="form-container">
    <h2>Schedule Edit</h2>
    <form action="{{ url('schedulemanages/'. $schedules->id) }}" method="POST">
    @csrf
    @method("PUT") 

        <div class="form-row">
            <div class="form-group">
                <label for="day">Day:</label>
                <select id="day" name="day" required>
                    <option value="">Select</option>
                    <option value="Monday" {{ $schedules->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ $schedules->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ $schedules->day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ $schedules->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ $schedules->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                    <option value="Saturday" {{ $schedules->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                    <option value="Sunday" {{ $schedules->day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                </select>
            </div>
            <div class="form-group">
                <label for="class_id">Class </label>
                <select  id="class_id" name="class_id">
                    <option value="">-- Select  --</option>
                    @foreach($classes as $classe)
                    <option value="{{$classe->id}}"{{ $schedules->classe_id == $classe->id ? 'selected' : '' }}>{{$classe->name}}</option>
                    @endforeach
                </select>
                
            </div>

            <div class="form-group">
                <label for="period_id">Period </label>
                <select id="period_id" name="period_id">
                    <option value="">-- Select  --</option>
                    @foreach($periods as $period)
                    <option value="{{$period->id}}"{{ $schedules->period_id == $period->id ? 'selected' : '' }}>{{$period->name}}</option>
                    @endforeach
                </select>
                
            </div>

            <div class="form-group">
                <label for="subject_id">Subject </label>
                 <select  id="subject_id" name="subject_id">
                    <option value="">-- Select  --</option>
                    @foreach($subjects as $subject)
                    <option value="{{$subject->id}}"{{ $schedules->subject_id == $subject->id ? 'selected' : '' }}>{{$subject->name}}</option>
                    @endforeach
                </select>
                
            </div>

            <div class="form-group">
                <label for="room_id">Room </label>
                <select   id="room_id" name="room_id">
                    <option value="">-- Select  --</option>
                    @foreach($rooms as $room)
                    <option value="{{$room->id}}"{{ $schedules->room_id == $room->id ? 'selected' : '' }}>{{$room->id}}</option>
                    @endforeach
                </select>
                
            </div>

            <div class="form-group">
                <label for="teacher_id">Teacher </label>
                 <select id="teacher_id" name="teacher_id"required>
                        <option value="">-- Select --</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"{{$schedules->employee_id==$employee->id ? 'selected':'' }}>{{ $employee->name }}</option>
                        @endforeach
                    </select>
                
            </div>
                <div class="form-group">
                    <label for="shift_id">Shift:</label>
                    <select id="shift_id" name="shift_id" required>
                        <option value="">-- Select  --</option>
                        @foreach ($shifts as $shift)
                            <option value="{{ $shift->id }}"{{$schedules->shift_id==$shift->id ? 'selected':'' }}>{{ $shift->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="section_id">Section:</label>
                    <select id="section_id" name="section_id" required>
                        @foreach ($sections as $section)
                            @if ($section->shift_id == $schedules->shift_id)
                                <option value="{{ $section->id }}" {{ $schedules->section_id == $section->id ? 'selected' : '' }}>
                                    {{ $section->name }}
                                </option>
                            @endif
                        @endforeach

                        
                    </select>
                </div>
           </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="buttonbis"><span>Update</span></button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const shiftSelect = document.getElementById('shift_id');
        const sectionSelect = document.getElementById('section_id');

        shiftSelect.addEventListener('change', function () {
            const shiftId = this.value;

            if (shiftId) {
                fetch(`{{ url('get-sections') }}/${shiftId}`)
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
        });
    });
</script> 


@endsection