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
    textarea{
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        width: 100%;

    }

    textarea {
        resize: vertical;
        min-height: 60px;
    }

 
</style>


<div class="divbi">   
<a class="buttonbi"  href="{{ url('leaveapplications') }}"><span>Back To Ap.List</span></a> 
</div>

<form action="{{ route('leaveapplications.store') }}" method="POST" class="form-container">
    @csrf
    <h2>Leave Application Form</h2>

   <div class="form-row">
        <div class="form-group">
            <label for="person_type">Applicant Type:</label>
                <select name="person_type" id="person_type" required>
                    <option value="">-- Select Applicant Type --</option>
                    <option value="employee">Employee</option>
                    <option value="student">Student</option>
                </select>
        </div>
         <div class="form-group">
            <label for="person_id">Applicant ID:</label>
            <input type="number" name="person_id" id="person_id">
        </div>

    
</div>

<div class="form-row">
       
           <!-- Employee Select -->
           <div class="form-group" id="employee_select" style="display:none;">
                <label for="employee_id">Select Employee:</label>
                <select id="employee_id">
                      <option>---</option>
                    @foreach($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Student Select -->
            <div class="form-group" id="student_select" style="display:none;">
                <label for="student_id">Select Student:</label>
                <select id="student_id">
                      <option>---</option>
                    @foreach($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Placeholder -->
            <div class="form-group" id="placeholder_select" style="display:block;">
                <label>Select:</label>
                <select disabled>
                    <option>---</option>
                </select>
            </div>

            <!-- Hidden input to hold the selected person ID -->
            <!-- <input type="hidden" name="person_id" id="person_id" required> -->



             <div class="form-group">
                <label for="">Applicantion Date</label>
                <input type="date" name="date" id="peron_id" value="{{ date('Y-m-d') }}" required>
            </div>

        
 </div>
   

    <div class="form-row">
        <div class="form-group">
            <label for="leave_categorie_id">Leave Category:</label>
            <select name="leave_categorie_id" id="leave_categorie_id" required>
                <option value="">------</option>
                @foreach($leavecategories as $leavecategory)
                    <option value="{{ $leavecategory->id }}">{{ $leavecategory->name }} ({{ $leavecategory->days }} days)</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="from_date">From Date:</label>
            <input type="date" name="from_date" id="from_date" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="to_date">To Date:</label>
            <input type="date" name="to_date" id="to_date" required>
        </div>
        <div class="form-group">
            <label for="remark">Days:</label>
            <input type="number" name="days" id="to_date" required>
        </div>
         <div class="form-group">
            <label for="remark">Remark:</label>
            <textarea name="remark" id="remark" rows="3"></textarea>
        </div>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <button type="submit"style=" background-color: #2e8b57;" class="buttonbis" >
          <span>  Submit Leave Application </span>
        </button>
    </div>
</form>



<!-- <script>
  const personType = document.getElementById('person_type');
  const employeeSelect = document.getElementById('employee_select');
  const studentSelect = document.getElementById('student_select');
  const placeholderSelect = document.getElementById('placeholder_select');

  personType.addEventListener('change', function () {
    if (this.value === 'employee') {
      employeeSelect.style.display = 'block';
      studentSelect.style.display = 'none';
      placeholderSelect.style.display = 'none';
    } else if (this.value === 'student') {
      employeeSelect.style.display = 'none';
      studentSelect.style.display = 'block';
      placeholderSelect.style.display = 'none';
    } else {
      employeeSelect.style.display = 'none';
      studentSelect.style.display = 'none';
      placeholderSelect.style.display = 'block';
    }
  });
</script> -->


<!-- <script>
document.addEventListener('DOMContentLoaded', function () {
    const personType = document.getElementById('person_type');
    const employeeSelectDiv = document.getElementById('employee_select');
    const studentSelectDiv = document.getElementById('student_select');
    const placeholderSelect = document.getElementById('placeholder_select');

    const employeeSelect = document.getElementById('employee_id');
    const studentSelect = document.getElementById('student_id');
    const hiddenPersonId = document.getElementById('person_id');

    function updatePersonId() {
        if (personType.value === 'employee') {
            hiddenPersonId.value = employeeSelect.value;
        } else if (personType.value === 'student') {
            hiddenPersonId.value = studentSelect.value;
        } else {
            hiddenPersonId.value = '';
        }
    }

    personType.addEventListener('change', function () {
        if (this.value === 'employee') {
            employeeSelectDiv.style.display = 'block';
            studentSelectDiv.style.display = 'none';
            placeholderSelect.style.display = 'none';
            updatePersonId();
        } else if (this.value === 'student') {
            employeeSelectDiv.style.display = 'none';
            studentSelectDiv.style.display = 'block';
            placeholderSelect.style.display = 'none';
            updatePersonId();
        } else {
            employeeSelectDiv.style.display = 'none';
            studentSelectDiv.style.display = 'none';
            placeholderSelect.style.display = 'block';
            updatePersonId();
        }
    });

    employeeSelect.addEventListener('change', updatePersonId);
    studentSelect.addEventListener('change', updatePersonId);
});
</script> -->


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const personType = document.getElementById('person_type');
    const employeeSelectDiv = document.getElementById('employee_select');
    const studentSelectDiv = document.getElementById('student_select');
    const placeholderSelect = document.getElementById('placeholder_select');

    const employeeSelect = document.getElementById('employee_id');
    const studentSelect = document.getElementById('student_id');
    const personIdInput = document.getElementById('person_id');

    // Update person_id input when dropdown changes
    function updatePersonIdFromDropdown() {
        if (personType.value === 'employee') {
            personIdInput.value = employeeSelect.value;
        } else if (personType.value === 'student') {
            personIdInput.value = studentSelect.value;
        } else {
            personIdInput.value = '';
        }
    }

    // When applicant type changes
    personType.addEventListener('change', function () {
        if (this.value === 'employee') {
            employeeSelectDiv.style.display = 'block';
            studentSelectDiv.style.display = 'none';
            placeholderSelect.style.display = 'none';
            updatePersonIdFromDropdown();
        } else if (this.value === 'student') {
            employeeSelectDiv.style.display = 'none';
            studentSelectDiv.style.display = 'block';
            placeholderSelect.style.display = 'none';
            updatePersonIdFromDropdown();
        } else {
            employeeSelectDiv.style.display = 'none';
            studentSelectDiv.style.display = 'none';
            placeholderSelect.style.display = 'block';
            personIdInput.value = '';
        }
    });

    // When dropdown changes, update visible input
    employeeSelect.addEventListener('change', updatePersonIdFromDropdown);
    studentSelect.addEventListener('change', updatePersonIdFromDropdown);

    // Optional: if user edits the input manually, you can decide whether to sync dropdown or not.
    // For now, we do NOT override user input on manual typing, so no extra code here.

    // Initialize on page load
    updatePersonIdFromDropdown();
});

</script>



@endsection