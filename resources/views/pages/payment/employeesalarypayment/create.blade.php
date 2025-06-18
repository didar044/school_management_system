@extends('layouts.master')
@section('page')


    <style>
        

       
        .invoice-box {
            background-color: #fff;
            padding: 20px;
            max-width: 1400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2e8b57;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            margin: 0 0 30px 0;
            font-size: 16px;
            color: #666;
        }

    .invoice-details {
            width: 100%;
            margin-bottom: 30px;
           
            
            gap: 20px;
    }

    .invoice-details .field-group {
        flex: 1 1 45%;
        min-width: 250px;
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        gap: 20px;
    }

    .invoice-details label {
        display: inline-block;
        width: 100px;
        padding: 5px;
    }

    .invoice-details input , select {
        flex: 1;
        border: 1px solid #cecccc;
        padding: 4px 8px;
        font-size: 14px;
        font-weight: 600;
        color: #333;
        border-radius: 5px;
    }

        /* INPUTS - no border, transparent background */
      

        .salary-breakdown {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        .salary-breakdown th,
        .salary-breakdown td {
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 14px;
           
        }
         .salary-breakdown input{
            border: none;
            background: transparent;
            width: 100px;
         }
        .salary-breakdown th {
            background-color: #e0f7e9;
            color: #2e8b57;
            text-align: center;
        }

        .salary-breakdown td:nth-child(2),
        .salary-breakdown td:nth-child(3) {
            text-align: center;
        }

        .summary {
            width: auto;
            margin-top: 20px;
            font-size: 14px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 5px;
        }

        .summary div {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
        }

        .summary .label {
            font-weight: bold;
            text-align: right;
            font-size: 20px;
        }

        .signatures {
            display: flex;
            justify-content: space-around;
            margin-top: 60px;
            text-align: center;
            margin-bottom: 40px;
        }

        .signatures .line {
            margin-top: 60px;
            border-top: 1px solid #333;
            padding-top: 5px;
        }
    </style>

<div class="divbi">   
  <form method="GET" action="{{ route('employeesalarypayments.create') }}">
    <input type="text" name="search" placeholder="Search application Id..." value="{{ request('search') }}" style="width: 200px; height: 40px; border-radius: 8px;" >
    <button type="submit" class="buttonc" ><i>Employee Id</i> </button>
  </form> 
<a class="buttonbi" href="{{ url('employeesalarypayments') }}"><span>Back To List</span></a> 
</div>

@if(!$employee)
<div class="invoice-details">
            <div class="field-group">
                <label>Name:</label> <input type="text" name="name" value="" readonly>
                <label>ID:</label> <input type="text" name="id" value="" readonly>
            </div>
            <div class="field-group">
                <label>Category:</label> <input type="text" name="category" value="" readonly>
                <label>Payment Date:</label> <input type="payment_date" name="payment_date" required>
            </div>
            <div class="field-group">
                    <label for="salary_month">Payroll Month:</label>
                            <select name="salary_month" id="salary_month" required>
                                <option value="">-- Select Month --</option>
                               
                            </select>
                <label>Payment Method :</label> 
                   <select id="payment_method" name="payment_method" required>
                        <option value="">Select Method</option>
                       
                    
                </select>

                
               
            </div>
            <div class="field-group">
               <label>Paid By:</label>
                    <select name="paid_by" id="" required>
                        
                    </select>
              <label>Reference:</label> <input type="text" name="reference" required> 
                
                
            </div>
       </div>
       <table class="salary-breakdown">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Allowance %</th>
                    <th>Amount </th>
                    <th>Total Amount </th>
                </tr>
            </thead>
        </table> 
  <h1 style="text-align: center; color:red;">No Data Available</h1>

@else
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="invoice-box">
    <h2>Fatehabad International School</h2>
      
    <p class="subtitle">Employee Payment Invoice</p>
    <form method="POST" action="{{ route('employeesalarypayments.store') }}">
     @csrf
       <div class="invoice-details">
            <div class="field-group">
                <label>Name:</label> <input type="text" name="name" value="{{ $employee->name }}" readonly>
                <label>ID:</label> <input type="text" name="employee_id" value="{{ $employee->id }}" readonly>
            </div>
            <div class="field-group">
                <label>Category:</label> <input type="text" name="category" value="{{ $employee->employee_categorie->name }}" readonly>
                <label>Date:</label> <input type="date" name="payment_date"value="{{ date('Y-m-d') }}"  required>
            </div>
            <div class="field-group">
                    <label for="salary_month">Payroll Month:</label>
                            <select name="salary_month" id="salary_month" required>
                                    <option value="">-- Select Month --</option>
                                    @foreach ($employeefestivalbonuses as $employeefestivalbonuse )
                                        <option value="{{ $employeefestivalbonuse->id }}" data-bonus="{{ $employeefestivalbonuse->bonus_amount }}">{{ $employeefestivalbonuse->month }}</option>
                                    @endforeach
                            </select>
                <label>Payment Method :</label> 
                   <select id="payment_method" name="payment_method" required>
                        <option value="">Select Method</option>
                        @foreach ($paymentmethods as $paymentmethod )
                        <option value="{{ $paymentmethod->id }}">{{ $paymentmethod->name }}</option>
                        
                        @endforeach
                    
                </select>

                
               
            </div>
            <div class="field-group">
               <label>Salary Issuer</label>
                    <select name="salary_issuer" id="" required>
                      @foreach ($employeesdministrators as $employeesdministrator )

                      @if ($employeesdministrator->role === "Accountants" || $employeesdministrator->role === "Clerks")
                        <option value="{{ $employeesdministrator->id }}">{{ $employeesdministrator->name }} ({{$employeesdministrator->role}})</option>
                      @endif
                      
                      @endforeach
                    </select>
              <label>Reference:</label> <input type="text" name="reference" required> 
                
                
            </div>
       </div>



  
        <div style="display: flex;">
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
                        
                    @php
                        $basic = $employee->employeesalarie->basic_salary;

                        $house = $basic * ($employee->employeesalarie->house_allowance / 100);
                        $transport = $basic * ($employee->employeesalarie->transport_allowance / 100);
                        $medical = $basic * ($employee->employeesalarie->medical_allowance / 100);
                        $education = $basic * ($employee->employeesalarie->education_allowance / 100);
                        $food = $basic * ($employee->employeesalarie->food_allowance / 100);
                        $child_care = $basic * ($employee->employeesalarie->child_care_allowance / 100);
                        $total =$basic + $house + $transport + $medical + $education + $food + $child_care;


                        
                        
                        
                    
                    @endphp
                    
                    

                        <tr><td>Basic Salary</td><td></td> <td> <input type="text" name="basic_salary" value="{{$basic}}" readonly></td><td rowspan="8"> <input type="text" name="total_amount" id="total_amount" value="" readonly></td></tr>
                        <tr><td>House Allowance</td><td>{{$employee->employeesalarie->house_allowance}}%</td><td><input type="text" name="house_allowance" value="{{$house}}" readonly></td></tr>
                        <tr><td>Transport Allowance</td><td>{{$employee->employeesalarie->transport_allowance}}%</td><td><input type="text" name="transport_allowance" value="{{$transport }}" readonly></td></tr>
                        <tr><td>Medical Allowance</td><td>{{$employee->employeesalarie->medical_allowance}}%</td><td><input type="text" name="medical_allowance" value="{{$medical}}" readonly> </td></tr>
                        <tr><td>Education Allowance</td><td>{{$employee->employeesalarie->education_allowance}}%</td><td><input type="text" name="education_allowance" value="{{$education}}" readonly> </td></tr>
                        <tr><td>Food Allowance</td><td>{{$employee->employeesalarie->food_allowance}}%</td><td><input type="text" name="food_allowance" value="{{$food}}" readonly> </td></tr>
                        <tr><td>Child Care Allowance</td><td>{{$employee->employeesalarie->child_care_allowance}}%</td><td><input type="text" name="child_care_allowance" value="{{$child_care }}" readonly> </td></tr>
                        <tr><td>Bonus</td><td><span id="bonus_amount"></span>%</td><td><input type="text" name="bonus"  id="bonus"   value="" readonly></td></tr>
                       
                        <tr><td colspan="4" style="font-weight: 700; font-size: 18px;">Net Salary</td></tr>
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
                        
                    @php
                        $basic = $employee->employeesalarie->basic_salary;

                        $tax = $basic * ($employee->employeededuction->tax / 100);
                        $provident_fund = $basic * ($employee->employeededuction->provident_fund / 100);
                        $tp=$tax+$provident_fund;


                        
                        
                        
                    
                    @endphp
                    
                    
                        <tr><td>Tax</td><td>{{$employee->employeededuction->tax}}%</td> <td> <input type="text" name="tax" value="{{$tax }}" readonly></td><td rowspan="8"> <input type="text" name="totaldeduction" id="totaldeduction" readonly style="width: 150px;"></td></tr>
                        <tr><td>Provindent Fund</td><td>{{$employee->employeededuction->provident_fund}}%</td><td><input type="text" name="provident_fund" value="{{$provident_fund }}" readonly></td></tr>
                        <tr><td>Absence </td><td></td><td><input type="text" id="absence" name="absence" value="0"> </td></tr>
                        <tr><td>Fine/Other </td><td></td><td><input type="text" name="fine" id="fine" value="0"> </td></tr>
                        <tr><td> </td><td></td><td> </td></tr>
                        <tr><td>  </td><td></td><td></td></tr>
                        <tr><td>  </td><td></td><td></td></tr>
                        <tr><td></td><td></td><td></td></tr>
                        <tr><td colspan="4"><input type="text" id="net_salary" name="net_salary" readonly style="font-weight: 700; font-size: 16px;"></td></tr>
                        
                        
                    </tbody>
            </table>
        </div>
        <div class="summary" >
            <div><span class="label" >Amount Paid:</span> <input type="number"  name="paid" id="paid" style="width: 150px;" required > </div>
            <div><span class="label">Due:</span> <input type="number"  id="due" name="due" style="width: 150px;"  readonly></div>
        </div>

        <div class="signatures">
            <div>
                <div class="line">Employee Signature</div>
            </div>
            <div>
                <div class="line">Accountant</div>
            </div>
            <div>
                <div class="line">Principal/Head</div>
            </div>
            
        </div>
         <div style="text-align: center;">
        <button type="submit" class="buttonbis" value="save" ><span >Payment Submet</span></button>
        </div>
       
    </form>
</div>



<!-- <script>
document.addEventListener('DOMContentLoaded', function () {

        
        const absenceInput = document.getElementById('absence');
        const fineInput = document.getElementById('fine');
        const totalDeductionInput = document.getElementById('totaldeduction');       
        const tp = parseFloat({{ $tp }});       
        function calculateDue() {
            let fine = parseFloat(fineInput.value) || 0;
            let absence = parseFloat(absenceInput.value) || 0;
            let totalDeduction = fine + absence + tp;
            totalDeductionInput.value = totalDeduction.toFixed(2);
        }
        fineInput.addEventListener('input', calculateDue);
        absenceInput.addEventListener('input', calculateDue);
        calculateDue(); 
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const basic = parseFloat("{{ $basic }}");  
        const total = parseFloat("{{ $total }}");  

        const bonusElement = document.getElementById('bonus'); 
        const bonusPercentElement = document.getElementById('bonus_amount'); 
        const totalAmountInput = document.getElementById('total_amount'); 
        const totalDeductionInput = document.getElementById('totaldeduction');
        const netSalaryInput = document.getElementById('net_salary');

        function calculateTotal() {
            const bonusAmount = parseFloat(bonusElement.value) || 0;
            const totalSalary = total + bonusAmount;
            totalAmountInput.value = totalSalary.toFixed(2);
            calculateNetSalary(); 
        }

        function calculateNetSalary() {
            const totalAmount = parseFloat(totalAmountInput.value) || 0;
            const totalDeduction = parseFloat(totalDeductionInput.value) || 0;
            const netSalary = totalAmount - totalDeduction;
            netSalaryInput.value = netSalary.toFixed(2);
        }

        
        document.getElementById('salary_month').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const bonusPercent = parseFloat(selectedOption.getAttribute('data-bonus')) || 0;
            const bonusAmount = basic * (bonusPercent / 100); 

            bonusPercentElement.innerText = bonusPercent; 
            bonusElement.value = bonusAmount.toFixed(2);
            calculateTotal();
        });

        
        totalDeductionInput.addEventListener('input', calculateNetSalary);
    });
