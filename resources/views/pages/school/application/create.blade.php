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
<a class="buttonbi"  href="{{ url('applications') }}"><span>Back To Ap.List</span></a> 
</div>

<div class="form-container">
    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2>Student Admission Form</h2>

        <div class="section-title">Academic Information</div>
        <div class="form-row">
            <div class="form-group">
                <label for="class_id">Class</label>
                <select name="class_id" id="class_id">
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
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

            <div class="form-group">
                <label for="section_id">Section</label>
                <select name="section_id" id="section_id">
                    <option value="">---</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Application Date</label>
                <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}">
            </div>

            <div class="form-group">
                <label for="session">Session</label>
                <input type="text" name="session" id="session">
            </div>
        </div>

        <div class="section-title">Student Information</div>
        <div class="form-row">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="father_name">Father's Name</label>
                <input type="text" name="father_name" id="father_name">
            </div>

            <div class="form-group">
                <label for="mother_name">Mother's Name</label>
                <input type="text" name="mother_name" id="mother_name">
            </div>

            <div class="form-group">
                <label for="dof">Date of Birth</label>
                <input type="date" name="dof" id="dof">
            </div>

            <div class="form-group">
                <label for="dob_reg">Birth Reg. No.</label>
                <input type="text" name="dob_reg" id="dob_reg">
            </div>

            <div class="form-group">
                <label for="blood_group">Blood Group</label>
                <select name="blood_group" id="blood_group">
                    <option value="">Select</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="religion">Religion</label>
                <select name="religion" id="religion">
                    <option value="">Select</option>
                    <option value="Islam">Islam</option>
                    <option value="Hinduism">Hinduism</option>
                    <option value="Christianity">Christianity</option>
                    <option value="Buddhism">Buddhism</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo">
            </div>

            <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <input type="text" name="mobile_number" id="mobile_number">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="form-group" style="flex: 1 1 100%;">
                <label for="address">Address</label>
                <textarea name="address" id="address"></textarea>
            </div>
        </div>
        <button type="submit" class="buttonbis" value="save"><span>Submit Application</span></button>
        
    </form>
</div>


 <script>
document.addEventListener('DOMContentLoaded', function () {
    const shiftSelect = document.getElementById('shift_id');
    const sectionSelect = document.getElementById('section_id');

    shiftSelect.addEventListener('change', function () {
        const shiftId = this.value;

        if (shiftId) {
            fetch(`/get-sections/${shiftId}`)
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