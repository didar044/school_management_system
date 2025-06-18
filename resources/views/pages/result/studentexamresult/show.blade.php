@extends('layouts.master')
@section('page')
<style>
    .invoice-box {
        background-color: #fff;
        padding: 30px;
        max-width: 1200px;
        margin: auto;
        border-radius: 10px;
        font-family: 'Segoe UI', sans-serif;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #1d3557;
        margin-bottom: 5px;
    }



  .invoice-details {
    width: 100%;
    margin-bottom: 20px; 
    display: flex;
    flex-wrap: wrap;
    gap: 0px 15px; 
    }

    .field-group {
        flex: 1 1 45%;
        min-width: 250px;
        display: flex;
        align-items: center;
        margin-bottom: 5px; 
    }

    .invoice-details label {
        font-weight: bold;
        width: 180px; 
        color: #333;
    }

    .invoice-details input {
        flex: 1;
        background: transparent;
        border: none;
        font-size: 15px;
        color: #111;
        border-bottom: 1px dashed #ccc;
        padding: 2px 0; 
    }

    .salary-breakdown {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 14px;
    }

    .salary-breakdown th {
        background-color: #f0f8ff;
        color: #1d3557;
        text-align: center;
        padding: 10px;
        border: 1px solid #ccc;
    }

    .salary-breakdown td {
        border: 1px solid #ccc;
        padding: 6px;
        text-align: center;
    }

    .salary-breakdown input {
        background: transparent;
        border: none;
        width: 100%;
        text-align: center;
        color: #000;
    }

    .signatures {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        padding: 0 50px;
    }

    .signatures .line {
        border-top: 1px solid #000;
        width: 200px;
        text-align: center;
        padding-top: 5px;
        font-weight: 500;
    }
    @media print {
      body {
        margin: 0;
        padding: 0;
        visibility: hidden;
      }

      .invoice-box {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        max-width: 800px;
        margin: 0;
        padding: 0;
        border: none;
        box-shadow: none;
        page-break-inside: avoid;
      }

      .invoice-box, .invoice-box * {
        visibility: visible;
      }

      .divbi {
        display: none;
      }

      html, body {
        height: 100%;
        background: #fff;
      }
    }
 

</style>

<div class="divbi">
       <a class="buttonbi" href="{{ url('studentexamresults') }}"><span> ← Back to Results List </span></a>
        <button onclick="window.print()" class="buttonbis"><span>Print Page</span></button>
</div>
<div class="invoice-box">
    <div class="school-header">
        <div class="school-logo">
            <img src="{{ url('/image/school.png') }}" alt="School Logo" style="height: 150px;">
        </div>
        <div class="school-name">
            <h1>Fatehabad International School</h1>
            <p>123 Education Lane, Cityville, ST 45678</p>
            <p>Email: admin@sunriseschool.edu</p>
        </div>
        <div class="school-slogan">
            "Empowering Young Minds<br>for a Brighter Future"
        </div>
    </div>

    <form>
        <h2>Student Exam Result Sheet</h2>

        <div class="invoice-details">
            <div class="field-group">
                <label>Student Name</label>
                <input type="text" value="{{ $studentExamResult->student->name ?? '-' }}" readonly>
            </div>
            <div class="field-group">
                <label>Student ID</label>
                <input type="text" value="{{ $studentExamResult->student->id ?? '-' }}" readonly>
            </div>
            <div class="field-group">
                <label>Class</label>
                <input type="text" value="{{ $studentExamResult->student->class->name ?? '-' }}" readonly>
            </div>
            <div class="field-group">
                <label>Roll</label>
                <input type="text" value="{{ $studentExamResult->student->roll_number ?? '-' }}" readonly>
            </div>
            <div class="field-group">
                <label>Exam Type</label>
                <input type="text" value="{{ $studentExamResult->examType->name ?? '-' }}" readonly>
            </div>
            <div class="field-group">
                <label>Exam Year</label>
                <input type="text" value="{{ $studentExamResult->exam_year }}" readonly>
            </div>
        </div>

        <div class="invoice-details">
            <div class="field-group">
                <label>Total Marks</label>
                <input type="text" value="{{ $studentExamResult->total_marks }}" readonly>
            </div>
            <div class="field-group">
                <label>Average</label>
                <input type="text" value="{{ $studentExamResult->average_marks }}" readonly>
            </div>
            <div class="field-group">
                <label>GPA</label>
                <input type="text" value="{{ $studentExamResult->gpa }}" readonly>
            </div>
            <div class="field-group">
                <label>Grade</label>
                <input type="text" value="{{ $studentExamResult->grade }}" readonly>
            </div>
            <div class="field-group" style="flex: 1 1 100%;">
                <label>Remark</label>
                <input type="text" value="{{ $studentExamResult->remark }}" readonly>
            </div>
        </div>

        <h2>Subject-wise Marks</h2>
        <table class="salary-breakdown">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Written</th>
                    <th>MCQ</th>
                    <th>Total</th>
                    <th>GPA</th>
                    <th>Grade</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                @foreach($studentExamResult->markDetails as $detail)
                <tr>
                    <td><input type="text" value="{{ $detail->subject->name ?? '-' }}" readonly></td>
                    <td><input type="text" value="{{ $detail->written_marks }}" readonly></td>
                    <td><input type="text" value="{{ $detail->mcq_marks }}" readonly></td>
                    <td><input type="text" value="{{ $detail->w_m_marks }}" readonly></td>
                    <td><input type="text" value="{{ $detail->gpa }}" readonly></td>
                    <td><input type="text" value="{{ $detail->grade }}" readonly></td>
                    <td><input type="text" value="{{ $detail->remark }}" readonly></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="signatures">
            <div class="line">Teacher's Signature</div>
            <div class="line">Headmaster's Signature</div>
        </div>
    </form>
</div>
@endsection
