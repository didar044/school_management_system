@extends('layouts.master')
@section('page')

<style>

  .invoice-box {
    max-width: 960px;
    margin: 40px auto;
    padding: 30px;
    background: #fff;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    box-sizing: border-box;
  }

  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
    margin-bottom: 30px;
  }

  header img {
    height: 80px;
  }

  .school-info {
    text-align: right;
    font-style: italic;
    font-size: 16px;
    color: #444;
  }

  h1 {
    text-align: center;
    font-size: 22px;
    margin-bottom: 25px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .details-section {
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    font-size: 14px;
  }

  .student-info,
  .invoice-info {
    width: 48%;
    line-height: 1.4;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    font-size: 13px;
  }

  table th,
  table td {
    border: 1px solid #aaa;
    padding: 6px 8px;
    text-align: left;
    vertical-align: middle;
  }

  table th {
    background: #f2f2f2;
    font-weight: 600;
  }

  input[type="text"],
  input[type="number"] {
    border: none;
    background: transparent;
    width: 100%;
    text-align: right;
    font-size: 13px;
  }

  .summary {
    width: 280px;
    margin-left: auto;
    border-collapse: collapse;
    font-weight: 700;
    font-size: 16px;
  }

  .summary th, .summary td {
    padding: 6px;
    text-align: right;
  }

  .summary th {
    text-align: left;
  }

  .signatures {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    text-align: center;
  }

  .signatures .line {
    border-top: 1px solid #000;
    margin-top: 20px;
    padding-top: 5px;
    width: 160px;
    font-size: 12px;
  }

  /* ----- Print Styles ----- */
  @media print {
    @page {
      size: A4 portrait;
      margin: 5mm;
    }

    body {
      margin:0 ;
      padding: 0;
      background: white;
      visibility: hidden;
    }

    .invoice-box {
      visibility: visible;
      position: absolute;
      left: 30%;
      top: 0;
      transform: translateX(-50%);
      box-shadow: none;
      border: none;
      page-break-inside: avoid;
    }

    .invoice-box * {
      visibility: visible;
    }

    .no-print {
      display: none !important;
    }

    html, body {
      height: auto;
    }
  }
</style>




<div class="divbi">
    <a class="buttonbi" href="{{ url('employeesalarypayments') }}">
        <span>Back To List</span>
    </a>
    <button onclick="window.print()" class="buttonbis"><span>Print Page</span></button>
</div>


<div class="invoice-box">

<header>
  <div>
    <img src="{{ asset('image/school.png') }}" alt="School Logo" style="height: 150px;">
  </div>
  <div style="text-align:center;">
    <strong style="font-size:24px;">Fatehabad International School</strong><br>
    <span>123 Education Lane, Cityville, ST 45678</span><br>
    <span>Email: admin@sunriseschool.edu</span>
  </div>
  <div class="school-info">
    "Empowering Young Minds<br>for a Brighter Future"
  </div>
</header>

<h1 style="text-align:center;">Money Receipt</h1>

<form action="#" method="POST">
  <div class="details-section">
    <div class="student-info">
      <strong style="font-size: 18px;">Employee Information</strong><br>
      Name: <b>{{ $employeesalarypayment->name }}</b><br>
      Id: <b>{{ $employeesalarypayment->employee_id }}</b><br>
      Position: <b>{{ $employee->employee_categorie->name }}</b><br>
      Contact No: <b>{{ $employee->phone_number }}</b><br>
      Reference: <b>{{ $employeesalarypayment->reference }}</b> <br>
    </div>

    <div class="invoice-info">
      <strong style="font-size: 18px;">Money Receipt Details</strong><br>
      Receipt  No: <b>{{ $employeesalarypayment->id }}</b> <br>
      Payment Date: <b>{{ $employeesalarypayment->payment_date }}</b><br>
      Payrol Month: <b>{{ $employeesalarypayment->employeefestivalbonuse->month }}</b><br>
      Payment Method: <b>{{ $employeesalarypayment->paymentmethod->name }}</b><br>
      Salary Issuer: <b>{{$employeesalarypayment->employeeadministrator->name}} <sub>({{ $employeesalarypayment->employeeadministrator->role }})</sub></b>
      
    </div>
  </div>

  <div style="display: flex; gap: 30px;">
    <table class="salary-breakdown">
                    <thead>
                        <tr><th colspan="4"  style="background:gray; color:white;">Salary Allownece</th></tr>
                        <tr>
                            <th>Description</th>
                            <th>Allowance %</th>
                            <th>Amount </th>
                            <th>Total Amount </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Basic Salary</td><td></td> <td>{{ $employee->employee_categorie->salary }} </td><td rowspan="8">{{ $employeesalarypayment->total_amount}}</td></tr>
                        <tr><td>House Allowance</td><td>{{$employee->employeesalarie->house_allowance}}%</td><td>{{ $employeesalarypaymentdetail->house_allowance}}</td></tr>
                        <tr><td>Transport Allowance</td><td>{{$employee->employeesalarie->transport_allowance}}%</td><td>{{ $employeesalarypaymentdetail->transport_allowance}}</td></tr>
                        <tr><td>Medical Allowance</td><td>{{$employee->employeesalarie->medical_allowance}}%</td><td> {{ $employeesalarypaymentdetail->medical_allowance}}</td></tr>
                        <tr><td>Education Allowance</td><td>{{$employee->employeesalarie->education_allowance}}%</td><td>{{ $employeesalarypaymentdetail->education_allowance}} </td></tr>
                        <tr><td>Food Allowance</td><td>{{$employee->employeesalarie->food_allowance}}%</td><td> {{ $employeesalarypaymentdetail->food_allowance}}</td></tr>
                        <tr><td>Child Care Allowance</td><td>{{$employee->employeesalarie->child_care_allowance}}%</td><td> {{ $employeesalarypaymentdetail->child_care_allowance}}</td></tr>
                        <tr><td>Bonus</td><td></td><td>{{ $employeesalarypaymentdetail->bonus}}</td></tr>
                       
                       
                    </tbody>
            </table>


            <table class="salary-breakdown">
                    <thead>
                        <tr ><th colspan="4" class="tableheading" style="background:gray; color:white;">Salary Deduction</th></tr>
                        <tr>
                            <th>Description</th>
                            <th>Allowance %</th>
                            <th>Amount </th>
                            <th>Total Amount </th>
                        </tr>
                    </thead>
                    <tbody>
                        
              
                    
                        <tr><td>Tax</td><td>{{$employee->employeededuction->tax}}%</td> <td>{{ $employeesalarypaymentdetail->tax}} </td><td rowspan="8"> {{ $employeesalarypayment->total_deductions}}</td></tr>
                        <tr><td>Provindent Fund</td><td>{{$employee->employeededuction->provident_fund}}%</td><td>{{ $employeesalarypaymentdetail->provident_fund}}</td></tr>
                        <tr><td>Absence </td><td>{{$employee->employeededuction->absence}}</td><td>{{ $employeesalarypaymentdetail->absence}}</td></tr>
                        <tr><td>Fine/Other </td>{{$employee->employeededuction->fine}}<td></td><td>{{ $employeesalarypaymentdetail->fine}}</td></tr>
                        
                       
                       
                        
                        
                        
                        
                    </tbody>
            </table>
  </div>

  
    <table class="summary">
      <tr><th>Net Salary: </th> <td>{{ $employeesalarypayment->net_salary }}</td></tr>
      <tr><th>Amount Paid:</th><td>{{ $employeesalarypayment->paid_amount }} </td></tr>
      <tr><th>Due:</th><td>{{ $employeesalarypayment->net_salary - $employeesalarypayment->paid_amount }} </td></tr>
    </table>
 

  <div class="signatures">
    <div><div class="line">Employee Signature</div></div>
    <div><div class="line">Accountant</div></div>
    <div><div class="line">Principal / Head</div></div>
  </div>
  <div style="text-align: center; margin-top:20px">
    <span >This receipt is issued as proof of payment received. No refund against this amount. Please retain this for your records.</span>
  </div>
  <button onclick="window.print()" class="buttonc"><i class="bi bi-printer-fill"></i></button>
</form>

</div>

@endsection