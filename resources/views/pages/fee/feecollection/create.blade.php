@extends('layouts.master')
@section('page')


    <style>
        /* Main container for invoice */
        .invoice-container {
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
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
        }

        .form-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 10px;
        }

        /* Each group contains label + input side by side */
        .form-group {
            display: flex;
            align-items: center;
            flex: 1 1 48%;
            min-width: 300px;
        }

        /* Label styling */
        .form-group label {
            width: 130px;
            font-weight: bold;
            color: #333;
            font-size: 15px;
        }

        /* Input and select styling */
        .form-group input,
        .form-group select {
            flex: 1;
            padding: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            color: #333;
            background: #fdfdfd;
            font-weight: 600;
        }

        /* Optional readonly styling */
        .form-group input[readonly] {
            background-color: #f5f5f5;
        }

        @media (max-width: 768px) {
            .form-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-group label {
                width: 100%;
                margin-bottom: 5px;
            }

            .form-group input,
            .form-group select {
                width: 100%;
            }
        }

        table#invoiceTable {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        #invoiceTable th,
        #invoiceTable td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .summary {
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 30px;
            padding-top: 10px;
            border-top: 2px solid #ccc;
            display: flex;
            justify-content: space-between;
        }

        .summary input {
            width: 150px;
            padding: 5px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
    <div class="divbi">
        <a class="buttonbi" href="{{ url('feecollections') }}"><span>← Back To Ap.List</span></a>
        <form method="GET" action="{{ route('feecollections.create') }}">
            <input type="text" name="search" placeholder="Student ID " value="{{ request('search') }}"style="width: 180px ; height:40px; border-radius: 5px;" />
            <button type="submit" class="buttonbis"><span> Search </span></button>
            
        </form>
        <a href="{{ route('feecollections.create') }}"><button class="buttonbi"><span> Clear</span></button></a>
    </div>






    <div class="invoice-container">
        <h2>Fatehabad International School</h2>

        <p class="subtitle">Student Payment Invoice</p>

        @if(!request()->has('search'))

            <form>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" id="id" name="id" />
                    </div>
                    <div class="form-group">
                        <label for="father_name">Father's Name</label>
                        <input type="text" id="father_name" name="father_name" />
                    </div>
                    <div class="form-group">
                        <label for="roll">Roll</label>
                        <input type="text" id="roll" name="roll" />
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" />
                    </div>
                    <div class="form-group">
                        <label for="shift_id">Shift ID</label>
                        <input type="text" id="shift_id" name="shift_id" />
                    </div>
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="text" id="class" name="class" />
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <input type="text" id="payment_method" name="payment_method" />
                    </div>
                    <div class="form-group">
                        <label for="reference_number">Reference Number</label>
                        <input type="text" id="reference_number" name="reference_number" />
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" value="{{ date('Y-m-d') }}" name="date" />
                    </div>
                </div>
            </form>

        @elseif (!$student)
            <form>
                <div style="
                                        padding: 20px;
                                        background-color: #ffe5e5;
                                        border: 1px solid #ffcccc;
                                        border-radius: 8px;
                                        text-align: center;
                                        color: #a94442;
                                        margin-top: 20px;
                                    ">
                    <h3 style="margin-bottom: 10px">No student Found</h3>
                    <p>The student ID you entered does not match any records.</p>
                    <p>Please check the ID and try again.</p>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" id="id" name="id" />
                    </div>
                    <div class="form-group">
                        <label for="father_name">Father's Name</label>
                        <input type="text" id="father_name" name="father_name" />
                    </div>
                    <div class="form-group">
                        <label for="roll">Roll</label>
                        <input type="text" id="roll" name="roll" />
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" />
                    </div>
                    <div class="form-group">
                        <label for="shift_id">Shift ID</label>
                        <input type="text" id="shift_id" name="shift_id" />
                    </div>
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="text" id="class" name="class" />
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <input type="text" id="payment_method" name="payment_method" />
                    </div>
                    <div class="form-group">
                        <label for="reference_number">Reference Number</label>
                        <input type="text" id="reference_number" name="reference_number" />
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" value="{{ date('Y-m-d') }}" name="date" />
                    </div>
                </div>
            </form>
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




            <form method="POST" action="{{ route('feecollections.store') }}">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ $student->name }}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" id="id" name="id" value="{{ $student->id }}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="father_name">Father's Name</label>
                        <input type="text" id="father_name" name="father_name" value="{{ $student->father_name }}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="roll">Roll</label>
                        <input type="text" id="roll" name="roll" value="{{ $student->roll_number ?? null}}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" value="{{ $student->mobile_number }}"
                            readonly />
                    </div>
                    <div class="form-group">
                        <label for="shift_id">Shift</label>
                        <input type="text" id="shift_id" name="shift_id" value="{{ $student->shift->name }}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="text" id="class" name="class" value="{{ $student->class->name ?? null}}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <select id="payment_method" name="payment_method" required>
                            <option value="">Select Method</option>
                            @foreach ($paymentmethods as $paymentmethod)

                                <option value="{{ $paymentmethod->id }}">
                                    {{ $paymentmethod->name }}
                                </option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="reference_number">Reference No</label>
                        <input type="text" id="reference_number" name="reference_number" required />
                    </div>
                    <div class="form-group">
                        <label for="date">Payment Date</label>
                        <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}" required />
                    </div>

                    <div class="form-group">
                        <label for="date">Reiceve By</label>
                        <select id="reiceve_by" name="reiceve_by" required>
                            <option value="">- sent to database-</option>
                            @foreach ($employeeadministrators as $employeeadministrator)
                                @if (
                                        $employeeadministrator->role === "Accountants" ||
                                        $employeeadministrator->role === "Clerks"
                                    )
                                    <option value="{{ $employeeadministrator->id }}">
                                        {{ $employeeadministrator->name }}
                                        ({{$employeeadministrator->role}})
                                    </option>
                            @endif @endforeach
                        </select>
                    </div>
                </div>

                <!-- Invoice Table -->
                 <div class="table-responsive ">
                <table id="invoiceTable">
                    <thead>
                        <tr>
                            <th>Payment For</th>
                            <th>Fee</th>
                            <th>Fee Month/Year</th>
                            <th>Fee Waived</th>
                            <th>Total</th>
                            <th>Remark</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="expense_type[]" class="expense-select" onchange="setAmountFromType(this)">
                                    <option value="">-- Select --</option>
                                    @foreach($frequences as $f)
                                        <option value="{{ Str::snake(strtolower($f->typeName)) }}">
                                            {{ $f->typeName }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="fee[]" class="fee" value="0" oninput="calculateTotals()" />
                            </td>
                            <td>
                                <input type="text" name="month[]" class="month" value="1" oninput="calculateTotals()" />
                            </td>
                            <td>
                                <input type="text" name="waived[]" class="waived" value="0" oninput="calculateTotals()" />
                            </td>
                            <td class="row-total">0</td>
                            <td>
                                <input type="text" name="remark[]" class="remarks" />
                            </td>
                            <td>
                                <button type="button" class="buttonc" onclick="addRow(this)">
                                    <i class="bi bi-plus-lg" style="color: white"></i>
                                </button>
                                <button type="button" class="buttonc" onclick="removeRow(this)">
                                    <i class="bi bi-dash" style="color: white"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                 </div>
                <!-- Summary Section -->
                <div class="summary" style="display: flex; justify-content: space-between">
                    <div style="margin-top: 25px">
                        <hr />
                        Accounts Signature
                    </div>
                    <div>
                        Total Amount: <span id="totalAmountDisplay">0</span><br />
                        <input type="hidden" name="total_amount" id="totalAmountInput" />
                        Paid Amount:
                        <input type="number" name="paid_amount" id="paidAmount" required oninput="calculateTotals()" /><br />
                        DDue Amount: <span id="dueAmountDisplay">0</span>
                    </div>
                </div>
                <div style="text-align: center">
                    <button type="submit" class="buttonbis" value="save">
                        <span>Submit student</span>
                    </button>
                </div>
            </form>
        @endif
        
    </div>

    <div class="invoice-container" style="margin-top: 10px; height: 250px; overflow-y: auto; font-size: 12px;">
        @if($paymentHistory && $paymentHistory->count())
            <h2 class="mb-2" style="text-align: center;">Previous Payments</h2>
            <div class="table-responsive">
                <div class="table-responsive ">
                <table>
                    <thead>
                        <tr>
                            <th style="background-color:  #fff8e1;">Date</th>
                            <th style="background-color:  #fff8e1;">Fee Type</th>
                            <th style="background-color:  #fff8e1;">Month</th>
                            <th style="background-color:  #fff8e1;">Amount</th>
                            <th style="background-color:  #fff8e1;">Waived</th>
                            <th style="background-color:  #fff8e1;">Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paymentHistory as $payment)
                            @foreach($payment->details as $detail)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($payment->date)->format('d-m-Y') }}</td>
                                    <td>{{ ucwords(str_replace('_', ' ', $detail->expense_type)) }}</td>
                                    <td>{{ $detail->month }}</td>
                                    <td>{{ $detail->fee }}</td>
                                    <td>{{ $detail->waived }}</td>
                                    <td>{{ $detail->fee - $detail->waived }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        @endif
    </div>

    <script>

        const expenseData = @json($expenses);
        const frequenceOptions = `{!! $frequences->map(fn($f) => "<option value='{$f->typeName}'>{$f->typeName}</option>")->implode('') !!}`;
        const classId = {{ $student->classe_id ?? 'null' }};
        function calculateTotals() {
            let totalAmount = 0;


            document.querySelectorAll("#invoiceTable tbody tr").forEach(row => {
                const fee = parseFloat(row.querySelector(".fee")?.value) || 0;
                const month = parseFloat(row.querySelector(".month")?.value) || 1;
                const waived = parseFloat(row.querySelector(".waived")?.value) || 0;


                const rowTotal = (fee * month) - waived;
                row.querySelector(".row-total").innerText = rowTotal.toFixed(2);

                totalAmount += rowTotal;
            });


            const paid = parseFloat(document.getElementById("paidAmount").value) || 0;


            const due = totalAmount - paid;


            document.getElementById("totalAmountDisplay").innerText = totalAmount.toFixed(2);
            document.getElementById("dueAmountDisplay").innerText = due.toFixed(2);
            document.getElementById("totalAmountInput").value = totalAmount.toFixed(2);
        }


        function addRow() {
            const tableBody = document.querySelector("#invoiceTable tbody");

            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td>
                  <select name="expense_type[]"  class="expense-select" onchange="setAmountFromType(this)" >
                  ${frequenceOptions}
                  </select>
                </td>
                <td><input type="text" name="fee[]" class="fee" value="0" oninput="calculateTotals()" /></td>
                <td><input type="text" name="month[]" class="month" value="1" oninput="calculateTotals()" /></td>
                <td><input type="text" name="waived[]" class="waived" value="0" oninput="calculateTotals()" /></td>
                <td class="row-total">0</td>
                <td><input type="text" name="remark[]" class="remarks" /></td>
                <td>
                  <button type="button" class="buttonc" onclick="addRow()"><i class="bi bi-plus-lg text-white" style="color: white;"></i></button>
                  <button type="button" class="buttonc" onclick="removeRow(this)"><i class="bi bi-dash" style="color: white;"></i></button>
                </td>
                `;
            tableBody.appendChild(newRow);

            calculateTotals();
        }


        function removeRow(button) {
            const row = button.closest("tr");
            const rowCount = document.querySelectorAll("#invoiceTable tbody tr").length;
            if (rowCount > 1) {
                row.remove();
                calculateTotals();
            } else {
                alert("At least one row must remain.");
            }
        }


        function setAmountFromType(selectElement) {
            const selectedType = selectElement.value;
            const row = selectElement.closest("tr");
            const feeInput = row.querySelector(".fee");

            if (!expenseData || !classId || !expenseData[classId]) {
                feeInput.value = 0;
                calculateTotals();
                return;
            }


            const expense = expenseData[classId];

            // Convert selectedType to key format, e.g. "Monthly Fee" => "monthly_fee"
            const camelKey = selectedType.toLowerCase().replace(/ /g, '_');

            // Set fee input from expenseData or 0 if not found
            feeInput.value = parseFloat(expense[camelKey]) || 0;

            calculateTotals();
        }

        // On page load, initialize totals
        window.onload = () => {
            calculateTotals();
        };
    </script>



@endsection