</script> -->




<script>
document.addEventListener('DOMContentLoaded', function () {
    const basic = parseFloat("{{ $basic }}");
    const total = parseFloat("{{ $total }}");
    const tp = parseFloat({{ $tp }});

    const bonusElement = document.getElementById('bonus');
    const bonusPercentElement = document.getElementById('bonus_amount');
    const totalAmountInput = document.getElementById('total_amount');
    const totalDeductionInput = document.getElementById('totaldeduction');
    const netSalaryInput = document.getElementById('net_salary');
    const paidInput = document.getElementById('paid');
    const dueInput = document.getElementById('due');
    const fineInput = document.getElementById('fine');
    const absenceInput = document.getElementById('absence');

    function calculateTotal() {
        const bonusAmount = parseFloat(bonusElement.value) || 0;
        const totalSalary = total + bonusAmount;
        totalAmountInput.value = totalSalary.toFixed(2);
        calculateNetSalary();
    }

    function calculateTotalDeduction() {
        const fine = parseFloat(fineInput.value) || 0;
        const absence = parseFloat(absenceInput.value) || 0;
        const totalDeduction = fine + absence + tp;
        totalDeductionInput.value = totalDeduction.toFixed(2);
        calculateNetSalary();
    }

    function calculateNetSalary() {
        const totalAmount = parseFloat(totalAmountInput.value) || 0;
        const totalDeduction = parseFloat(totalDeductionInput.value) || 0;
        const netSalary = totalAmount - totalDeduction;
        netSalaryInput.value = netSalary.toFixed(2);
        calculateDue();
    }

    function calculateDue() {
        const netSalary = parseFloat(netSalaryInput.value) || 0;
        const paidAmount = parseFloat(paidInput.value) || 0;
        const due = netSalary - paidAmount;
        dueInput.value = due.toFixed(2);
    }

    // Event listeners
    document.getElementById('salary_month').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const bonusPercent = parseFloat(selectedOption.getAttribute('data-bonus')) || 0;
        const bonusAmount = basic * (bonusPercent / 100);

        bonusPercentElement.innerText = bonusPercent;
        bonusElement.value = bonusAmount.toFixed(2);
        calculateTotal();
    });

    fineInput.addEventListener('input', calculateTotalDeduction);
    absenceInput.addEventListener('input', calculateTotalDeduction);
    totalDeductionInput.addEventListener('input', calculateNetSalary);
    paidInput.addEventListener('input', calculateDue);
    totalAmountInput.addEventListener('input', calculateNetSalary);

    // Initialize values on page load
    calculateTotalDeduction();
    calculateTotal();
});
</script>


 @endif

@endsection