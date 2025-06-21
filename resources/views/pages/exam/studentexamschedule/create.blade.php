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
<a class="buttonbi" href="{{ url('studentexamschedules') }}"><span>Back To List</span></a> 
</div>


<div class="form-container">
    <h2>Exam Schedule Entry</h2>
    <form action="{{ url('studentexamschedules') }}" method="post"  enctype="multipart/form-data">
    @csrf
        <div class="section-title">Schedule Details</div>

        <div class="form-row">
            <div class="form-group">
                <label for="student_exam_type_id">Exam Type</label>
                <select  name="student_exam_type_id" required>
                    @foreach ($studentexamtypes as  $studentexamtype)
                      <option value="{{ $studentexamtype->id }}">{{ $studentexamtype->name }}</option>
                    
                    @endforeach
                </select>
                
            </div>

            <div class="form-group">
                <label for="classe_id">Class</label>
                    <select  name="classe_id" required>
                         @foreach ($classes as $classe )
                             <option value="{{ $classe->id }}">{{ $classe->name }}</option>    
                         @endforeach
                    </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="subject_id">Subject</label>
                 <select  name="subject_id" required>
                    @foreach ($subjects as $subject )
                      <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    
                    @endforeach
                 </select>
             
            </div>

            <div class="form-group">
                <label for="room_id">Room</label>
                <select name="room_id" required>
                    @foreach ($rooms as $room )
                      <option value="{{ $room->id }}">{{ $room->id }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="exam_date">Exam Date</label>
                <input type="date" name="exam_date" required>
            </div>

            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" name="start_time" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="time" name="end_time" required>
            </div>

            <div class="form-group">
                <label for="shift_id">Shift</label>
                <select name="shift_id" id="shift_id">
                    <option value="">---</option>
                     @foreach($shifts as $shift)
                        <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                    @endforeach 
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="section_id">Section</label>
                <select name="section_id" id="section_id">
                    <option value="">---</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exam_year">Exam Year</label>
                <input type="number" name="exam_year" min="2000" max="2099" required>
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
           <button type="submit" class="buttonbis" value="save"><span>Submit</span></button>
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