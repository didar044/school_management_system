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
<a class="buttonbi" href="{{ url('bookissues') }}"><span>Back To List</span></a> 
</div>





<div class="form-container">
    <h2>Issue New Book</h2>
<form action="{{ url('bookissues') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-row">
        <div class="form-group">
            <label for="book_id">Select Book</label>
            <select name="book_id" class="form-control choices-select" required>
                <option value="">-- Select Book --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }} ({{ $book->copies_available }} available)</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="student_id">Select Student</label>
            <select name="student_id" class="form-control choices-select" required>
                <option value="">-- Select Student --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }} (ID: {{ $student->id }})</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="issue_date">Issue Date</label>
            <input type="date" name="issue_date" value="{{ date('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" required>
        </div>
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <button type="submit" class="buttonbis"><span>Submit</span></button>
    </div>
</form>

<link href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
  
  document.addEventListener('DOMContentLoaded', function () {
    
    var elements = document.querySelectorAll('.choices-select');

 
    elements.forEach(function (el) {
      
      new Choices(el, {
        searchEnabled: true,       // Enable search inside dropdown
        itemSelectText: '',        // Disable the default "Press to select" text
        placeholder: true,         // Show placeholder if exists
        shouldSort: false          // Don't sort options automatically
      });
    });
  });
</script>


</div>

@endsection