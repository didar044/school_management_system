@extends('layouts.master')
@section('page')

<style>
 

    .invoice-box {
      width: 800px;
      margin: 40px auto;
      padding: 40px;
      background: #fff;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    header h1 {
      margin: 0;
      font-size: 3em;
      color: #333;
    }

    .school-info {
      text-align: right;
      font-size: 1.3em;
      color: #555;
      font-style: italic;
    }

    .details-section {
      margin-bottom: 30px;
      display: flex;
      justify-content: space-between;
      gap: 40px;
    }

    .student-info, .invoice-info {
      width: 48%;
      font-size: 1.2em;
    }

    .student-info input, .invoice-info input {
      border: none;
      background-color: transparent;
      font-size: 1.2em;
    }

    .item-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .item-table th, .item-table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    .item-table th {
      background-color: #f0f0f0;
    }

    .totals {
      text-align: right;
    }

    .totals table {
      float: right;
      width: 300px;
    }

    .totals td {
      padding: 8px 10px;
    }

    footer {
      text-align: center;
      font-size: 1.1em;
      color: #888;
      margin-top: 50px;
    }

    .divbi {
      text-align: center;
      margin: 20px;
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
    <a class="buttonbi" href="{{ url('studentpayments') }}">
        <span>Addmission Payment List</span>
    </a>
    <button onclick="window.print()" class="buttonbis"><span>Print Page</span></button>
</div>

<div class="invoice-box">
  <header>
    <div>
      <img src="{{ asset('image/school.png') }}" alt="School Logo" style="height: 150px;">
    </div>
    <div style="text-align:center; line-height:1.8; margin-bottom:20px;">
      <strong style="font-size:24px; display:block; margin-bottom:5px;">Fatehabad International School</strong>
      <span style="display:block; font-size:16px; color:#333;">123 Education Lane</span>
      <span style="display:block; font-size:16px; color:#333;">Cityville, ST 45678</span>
      <span style="display:block; font-size:16px; color:#333;">Email: admin@sunriseschool.edu</span>
    </div>
    <div class="school-info">
      "Empowering Young Minds<br>for a Brighter Future"
    </div>
  </header>

  <h1 style="text-align:center;">Money Receipt</h1>

  <form action="update_invoice.php" method="POST"> <!-- Change to your backend URL -->
    <div class="details-section">
      <div class="student-info">
        <strong>Student Information</strong><br>
        Name: {{$studentpayment->name}} <br>
        class:{{$student->classe_id}}<br>
        Roll:{{$student->roll_number}}<br>
        Student ID:{{$student->id}} <br>
      </div>

      <div class="invoice-info">
        <strong>Invoice Details</strong><br>
        Invoice No: {{$studentpayment->id}} <br>
        Payment Date: {{$studentpayment->payment_date}} <br>
        Payment Method: {{$studentpayment->payment_method}} <br>
        Reiceve : {{ $studentpayment->emplyeeadministrator->name ?? '-'}} <sub>({{ $studentpayment->emplyeeadministrator->role ?? '-' }})</sub>
        
      </div>
    </div>
  </form>

  <table class="item-table">
    <thead>
      <tr>
        <th>Item</th>
        <th>Fee</th>
        <th>Month</th>
        <th>Waived</th>
        <th>Total</th>
        <th>Remark</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($student_payment_details as $student_payment_detail)
      <tr>
        <td>{{$student_payment_detail->expense_type}}</td>
        <td>{{$student_payment_detail->fee}}</td>
        <td>{{$student_payment_detail->month}}</td>
        <td>{{$student_payment_detail->wived}}</td>
        <td>{{$student_payment_detail->total}}</td>
        <td>{{$student_payment_detail->remark}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <section class="totals">
    <table>
      <tr>
        <td>Total</td>
        <td>{{$studentpayment->total_amount}}</td>
      </tr>
      <tr>
        <td>Paid</td>
        <td>{{$studentpayment->paid_amount}}</td>
      </tr>
      <tr>
        <td><strong>Due</strong></td>
        <td><strong>{{$studentpayment->due_amount}}</strong></td>
      </tr>
    </table>
    
  </section>
    <div style="margin-top: 100px; display: block;">
     <hr style="width:90px">
     <h4> Signature</h4>
     </div>

  <footer>
    <p>Please make payment by the due date. For questions, contact the school administration office.</p>
  </footer>
  <button onclick="window.print()"  class="buttonc"><i class="bi bi-printer-fill"></i></button>
</div>

@endsection
