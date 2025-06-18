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
<a class="buttonbi" href="{{ url('studentexamtypes') }}"><span>Class List</span></a> 
</div>
  <div class="form-container">
    <h2><i class="bx bxs-pencil"></i> Add Exam Type</h2>
    <form action="{{ url('studentexamtypes/'. $studentexamtype->id) }}" method="POST" enctype="multipart/form-data"   >
        @csrf
        @method("PUT")
 

      <div class="section-title">Exam Information</div>

      <div class="form-row">
        <div class="form-group">
          <label for="name">Exam Name</label>
          <input type="text" id="name" name="name" value="{{ $studentexamtype->name }}" required>
        </div>

        <div class="form-group">
          <label for="term">Term</label>
          <input type="text" id="term" name="term" value="{{ $studentexamtype->term }}"required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="session_year">Session Year</label>
          <input type="text" id="session_year" name="session_year" placeholder="e.g. 2024-25" value="{{ $studentexamtype->session_year }}" required>
        </div>

        <div class="form-group">
          <label for="start_date">Start Date</label>
          <input type="date" id="start_date" name="start_date" value="{{ $studentexamtype-> start_date}}">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="end_date">End Date</label>
          <input type="date" id="end_date" name="end_date" value="{{ $studentexamtype->end_date }}">
        </div>

        <div class="form-group">
          <label for="pass_marks">Pass Marks</label>
          <input type="number" step="0.01" id="pass_marks" name="pass_marks" value="{{ $studentexamtype->pass_marks }}">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="max_number">Marks <sub>(P.S)</sub></label>
          <input type="number" step="0.01" id="max_number" name="max_number" value="{{ $studentexamtype->max_number }}">
        </div>

        <div class="form-group">
          <label for="remark">Remarks</label>
          <textarea id="remark" name="remark" value="">{{ $studentexamtype->remark }}</textarea>
        </div>
      </div>

      <div  style="text-align: center;">
         <button type="submit" class="buttonbis" value="save"><span>Submit </span></button>
      </div>
    </form>
  </div>




@endsection